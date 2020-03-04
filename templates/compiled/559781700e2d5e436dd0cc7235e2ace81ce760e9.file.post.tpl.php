<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-06-26 12:43:10
         compiled from "/domains/vangisteren.nu/2017/templates/source/post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1470027574592dc2bf623929-84042315%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '559781700e2d5e436dd0cc7235e2ace81ce760e9' => 
    array (
      0 => '/domains/vangisteren.nu/2017/templates/source/post.tpl',
      1 => 1498473777,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1470027574592dc2bf623929-84042315',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_592dc2bf6d5906_31670561',
  'variables' => 
  array (
    'post' => 0,
    'post_name' => 0,
    'related_post' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592dc2bf6d5906_31670561')) {function content_592dc2bf6d5906_31670561($_smarty_tpl) {?><article lang="nl">
  <header id="article-header" style="background-image:url(/images/<?php echo $_smarty_tpl->tpl_vars['post']->value['variables']['homepage_image'];?>
)">
  </header>
  <section>
    <?php echo $_smarty_tpl->tpl_vars['post']->value['content_html'];?>

  </section>
</article>
<?php if (true==array_key_exists('related',$_smarty_tpl->tpl_vars['post']->value)&&0!=count($_smarty_tpl->tpl_vars['post']->value['related'])) {?>
  <section class="related">
    <div class="related-container">
      <?php  $_smarty_tpl->tpl_vars['related_post'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['related_post']->_loop = false;
 $_smarty_tpl->tpl_vars['post_name'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['post']->value['related']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['related_post']->key => $_smarty_tpl->tpl_vars['related_post']->value) {
$_smarty_tpl->tpl_vars['related_post']->_loop = true;
 $_smarty_tpl->tpl_vars['post_name']->value = $_smarty_tpl->tpl_vars['related_post']->key;
?>
        <a class="related-post" href="/<?php echo $_smarty_tpl->tpl_vars['post_name']->value;?>
" title="">
          <div>
            <div style="background-image: url(/images/<?php echo $_smarty_tpl->tpl_vars['related_post']->value['variables']['homepage_image'];?>
"></div>
            <div class="related-post-content">
              <h4><?php echo $_smarty_tpl->tpl_vars['related_post']->value['variables']['intro_title'];?>
</h4>
              <p><?php echo $_smarty_tpl->tpl_vars['related_post']->value['variables']['intro_message'];?>
</p>
            </div>

          </div>
        </a>
      <?php } ?>
    </div>
  </section>
<?php }?>
<?php echo $_smarty_tpl->getSubTemplate ("quote.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('post'=>$_smarty_tpl->tpl_vars['post']->value), 0);?>

<?php }} ?>
