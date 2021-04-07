<?php
    $action = $_GET['action'];
    $post_id = $_GET['postid'];
    // $servername = "localhost";
    // $username = "root";
    // $password = "password";
    // $database = "test";

    // $conn = new mysqli($servername, $username, $password, $database);
    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // }
    include_once("C:\\xampp\\htdocs\\training3\\model\\database.php");
    $db = new M_db();
    if ($action == "delete"){
        $sql = "DELETE FROM post WHERE id=".$post_id." LIMIT 1";
        $result = $db::$conn-> query($sql);
        if ($result){
            header('Location: control_post.php?action=admin');
        }
        else{
            echo $conn->connect_error;
        }
        mysqli_close($conn);
    }
    else if ($action == "edit"){
        $title = $_GET['title'];
        $description = $_GET['description'];
        $image = $_GET['newimage'];
        $status = $_GET['status'];
        $sql = 'UPDATE post SET title =\''.$title.'\',description=\''.$description.'\',image=\''.$image.'\',status=\''.$status.'\' WHERE id='.$post_id; 
        $result = $db::$conn-> query($sql);
        if ($result){
            header('Location: control_post.php?action=admin');
        }
        else{
            echo "error".$db::$conn->connect_error;
            // echo $sql;
        }
        mysqli_close($db::$conn);
    }
    else{
        $title = $_GET['title'];
        $description = $_GET['description'];
        $image = $_GET['newimage'];
        $status = $_GET['status'];
        $sql = 'INSERT INTO post (title, description, image, status) VALUES (\''.$title.'\', \''.$description.'\', \''.$image.'\', \''.$status.'\')'; 
        $result = $db::$conn-> query($sql);
        if ($result){
            header('Location: control_post.php?action=admin');
        }
        else{
            echo "error".$conn->connect_error;
            echo $sql;
        }
        mysqli_close(db::$conn);
    }
        
?>