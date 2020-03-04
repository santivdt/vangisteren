<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-06-26 12:43:06
         compiled from "/domains/vangisteren.nu/2017/templates/source/quote.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1324610500592dc2b680c594-29999159%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9bbdf4da98e929b50248f65876c2b0c82dfe57fc' => 
    array (
      0 => '/domains/vangisteren.nu/2017/templates/source/quote.tpl',
      1 => 1498473777,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1324610500592dc2b680c594-29999159',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_592dc2b6836bd6_08150620',
  'variables' => 
  array (
    'post' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592dc2b6836bd6_08150620')) {function content_592dc2b6836bd6_08150620($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['post']->value&&true==array_key_exists('parsed',$_smarty_tpl->tpl_vars['post']->value)&&true==array_key_exists('variables',$_smarty_tpl->tpl_vars['post']->value['parsed'])&&true==array_key_exists('quote',$_smarty_tpl->tpl_vars['post']->value['parsed']['variables'])) {?>
  <section class="dark">
   <blockquote>
    <a href="/<?php echo $_smarty_tpl->tpl_vars['post']->value['post_name'];?>
" title="">
      <?php echo $_smarty_tpl->tpl_vars['post']->value['parsed']['variables']['quote'];?>

    </a>
  </blockquote>
 </section>
<?php }?>

<?php }} ?>
