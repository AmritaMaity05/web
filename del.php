<?php
$con=mysqli_connect("localhost","root","","p1");
$sid=$_GET['did'];
$sel="SELECT * FROM students WHERE id='$sid'";
$rs=$con->query($sel);
$row=$rs->fetch_assoc();
unlink("student_img/".$row['simg']);
$d="DELETE FROM  students WHERE id='".$sid."'";
if($con->query($d)){
    header("location:sel.php");
}

?>