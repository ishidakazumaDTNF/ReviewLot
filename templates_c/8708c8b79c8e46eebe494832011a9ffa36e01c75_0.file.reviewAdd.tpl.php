<?php
/* Smarty version 3.1.30, created on 2018-02-02 01:50:52
  from "/Applications/XAMPP/xamppfiles/htdocs/ReviewLot/templates/review/reviewAdd.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a73456cd636c6_38413450',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8708c8b79c8e46eebe494832011a9ffa36e01c75' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/ReviewLot/templates/review/reviewAdd.tpl',
      1 => 1517503020,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a73456cd636c6_38413450 (Smarty_Internal_Template $_smarty_tpl) {
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
		<title>レビュー投稿 | ReviewLot</title>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="/ReviewLot/css/main.css" type="text/css">
		<link rel="stylesheet" href="/ReviewLot/css/all.css" type="text/css">
		<link rel="stylesheet" href="/ReviewLot/css/reviewadd.css" type="text/css">
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
			<a class="navbar-brand" href="#">レビュー投稿</a>
			</div>
			<!-- グローバルナビの中身 -->
			<div class="collapse navbar-collapse" id="nav-menu-2">
			<!-- フォーム -->
			<form class="navbar-form navbar-left" role="search">
			<div class="form-group">
			<input type="text" class="form-control" placeholder="ゲームを検索">
			</div>
			<button type="submit" class="btn btn-default">送信</button>
			</form>
			<!-- ボタン -->
			<!--<button type="button" class="btn btn-default navbar-btn">ボタン</button>-->
			<!-- テキスト -->
			<!--<p class="navbar-text">ナビのテキスト</p>-->
			<!-- リンク -->
			<p class="navbar-text navbar-right"> <a href="#!" class="navbar-link"><?php echo $_smarty_tpl->tpl_vars['cus_name']->value;?>
さん</a></p>
			</div>
			</div>
		</nav> 

		<ol class="breadcrumb">
			<li><a href="/ReviewLot/review/showList.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>ゲームソフト一覧</a></li>
			<li><a href="/ReviewLot/review/showDetail.php">ゲームレビュー</a></li><li>レビュー投稿</li>
			
		</ol>

		<?php if (isset($_smarty_tpl->tpl_vars['validationMsgs']->value)) {?>
		<section id="errorMsg">
			<p>以下のメッセージをご確認ください。</p>
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
			<form action="reviewAdd.php" method="post">
				<div class="op1">
					<p>評価値&nbsp;<spann class="label label-danger">必須</spann></p>
					<div class="drop1">
						<select class="form-control" name="addReviewstar">
							<option value="" selected>選択してください</option>
							<option value="1">1(低)</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5(高い)</option>
						</select>
					</div>
				</div>

				<div class="op1 op2">
					<p>所持&nbsp;<spann class="label label-danger">必須</spann></p>
					<div class="btn-group" role="group">
						<label class="btn btn-default"><input type="radio" name="addReviewpossession" autocomplete="off" value="購入済み" checked>購入済み</label>
						<label class="btn btn-default"><input type="radio" name="addReviewpossession" autocomplete="off" value="未購入">未購入</label>
					</div>
				</div>

				<div class="op1 op2">
					<p>プレイ時間&nbsp;<spann class="label label-danger">必須</spann></p>
					<div class="btn-group" role="group">
						<label class="btn btn-default"><input type="radio" name="addReviewplaytime" autocomplete="off" value="短" checked="checked">短</label>
						<label class="btn btn-default"><input type="radio" name="addReviewplaytime" autocomplete="off" value="中">中</label>
						<label class="btn btn-default"><input type="radio" name="addReviewplaytime" autocomplete="off" value="長">長</label>
					</div>
				</div>

				<div class="op1 op2">
					<p>レビュー内容&nbsp;<spann class="label label-danger">必須</spann></p>
					<textarea placeholder="レビューを入力できます。" name="addReviewtext" rows="25" cols="40"></textarea>
				</div>

				<div class="op1 op2">
					<p>ネタバレ&nbsp;<spann class="required">必須</spann></p>
					<div class="btn-group" role="group">
						<label class="btn btn-default"><input type="radio" id="addReviewspoiler" name="addReviewspoiler" autocomplete="off" value="含まない" checked>含まない</label>
						<label class="btn btn-default"><input type="radio" id="addReviewspoiler" name="addReviewspoiler" autocomplete="off" value="含む">含む</label>
					</div>
				</div>

				<div class="op1 op2">
					<input type="submit" class="btn btn-default" value="投稿">
					<span class="modoru"><a class="btn btn-default" href="/ReviewLot/review/showDetail.php">戻る</a></span>
				</div>
				<div>　</div>
				<div>　</div>
			</form>
		</section>
		</div>
	</body>
</html><?php }
}
