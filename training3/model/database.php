<?php
    class M_db {
        public static $conn;

        public function __construct(){
            $servername = "localhost";
            $username = "root";
            $password = "password";
            $database = "test";
            M_db::$conn = new mysqli($servername, $username, $password, $database);
            if (M_db::$conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
        }

        public function get_post($id){
            $sql = 'SELECT * FROM post WHERE id=$id';
            $result = M_db::$conn->query($sql);
            $post = mysqli_fetch_assoc($results);
            $p = new M_post($post["id"], $post["title"], $post["description"], $post["image"], $post["status"], $post["create_at"], $post["update_at"]);
            return $p;
        }

        public function get_all_post() {
            $sql = 'SELECT * FROM `post`';
            $result = M_db::$conn->execute($sql);
            foreach ($result->fetchall() as $post) {
                $p = new M_post($post["id"], $post["title"], $post["description"], $post["image"], $post["status"], $post["create_at"], $post["update_at"]);
                $post_list[] = $p;
            return $post_list;
            }
        }
        
        public static function close_con() {
            M_db::$conn = null;
        }

        public static function delete_post($id) {
            $sql = 'DELETE FROM post WHERE id=$id';
            $result = M_db::$conn->execute();
            M_db::close_con();
        }

        public static function update_post($id, $title, $description, $status, $image) {
            $sql = 'UPDATE post SET title = "'.$title.'", description = "'.$description.'", status = '.$status.', image = "'.$image.'" WHERE id='.$id;
            $result = M_db::$conn->execute($sql);
            M_db::close_con();
        }

        public static function add_post($title, $description, $status, $image) {
            $sql = 'INSERT INTO post (title, description, status, image) VALUES("'.$title.'", "'.$description.'", '.$status.', "'.$image.'")';
            $result = M_db::$conn->execute($sql);
            M_db::close_con();
        }
    }
?>