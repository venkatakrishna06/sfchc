<?php

ob_start();
include('header.php');
include('session.php');

if (isset($_POST['dec_upload_submit'])) {

  include 'AES.php';
  include 'DES.php';
  include 'RSA.php';

  $key1 = $_POST['key1'];
  $key2 = $_POST['key2'];
  $key3 = $_POST['key3'];

  $pass_key1 = $_SESSION['pass_key1'];
  $pass_key2 = $_SESSION['pass_key2'];
  $pass_key3 = $_SESSION['pass_key3'];


  $pass1 = Decrypt_Aes($pass_key1, "123");
  $pass2 = Decrypt_Des($pass_key2, "456"); 
  $pass3 = rsaDecrypt($pass_key3, "789");
  
  $pass1 = trim($pass1);
  $pass2 = trim($pass2);
  $pass3 = trim($pass3);

  if ($key1==$pass1 && $key2==$pass2 && $key3==$pass3){
              
            $_SESSION['pass1'] = $key1;
            $_SESSION['pass2'] = $key2;
            $_SESSION['pass3'] = $key3;

            header("Location: decrypted1.php");
  }
   else{   
    echo " <script type='text/javascript'> alert('Incorrect Secret Keys!\\nPlease enter the Correct Secret Keys.'); </script> ";
   }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Decrypt1 Page</title>
</head>

<body>

    <div class="intro-section" id="home-section" style="background-color: black;">
      <div class="container">

        <div class="row align-items-center">
          <div class="col-lg-12 mx-auto text-center" data-aos="fade-up">
            <h1 class="mb-3" style="color: orange">Enter the Secret Keys</h1>
            
            <br>
            
            <p class="text-center" style="color: white;">
              
        <form name="validate" action="" method="post" onsubmit="return validateForm()">

				<label style="color: yellow;" for="key1">Secret Key 1 to Decrypt Part 1  </label><br>
    			<input type="password" name="key1" ><br><br>

    			<label style="color: yellow;" for="key2">Secret Key 2 to Decrypt Part 2  </label><br>
    			<input type="password" name="key2" ><br><br>

				<label style="color: yellow;" for="key3">Secret Key 3 to Decrypt Part 3  </label><br>
    			<input type="password" name="key3" >	<br><br>

    			<input class="btn btn-dec py-3 px-8" type="submit" name="dec_upload_submit" value="Decrypt!">

    			<script  type="text/javascript">
            function validateForm()
            {
              var x=document.forms["validate"]["key1"].value;
              var y=document.forms["validate"]["key2"].value;
              var z=document.forms["validate"]["key3"].value;
              if (x==null || x=="" || y==null || y=="" || z==null || z=="")
              {
                alert("Enter Valid Secret Keys !");
                return false;
              }
            }
          </script>

    			</form>
     		
            </p>
          </div>
        </div>

      </div>
    </div>

</body>
</html>

	
	