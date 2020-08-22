<?php
session_start();
// var_dump($_SESSION);
if(isset($_SESSION["userName"])) {
  $userName = $_SESSION["userName"];
  $userPassword = $_SESSION["userPassword"];
}
else {
  $userName = "";
  $userPassword = "";
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Lab - index</title>
</head>
<body>

<table width="300" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
  <tr>
    <td align="center" bgcolor="#CCCCCC"><font color="#FFFFFF">會員系統 - 首頁</font></td>
  </tr>
  <tr>
    <td align="center" valign="baseline">
    <?php if($userName == ""){ ?>
      <a href="login.php">登入</a>
    <?php } else { ?>
      <a href="login.php?logout=1">登出</a>
    <?php } ?>
    &nbsp;|&nbsp;<a <?php echo ($userName != "") ? "href=\"secret.php\"" : "href=\"login.php?secret=1\""?>>會員專用頁</a>
    </td>
  </tr>
  <tr>
    <td align="center" bgcolor="#CCCCCC">
      <?php if($userName != "") { echo "歡迎光臨！" . $userName; } else { echo "歡迎光臨！ guest"; }?>
    </td>
  </tr>
</table>


</body>
</html>