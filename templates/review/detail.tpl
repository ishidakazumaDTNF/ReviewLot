<!DOCTYPE html>
<!--
{**
 *  就職作品
 *  iw13a727 01 ishidakazuma
 *}
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
		<script src="/ReviewLot/js/jquery.min.js"></script>
		<link rel="stylesheet" href="/ReviewLot/css/detail.css" type="text/css">
		<script type="text/javascript">
			$(function(){
			$('a').click(function(){
				location.href = $(this).attr('href');
				return false;
			});
			});
		</script>
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
			<p class="navbar-text navbar-right"> <a href="#!" class="navbar-link">{$cus_name}さん</a></p>
			<p><a href="/ReviewLot/logout.php">ログアウト</a></p>
			</div>
			</div>
		</nav> 
	
		<ol class="breadcrumb">
			<li><a href="/ReviewLot/review/showList.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> ゲームリスト</a></li>
			<li class="active">ゲームレビュー</li>
		</ol>

		{if isset($flashMsg)}
		<section>
			<p>
				{$flashMsg}
			</p>
		</section>
		{/if}

		<section class="kokoniireru">
			<div class="row">
				<div class="col-xs-1"></div>
				<div class="col-xs-10"><span class="mainiro">{$game->getGm_name() }</span></div>
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
				<div class="col-xs-5"><img class='img-rounded' src="{$game->getGm_gazopath() }" width="128" height="158" alt="表示失敗"></div>
			
				<div class="col-xs-5"><span class="subiro">{$game->getGm_release() }</span></div>
			
				<div class="col-xs-5"><span class="subiro">{$game->getGm_hardware() }</span></div>
			
				<div class="col-xs-5"><span class="subiro">{$game->getGm_manufacturer() }</span></div>
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
						<a href="/ReviewLot/review/reviewGoAdd.php?addNewReviewId={$game->getGm_id() }">
							このゲームのレビューを投稿する
						</a>
					</div>
				</div>
			</div>
		</section>
		<section>

			<h2 class="h4 reviewmidasi">レビュー({$reviewCount}){if isset($matchmode)}　　　　マッチングソート中{/if}</h2>

			{if isset($matchmode)}
				<form method="post" action="showDetail.php"> 
					<input type="hidden" name="matchIdClear" value="{$cus_id}"> 
					<input type="submit"  class="btn btn-default" value="マッチングソート解除"> 
				</form>
			{else}
				<form method="post" action="showDetail.php"> 
					<input type="hidden" name="matchId" value="{$cus_id}"> 
					<input type="submit"  class="btn btn-default" value="マッチングソート"> 
				</form>
			{/if}

			{foreach from=$postList item="post" name="postListLoop"}
			<ul>
				<li class="reviewli">
					<p>{$post->getPos_cus_id() }</p>
					<p>評価値：{$post->getPos_star() }/5</p>
					<p>{$post->getPos_created_at() }</p>
					<p>{$post->getPos_possession() }</p>
					<p>プレイ時間：{$post->getPos_playtime() }</p>
					<p>{$post->getPos_text()|nl2br}</p>
					<p><img src="/ReviewLot/img/iine.png" width="95" height="30"></p>
					<hr>
				</li>
			</ul>
			{foreachelse}
				<tr>
					<td colspan="5">投稿されたレビューはありません。</td>
				</tr>
			{/foreach}
		</section>

		<div>

			{if $pageNo == 1}
							&lt;&lt;最初へ
							&lt;前へ
			{else}
			{$prevPageNo = $pageNo - 1}

							<a href="/ReviewLot/review/showDetail.php?page=1">&lt;&lt;最初へ</a>&nbsp;
							<a href="/ReviewLot/review/showDetail.php?page= {$prevPageNo}">&lt;前へ</a>&nbsp;
			{/if}

			{for $pages=1 to $totalPage}

				{if $pages == $pageNo}
							{$pages}&nbsp;
				{else}
							<a href="/ReviewLot/review/showDetail.php?page={$pages}">{$pages}</a>&nbsp;
				{/if}

				{if $pages != $totalPage}
							|&nbsp;
				{/if}

			{/for}

			{if $pageNo == $totalPage}
									次へ&gt;
									最後へ&gt;&gt;
			{else}
				{$nextPageNo = $pageNo + 1}
								<a href="/ReviewLot/review/showDetail.php?page={$nextPageNo}">次へ&gt;</a>&nbsp;
								<a href="/ReviewLot/review/showDetail.php?page={$totalPage}">最後へ&gt;&gt;</a>
			{/if}
		</div>
		<div>　</div>
		<div>　</div>
	</div>
	</body>
</html>