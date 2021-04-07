<?php
    class Ctrl_post {
        function view_admin(){
            include_once ("C:\\xampp\\htdocs\\training3\\model\\post.php");
            include_once ("C:\\xampp\\htdocs\\training3\\model\\database.php");
            include_once ("C:\\xampp\\htdocs\\training3\\model\\pagination.php");
            $db = new M_db();
            $pagination = new Paginator($db::$conn);
            $r = $pagination->paginate();
            include_once("C:\\xampp\\htdocs\\training3\\view\\admin.php");
        }
        
        function view_user(){
            include_once ("C:\\xampp\\htdocs\\training3\\model\\post.php");
            include_once ("C:\\xampp\\htdocs\\training3\\model\\database.php");
            include_once ("C:\\xampp\\htdocs\\training3\\model\\pagination.php");
            $db = new M_db();
            $pagination = new Paginator($db::$conn);
            $r = $pagination->paginate();
            include_once("C:\\xampp\\htdocs\\training3\\view\\user.php");
        }

        function view_detail(){
            include_once ("C:\\xampp\\htdocs\\training3\\model\\post.php");
            include_once ("C:\\xampp\\htdocs\\training3\\model\\database.php");
            $post_id = $_GET['postid'];
            $db = new M_db();
            $sql = "SELECT * FROM `post` WHERE id=".$post_id;
            $result = M_db::$conn-> query($sql);
            include_once("C:\\xampp\\htdocs\\training3\\view\\detail.php");
        }

        function view_edit(){
            include_once ("C:\\xampp\\htdocs\\training3\\model\\post.php");
            include_once ("C:\\xampp\\htdocs\\training3\\model\\database.php");
            $post_id = $_GET['postid'];
            $db = new M_db();
            $sql = "SELECT * FROM `post` WHERE id=".$post_id;
            $results = $db::$conn-> query($sql);
            $result = mysqli_fetch_assoc($results);
            if (isset($post_id)){    
                $sql = "SELECT * FROM post WHERE id=".$post_id;
                $results = $db::$conn-> query($sql);
                $result = mysqli_fetch_assoc($results);
                if ($result){
                    $title = $result['title'];
                    $description = $result['description'];
                    $image = $result['image'];
                    $status = $result['status'];
                }
                else {
                    $title = '';
                    $description = '';
                    $image = '';
                    $status = '';
                }
            }
            else{
                $title = '';
                $description = '';
                $image = '';
                $status = '';
                $post_id = '';
            }
            include_once("C:\\xampp\\htdocs\\training3\\view\\edit.php");
        }
        function view_add(){
            include_once ("C:\\xampp\\htdocs\\training3\\model\\post.php");
            include_once ("C:\\xampp\\htdocs\\training3\\model\\database.php");
            $title = '';
            $description = '';
            $image = '';
            $status = '';
            $post_id = '';
            include_once("C:\\xampp\\htdocs\\training3\\view\\edit.php");
        }

    }
    
    
    
    
    
    $action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
        switch ($action) {
            case '':
                Ctrl_post::view_user();
                break;
            case 'admin':
                Ctrl_post::view_admin();
                break;
            case 'detail':
                Ctrl_post::view_detail();
                break;
            case 'edit':
                Ctrl_post::view_edit();
                break;
            case 'add':
                Ctrl_post::view_add();
                break;
            }
?>