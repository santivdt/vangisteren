<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-06-26 12:43:06
         compiled from "/domains/vangisteren.nu/2017/templates/source/overview.tpl" */ ?>
<?php /*%%SmartyHeaderCode:152836614592dc2b67633a2-98570323%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a9da5f1b02fc221702aecafc9554ab50ce9a1241' => 
    array (
      0 => '/domains/vangisteren.nu/2017/templates/source/overview.tpl',
      1 => 1498473777,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '152836614592dc2b67633a2-98570323',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_592dc2b67a8088_79827955',
  'variables' => 
  array (
    'posts' => 0,
    'page' => 0,
    'post' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592dc2b67a8088_79827955')) {function content_592dc2b67a8088_79827955($_smarty_tpl) {?><ul id="overview-posts">
  <?php  $_smarty_tpl->tpl_vars['post'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['post']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['posts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['post']->key => $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->_loop = true;
?>
    <?php if ($_smarty_tpl->tpl_vars['page']->value=="home") {?> 
      <?php if (false==array_key_exists('homepage',$_smarty_tpl->tpl_vars['post']->value)||$_smarty_tpl->tpl_vars['post']->value['homepage']!="y") {?>
        <?php continue 1;?>
      <?php }?>
    <?php } elseif ($_smarty_tpl->tpl_vars['page']->value=="overview") {?>
      <?php if (false==array_key_exists('overview',$_smarty_tpl->tpl_vars['post']->value)||$_smarty_tpl->tpl_vars['post']->value['overview']!="y") {?>
        <?php continue 1;?>
      <?php }?>
    <?php }?>
    <li>
      <a href="/<?php echo $_smarty_tpl->tpl_vars['post']->value['post_name'];?>
">
        <div class="overview-post-image" style="background-image:url(/images/<?php echo $_smarty_tpl->tpl_vars['post']->value['parsed']['variables']['homepage_image'];?>
)">
          <div class="overview-post-gradient">
          </div>
          <h3><?php echo $_smarty_tpl->tpl_vars['post']->value['parsed']['variables']['intro_title'];?>
</h3>
        </div>
        <div class="overview-post-intro">
          <p><?php echo $_smarty_tpl->tpl_vars['post']->value['parsed']['variables']['intro_message'];?>
</p>
        </div>
      </a>
    </li>
  <?php } ?>
</ul>
<?php }} ?>
