<?php

session_start();

 if(isset($_SESSION['media'])){
    header("Location:show.php");
}

else if(isset($_SESSION['PR'])){
    header("Location:show.php");
}


else if(isset($_SESSION['projects'])){
    header("Location:show.php");
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if($_SERVER['REQUEST_METHOD']=='POST'){


  if ( test_input($_POST['name']) == "prpixels" && test_input($_POST['pass']) == "prpixels123")
		{
            $_SESSION["PR"]=$_POST['name'];

			header("Location:data.php");
        }

  else if ( test_input($_POST['name']) == "mediapixels" && test_input($_POST['pass']) == "mediapixels123")
		{
            $_SESSION["media"]=$_POST['name'];

            return redirect('/articles');
        }

    else if ( test_input($_POST['name']) == "projectspixels" && test_input($_POST['pass']) == "projectspixels123")
		{
            $_SESSION["projects"]=$_POST['name'];

			header("Location:data.php");
        }


    else { ?>  <h5 class="text-center"><?php echo "Wrong Username Or Wrong Password <br> if you forgot your account data, Contact with IT committee.";?> </h5> <?php }

}



?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">


</head>
<body style="background-color:#ffffff;">


<form method="post">

<div class="text-center mt-5">

    <h2  style="color: #242365;">Log In Now!</h2> <br>
	<input type="text" name="name" placeholder="Username" class="form-control col-4 d-block mx-auto " required > <br>
	<input type="password" name="pass" placeholder="Password" class="form-control col-4 d-block mx-auto " required >
	<input type="submit" value="Login" class="btn text-light mt-1 d-block mx-auto" style="background-color: #242365;">
</div>

</form>

 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>

