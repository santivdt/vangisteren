<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-06-26 12:43:15
         compiled from "/domains/vangisteren.nu/2017/templates/source/work.tpl" */ ?>
<?php /*%%SmartyHeaderCode:786252733592dc2bb28bb40-77163022%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b65c55935546f00c5e69f7e1c8057a4f19547a15' => 
    array (
      0 => '/domains/vangisteren.nu/2017/templates/source/work.tpl',
      1 => 1498473777,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '786252733592dc2bb28bb40-77163022',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_592dc2bb2b8536_04596934',
  'variables' => 
  array (
    'posts' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592dc2bb2b8536_04596934')) {function content_592dc2bb2b8536_04596934($_smarty_tpl) {?><div id="overview-posts-container" class="work">
  <section class="content">
    <?php echo $_smarty_tpl->getSubTemplate ("overview.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('posts'=>$_smarty_tpl->tpl_vars['posts']->value,'page'=>"overview"), 0);?>

  </section>
</div>
<?php }} ?>
