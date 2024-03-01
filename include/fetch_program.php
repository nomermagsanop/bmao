<?php
class Selectprogram {
    private $db;

    public function __construct() {
        // Connect to the MySQL database
        $this->db = mysqli_connect('localhost', 'root', '', 'bmao');
        if (!$this->db) {
            die('Failed to connect to MySQL: ' . mysqli_connect_error());
        }
    }

    public function getProgramOptions() {
        $query = "SELECT program_id, prog_name FROM programs WHERE status = 'Active' ORDER BY prog_name ASC";
        $result = mysqli_query($this->db, $query);

        $options = '';
        while ($row = mysqli_fetch_assoc($result)) {
            $program_id = $row['program_id'];
            $progname = $row['prog_name'];
            $options .= "<option value='$program_id'>$progname</option>";
        }

        mysqli_free_result($result);

        return $options;
    }
}
?>
