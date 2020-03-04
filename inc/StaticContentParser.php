<?php
class StaticContentParser {

  var $opt;
  var $parsedown;
  var $s;
  
  function __construct($opt) {

    if (false == is_writable($opt['template_source_dir'])) {
      die($opt['template_source_dir'] .' is not writable.');
    }
    if (false == is_writable($opt['template_compile_dir'])) {
      die($opt['template_compile_dir'] .' is not writable');
    }

    $this->opt = $opt;
    $this->parsedown = new ParsedownExtraPlugin();
    $this->s = new Smarty();
    $this->s->setTemplateDir($this->opt['template_source_dir']);
    $this->s->setCompileDir($this->opt['template_compile_dir'] );
  }

  public function execute($req) {

    if (true == array_key_exists('path', $req)) {
      $path_str = trim($req['path']);

      switch ($path_str) {
        case "werk": {
          $this->parsePostsOverview();
          exit;
        }
        default: {
          if (!empty($path_str)) {
            $this->parsePage($path_str);
          }
          else {
            $this->parseHomepage($req);
          }
          exit;
        }
      }
    }
  }

  /*
    This function will retrieve the posts that need
    to be shown on the homepage. At the top we show
    a "splash" image and underneath that we show
    blocks of pages which ave `homepage-y` in their
    filename.
   */
  private function parseHomepage($req) {

    $meta = $this->getMetaInfoFromPosts();
    if (false == $meta) {
      die('No files found.');
    }

    $splash = false;
    foreach ($meta as $dx => $info) {

      /* Posts for homepage. */
      if ("y" == $info['homepage']) {
        $parsed = $this->convertPostIntoHtml($info['filepath']);
        $meta[$dx]['parsed'] = $parsed;
      }

      if (false == array_key_exists('splash', $info)) {
        die('Invalid filename for: ' .$info['filepath'] .' no splash-{y,n}');
      }
        
      /* Splash image */
      if ("y" == $info["splash"]) {
        $parsed = $this->convertPostIntoHtml($info['filepath']);
        $info['parsed'] = $parsed;
        $splash = $info;
      }
    }

    if ($splash) {
      $this->s->assign('splash', $splash);
    }

    $this->s->assign('posts', $meta);
    $this->s->assign('page', 'homepage');
    echo $this->s->fetch('index.tpl');
  }

  /*
    This function parses a post page. You pass 
    the name of the post. For example when you have
    a filename like:  

      `100.lopend.homepage-y.splash-n.kenau.md`

   ... then `kenau` will be the name.

   */
  private function parsePage($pageName) {
    
    if (true == empty($pageName)) {
      header('location:/');
      exit;
    }

    $fp = $this->getPostFilepathForName($pageName);
    if (false == $fp) {
      header('location:/');
      exit;
    }

    $options = array(
      'parse_related' => true
    );
    
    $post = $this->convertPostIntoHtml($fp, $options);
    if (false == $post) {
      die('Failed to load the post: ' .$pagename);
    }

    /* @todo 
       We have to copy (reference) the post in the parsed variable
       too; was a quickfix to make sure the quote was shown on the
       page of a post itself. See `post.tpl` where we include
       `quote.tpl`.
    */
    $post['parsed'] = $post;
    
    //p($post);exit;
    $this->s->assign('page', $pageName);
    $this->s->assign('post', $post);
    echo $this->s->fetch('index.tpl');
  }

  /*
    This function will parse the posts that will be shown on 
    the overview poage. We set the variable "posts".
   */
  private function parsePostsOverview() {

    $post_files = $this->getMetaInfoFromPosts();
    if (false == is_array($post_files) || 0 == count($post_files)) {
      log_msg('No post files found for overview page.');
      header('location:/');
      exit;
    }

    $overview_posts = array();
    
    foreach ($post_files as $dx => $post_info) {

      if (false == array_key_exists('overview', $post_info)
          || 'n' == $post_info['overview'])
        {
          continue;
        }

      $post_files[$dx]['parsed'] = $this->convertPostIntoHtml($post_info['filepath'], array('parse_related' => false));
    }

    //p($post_files); exit;
    $this->s->assign('page', 'overview');
    $this->s->assign('posts', $post_files);
    echo $this->s->fetch('index.tpl');
  }
  
  private function convertPostIntoHtml($filepath, $options = null) {
    
    if (false == file_exists($filepath)) {
      die('File not found: ' .$filepath);
    }

    /* Check for options. */
    if (!is_array($options)) {
      $options = array(
        'parse_related' => false
      );
    }
    else {
      if (false == array_key_exists('parse_related', $options)) {
        $options['parse_related'] = true;
      }
    }

    /* Parse the page. */
    $page = array(
      'variables' => array(),
      'title' => '',
      'content_markdown' => '',
      'content_html' => ''
    );

    /* Add filename variables. */
    /*
    $file_vars = $this->getMetaInfoFromFilename($filepath);
    if (is_array($file_vars)) {
      foreach ($file_vars as $var_name => $var_value) {
        $page[$var_name] = $var_value;
      }
    }
    */
    
    $content = file_get_contents($filepath);
    $state = "variables";
    $lines = explode("\n", $content);

    foreach ($lines as $dx => $line) {

      switch ($state) {

        /* Parse variables. */
        case "variables": {
          $line = trim($line);
          if (strlen($line) == 0) {
            break;
          }
          if ($line[0] == '#') {
            $state = "content";
            $page['title'] = str_replace('#', '', $line);
            $page['content_markdown'] = $line ."\n";
          }
          else {
            $varval = explode(':', $line);
            if (count($varval) >= 2) {
              $var = trim($varval[0]);
              unset($varval[0]);
              $value = trim(implode(':', $varval));
              if ("related" == $var && true == $options['parse_related']) {
                $page['related'] = $this->convertPostIntoHtmlParseRelated($value);
              }
              $page['variables'][$var] = $value;
            }
          }
          break;
        }

          /* Parse content. */
        case "content": {
          $page['content_markdown'] .= $line ."\n";
          break;
        }
          
        default: {
          break;
        }
      }
    } /* foreach */

    $page['content_html'] = $this->parsedown->text($page['content_markdown']);
    return $page;
  }

  /*
    Every post can define a variable `related` which can hold
    a comma separated string of post names. When we find these
    related posts we will parse them so you can use them in a
    page to link to other posts. 

    The related variable looks like:

      `related: kenau, mndvd, elizabeth`

    @return   We return an array indexed by the names of the posts
              that we found and converted.
   */
  private function convertPostIntoHtmlParseRelated($related) {
    
    if (true == empty($related)) {
      return array();
    }

    $names = explode(',', $related);
    if (false == is_array($names) || 0 == count($names)) {
      return array();
    }

    $related = array();
    foreach ($names as $dx => $name) {

      $name = trim($name);
      if (true == empty($name)) {
        continue;
      }
      
      $related_post_filename = $this->getPostFilepathForName($name);
      if (false == $related_post_filename) {
        continue;
      }

      $related[$name] = $this->convertPostIntoHtml($related_post_filename, array('parse_related' => false));
    }

    return $related;
  }
  
  /*
    This function is used to find the filepath for the post with the
    given name. Each post filename ends with a name, e.g.

       `100.lopend.homepage-y.splash-n.kenau.md`

    The last bit of the filename is what we call the `post-name`.  So
    here it's `kenau`. When you pass `kenau` into this fuction we will
    return the full path of the post filenaem or we return false.
    This function is used to retrieve/parse a post on a full page. 

   */
  private function getPostFilepathForName($postName) {
    
    $files = $this->getPostFiles();
    $found_filepath = false;

    foreach ($files as $file) {
      if (true == ends_width($file['filename'], $postName .'.md')) {
        $found_filepath = $file['filepath'];
        break;
      }
    }
    
    return $found_filepath;
  }
  
  /*
    This function parses the filenames and extracts the variables
    which are part of the filename. For example you can use
    `something.online-y.homepage-n.show-n.md` In this example the
    `online`, `homepage` and `show` are variables which are set the
    `y`, `n` and `n` respectively.
   */
  private function getMetaInfoFromPosts() {
    
    $files = $this->getPostFiles();
    if (false == is_array($files)) {
      return false;
    }

    $meta = array();

    foreach ($files as $dx => $file) {
      $meta[] = array_merge($this->getMetaInfoFromFilename($file['filename']), $file);
    }

    return $meta;
  }

  /*
    This function will extract the variable-value pairs from the given
    filename. E.g. you can add 'oveview-y.splash-y.md' and we will
    extract overview=y, splasg=y.
   */
  private function getMetaInfoFromFilename($filename) {

    if (true == empty($filename)) {
      log_msg('Given filename is empty cannot get meta info.');
      return false;
    }

    $name_parts = explode('.', $filename);
    if (false == is_array($name_parts)) {
      die('Invalid filename: ' .$filename);
    }
    
    /* Parse e.g. homepage-y */
    $info = array();
    foreach ($name_parts as $dx_name => $value_name) {
      $varval = explode('-', $value_name);
      if (false == is_array($varval) || 2 != count($varval)) {
        continue;
      }
      $info[$varval[0]] = $varval[1];
    }
    
    $info['post_name'] = $name_parts[count($name_parts) - 2];
    return $info;
  }

  /*
    Get the filepaths and names of the posts.
   */
  private function getPostFiles() {
    $files = scandir($this->opt['posts_dir']);
    $result = array();
    foreach ($files as $dx => $filename) {
      if ($filename == '.' || $filename == '..' || $filename == ".DS_Store") {
        continue;
      }
      $result[] = array(
        'filepath' => $this->opt['posts_dir'] .$filename,
        'filename' => $filename
      );
    }
    return $result;
  }

  }; /* class */