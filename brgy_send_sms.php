<?php
// send_sms.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if required parameters are set in $_POST
    $requiredParameters = ['contacts', 'event', 'location', 'custom_message', 'formatted_date', 'formatted_time', 'formatted_date2', 'formatted_time2', 'full_names', 'barangays'];
    $missingParameters = array_diff($requiredParameters, array_keys($_POST));

    if (empty($missingParameters)) {
        // Retrieve POST data
        $selectedContacts = $_POST['contacts'];
        $selectedEvent = $_POST['event'];
        $selectedLocation = $_POST['location'];
        $customMessage = $_POST['custom_message'];
        $formattedDate = $_POST['formatted_date'];
        $formattedTime = $_POST['formatted_time'];
        $formattedDate2 = $_POST['formatted_date2'];
        $formattedTime2 = $_POST['formatted_time2'];
        $fullNames = $_POST['full_names'];
        $barangays = $_POST['barangays'];

        // Replace these with your own values
        $apiKey = ''; //5f7a3eafdbc2beb2f31ce012700445a0
        $apiUrl = 'https://semaphore.co/api/v4/messages';

        // Initialize cURL session
        $ch = curl_init();

        // Initialize database connection (replace with your own database details)
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $database = "bmao";
        $con = mysqli_connect($hostname, $username, $password, $database);

        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        foreach ($selectedContacts as $key => $contact) {
            $names = $fullNames[$key] ?? ''; // Names for each contact
            $brgy = $barangays[$key] ?? ''; // Barangay for each contact

            // Set cURL options
            $parameters = [
                'apikey' => $apiKey,
                'number' => $contact,
                'message' => 'Good Day! ' . $names . ' Farmer of Barangay ' . $brgy . ' There will be an Upcoming ' . ucfirst($selectedEvent) . ' at ' . $selectedLocation . ' Event scheduled from ' . $formattedDate . ' ' . $formattedTime . ' to ' . $formattedDate2 . ' ' . $formattedTime2 . ' Reminder: ' . $customMessage,
                'sendername' => 'BotolanMAO'
            ];

            curl_setopt_array($ch, [
                CURLOPT_URL => $apiUrl,
                CURLOPT_POST => 1,
                CURLOPT_POSTFIELDS => http_build_query($parameters),
                CURLOPT_RETURNTRANSFER => true,
            ]);

            // Execute cURL request
            $output = curl_exec($ch);

            // Check for errors and handle the response from Semaphore
            if ($output === FALSE) {
                echo "Error sending message to " . $contact . ": " . curl_error($ch) . "<br>";
            } else {
                // Save parameters for this contact, names, and barangay to the database
                $sql = "INSERT INTO barangay_records 
                        (contact, event, location, custom_message, formatted_date, formatted_time, formatted_date2, formatted_time2, full_name, brgy, status) 
                        VALUES 
                        ('$contact', '$selectedEvent', '$selectedLocation', '$customMessage', '$formattedDate', '$formattedTime', '$formattedDate2', '$formattedTime2', '$names', '$brgy', 'NOTIFIED')";

                if (mysqli_query($con, $sql)) {
                    echo "Message sent to " . $contact . ": " . $output . " and saved to the database.<br>";
                } else {
                    echo "Error saving message to the database: " . mysqli_error($con) . "<br>";
                }
            }
        }

        // Close cURL session
        curl_close($ch);

        // Close database connection
        mysqli_close($con);
    } else {
        echo "Missing parameters: " . implode(', ', $missingParameters);
    }
} else {
    echo "Invalid request.";
}
?>
