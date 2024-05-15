<?php
class DBmanager {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = "phpusers_vuejs";
    private $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db)
        or die(mysql_error());
        $this->conn->set_charset("utf8");
    }
    //  Insert
    public function insert($table, $data) {
        $result = $this->conn->query("INSERT INTO $table VALUES(null, $data)") or die($this->conn);
        if($result)
            return true;
        return false;
    }
    //  Delete
    public function delete($table, $condition) {
        $result = $this->conn->query("DELETE FROM $table WHERE $condition") or die($this->conn);
        if($result)
            return true;
        return false;
    }
    //  Update
    public function update($table, $data, $condition) {
        $result = $this->conn->query("UPDATE $table SET $data WHERE $condition") or die($this->conn);
        if($result)
            return true;
        return false;
    }
    //  Search
    public function search($table, $condition) {
        $result = $this->conn->query("SELECT * FROM $table WHERE $condition") or die($this->conn);
        if($result)
            return $result->fetch_all(MYSQLI_ASSOC);
        return false;
    }

}

?>