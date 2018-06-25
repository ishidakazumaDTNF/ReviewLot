<?php
/* Smarty version 3.1.30, created on 2018-01-29 11:18:43
  from "/Applications/XAMPP/xamppfiles/htdocs/ReviewLot/templates/login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a6e8483380b56_73792355',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5f5a407223e72a1ffb8e01f96ef6ae64c50d92d6' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/ReviewLot/templates/login.tpl',
      1 => 1517192321,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a6e8483380b56_73792355 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<!--

-->
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
  <title>ログイン | ReviewLot</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/ReviewLot/css/main.css" type="text/css">
  <link rel="stylesheet" href="/ReviewLot/css/login.css" type="text/css">
  <?php echo '<script'; ?>
 src="/ReviewLot/js/jquery.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 type="text/javascript">
    $(function(){
      $('a').click(function(){
        location.href = $(this).attr('href');
        return false;
      });
    });
  <?php echo '</script'; ?>
>
</head>
<body>
  <?php if (isset($_smarty_tpl->tpl_vars['validationMsgs']->value)) {?>
    <section id="errorMsg">
      <p>以下のメッセージをご確認ください</p>
      <ul>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['validationMsgs']->value, 'msg', false, NULL, 'validationMsgsLoop', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
?>
          <li><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</li>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

      </ul>
    </section>
  <?php }?>
  <section>
    <div class="logindesa">
    <div class="imglogo"><img src="/ReviewLot/img/logo.png" width="260" height="100" alt="表示失敗"></div>
    <form action="/ReviewLot/login.php" method="post">
      
      <div class="inp1"><input type="text" class="form-control" placeholder="reviewer" title="loginId" id="loginId" name="loginId" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['loginId']->value)===null||$tmp==='' ? '' : $tmp);?>
"></div>
        
      <div class="inp2"><input type="password" class="form-control" placeholder="password" title="loginPw" id="loginPw" name="loginPw"></div>

      <div class="ayu"><input type="submit" class="btn btn-default" value="ログイン"></div>
    </form>
    <div class="kotira"><p><a href="signupGoAdd.php">会員登録はこちら</a></p></div>
    <div>
  </section>
</body>
</html>
<?php }
}
