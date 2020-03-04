<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-06-26 12:43:06
         compiled from "/domains/vangisteren.nu/2017/templates/source/homepage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:610326950592dc2b67156f5-64169866%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bb5eda8f8fbae3fe7632ea7401d569efdf91b0e7' => 
    array (
      0 => '/domains/vangisteren.nu/2017/templates/source/homepage.tpl',
      1 => 1498473777,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '610326950592dc2b67156f5-64169866',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_592dc2b6743003_16622936',
  'variables' => 
  array (
    'splash' => 0,
    'posts' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592dc2b6743003_16622936')) {function content_592dc2b6743003_16622936($_smarty_tpl) {?><section class="content">
  <div id="homepage-splash">
    <?php if ($_smarty_tpl->tpl_vars['splash']->value&&$_smarty_tpl->tpl_vars['splash']->value['parsed']['variables']['homepage_image']!='') {?>
      <a href="/<?php echo $_smarty_tpl->tpl_vars['splash']->value['post_name'];?>
" title="">
        <div id="homepage-splash-image" style="background-image: url(/images/<?php echo $_smarty_tpl->tpl_vars['splash']->value['parsed']['variables']['homepage_image'];?>
);">
        </div>
        <div id="homepage-splash-intro">
          <h3><?php echo $_smarty_tpl->tpl_vars['splash']->value['parsed']['variables']['intro_title'];?>
</h3>
          <p><?php echo $_smarty_tpl->tpl_vars['splash']->value['parsed']['variables']['intro_message'];?>
</p>
        </div>
      </a>
    <?php }?>
  </div>
</section>
<div id="overview-posts-container">
  <section class="content">
    <?php echo $_smarty_tpl->getSubTemplate ("overview.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('posts'=>$_smarty_tpl->tpl_vars['posts']->value,'page'=>"home"), 0);?>

  </section>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("quote.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('post'=>$_smarty_tpl->tpl_vars['splash']->value), 0);?>

<?php }} ?>
