<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> 登录界面</title>
<link href="css/login.css" rel="stylesheet" type="text/css" />
</head>

<body>
<h1 class="s"></h1>
<form>
  <input type="text" name="name" placeholder="用户名" />
<input type="password" name="password" placeholder="密码" />
<input type="submit" id='sub' name="submit" value="登录" class="btn" />
</form>
<script>
	var oBut = document.getElementById('sub');
	oBut.onclick = function() {
		alert('大哥哥大姐姐莫着急，还没完!! ~(￣▽￣)~*')
	}
</script>
</body>
</html>
