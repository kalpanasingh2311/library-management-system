<?php
if(!isset($_SESSION))
{
    session_start();
}
if(!isset($_SESSION['library']))
{
    include_once "connect.php";
    $msg="";
     if(isset($_POST['username'])){
      $username = htmlentities(addslashes($_POST['username'])); 
      $password = htmlentities(addslashes($_POST['password']));
      $username = preg_replace('/\s+/', '', $username);
      $password = preg_replace('/\s+/', '', $password);
      $sql = "select * from library where username = '$username' and password= '$password'";
      $query = mysqli_query($connection, $sql);
      $count = mysqli_num_rows($query);
      if($count >0){
          $row = mysqli_fetch_array($query);
          header('location:add_book.php');
          $_SESSION['library'] = $username;
          
           $_SESSION['libraryid'] = $row['id'];
      }
      else{
          
          $msg = "Incorrect Credential";
         
      }
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Aryavart</title>
    <style>
    * {
  font-family: "Poppins";
}

body {
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
  overflow-y: hidden;
  display: flex;
  justify-content: center;
  align-items: center;
  background: #dde5f4;
  height: 100vh;
}

.screen-1 {
  background: #f1f7fe;
  padding: 2em;
  display: flex;
  flex-direction: column;
  border-radius: 30px;
  box-shadow: 0 0 2em #e6e9f9;
  gap: 2em;
  min-width: 30%;
}
.screen-1 .logo {
  margin-top: -3em;
}
.screen-1 .email {
  background: white;
  box-shadow: 0 0 2em #e6e9f9;
  padding: 1em;
  display: flex;
  flex-direction: column;
  gap: 0.5em;
  border-radius: 20px;
  color: #4d4d4d;
  margin-top: -3em;
}
.screen-1 .email input {
  outline: none;
  border: none;
}
.screen-1 .email input::-moz-placeholder {
  color: black;
  font-size: 0.9em;
}
.screen-1 .email input:-ms-input-placeholder {
  color: black;
  font-size: 0.9em;
}
.screen-1 .email input::placeholder {
  color: black;
  font-size: 0.9em;
}
.screen-1 .email ion-icon {
  color: #4d4d4d;
  margin-bottom: -0.2em;
}
.screen-1 .password {
  background: white;
  box-shadow: 0 0 2em #e6e9f9;
  padding: 1em;
  display: flex;
  flex-direction: column;
  gap: 0.5em;
  border-radius: 20px;
  color: #4d4d4d;
}
.screen-1 .password input {
  outline: none;
  border: none;
}
.screen-1 .password input::-moz-placeholder {
  color: black;
  font-size: 0.9em;
}
.screen-1 .password input:-ms-input-placeholder {
  color: black;
  font-size: 0.9em;
}
.screen-1 .password input::placeholder {
  color: black;
  font-size: 0.9em;
}
.screen-1 .password ion-icon {
  color: #4d4d4d;
  margin-bottom: -0.2em;
}
.screen-1 .password .show-hide {
  margin-right: -5em;
}
.screen-1 .login {
  padding: 1em;
  background: #3e4684;
  color: white;
  border: none;
  border-radius: 30px;
  font-weight: 600;
}
.screen-1 .footer {
  display: flex;
  font-size: 0.7em;
  color: #5e5e5e;
  gap: 14em;
  padding-bottom: 10em;
}
.screen-1 .footer span {
  cursor: pointer;
}

button {
  cursor: pointer;
}
</style>
  </head>
  <body>
    
<div class="screen-1">
  
    <p style="text-align:center"><img src="img/witlogo.png" style="    height: 100px;
    width: 100px;
    
    margin-bottom: 28px;"></p>
    <h2 style="text-align:center">Library Login</h2>
  
   <form action="" method="post">
  <div class="email">
    <label for="email">Username</label>
    <div class="sec-2">
      <ion-icon name="mail-outline"></ion-icon>
      <input type="text" name="username" placeholder="-----------------"/>
    </div>
  </div>
  <br><br>
  <div class="password">
    <label for="password">Password</label>
    <div class="sec-2">
      <ion-icon name="lock-closed-outline"></ion-icon>
      <input class="pas" type="password" name="password" placeholder="············"/>
      <ion-icon class="show-hide" name="eye-outline"></ion-icon>
    </div>
  </div>
  <br><br>
  <button class="login">Login</button>
  </form>
  
  <div class="footer"><span></span><span></span></div>
</div>
  </body>
</html>
<?php
}
else{
    header('location:add_book.php');
}
?>
