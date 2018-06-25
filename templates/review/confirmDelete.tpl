<!DOCTYPE html>
<!--
{**
 *  WP32 PHP評価課題 
 *  iw13a727 01 ishidakazuma
 *}
-->
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<title>レポート削除確認 | sharereports</title>
		<link rel="stylesheet" href="/wp32/sharereports/css/main.css" type="text/css">
	</head>
	<body>
		<h1>レポート削除確認</h1>
		<nav>
			<ul>
				<li><a href="/wp32/sharereports/">レポートリスト</a></li>
				<li><a href="/wp32/sharereports/reports/showDetail.php">レポート詳細</a></li>
				<li>レポート削除確認</li>
			</ul>
		</nav>
		<section>
			<p>
				以下のレポートを削除します。<br>
				よろしければ、削除ボタンをクリックしてください。
			</p>
			<form action=" /wp32/sharereports/reports/delete.php" method="post">
				<table>
					<tbody>
						<tr>
							<th>レポートID</th>
							<td>
								{$reports->getId()}
								<input type="hidden" id="deleteReportsId" name="deleteReportsId" value="{$reports->getId()}">
							</td>
						</tr>
						<tr>
							<th>報告者名</th>
							<td>
								{$name}
							</td>
						</tr>
						<tr>
							<th>作業日</th>
							<td>
								{$reports->getRp_date()}
							</td>
						</tr>
						<tr>
							<th>作業開始時刻</th>
							<td>
								{$reports->getRp_time_from()}
							</td>
						</tr>
						<tr>
							<th>作業終了時刻</th>
							<td>
								{$reports->getRp_time_to()}
							</td>
						</tr>
						<tr>
							<th>作業種類名</th>
							<td>
								{$reports->getReportcate_id()}
							</td>
						</tr>
						<tr>
							<th>作業内容</th>
							<td>
								{$reports->getRp_content()}
							</td>
						</tr>
						<tr>
							<th>レポート登録日時</th>
							<td>
								{$reports->getRp_created_at()}
							</td>
						</tr>
						<tr>
							<td colspan="2" class="submit">
								<input type="submit" value="削除">
							</td>
						</tr>
					</tbody>
				</table>
			</form>
		</section>
		<p>{$name}さんログイン中<a href="/wp32/sharereports/logout.php">ログアウト</a></p>
	</body>
</html>