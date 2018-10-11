<?php //include('createDataBase.php') ?>
<?php //include('CreateTables.php') ?>
<!DOCTYPE html>
<html >
<head>

  <meta charset="UTF-8">
      <link rel="stylesheet" href="css/style.css">
      <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>
  <div id="wrap">
  <div id="regbar">
    <div id="navthing">
      <h2><a href="#" id="loginform">Login</a> | <a href="#"  id="Registerform">Register</a></h2>
      <form name="myForm" action="LogIn.php" onsubmit="return validateForm()"  method="post">
    <div class="login">
      <div class="formholder">
        <div class="randompad">
          UserName :<input type="text" name="fname">  <label id=fnameError></label><br><br>
          Password  : <input type="Password" name="pass"> <label id=passError></label><br><br>
             <input type="submit"  value="Login" />
        </div>
      </div>
    </div>
    </form>
      <form name="MyForm" action="SignUp.php" onsubmit="return validateForm4()"  method="post">
    <div class="signup">
      <div class="arrow-up"></div>
      <div class="formholder">
        <div class="randompad">
          UserName: <input type="text" name="fname"> <label id=FnameError></label><br><br>
          Email : <input type="text" name="lEmail"> <label id=lEmailError></label><br><br>
          PhoneNumber: <input type="text" name="phone"> <label id=phoneError></label><br><br>
         Gmailpassword  : <input type="Password" name="pass" > <label id=PassError></label><br><br>

           <input type="submit" value="Sign UP" />
        </div>
      </div>
        </div>
        </form>
    </div>
    </div>
  </div>


  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/index.js"></script>
</body>
</html>
