<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-06-26 12:43:05
         compiled from "/domains/vangisteren.nu/2017/templates/source/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18589497592dc2b6570612-43479470%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '40b431cede6691307c3a6cf0f75c24ddfffa812d' => 
    array (
      0 => '/domains/vangisteren.nu/2017/templates/source/index.tpl',
      1 => 1498473777,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18589497592dc2b6570612-43479470',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_592dc2b66e5836_26006448',
  'variables' => 
  array (
    'page' => 0,
    'post' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592dc2b66e5836_26006448')) {function content_592dc2b66e5836_26006448($_smarty_tpl) {?><!doctype html>
<html lang="nl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>VAN GISTEREN</title>
    <link rel="shortcut icon" href="/media/favicon.ico" type="image/x-icon">
    <meta name="author" content="www.roxlu.com">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link href="https://fonts.googleapis.com/css?family=Bitter|Copse|Arvo|Scope+One|Lato|Open+Sans|Pontano+Sans|Josefin+Sans|Josefin+Slab|Slabo+27px|Maven+Pro|Cabin|Rubik" rel="stylesheet">
    <link rel="stylesheet" href="/css/ress.css">
    <link rel="stylesheet" href="/css/socicon.css">
    <link rel="stylesheet" href="/css/hamburger.css?<?php echo time();?>
">
    <link rel="stylesheet" href="/css/vangisteren.css?<?php echo time();?>
">
    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/js/vangisteren.js"><?php echo '</script'; ?>
>
  </head>
  <body class="<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
">
    <header id="menu-header">
      <div class="container">
        <a id="logo" href="/" title="VAN GISTEREN"></a>
        <div id="menu-hamburger">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </div>
        <div id="menu">
          <ul id="menu-main">
            <li><a href="/" title="">Home</a></li>
            <li><a href="/werk" title="">Werk</a></li>
            <li><a href="/over" title="">Over Ons</a></li>
            <li><a href="/contact" title="">Contact</a></li>
            <li>
              <ul id="menu-social">
                <li><a class="socicon-facebook inline-socicon" href="https://www.facebook.com/vangisteren.nu" title="Bezoek onze pagina op Facebook" target="_blank"></a></li>
                <li><a class="socicon-twitter inline-socicon" href="https://twitter.com/van_gisteren" title="Bezoek onze pagina op Twitter" target="_blank"></a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </header>
    <div id="site">
      <?php if ($_smarty_tpl->tpl_vars['page']->value=="homepage") {?>
        <?php echo $_smarty_tpl->getSubTemplate ("homepage.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

      <?php } elseif ($_smarty_tpl->tpl_vars['page']->value=="overview") {?>
        <?php echo $_smarty_tpl->getSubTemplate ("work.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

      <?php } elseif ($_smarty_tpl->tpl_vars['page']->value!=''&&is_array($_smarty_tpl->tpl_vars['post']->value)) {?>
        <?php echo $_smarty_tpl->getSubTemplate ("post.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

      <?php }?>
      <footer>
        <ul>
          <li><a class="socicon-facebook inline-socicon" href="https://www.facebook.com/vangisteren.nu" title="Bezoek onze pagina op Facebook" target="_blank"></a></li>
          <li><a class="socicon-twitter inline-socicon" href="https://twitter.com/van_gisteren" title="Bezoek onze pagina op Twitter" target="_blank"></a></li>
        </ul>
      </footer>
    </div>
    <?php echo '<script'; ?>
>
     $(document).ready(function(){
       $('#menu-hamburger').click(function(){
         $(this).toggleClass('open');
         $('#menu').toggleClass('open');
         $('body').toggleClass("menu-open");
       });
     });
    <?php echo '</script'; ?>
>

  </body>
</html>
<?php }} ?>
