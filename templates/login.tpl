<!DOCTYPE html>
<!--
{**
 *  就職作品 
 *  iw13a727 01 ishidakazuma
 *}
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
      <p>以下のメッセージをご確認ください</p>
      <ul>
        {foreach from=$validationMsgs item="msg" name="validationMsgsLoop"}
          <li>{$msg}</li>
        {/foreach}
      </ul>
    </section>
  {/if}
  <section>
    <div class="logindesa">
    <div class="imglogo"><img src="/ReviewLot/img/logo.png" width="260" height="100" alt="表示失敗"></div>
    <form action="/ReviewLot/login.php" method="post">
      
      <div class="inp1"><input type="text" class="form-control" placeholder="reviewer" title="loginId" id="loginId" name="loginId" value="{$loginId|default:""}"></div>
        
      <div class="inp2"><input type="password" class="form-control" placeholder="password" title="loginPw" id="loginPw" name="loginPw"></div>

      <div class="ayu"><input type="submit" class="btn btn-default" value="ログイン"></div>
    </form>
    <div class="kotira"><p><a href="signupGoAdd.php">会員登録はこちら</a></p></div>
    <div>
  </section>
</body>
</html>
