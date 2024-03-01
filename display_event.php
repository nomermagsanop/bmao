<?php
require 'database_connection.php'; 

$display_query = "SELECT cem.event_id, cem.program_id, cem.event_start_date, cem.event_start_time, cem.event_end_date, cem.event_end_time, cem.event_location, cem.event_description, cem.status, p.prog_name
                  FROM calendar_event_master AS cem
                  INNER JOIN programs AS p ON cem.program_id = p.program_id
                  WHERE cem.status = 'PENDING'";
     
$results = mysqli_query($con, $display_query);   
$count = mysqli_num_rows($results);  

if ($count > 0) {
    $data_arr = array();
    $i = 1;
    while ($data_row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
        $data_arr[$i]['event_id'] = $data_row['event_id'];
        $data_arr[$i]['title'] = $data_row['prog_name'];
        $data_arr[$i]['start'] = date("Y-m-d", strtotime($data_row['event_start_date'] . ' ' . $data_row['event_start_time']));
        $data_arr[$i]['end'] = date("Y-m-d", strtotime($data_row['event_end_date'] . ' ' . $data_row['event_end_time']));
        $data_arr[$i]['color'] = '#1cc88a'; // 'green'; pass colour name
        $data_arr[$i]['location'] = $data_row['event_location'];
        $data_arr[$i]['description'] = $data_row['event_description'];
        $i++;
    }
    
    $data = array(
        'status' => true,
        'msg' => 'Successfully!',
        'data' => $data_arr
    );
} else {
    $data = array(
        'status' => false,
        'msg' => 'Error!'                
    );
}

echo json_encode($data);
?>
