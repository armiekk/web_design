<?php
    class Database{
        function __construct(){
            $queryDB = null;
            $result = null;
        }
        public function createDB(){
            $link = mysql_connect("127.0.0.1","armst0910","armsozk38");
            mysql_select_db("db_camera",$link);
        }
        public function insertDB(){
            $this->queryDB = $queryDB;
            $result = mysql_query($this->queryDB);
        }
        public function deleteDB(){
            $this->queryDB = $queryDB;
            $result = mysql_query($this->queryDB);
        }
        public function updateDB(){
            $this->queryDB = $queryDB;
            $result = mysql_query($this->queryDB);
        }
        public function getQuery($queryDB){
            $this->queryDB = $queryDB;
            $this->result = mysql_query($this->queryDB);
            return $this->result;
        }
        public function closeDB(){
            mysql_close();
        }
    }
?>