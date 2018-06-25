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
		<title>会員登録 | ReviewLot</title>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="/ReviewLot/css/main.css" type="text/css">
		<link rel="stylesheet" href="/ReviewLot/css/signup.css" type="text/css">
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
			<div class="logindesa">
				<div class="imglogo"><img src="/ReviewLot/img/logo.png" width="260" height="100" alt="表示失敗"></div>
				<form action="signupAdd.php" method="post">

					<div class="createdeza">
						<div class="op1">
						<p>レビュア名&nbsp;<spann class="label label-danger">必須</spann></p>
						<p class="intext"><input type="text" class="form-control" id="addSignupname" name="addSignupname"></p>
					
						<div class="op1 op2">
							<p>パスワード&nbsp;<spann class="label label-danger">必須</spann></p>
							<p class="intext"><input type="password" class="form-control" id="addSignuppass" name="addSignuppass"></p>
						</div>

						<div class="op1 op2">
							<p>性別&nbsp;<spann class="label label-danger">必須</spann></p>
							<div class="btn-group" role="group">
							<label class="btn btn-default"><input type="radio" name="addSignupgender" id="option2" autocomplete="off"  value="男" checked>男</label>
							<label class="btn btn-default"> <input type="radio" name="addSignupgender" id="option3" autocomplete="off"  value="女">女</label>
							</div>
						</div>

						<div class="op1 op2">
							<p>あなたの重視するポイントを１つ選択&nbsp;<spann class="label label-danger">必須</spann></p>
							<div class="btn-group-vertical" role="group">
								<label class="btn btn-default"><input type="radio" name="addSignuptrend" autocomplete="off" value="グラフィック" checked>グラフィック</label>
								<label class="btn btn-default"><input type="radio" name="addSignuptrend" autocomplete="off" value="ゲームボリューム">ゲームボリューム</label>
								<label class="btn btn-default"><input type="radio" name="addSignuptrend" autocomplete="off" value="ゲームバランス">ゲームバランス</label>
								<label class="btn btn-default"><input type="radio" name="addSignuptrend" autocomplete="off" value="独創性">独創性</label>
								<label class="btn btn-default"><input type="radio" name="addSignuptrend" autocomplete="off" value="熱中性">熱中性</label>
							</div>
						</div>

						<div class="op1 op2" class="flo">
							<input type="submit" class="btn btn-info" value="新規登録">
							<span class="modoru"><a class="btn btn-default" href="/ReviewLot/">戻る</a></span>
						</div>
					</div>
				</form>
			</div>
		</section>
	</body>
</html>