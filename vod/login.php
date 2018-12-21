
<style>
body{ text-align:center}
.formcss{ width:600px}
.addcolor{ background:#CCC}
</style>

<?php
include"head.php";
?>
<div class="jumbotron">
<h2>用户登录</h2>    
<br />
<form role="form" class="form-horizontal" action="log_in.php" method="post">
<div class="container">
    <div class="row">
        <label class="control-label col-md-4" for="mail">账户：</label>
        <div class="col-md-4">
        <input class="form-control" type="text" name="mail" placeholder="请输入邮箱" id="mail" required>
        </div>
         <div class="col-md-4"></div>
	</div>
        <br />
        <div class="row">
        <label class="control-label col-md-4" for="pwd">密码：</label>
        <div class="col-md-4">
        <input class="form-control" type="password" name="password"  placeholder="请输入密码" id="pwd" required>
        </div>
         <div class="col-md-4"></div>
	</div>
    <br />
            <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
        <input class="btn btn-default btn-primary" type="submit" id="pwd" value="登录">
        </div>
         <div class="col-md-4"></div>
	</div>
 
</div>
</form>
</div>
 
</body>
</html>