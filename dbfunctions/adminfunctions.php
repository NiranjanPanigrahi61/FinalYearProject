<?php 
    $conn=new mysqli("localhost","root","","bakery") or die("Connection failed: " . $conn->connect_error); 

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'], $_POST['status'])) {


        $id = intval($_POST['id']);
        $status = $_POST['status'];

        $conn;
        try{
            $qry="UPDATE category SET status = ?, updated_at = NOW() WHERE id = ?";
            $stmt=$conn->prepare($qry);
            $stmt->bind_param("si",$status,$id);
            if ($stmt->execute()) {
                echo 'success';
            } else {
                echo 'error';
            }
        }catch(Exception $e){
            die($e->getMessage());
        }finally{
            $conn->close();
        }
    }

    function showItems(){
        global $conn;
        try{
            $qry="SELECT * FROM category";
            $stmt=$conn->prepare($qry);
            $stmt->execute();
            $result=$stmt->get_result();
            if($result->num_rows>0){
                return $result; 
            }else{
                return false;
            }
        }catch(Exception $e){
            die($e->getMessage());
        }finally{
            $conn->close();
        }
    }

    function showproduct(){
        global $conn;
        try{
            $qry="SELECT * FROM category";
            $stmt=$conn->prepare($qry);
            $stmt->execute();
            $result=$stmt->get_result();
            if($result->num_rows>0){
                return $result; 
            }else{
                return false;
            }
        }catch(Exception $e){
            die($e->getMessage());
        }finally{
            $conn->close();
        }
    }
?>