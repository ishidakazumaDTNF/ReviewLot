<!DOCTYPE html>
<!--
{**
 *  WP32 PHP評価課題 
 *  iw13a727 01 ishidakazuma
 *}
-->
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>レポート編集 | sharereports</title>
		<link rel="stylesheet" href="/wp32/sharereports/css/main.css" type="text/css">
	</head>
	<body>
		<h1>レポート編集</h1>
		<nav>
			<ul>
				<li><a href="/wp32/sharereports/">レポートリスト</a></li>
				<li><a href="/wp32/sharereports/reports/showDetail.php">レポート詳細</a></li>
				<li>レポート編集</li>
			</ul>
		</nav>
		{if isset($validationMsgs)}
		<section id="errorMsg">
			<p>以下のメッセージをご確認ください。</p>
			<ul>
				{foreach from=$validationMsgs item=msg name="validationMsgsLoop"} 
				<li>{$msg}</li>
				{/foreach}
			</ul>
		</section>
		{/if}
		<section>
			<p>
				以下のレポートを更新します。
			</p>
			<form action="/wp32/sharereports/reports/edit.php" method="post">
				<table>
					<tbody>
						<tr>
							<th>レポートID</th>
							<td>
								{$reports->getId()}
								<input type="hidden" id="editReportsId" name="editReportsId" value="{$reports->getId()|default:""}">
							</td>
						</tr>
						<tr>
							<th>作業日&nbsp;<spann class="required">必須</spann></th>
							<td>
									{html_select_date prefix='editreportsRpdate' time="{$timey}-{$timem}-{$timed}" start_year='+10' field_order='YMD' month_format='%m'}
							</td>
						</tr>
						<tr>
							<th>作業開始時刻&nbsp;<spann class="required">必須</spann></th>
							<td>
									{html_select_time prefix='editreportsFortime' time="{$timeh}-{$timei}" display_seconds=FALSE minute_interval="15"}
							</td>
						</tr>
						<tr>
							<th>作業終了時刻&nbsp;<spann class="required">必須</spann></th>
							<td>
									{html_select_time prefix='editreportsTotime' time="{$timeh2}-{$timei2}" display_seconds=FALSE minute_interval="15"}
							</td>
						</tr>
						<tr>
							<th>作業種類&nbsp;<spann class="required">必須</spann></th>
							<td>
								<select name="editReportcatesId" id="editReportcatesId">
								<option value="">選択してください</option>
								{foreach from=$reportcatesList item=reportcates name="reportcatesListLoop"}
									{$selected = ""}
										{if $reportcates->getId() == $reports->getReportcate_id()}
											{$selected = "selected"}
										{/if}
									<option value="{$reportcates->getId()}" {$selected} >{$reportcates->getId()} : {$reportcates->getRc_name()}</option>
								{/foreach}
							</select>
							</td>
						</tr>
						<tr>
							<th>作業内容&nbsp;<spann class="required">必須</spann></th>
							<td>
								<textarea id="editReportsContent" name="editReportsContent" rows="25" cols="40"> {$reports->getRp_content()|default:""}</textarea>
							</td>
						</tr>
						<tr>
							<td colspan="2" class="submit">
								<input type="submit" value="更新">
							</td>
						</tr>
					</tbody>
				</table>
			</form>
		</section>
		<p>{$name}さんログイン中<a href="/wp32/sharereports/logout.php">ログアウト</a></p>
	</body>
</html>