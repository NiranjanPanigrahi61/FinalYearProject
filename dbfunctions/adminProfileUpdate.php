<?php
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$image=$_FILES['adminimage'];

echo $image['tmp_name'];

?>