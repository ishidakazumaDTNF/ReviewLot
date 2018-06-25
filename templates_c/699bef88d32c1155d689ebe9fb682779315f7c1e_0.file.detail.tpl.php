<?php
/* Smarty version 3.1.30, created on 2018-02-13 16:38:17
  from "/Applications/XAMPP/xamppfiles/htdocs/ReviewLot/templates/review/detail.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a8295e9d4a9d7_73559080',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '699bef88d32c1155d689ebe9fb682779315f7c1e' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/ReviewLot/templates/review/detail.tpl',
      1 => 1518507384,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a8295e9d4a9d7_73559080 (Smarty_Internal_Template $_smarty_tpl) {
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
		<title>ゲームレビュー | ReviewLot</title>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="/ReviewLot/css/main.css" type="text/css">
		<link rel="stylesheet" href="/ReviewLot/css/all.css" type="text/css">
		<?php echo '<script'; ?>
 src="/ReviewLot/js/jquery.min.js"><?php echo '</script'; ?>
>
		<link rel="stylesheet" href="/ReviewLot/css/detail.css" type="text/css">
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
			<a class="navbar-brand" href="#">ゲームレビュー</a>
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
			<p><a href="/ReviewLot/logout.php">ログアウト</a></p>
			</div>
			</div>
		</nav> 
	
		<ol class="breadcrumb">
			<li><a href="/ReviewLot/review/showList.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> ゲームリスト</a></li>
			<li class="active">ゲームレビュー</li>
		</ol>

		<?php if (isset($_smarty_tpl->tpl_vars['flashMsg']->value)) {?>
		<section>
			<p>
				<?php echo $_smarty_tpl->tpl_vars['flashMsg']->value;?>

			</p>
		</section>
		<?php }?>

		<section class="kokoniireru">
			<div class="row">
				<div class="col-xs-1"></div>
				<div class="col-xs-10"><span class="mainiro"><?php echo $_smarty_tpl->tpl_vars['game']->value->getGm_name();?>
</span></div>
			</div>
			<div class="row">
				<div class="col-xs-10"></div>
				<div class="col-xs-10"></div>
				<div class="col-xs-10"></div>
				<div class="col-xs-10"></div>
				<div class="col-xs-10"></div>
				<div class="col-xs-10"></div>
				<div class="col-xs-10"></div>
				<div class="col-xs-10"></div>
				<div class="col-xs-10"></div>
				<div class="col-xs-10"></div>
				<div class="col-xs-10"></div>
				<div class="col-xs-10"></div>
				<div class="col-xs-10"></div>
			</div>
			<div class="row">
				<div class="col-xs-1"></div>
				<div class="col-xs-5"><img class='img-rounded' src="<?php echo $_smarty_tpl->tpl_vars['game']->value->getGm_gazopath();?>
" width="128" height="158" alt="表示失敗"></div>
			
				<div class="col-xs-5"><span class="subiro"><?php echo $_smarty_tpl->tpl_vars['game']->value->getGm_release();?>
</span></div>
			
				<div class="col-xs-5"><span class="subiro"><?php echo $_smarty_tpl->tpl_vars['game']->value->getGm_hardware();?>
</span></div>
			
				<div class="col-xs-5"><span class="subiro"><?php echo $_smarty_tpl->tpl_vars['game']->value->getGm_manufacturer();?>
</span></div>
			</div>
			
		</section>
		<section>
			<div class="row">
				<div class="col-xs-10"></div>
				<div class="col-xs-10"></div>
				<div class="col-xs-10"></div>
				<div class="col-xs-10"></div>
				<div class="col-xs-10"></div>
				<div class="col-xs-10"></div>
				<div class="col-xs-10"></div>
				<div class="col-xs-10"></div>
				<div class="col-xs-10"></div>
				<div class="col-xs-10"></div>
				<div class="col-xs-10"></div>
				<div class="col-xs-10"></div>
				<div class="col-xs-10"></div>
			</div>
			<div class="row">
				<div class="col-xs-1"></div>
					<div class="col-xs-10">
						<a href="/ReviewLot/review/reviewGoAdd.php?addNewReviewId=<?php echo $_smarty_tpl->tpl_vars['game']->value->getGm_id();?>
">
							このゲームのレビューを投稿する
						</a>
					</div>
				</div>
			</div>
		</section>
		<section>

			<h2 class="h4 reviewmidasi">レビュー(<?php echo $_smarty_tpl->tpl_vars['reviewCount']->value;?>
)<?php if (isset($_smarty_tpl->tpl_vars['matchmode']->value)) {?>　　　　マッチングソート中<?php }?></h2>

			<?php if (isset($_smarty_tpl->tpl_vars['matchmode']->value)) {?>
				<form method="post" action="showDetail.php"> 
					<input type="hidden" name="matchIdClear" value="<?php echo $_smarty_tpl->tpl_vars['cus_id']->value;?>
"> 
					<input type="submit"  class="btn btn-default" value="マッチングソート解除"> 
				</form>
			<?php } else { ?>
				<form method="post" action="showDetail.php"> 
					<input type="hidden" name="matchId" value="<?php echo $_smarty_tpl->tpl_vars['cus_id']->value;?>
"> 
					<input type="submit"  class="btn btn-default" value="マッチングソート"> 
				</form>
			<?php }?>

			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['postList']->value, 'post', false, NULL, 'postListLoop', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['post']->value) {
?>
			<ul>
				<li class="reviewli">
					<p><?php echo $_smarty_tpl->tpl_vars['post']->value->getPos_cus_id();?>
</p>
					<p>評価値：<?php echo $_smarty_tpl->tpl_vars['post']->value->getPos_star();?>
/5</p>
					<p><?php echo $_smarty_tpl->tpl_vars['post']->value->getPos_created_at();?>
</p>
					<p><?php echo $_smarty_tpl->tpl_vars['post']->value->getPos_possession();?>
</p>
					<p>プレイ時間：<?php echo $_smarty_tpl->tpl_vars['post']->value->getPos_playtime();?>
</p>
					<p><?php echo nl2br($_smarty_tpl->tpl_vars['post']->value->getPos_text());?>
</p>
					<p><img src="/ReviewLot/img/iine.png" width="95" height="30"></p>
					<hr>
				</li>
			</ul>
			<?php
}
} else {
?>

				<tr>
					<td colspan="5">投稿されたレビューはありません。</td>
				</tr>
			<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		</section>

		<div>

			<?php if ($_smarty_tpl->tpl_vars['pageNo']->value == 1) {?>
							&lt;&lt;最初へ
							&lt;前へ
			<?php } else { ?>
			<?php $_smarty_tpl->_assignInScope('prevPageNo', $_smarty_tpl->tpl_vars['pageNo']->value-1);
?>

							<a href="/ReviewLot/review/showDetail.php?page=1">&lt;&lt;最初へ</a>&nbsp;
							<a href="/ReviewLot/review/showDetail.php?page= <?php echo $_smarty_tpl->tpl_vars['prevPageNo']->value;?>
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
							<a href="/ReviewLot/review/showDetail.php?page=<?php echo $_smarty_tpl->tpl_vars['pages']->value;?>
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
								<a href="/ReviewLot/review/showDetail.php?page=<?php echo $_smarty_tpl->tpl_vars['nextPageNo']->value;?>
">次へ&gt;</a>&nbsp;
								<a href="/ReviewLot/review/showDetail.php?page=<?php echo $_smarty_tpl->tpl_vars['totalPage']->value;?>
">最後へ&gt;&gt;</a>
			<?php }?>
		</div>
		<div>　</div>
		<div>　</div>
	</div>
	</body>
</html><?php }
}
