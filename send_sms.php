<?php
// send_sms.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if required parameters are set in $_POST
    $requiredParameters = ['contacts', 'event', 'location', 'full_names', 'barangays', 'land_sizes', 'emergency_contacts', 'farmer_ids'];
    $missingParameters = array_diff($requiredParameters, array_keys($_POST));

    if (empty($missingParameters)) {
        // Include the sendSms function
        function sendSms($apiKey, $contact, $message, $sendername) {
            $ch = curl_init();
            curl_setopt_array($ch, [
                CURLOPT_URL => 'https://semaphore.co/api/v4/messages',
                CURLOPT_POST => 1,
                CURLOPT_POSTFIELDS => http_build_query([
                    'apikey' => $apiKey,
                    'number' => $contact,
                    'message' => $message,
                    'sendername' => $sendername
                ]),
                CURLOPT_RETURNTRANSFER => true,
            ]);
            $output = curl_exec($ch);
            curl_close($ch);
            return $output;
        }

        // Function to save parameters to the database using prepared statements
        function saveToDatabase($con, $contact, $emergencyContact, $selectedEvent, $selectedLocation, $customMessage, $formattedDate, $formattedTime, $formattedDate2, $formattedTime2, $landSize, $farmerId) {
            $sql = "INSERT INTO farmers_records 
                    (contact, emergency_contact, event, location, custom_message, formatted_date, formatted_time, formatted_date2, formatted_time2, land_size, farmer_id, status) 
                    VALUES 
                    (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'NOTIFIED')";

            $stmt = mysqli_prepare($con, $sql);

            if ($stmt) {
                mysqli_stmt_bind_param($stmt, 'ssssssssssi', $contact, $emergencyContact, $selectedEvent, $selectedLocation, $customMessage, $formattedDate, $formattedTime, $formattedDate2, $formattedTime2, $landSize, $farmerId);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            } else {
                error_log("Error preparing statement: " . mysqli_error($con));
            }
        }

        // Retrieve POST data
        $selectedContacts = $_POST['contacts'];
        $emergencyContacts = $_POST['emergency_contacts'];
        $farmerIds = $_POST['farmer_ids'];
        $selectedEvent = $_POST['event'];
        $selectedLocation = $_POST['location'];
        $customMessage = $_POST['custom_message'];
        $formattedDate = $_POST['formatted_date'];
        $formattedTime = $_POST['formatted_time'];
        $formattedDate2 = $_POST['formatted_date2'];
        $formattedTime2 = $_POST['formatted_time2'];
        $landSizes = $_POST['land_sizes'];

        // Replace these with your own values
        $apiKey = ''; // 5f7a3eafdbc2beb2f31ce012700445a0
        $sendername = 'BotolanMAO';

        // Replace these with your own values
        // Initialize database connection (replace with your own database details)
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $database = "bmao";
        $con = mysqli_connect($hostname, $username, $password, $database);

        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Loop through contacts and send SMS
        foreach ($selectedContacts as $key => $contact) {
            $landSize = $landSizes[$key] ?? 0;
            $emergencyContact = $emergencyContacts[$key] ?? '';
            $farmerId = $farmerIds[$key] ?? '';

            // Set message for both primary and emergency contacts
            $message = 'Good Day! Farmer with contact ' . $contact . ' There will be an Upcoming ' . ucfirst($selectedEvent) . ' and you will receive: ' . $landSize . ' at ' . $selectedLocation . ' Event scheduled from ' . $formattedDate . ' ' . $formattedTime . ' to ' . $formattedDate2 . ' ' . $formattedTime2 . ' Reminder: ' . $customMessage;

            // If emergency contact is present, include their information in the message
           
            // Send SMS to both primary and emergency contacts
            $outputPrimary = sendSms($apiKey, $contact, $message, $sendername);

            // Check for errors and handle the response from Semaphore for primary contact
            if ($outputPrimary === FALSE) {
                error_log("Error sending message to primary contact " . $contact . ": " . curl_error($ch));
            } else {
                // Save parameters for both contacts to the database
                saveToDatabase($con, $contact, $emergencyContact, $selectedEvent, $selectedLocation, $customMessage, $formattedDate, $formattedTime, $formattedDate2, $formattedTime2, $landSize, $farmerId);
                echo "Message sent to primary contact " . $contact . " (Emergency Contact: " . $emergencyContact . "): " . $outputPrimary . " and saved to the database.<br>";
            }
        }

        // Close database connection
        mysqli_close($con);
    } else {
        echo "Missing parameters: " . implode(', ', $missingParameters);
    }
} else {
    echo "Invalid request.";
}
?>
