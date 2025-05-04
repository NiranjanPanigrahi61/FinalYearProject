<?php

require_once __DIR__.'/dbconnect.php';
// require_once __DIR__.'/../aws/upload.php';

$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$imageUrl=$_POST['oldUrl'];
$response;
if (isset($_FILES['adminimage']) && $_FILES['adminimage']['error'] === 0) {
    $tmpName = $_FILES['adminimage']['tmp_name'];
    $imgName = time() . "-" . $_FILES['adminimage']['name'];
    require_once "../aws/upload.php";
    $response = uploadtoS3("admin", $tmpName, $imgName);
}
if ($response) {
    if (isset($_POST['oldUrl'])) {
        $parsedUrl = parse_url($imageUrl);
        $path = $parsedUrl['path']; // Gives you "/cakes/choco.jpg"

        $pathParts = explode('/', trim($path, '/')); // Now split properly

        $folder = $pathParts[0]; // cakes
        $imgName = $pathParts[1];
        require_once "../aws/remove.php";
        $res=deleteFromS3($folder, $imgName);
    }
    try {
        $qry="UPDATE admininfo SET username=?, adminimage=?";
        $stmt=$conn->prepare($qry);
        $stmt->bind_param("ss",$username,$response);
        if($stmt->execute()){
            echo true;
        }else{
            echo false;
        }
    } catch (Exception $e) {
        die($e->getMessage());
    }finally{
        $conn->close();
    }
} else if(!$response) {
    try {
        $qry="UPDATE admininfo SET username=?";
        $stmt=$conn->prepare($qry);
        $stmt->bind_param("s",$username);
        if($stmt->execute()){
            echo true;
        }else{
            echo false;
        }
    } catch (Exception $e) {
        die($e->getMessage());
    }finally{
        $conn->close();
    }
}else{
    echo false;

}

?>