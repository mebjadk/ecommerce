<?php
    session_start();
    include('connection.php');
?>
<!DOCTYPE html>
<html>
<head>	
<style type="text/css">
body{
position: relative;
background: #3DA6D4;
margin: 0px;
}
.main-section{
width: 460px;
position: fixed;
top: 50%;
left: 50%;
transform: translate(-50%, -50%);
}
.content-section{
background: #FFF;
border-radius: 2px;
}
.head-section{
background: lightgoldenrodyellow;
text-align: center;
padding: 15px 0px;
border-bottom: 1px solid #CECECE;
}
.head-section h3{
margin: 0px;
color: #565656;
}
.body-section{
padding:15px 30px 30px 30px;
overflow: hidden;
}
.body-section .form-input{
width: 100%;
padding: 15px 0px;
}
.body-section .form-input input{
width: calc(100% - 30px);
border: 1px solid #D3D3D3;
border-radius: 1px;
padding:10px 10px;
box-shadow: 0px 0px 0px 5px rgb(239,244,247);
}
.body-section label{
color: #565656;
padding: 1px 5px;
float: left;
}
.body-section .btn-submit{
background: #DEEDF4;
border:1px solid #B5CBCD;
color: #56778E;
font-weight: bold;
padding:7px 20px;
border-radius: 15px;
}
a:link, a:visited {
  background-color: #DEEDF4;
  color: black;
  border: 2px solid green;
  border-radius: 8%;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

a:hover, a:active {
  background-color: lightgoldenrodyellow;
}
</style>
</head>
<body>
<div class="main-section">
<div class="content-section">
<div class="head-section">
<h3>Admin Login</h3>
</div>
<div class="body-section">
<form method="post" action="admin_login.php">
<div class="form-input">
<input type="text" name="Username" placeholder="Username" required >
</div>
<div class="form-input">
<input type="Password" name="Password" placeholder="Password" required >
</div>
<div class="form-input">
<button type="submit" class="btn-submit">Login</button>
</div>
</form>

<?php
if (isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>
</div>
</div>
</div>
<a href="/ecommerce">Go to home page</a>
</body>
</html>