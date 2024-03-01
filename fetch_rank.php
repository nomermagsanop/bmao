<?php
class Selectrank {
    private $db;

    public function __construct() {
        // Connect to the MySQL database
        $this->db = mysqli_connect('localhost', 'root', '', 'bmao');
        if (!$this->db) {
            die('Failed to connect to MySQL: ' . mysqli_connect_error());
        }
    }

    public function getRankOptions() {
        $query = "SELECT rank_id, rank_name FROM ranks ORDER BY rank_name ASC";
        $result = mysqli_query($this->db, $query);

        $options = '';
        while ($row = mysqli_fetch_assoc($result)) {
            $rankid = $row['rank_id'];
            $rankname = $row['rank_name'];
            $options .= "<option value='$rankid'>$rankname</option>";
        }

        mysqli_free_result($result);

        return $options;
    }
}
?>
