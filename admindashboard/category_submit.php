<?php
include 'config.php';
if($_SERVER["REQUEST_METHOD"]=="POST") {
$name = $_POST['name'];
if(isset($_POST['sno'])&&$_POST['sno']==''){
if (!empty($name)) {
$sql = "INSERT INTO category (name) VALUES ('$name')";
    if ($conn->query($sql) === TRUE) {
            header("Location: category.php?msg=success");
            exit();
        } else {
            header("Location: category.php?msg=error");
            exit();
        }
    } else {
        header("Location: category.php?msg=empty");
        exit();
    }
	}
	else{
		$sno=$_POST['sno'];	
	 if (!empty($name)) {
        $sql = "update category set name='$name' where sno='$sno'";
        if ($conn->query($sql) === TRUE) {
            header("Location: category.php?msg=success");
            exit();
        } else {
            header("Location: category.php?msg=error");
            exit();
        }
    } else {
        header("Location: category.php?msg=empty");
        exit();
    }	
		
	}
}

?>
