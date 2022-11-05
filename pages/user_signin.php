<?php
//database connection
include('connection.php');
$count=0;
$msg='';

if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    //fetching the email address
    $records = mysqli_query($dbconn, "SELECT * FROM userinfo WHERE email = '$email'");
    while($data = mysqli_fetch_assoc($records))
    {
        $count++;
    }
    if($count == 0)
    {
    if($password == $cpassword){
        // insert query execution
        $query = "INSERT INTO userinfo ( userid, username, upassword, email ) VALUES ('Null', '$username', '$password', '$email')";
        if(mysqli_query($dbconn, $query)){
           //echo "User registered";
           //$msg='User registered';
           $_SESSION['userlogin']= $username;
           header('Location:index.php?page=pages/home');
        } 
        else{
           $msg='User Cannot Be registered';
           //echo'user cannot be registered';
       }
    }
    else{
         $msg='passwords do not match';
        //echo 'passwords do not match';
    }
   }
   else{
        $msg='email already registered';
        //echo 'email already registered';
   }
}
// Get values from form in login.php
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
            <h3 class="text-center mb-5">User Registration</h3>
                <h4 class='text-center text-danger'>
                    <?php
                    echo $msg;
                    ?>
                </h4>
            <form action='index.php?page=pages/user_signin' method='post'>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="username" placeholder="username" required >
                <label for="floatingInput">Username</label>
              </div>
              <div class="form-floating mb-3">
                <input type="email" class="form-control" name="email" placeholder="name@example.com" required >
                <label for="floatingInput">Email address</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password" placeholder="Password" required >
                <label for="floatingPassword">Password</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" name="cpassword" placeholder="Confirm Password" required >
                <label for="floatingPassword">Confirm Password</label>
              </div>
              <div class="d-grid">
                <button class="btn btn-primary btn-login text-uppercase fw-bold" name='submit' type="submit">Register</button> <br>
              </div>
            </form>
            <div class="d-grid">
                <a href='index.php?page=pages/user_login'>Already have an account</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    </body>
    
</html>