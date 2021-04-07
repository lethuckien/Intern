<?php
    class Paginator {
        private $_conn;
        public function __construct($conn){
            $this->_conn = $conn;
        }

        public function paginate(){
            if (isset($_GET['pageno'])) {
                $pageno = $_GET['pageno'];
            } else {
                $pageno = 1;
            }
            $no_of_records_per_page = 5;
            $offset = ($pageno-1) * $no_of_records_per_page;
            $total_pages_sql = "SELECT COUNT(*) FROM post";
            $result_total = $this->_conn->query($total_pages_sql);
            $total_rows = mysqli_fetch_array($result_total)[0];
            $total_pages = ceil($total_rows / $no_of_records_per_page);
            $sql = "SELECT * FROM `post` ORDER BY id DESC LIMIT $offset, $no_of_records_per_page";
            $result = $this->_conn-> query($sql);
            $r = new stdClass();
            $r->pageno = $pageno;
            $r->total_pages = $total_pages;
            $r->result = $result;
            return $r;
        }
    }
?>