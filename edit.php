<?php
$con=mysqli_connect("localhost","root","","p1");
$sid=$_GET['eid'];
$sel="SELECT *FROM students WHERE id='$sid'";
$rs=$con->query($sel);
$row=$rs->fetch_assoc();
?>
 <link rel="stylesheet" href="css/style.css">
<form action="upd.php" method="post" enctype="multipart/form-data">
    <p><input type="hidden" name="name" value="<?php echo $row['id']; ?>"/>
        <p>Name</p>
        <p><input type="text" name="name" value="<?php echo $row['name']; ?>"></p>
        <p>Gender</p>
        <p><input <?php if($row['gender']=="male"){echo "checked";} ?> type="radio" name="gener" value="male">Male</p>
        <p><input <?php if($row['gender']=="female"){echo "checked";} ?> type="radio" name="gener" value="female">Female</p>
        
        <p>stream</p>
        <p>
            <select name="stream">
                <option value="">Select Stream</option>
                <option <?php if($row['stream']=="CSE"){echo "selected"; } ?> value="CSE">CSE</option>
                <option <?php if($row['stream']=="BBA"){echo "selected"; } ?> value="BBA">BBA</option>
                <option <?php if($row['stream']=="BCA"){echo "selected"; } ?> value="BCA">BCA</option>
                <option <?php if($row['stream']=="MCA"){echo "selected"; } ?> value="MCA">MCA</option>
            </select>
        </p>
        <p>Subject</p>
        <?php
        $sb=explode(",",$row['subject']);



        ?>
        <p><input <?php if(in_array("C",$sb)){echo "checked"; } ?> type="checkbox" name="sub[]" value="C">C</p>
        <p><input <?php if(in_array("C++",$sb)){echo "checked"; } ?> type="checkbox" name="sub[]" value="C++">C++</p>
        <p><input <?php if(in_array("php",$sb)){echo "checked"; } ?> type="checkbox" name="sub[]" value="php">php</p>
        <p><input <?php if(in_array("python",$sb)){echo "checked"; } ?> type="checkbox" name="sub[]" value="python">python</p>
        <p>Image</p>
        <p><input  type="file" name="simg" value="simg"></p>
        <p><img class="myimg"src="student_img/<?php echo $row['simg'];?>"/></p>
        <p><input type="submit" name="save" value="save"></p>
    </form>