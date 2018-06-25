<?php
/* Smarty version 3.1.30, created on 2018-02-02 01:49:20
  from "/Applications/XAMPP/xamppfiles/htdocs/ReviewLot/templates/review/list.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a73451008bfc7_88045645',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a42fba16c781d98de82e160c977a53e444930773' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/ReviewLot/templates/review/list.tpl',
      1 => 1517503094,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a73451008bfc7_88045645 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<!--

-->
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<title>ゲームリスト | ReviewLot</title>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="/ReviewLot/css/main.css" type="text/css">
		<link rel="stylesheet" href="/ReviewLot/css/all.css" type="text/css">
		<link rel="stylesheet" href="/ReviewLot/css/list.css" type="text/css">
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
	<div class="container">
		<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
			<!-- スマートフォンサイズで表示されるメニューボタンとテキスト -->
			<div class="navbar-header">
			<!--
			メニューボタン
			data-toggle : ボタンを押したときにNavbarを開かせるために必要
			data-target : 複数navbarを作成する場合、ボタンとナビを紐づけるために必要
			-->
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav-menu-2">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<!-- タイトルなどのテキスト -->
			<a class="navbar-brand" href="#">ゲームリスト</a>
			</div>
			<!-- グローバルナビの中身 -->
			<div class="collapse navbar-collapse" id="nav-menu-2">
			<!-- フォーム -->
			<form class="navbar-form navbar-left" role="search">
			<div class="form-group">
			<input type="text" class="form-control" placeholder="ゲームを検索">
			</div>
			<button type="submit" class="btn btn-default">検索</button>
			</form>
			<!-- ボタン -->
			<!--<button type="button" class="btn btn-default navbar-btn">ボタン</button>-->
			<!-- テキスト -->
			<!--<p class="navbar-text">ナビのテキスト</p>-->
			<!-- リンク -->
			<p class="navbar-text navbar-right"> <a href="#!" class="navbar-link"><?php echo $_smarty_tpl->tpl_vars['cus_name']->value;?>
さん</a></p>
			<p><a href="/ReviewLot/logout.php">ログアウト</a></p>
			</div>
			</div>
		</nav> 





		<?php if (isset($_smarty_tpl->tpl_vars['flashMsg']->value)) {?>
		<section>
			<p>
				<?php echo $_smarty_tpl->tpl_vars['flashMsg']->value;?>

			</p>
		</section>
		<?php }?>
		<section>

			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['gameList']->value, 'game', false, NULL, 'gameListLoop', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['game']->value) {
?>
			<div class="panel panel-default">
				<div class="panel-body">
					<a href="/ReviewLot/review/showDetail.php?detailGameId=<?php echo $_smarty_tpl->tpl_vars['game']->value->getGm_id();?>
">
						<p><?php echo $_smarty_tpl->tpl_vars['game']->value->getGm_name();?>
</p>
						<p><?php echo $_smarty_tpl->tpl_vars['game']->value->getGm_hardware();?>
</p>
						<p><?php echo $_smarty_tpl->tpl_vars['game']->value->getGm_release();?>
</p>
						<p><img class='img-rounded' src="<?php echo $_smarty_tpl->tpl_vars['game']->value->getGm_gazopath();?>
" width="128" height="158" alt="表示失敗"></p>
					</a>
				</div>
			</div>
			<?php
}
} else {
?>

				<tr>
					<td colspan="5">ゲームソフトが追加されるのをお待ち下さい。</td>
				</tr>
			<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


		</section>

		<?php if ($_smarty_tpl->tpl_vars['pageNo']->value == 1) {?>
						&lt;&lt;最初へ
						&lt;前へ
		<?php } else { ?>
		<?php $_smarty_tpl->_assignInScope('prevPageNo', $_smarty_tpl->tpl_vars['pageNo']->value-1);
?>

						<a href="/ReviewLot/review/showList.php?page=1">&lt;&lt;最初へ</a>&nbsp;
						<a href="/ReviewLot/review/showList.php?page= <?php echo $_smarty_tpl->tpl_vars['prevPageNo']->value;?>
">&lt;前へ</a>&nbsp;
		<?php }?>

		<?php
$_smarty_tpl->tpl_vars['pages'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['pages']->step = 1;$_smarty_tpl->tpl_vars['pages']->total = (int) ceil(($_smarty_tpl->tpl_vars['pages']->step > 0 ? $_smarty_tpl->tpl_vars['totalPage']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['totalPage']->value)+1)/abs($_smarty_tpl->tpl_vars['pages']->step));
if ($_smarty_tpl->tpl_vars['pages']->total > 0) {
for ($_smarty_tpl->tpl_vars['pages']->value = 1, $_smarty_tpl->tpl_vars['pages']->iteration = 1;$_smarty_tpl->tpl_vars['pages']->iteration <= $_smarty_tpl->tpl_vars['pages']->total;$_smarty_tpl->tpl_vars['pages']->value += $_smarty_tpl->tpl_vars['pages']->step, $_smarty_tpl->tpl_vars['pages']->iteration++) {
$_smarty_tpl->tpl_vars['pages']->first = $_smarty_tpl->tpl_vars['pages']->iteration == 1;$_smarty_tpl->tpl_vars['pages']->last = $_smarty_tpl->tpl_vars['pages']->iteration == $_smarty_tpl->tpl_vars['pages']->total;?>

			<?php if ($_smarty_tpl->tpl_vars['pages']->value == $_smarty_tpl->tpl_vars['pageNo']->value) {?>
						<?php echo $_smarty_tpl->tpl_vars['pages']->value;?>
&nbsp;
			<?php } else { ?>
						<a href="/ReviewLot/review/showList.php?page=<?php echo $_smarty_tpl->tpl_vars['pages']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['pages']->value;?>
</a>&nbsp;
			<?php }?>

			<?php if ($_smarty_tpl->tpl_vars['pages']->value != $_smarty_tpl->tpl_vars['totalPage']->value) {?>
						|&nbsp;
			<?php }?>

		<?php }
}
?>


		<?php if ($_smarty_tpl->tpl_vars['pageNo']->value == $_smarty_tpl->tpl_vars['totalPage']->value) {?>
								次へ&gt;
								最後へ&gt;&gt;
		<?php } else { ?>
			<?php $_smarty_tpl->_assignInScope('nextPageNo', $_smarty_tpl->tpl_vars['pageNo']->value+1);
?>
							<a href="/ReviewLot/review/showList.php?page=<?php echo $_smarty_tpl->tpl_vars['nextPageNo']->value;?>
">次へ&gt;</a>&nbsp;
							<a href="/ReviewLot/review/showList.php?page=<?php echo $_smarty_tpl->tpl_vars['totalPage']->value;?>
">最後へ&gt;&gt;</a>
		<?php }?>
		</div><!-- container -->
		<?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"><?php echo '</script'; ?>
>
	</body>
</html><?php }
}
