<?php
    require 'database_connection.php';
    session_start();

    $rank_id = $_POST['rank_id']; // Assuming you have the rank_id in your form

    $rank_name = strtoupper($_POST['inputRankname']);
    $rank_description = ($_POST['inputRankdescription']);
   

    // Build the update query based on conditions
    $update_query = "UPDATE ranks SET 
                        rank_name='$rank_name',
                        rank_description='$rank_description'
                    WHERE rank_id=$rank_id";

    if (mysqli_query($con, $update_query)) {
        $_SESSION['success'] = "Rank updated successfully!";
        header('location: ranks.php');
    } else {
        echo $con->error;
    }
?>
