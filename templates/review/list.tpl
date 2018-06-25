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
		<title>ゲームリスト | ReviewLot</title>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="/ReviewLot/css/main.css" type="text/css">
		<link rel="stylesheet" href="/ReviewLot/css/all.css" type="text/css">
		<link rel="stylesheet" href="/ReviewLot/css/list.css" type="text/css">
		<script src="/ReviewLot/js/jquery.min.js"></script>
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
			<p class="navbar-text navbar-right"> <a href="#!" class="navbar-link">{$cus_name}さん</a></p>
			<p><a href="/ReviewLot/logout.php">ログアウト</a></p>
			</div>
			</div>
		</nav> 





		{if isset($flashMsg)}
		<section>
			<p>
				{$flashMsg}
			</p>
		</section>
		{/if}
		<section>

			{foreach from=$gameList item="game" name="gameListLoop"}
			<div class="panel panel-default">
				<div class="panel-body">
					<a href="/ReviewLot/review/showDetail.php?detailGameId={$game->getGm_id() }">
						<p>{$game->getGm_name() }</p>
						<p>{$game->getGm_hardware() }</p>
						<p>{$game->getGm_release() }</p>
						<p><img class='img-rounded' src="{$game->getGm_gazopath() }" width="128" height="158" alt="表示失敗"></p>
					</a>
				</div>
			</div>
			{foreachelse}
				<tr>
					<td colspan="5">ゲームソフトが追加されるのをお待ち下さい。</td>
				</tr>
			{/foreach}

		</section>

		{if $pageNo == 1}
						&lt;&lt;最初へ
						&lt;前へ
		{else}
		{$prevPageNo = $pageNo - 1}

						<a href="/ReviewLot/review/showList.php?page=1">&lt;&lt;最初へ</a>&nbsp;
						<a href="/ReviewLot/review/showList.php?page= {$prevPageNo}">&lt;前へ</a>&nbsp;
		{/if}

		{for $pages=1 to $totalPage}

			{if $pages == $pageNo}
						{$pages}&nbsp;
			{else}
						<a href="/ReviewLot/review/showList.php?page={$pages}">{$pages}</a>&nbsp;
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
							<a href="/ReviewLot/review/showList.php?page={$nextPageNo}">次へ&gt;</a>&nbsp;
							<a href="/ReviewLot/review/showList.php?page={$totalPage}">最後へ&gt;&gt;</a>
		{/if}
		</div><!-- container -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
	</body>
</html>