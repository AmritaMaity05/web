<?php
if(isset($_POST['save'])){
$n=$_POST['name'];
$g=$_POST['gener'];
$s=$_POST['stream'];

if(isset($_POST['sub'])){
$sb=implode(",",$_POST['sub']);
}else{
    $sb="";
}


$bf=$_FILES['simg']['tmp_name'];
$fn=time().$_FILES['simg']['name'];
move_uploaded_file($bf,"student_img/".$fn);

$con=mysqli_connect("localhost","root","","p1");
$ins="INSERT INTO students SET name='$n', gender='$g', stream='$s', subject='$sb',simg='$fn'";
if($con->query($ins)){
    header("location:sel.php");
}


 }else{
    echo "u are wrong";
}
?>