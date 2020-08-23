<?php
  session_start();
  // var_dump($_GET);
  if(isset($_GET["logout"])) {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
  }

  if(isset($_GET["loginFail"])) {
    $errMsg = "請輸入帳號或密碼";
  }
  else {
    $errMsg = "";
  }

  if(isset($_POST["btnOK"])) {
    $userName = $_POST["txtUserName"];
    $userPassword = $_POST["txtPassword"];
    if($userName != "" && $userPassword != "") {
      $_SESSION["userName"] = $userName;
      $_SESSION["userPassword"] = $userPassword;
      // var_dump($_GET);
      if(isset($_GET["secret"])) {
        header("Location: secret.php");
      } else {
        header("Location: index.php");
      }
    }
    else {
      if(isset($_GET["secret"])) {
        header("Location: login.php?loginFail=1&secret=1");  
      } else {
        header("Location: login.php?loginFail=1");  
      }
    }
  }

  if(isset($_POST["btnHome"])) {
    // var_dump($_POST);
    header("Location: index.php");
    exit();
  }
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Lab - Login</title>
  <style>
    #errMsg{
      color: red;
    }
  </style>
</head>
<body>
<form id="form1" name="form1" method="post" action="">
  <table width="300" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
    <tr>
      <td colspan="2" align="center" bgcolor="#CCCCCC"><font color="#FFFFFF">會員系統 - 登入</font></td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline">帳號</td>
      <td valign="baseline"><input type="text" name="txtUserName" id="txtUserName" /></td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline">密碼</td>
      <td valign="baseline"><input type="password" name="txtPassword" id="txtPassword" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center" bgcolor="#CCCCCC"><input type="submit" name="btnOK" id="btnOK" value="登入" />
      <input type="reset" name="btnReset" id="btnReset" value="重設" />
      <input type="submit" name="btnHome" id="btnHome" value="回首頁" />
      </td>
    </tr>
  </table>
  <div align="center" id="errMsg"><?php echo $errMsg ?></div>
</form>

</body>
</html>