<?php
/* Smarty version 3.1.30, created on 2018-01-16 15:15:36
  from "/Applications/XAMPP/xamppfiles/htdocs/ReviewLot/templates/error.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a5d988830ad75_94442013',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '01cf0af86ef619d74feb42550683ddc7f2033fae' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/ReviewLot/templates/error.tpl',
      1 => 1516065411,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a5d988830ad75_94442013 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<!--

-->
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Error | ReviewLot</title>
  </head>
  <body>
    <h1>Error</h1>
    <section>
      <h2>申し訳ございません。障害が発生しました。</h2>
      <p>
        以下のメッセージを確認ください。<br>
        <?php echo $_smarty_tpl->tpl_vars['errorMsg']->value;?>

      </p>
    </section>
    <p><a href="/ReviewLot/">TOPへ戻る</a></p>
  </body>
</html>
<?php }
}
