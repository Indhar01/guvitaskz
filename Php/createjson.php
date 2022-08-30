<?php
include "conn.php";

function get_data($conn)
{
    $stmt = $conn->prepare("SELECT * FROM user_details1");

    $stmt->execute();

    $result = $stmt->get_result();

    $userdetails =  array();

    while($row = $result->fetch_array(MYSQLI_ASSOC))
    {
    $tmpdetails = array();

    // $id = $row['user_id'];
    $name = $row['name'];
    $u_cno = $row['cno'];
    $u_email = $row['mail'];
    $u_dob = $row['dob'];
    $u_addr = $row['address'];
    $uname = $row['uname'];
    $upass = $row['upass'];

    $tmpdetails = array(
        // 'id' => $id,
        'name' => $name,
        'cno' => $u_cno,
        'mail' => $u_email,
        'dob' => $u_dob,
        'address' =>$u_addr ,
        'uname' => $uname,
        'upass' => $upass
        );
        array_push($userdetails,$tmpdetails);
    }
    $stmt->close();
    $conn->close();
    return json_encode($userdetails);
}

$filename= date('d-M-Y').'.json';
if(file_put_contents($filename,get_data($conn)))
{
    echo $filename.'File has been created';
}
else
{
    echo "Ouch There seems to be some error. Please Inform the developer";
}
?>