<?php 
//database connection
include('connection.php');
$msg='';
if (isset($_SESSION['orderdirectedlogin'])){
    $msg = $_SESSION['orderdirectedlogin'];
    unset($_SESSION['orderdirectedlogin']);
}
if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $record = mysqli_query($dbconn, "SELECT * FROM userinfo WHERE email = '$email' AND upassword = '$password'");
    $data = mysqli_fetch_assoc($record);
    if ($data !== null && $data['email'] == $email && $data['upassword'] == $password) {
        $_SESSION['userlogin']=$data['username'];
        header('Location:index.php?page=pages/home');
        //header('Location:admin_panel_page.php');
        //$msg='logged in';
    }
    
    else {
        //$_SESSION['msg']="Login Failed, enter valid information";
        //header('Location:admin_login_page.php');
        $msg='enter matching email and password';
    }
}
?>
<html>
<head>
    <style>

     .btn-login {
       font-size: 0.9rem;
       letter-spacing: 0.05rem;
       padding: 0.75rem 1rem;
     }
    </style>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5" style="background-color: lightgoldenrodyellow;">
            <h3 class="text-center mb-5">User Login</h3>
            <h4 class='text-center text-danger'>
                <?php
                    echo $msg;
                ?>
            </h4>
            <form action='index.php?page=pages/user_login' method='post'>
              <div class="form-floating mb-3">
                <input type="email" class="form-control" name="email" placeholder="name@example.com" required >
                <label for="floatingInput">Email address</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password" placeholder="Password" required >
                <label for="floatingPassword">Password</label>
              </div>
              <div class="d-grid">
                <button class="btn btn-primary btn-login text-uppercase fw-bold" name='submit' type="submit">Log In</button> <br>
              </div>
            </form>
            <div class="d-grid">
                <a href='index.php?page=pages/user_signin' class='btn btn-info btn-login text-uppercase fw-bold'>Register new user</a>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>