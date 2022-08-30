<?php
session_start();
include "conn.php";
include "Validate.php";
$validate = new Validate();

if(isset($_POST['uname']) &&
isset($_POST['upass'])  
)
{
    $uname =  $validate->sanitizeInput($conn,$_POST['uname']);
    $upass =  $validate->sanitizeInput($conn,$_POST['upass']);

    $unamecheck =  $validate->stringValidate($uname,2,10);
    $upasscheck =  $validate->stringValidate($upass,8,16);

    if($unamecheck && $upasscheck)
    {
    
    $upass = base64_encode($upass);
        
    $stmt = $conn->prepare("SELECT uname,upass,token FROM user_details1 WHERE `uname`=? AND `upass`=?");

    $stmt->bind_param('ss',$uname,$upass);

    $stmt->execute();

    $result = $stmt->get_result();

    $row = $result->fetch_array(MYSQLI_ASSOC);
    $_SESSION['uname']=$row['uname'];
    $runame = $row['uname'];
    $rupass = $row['upass'];
    $token = $row['token'];

    if($runame == $uname && $rupass == $upass) 
    {
        $statusdetails = array(
            'status' => "1",
            'token' => $token
        );
        echo json_encode($statusdetails);
    }
    else
    {
        $statusdetails = array(
            'status' => "0"
        );
        echo json_encode($statusdetails);    
    }

    $stmt->close();
    $conn->close();

    }
    else
    {
        $statusdetails = array(
            'status' => "Please Fill the Form Properly"
        );
        echo json_encode($statusdetails);  
    }

}
else
{
    echo "<script>location.replace('../Html/403.html')</script>;";
}
?>