<?php
require 'database_connection.php';

$title = "Botolan Municipal Agriculture Office - Records";

include "include/header.php";

    $userRole = isset($_SESSION['role']) ? $_SESSION['role'] : '';
if ($userRole === 'BARANGAY STAFF') {
    header("Location: 404.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>HTML Print Example</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<style>
    .report-container {
        text-align: justify;
    }

    .report-container p {
        text-indent: 2em; /* You can adjust the indentation as needed */
    }
</style>

<body>
<div class="buttons-container">
    <button id="print"><i class="fa fa-print"></i>Print</button>
</div>
<a id="save_to_image">
    <div class="invoice-container">
        <table cellpadding="0" cellspacing="0">
            <?php
            // Get the event_id from the URL
            $event_id = isset($_GET['event_id']) ? $_GET['event_id'] : null;

            // Ensure that event_id is a valid integer
            if (!is_numeric($event_id)) {
                // Handle the case where event_id is not valid (redirect or display an error)
                echo "Invalid event_id";
                exit;
            }

            // Fetch the specific event with the given event_id and 'ACCOMPLISHED' status
            $display_event_query = "SELECT * FROM calendar_event_master WHERE event_id = $event_id AND status = 'ACCOMPLISHED'";
            $sqlQuery = mysqli_query($con, $display_event_query) or die(mysqli_error($con));

            if ($row = mysqli_fetch_array($sqlQuery)) {
                // Fetch program details based on program_id
                $program_id = $row['program_id'];
                $program = ''; // Initialize the $program variable

                $get_program_query = "SELECT * FROM programs WHERE program_id = '$program_id'";
                $get_program_result = mysqli_query($con, $get_program_query);

                if ($get_program_result && mysqli_num_rows($get_program_result) > 0) {
                    $program_row = mysqli_fetch_assoc($get_program_result);
                    $program = $program_row['prog_name'];
                }

                $event_id = $row['event_id'];
      $event_start_date = new DateTime($row['event_start_date']);
              $formattedDate = $event_start_date->format('F j, Y');
              $formattedTime = $event_start_date->format('h:i A');
              $event_end_date = new DateTime($row['event_end_date']);
              $formattedDate2 = $event_end_date->format('F j, Y');
              $formattedTime2 = $event_end_date->format('h:i A');
              $event_location = unserialize($row['event_location']);
              $event_description = $row['event_description'];
             $brgy = array(
        "BANCAL" => "BANCAL", "BANGAN" => "BANGAN", "BATONLAPOC" => "BATONLAPOC", "BELBEL" => "BELBEL",
        "BENEG" => "BENEG", "BINUCLUTAN" => "BINUCLUTAN", "BURGOS" => "BURGOS", "CABATUAN" => "CABATUAN",
        "CAPAYAWAN" => "CAPAYAWAN", "CARAEL" => "CARAEL", "DANACBUNGA" => "DANACBUNGA", "MAGUISGUIS" => "MAGUISGUIS",
        "MALOMBOY" => "MALOMBOY", "MAMBOG" => "MAMBOG", "MORAZA" => "MORAZA", "NACOLCOL" => "NACOLCOL",
        "OWAOG-NIBLOC" => "OWAOG-NIBLOC", "PACO (POBLACION)" => "PACO (POBLACION)", "PALIS" => "PALIS",
        "PANAN" => "PANAN", "PAREL" => "PAREL", "PAUDPOD" => "PAUDPOD", "POONBATO" => "POONBATO",
        "PORAC" => "PORAC", "SAN ISIDRO" => "SAN ISIDRO", "SAN JUAN" => "SAN JUAN", "SAN MIGUEL" => "SAN MIGUEL",
        "SANTIAGO" => "SANTIAGO", "TAMPO (POBLACION)" => "TAMPO (POBLACION)", "TAUGTOG" => "TAUGTOG", "VILLAR" => "VILLAR"
    );

              
                ?>
                <table cellpadding="0" cellspacing="0">
                    <tr class="top">
                        <td colspan="2">
                            <table>
                                <tr>
                                    <td class="title">
                                        <img src="img/botolan.png" style="width: 100%; max-width: 100px"/>
                                    </td>
                                    <td class="title">
                                        <img src="img/da_logo.png" style="width: 100%; max-width: 100px"/>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <div class="title" style="text-align: center; font-family: sans-serif; font-size: 15px; margin-bottom: 20px;">Department of Agriculture
                    <br> Region III<br>Division of Zambales<br>Botolan Municipal Agriculture Office
                </div>
                <div class="accomplishment" style="text-align: center; font-family: sans-serif; font-weight: 15px; font-size: 23px; font-weight: bold; margin-bottom: 50px;">Accomplishment
                    Report
                </div>
                <div class="report-container">
                    <p>
                        This report serves as a documentation of the successful conduct of the <?php echo ucfirst(strtolower($program));?>


                        organized by the Botolan Municipal Agriculture Office. The event took place from <?php echo $formattedDate; ?>
                        <?php echo $formattedTime; ?> to <?php echo $formattedDate2; ?> <?php echo $formattedTime2; ?>and was
                        specifically designed for the participants from the following barangays: <?php
                        foreach ($event_location as $value) {
                            // Capitalize the first letter and make the rest of the word lowercase
                            $modified_value = ucfirst(strtolower($value));
                            // Echo the modified value
                            echo $modified_value . ", ";
                        } ?>.
                    </p>
                    <p>
                        The <?php echo ucfirst(strtolower($program));?> event successfully achieved its objectives and fostering community
                        engagement. The collaboration between the organizers, including Senior Agriculturist Carmelita D. Galac
                        and Municipal Agriculturist Ramon D. Dolojan, played a crucial role in ensuring the event's success.
                    </p>
                    <p>
                        The participants from various barangays, including <?php
                        foreach ($event_location as $value) {
                            // Capitalize the first letter and make the rest of the word lowercase
                            $modified_value = ucfirst(strtolower($value));
                            // Echo the modified value
                            echo $modified_value . ", ";
                        } ?> actively participated in the event activities. The event commenced on <?php echo $formattedDate; ?>
                        <?php echo $formattedTime; ?>, and throughout its duration. The conclusion of the event on <?php echo $formattedDate2; ?>
                        <?php echo $formattedTime2; ?> marked a moment of achievement and community enrichment.
                    </p>
                    <p>
                        In summary, the <?php echo ucfirst(strtolower($program));?> conducted by the Botolan Municipal Agriculture Office was a
                        triumph, bringing together communities and fostering a sense of unity and shared knowledge. The positive
                        feedback and active involvement of the barangay participants underscore the success of the event in achieving
                        its intended goals.
                    </p>
                </div>
                <tr class="information">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td>
                                    __________________<br/>
                                    CARMELITA D. GALAC<br>
                                    Senior Agriculturist
                                </td>
                                <td>
                                    __________________<br/>
                                    RAMON D. DOLOJAN<br>
                                    Municipal Agriculturist
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
        </div>
        </a>
        <?php
        } else {
            echo "No event found with the specified event_id and status 'ACCOMPLISHED'";
        } ?>

        <script src="/html2canvas.js"></script>
        <script src="index.js"></script>
</body>
</html>
