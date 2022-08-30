<!DOCTYPE html>
<html>

<head>
	<title>GUVI Task By Indirakumar</title>
	<meta charset=UTF-8>
	<meta name=viewport content="width=device-width, initial-scale=1">
    <meta name="author" content="Indhar">
	<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300i,400,700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link href="../Css/style.css" rel="stylesheet">
</head>

<body>
	<div class="center-item">
		<form class="form-signin col-sm-9 col-md-7 col-lg-5 mx-auto" action=""  method="POST" id="register" autocomplete="off" required>
            <img src="../assets/guvilogo.svg" class="logo" alt="Guvi Logo">
            <h4>Register To GUVI</h4>
            <span><p id="error"></p></span>
            <input type="text" class="form-control" name="name" id="name" minlength="2" maxlength="30" placeholder="Enter Your Name" required>
			<input type="text" class="form-control" name="cno" id="cno" minlength="2" pattern="[0-9]{10}" placeholder="Enter Your Contact No(XXXXXXXXXX)" required>
            <input type="email" class="form-control" name="mail" id="mail" placeholder="Enter Your Email Id" required>
            <input placeholder="dd/mm/yyyy" class="form-control" type="text" name="dob" id="dob" required>
			<input type="text" class="form-control"  minlength="2" maxlength="10" name="uname" id="uname" placeholder="Enter username" required>
			<input type="password" class="form-control" minlength="8" maxlength="16" name="upass" id="upass" placeholder="Enter password" required>
            <input type="password" class="form-control" minlength="8" maxlength="16" name="ucpass" id="ucpass" placeholder="Confirm password" required>
            
            <textarea class="form-control" placeholder="Enter Your Address" minlength="10" maxlength="200" name="address" id="addr" required></textarea>
			<button type="submit" name="regbutt" id="regbutt" class="form-control">Register</button>
      <a href="../Html/index.html">Login</a>
		</form>

    </div>
    

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"  crossorigin="anonymous"></script>
    <script>
$("#dob").focus(function(){
    $('#dob').get(0).type = 'date';
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; 
    var yyyy = today.getFullYear();

    if (dd < 10) {
      dd = '0' + dd;
    }

    if (mm < 10) {
      mm = '0' + mm;
    } 
        
    today = dd+'-' +  mm + '-' + yyyy  ;

    $("#dob").attr("max",today);
  }); 

$("#dob").blur(function(){
    $('#dob').get(0).type = 'text';
  });

    </script>
    
    <script>
         $( "#regbutt" ).submit(function( event ) {
    event.preventDefault();

    var name = $("#name").val().trim();
    var cno = $("#cno").val().trim();
    var mail = $("#mail").val().trim();
    var dob = $("#dob").val().trim();
    var uname = $("#uname").val().trim();
    var upass = $("#upass").val().trim();
    var ucpass = $("#ucpass").val().trim();
    var addr = $("#addr").val().trim();
    var data;
    if(upass === ucpass)
    {
    </script>
    <?php

		include "../Php/conn.php";
    include "../Php/Validate.php";
		
		$validate = new Validate();
		// check input is not null   
		if( isset($_POST['name'])&& isset($_POST['cno'] )&& isset($_POST['mail']) && isset($_POST['dob'])&& isset($_POST['uname']) && isset($_POST['upass'])&& isset($_POST['ucpass'])&& isset($_POST['address']) ){
			
		$name = $_REQUEST['name'];
		$cno = $_REQUEST['cno'];
		$mail=$_REQUEST['mail'];
		$dob=$_REQUEST['dob'];
		$uname=$_REQUEST['uname'];
		$upass=$_REQUEST['upass'];
		$ucpass=$_REQUEST['ucpass'];
		$address=$_REQUEST['address'];

    $name1 =  $validate->sanitizeInput($conn,$name);
    $cno1 =  $validate->sanitizeInput($conn,$cno);
    $mail1 =  $validate->sanitizeInput($conn,$mail);
    $dob1 =  $validate->sanitizeInput($conn,$dob);
    $uname1 =  $validate->sanitizeInput($conn,$uname);
    $upass1 =  $validate->sanitizeInput($conn,$upass);
    $addr1 =  $validate->sanitizeInput($conn,$address);

    $namecheck =  $validate->stringValidate($name1,2,30);
    $cnocheck =  $validate->stringValidate($cno1,10,10);
    $unamecheck =  $validate->stringValidate($uname1,2,10);
    $upasscheck =  $validate->stringValidate($upass1,8,16);
    $addrcheck =  $validate->stringValidate($addr1,10,200);
    $emailcheck =  $validate->emailCheck($mail1);
		
    if($namecheck && $cnocheck && $unamecheck && $upasscheck && $addrcheck && $emailcheck)
    {

		// Performing insert query execution ,address
		// here our table name is college ,$address
        $upass = base64_encode($upass);
        $token = base64_encode($mail);
		
		$sql = "INSERT INTO user_details1(name,cno,mail,dob,uname,upass,address,token) VALUES ('$name','$cno','$mail','$dob','$uname','$upass','$address','$token')";
		
		if(mysqli_query($conn, $sql)){
		
       echo'<div class="alert alert-success" role="alert">This is a success alert—check it out!</div>';
      
      

			
		} else{
			echo "ERROR: Hush! Sorry $sql. "
				. mysqli_error($conn);
		}
	
		// Close connection
		mysqli_close($conn);
	}
}
  else
  {
      echo "Please Fill the Form Properly";
  }

		?>
<script>
}
    else
    {
      $("html, body").animate({scrollTop: 0}, 250);   
      $("#error").css("visibility", "visible");
      $("#error").text('Confirm Password and Password are not matching');
    }

    
  });
</script>
</body>

</html>
