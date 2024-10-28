<?php
$con=mysqli_connect("localhost","root","","p1");
if(isset($_POST['save'])){
$n=$_POST['name'];
$g=$_POST['gener'];
$s=$_POST['stream'];
$id=$_POST['id'];

if(isset($_POST['sub'])){
$sb=implode(",",$_POST['sub']);
}else{
    $sb="";
}

if(isset($_FILES['simg']['name']) && $_FILES['simg']['name']!="" ){

$bf=$_FILES['simg']['tmp_name'];
$fn=time().$_FILES['simg']['name'];
move_uploaded_file($bf,"student_img/".$fn);


$up="UPDATE  students SET name='$n', gender='$g', stream='$s', subject='$sb',simg='$fn' WHERE id='$id'";
}else{
    $up="UPDATE students SET name='$n', gender='$g', stream='$s', subject='$sb'WHERE id='$id'";
}
if($con->query($up)){
    header("location:sel.php");
}


 }else{
    echo "u are wrong";
}
?>