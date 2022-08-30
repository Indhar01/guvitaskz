<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Mathesh">
    <title>GUVI Task By Indirakumar</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300i,400,700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="../Css/profile.css">
</head>
<body>
    <div class="container">
        
        
        <div class="col-xl-12 col-lg-9 col-md-12 col-sm-12 col-12">
        <div class="card h-100">
            <div class="card-body">
                <div class="row gutters">
                    
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="user-avatar">
                            <img src="../assets/guvilogo.svg" class="img-responsive logo" alt="Guvi Logo" width="120px" >
                        </div>
                        <h2 class="mb-2 mx-auto">Your Profile Details</h2>
                        <br>
                    </div>
                        <?php
                        include '../Php/conn.php';
                        session_start();
                        $runame=$_SESSION['uname'];
                        $query=mysqli_query($conn,"SELECT * FROM user_details1 where uname='$runame'");
                        $row=mysqli_fetch_array($query);
                        ?>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="ID">User ID</label>
                            <input type="text" class="form-control" id="userid" value="<?php echo $row['uid']; ?>" readonly> 
                           
                        </div>
                    </div>
                      
                    
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="fullName">Name</label>
                            <input type="text" class="form-control" id="name" value="<?php echo $row['name']; ?>" readonly> 
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="Uname">UserName</label>
                            <input type="email" class="form-control" name="uname" id="uname" value="<?php echo $row['uname']; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="useremail" value="<?php echo $row['mail']; ?>" readonly> 
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="phone">Contact No</label>
                            <input type="text" class="form-control" name="cno" id="cno" pattern="[0-9]{10}" value="<?php echo $row['cno']; ?>">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="DOB">Date Of Birth</label>
                            <input type="url" class="form-control" id="dob" value="<?php echo $row['dob']; ?>" readonly>
                        </div>
                    </div>
        
                    <div class="col-12">
                        <div class="form-group">
                            <label for="Address">Your Address</label>
                            <textarea class="form-control" minlength="10" maxlength="200" id="address" name="address" >
				    <?php echo $row['address']; ?>
                            </textarea>
                        </div>
                    </div>
               
                </div>
                <br>
                <button type="submit" class="btn btn-primary btn-lg " name='submit' id="update">Update </button>
                
                <button type="submit" class="btn btn-secondary btn-lg " id="logout">Logout</button>

            </div>
        </div>
        </div>
        <div class="col-xl-12 col-lg-3 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="account-settings">
                        
                        <div class="about">
                            <h5><b>About GUVI</b></h5>
                            <p>GUVI (Grab Your Vernacular Imprint) Geek Network Private Limited is an Online Learning Platform incubated by IITM and IIM-A, supported by Google Launchpad & Jio Gennext .
    
                                What sets us apart is the fact that we offer online learning in a plethora of different vernacular languages along with English. With more than 1.8 lakh users currently learning from our platform, GUVI continues to grow at a tremendous rate.</p>
                        </div>
                        <div class="user-profile">
                            
                            <h5 class="user-name">Developed By:<h6 class="user-email"><a href="itsmeindirakumar@gmail.com">Indirakumar</a> </h6></h5>
                            
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="row gutters"></div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"  crossorigin="anonymous"></script>
        <script src="../Js/profile.js" type="text/javascript"></script>
	
        <?php
      		if($_POST['submit'] && isset($_POST['cno']) && isset($_POST['address'])  && isset($_POST['uname'])){
		$cno = $_POST['cno'];
		$address = $_POST['address'];

	      $query = "UPDATE user_details1 SET  cno= '$cno',address = '$address' WHERE uname = '$uname'";
                    $result = mysqli_query($conn, $query);
		if(result){
         ?>
	
        <script type="text/javascript">
            alert("Update Successfull.");
            window.location = "index.html";
        </script>
	
        <?php
		}
             }               
	?>
   
</body>
</html>
