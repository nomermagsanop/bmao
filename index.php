<?php 


include "dashboard_counts.php";

?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Botolan Municipal Agriculture Office </title>
    <link rel="icon" type="image/x-icon" href="img/da_logo.png">
    <!-- Bootstrap Core CSS -->
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome CSS -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    
    
    <!-- Animate CSS -->
    <link href="css/animate.css" rel="stylesheet" >
    
    <!-- Owl-Carousel -->
    <link rel="stylesheet" href="css/owl.carousel.css" >
    <link rel="stylesheet" href="css/owl.theme.css" >
    <link rel="stylesheet" href="css/owl.transitions.css" >

    <!-- Custom CSS -->
    <link href="webstyle.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    
    <!-- Colors CSS -->
    <link rel="stylesheet" type="text/css" href="css/color/green.css">
     
    
    
    <!-- Colors CSS -->
    <link rel="stylesheet" type="text/css" href="css/color/green.css" title="green">
    <link rel="stylesheet" type="text/css" href="css/color/light-red.css" title="light-red">
    <link rel="stylesheet" type="text/css" href="css/color/blue.css" title="blue">
    <link rel="stylesheet" type="text/css" href="css/color/light-blue.css" title="light-blue">
    <link rel="stylesheet" type="text/css" href="css/color/yellow.css" title="yellow">
    <link rel="stylesheet" type="text/css" href="css/color/light-green.css" title="light-green">

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>


     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <!-- Modernizer js -->
    <script src="js/modernizr.custom.js"></script>

    
    

</head>

<body class="index">
    
    
    <!-- Styleswitcher
================================================== -->
        <div class="colors-switcher">
            <a id="show-panel" class="hide-panel"><i class="fa fa-tint"></i></a>        
                <ul class="colors-list">
                    <li><a title="Light Red" onClick="setActiveStyleSheet('light-red'); return false;" class="light-red"></a></li>
                    <li><a title="Blue" class="blue" onClick="setActiveStyleSheet('blue'); return false;"></a></li>
                    <li class="no-margin"><a title="Light Blue" onClick="setActiveStyleSheet('light-blue'); return false;" class="light-blue"></a></li>
                    <li><a title="Green" class="green" onClick="setActiveStyleSheet('green'); return false;"></a></li>
                    
                    <li class="no-margin"><a title="light-green" class="light-green" onClick="setActiveStyleSheet('light-green'); return false;"></a></li>
                    <li><a title="Yellow" class="yellow" onClick="setActiveStyleSheet('yellow'); return false;"></a></li>
                    
                </ul>

        </div>  
<!-- Styleswitcher End
================================================== -->

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- <a href="#" class="logo">
                <img src="img/da_logo.png" alt="logo">   </a>   --> 
         <a class="navbar-brand page-scroll" href="#page-top">Botolan Municipal Agriculture Office</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#home">HOME</a>
                    </li>

                    <li>
                        <a class="page-scroll" href="#latest-news">Latest News</a>
                    </li>
                    
                    <li>
                        <a class="page-scroll" href="#about-us">ABOUT</a>
                    </li>
                    
                    <li>
                        <a class="page-scroll" href="#team">TEAM</a>
                    </li>
                  
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                    <li>
                        <a class="button" href="login.php">LOGIN</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    
    
    
    <!-- Start Home Page Slider -->
    <section id="home">
        <!-- Carousel -->
        <div id="main-slide" class="carousel slide" data-ride="carousel">

            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#main-slide" data-slide-to="0" class="active"></li>
                <li data-target="#main-slide" data-slide-to="1"></li>
                <li data-target="#main-slide" data-slide-to="2"></li>
            </ol>
            <!--/ Indicators end-->

            <!-- Carousel inner -->
            <div class="carousel-inner">
                <div class="item active">

                  <img class="img-index" src="img/c5.png" alt="slider" >

                    <div class="slider-content">
                       <div class="container">
    <div class="row" style="margin-top: -100px;">
         <div class="col-md-12 text-right" style="margin-top: 30px;">
           <img class="img-index" src="img/blogo_home.png" style="width: 300px; height: auto;">

        </div>
        <div class="col-md-12 text-left" style="margin-top: -100px;">
            <h1 class="animated3">
                <span style="color: #fff;"><strong>MAO</strong>BOTOLAN</span>
            </h1>
            <p class="animated2" style="color: #5BB12F; font-weight: ; font-family: monospace;">"Cultivating Tomorrow, Nurturing Today: <br> Botolan Agriculture, Growing Prosperity Together."</p>   
            <!-- <a href="#feature" class="page-scroll btn btn-primary animated1">Read More</a> -->
        </div>
    </div>
</div>

                    </div>
                </div>
                <!--/ Carousel item end -->
                
                <div class="item">
                    <img class="img-responsive" src="img/A3.png" alt="slider">
                    
                    <div class="slider-content">
                        <div class="col-md-12 text-center">
                            <h1 class="animated1">
                              <span>Welcome to <strong>BMAO</strong></span>
                            </h1>
                            <p class="animated2" style="color: black;">"Welcome to Botolan Municipal Agriculture Office<br> – Sowing Seeds of Prosperity, Growing a Sustainable Future!"</p>
                            
                        </div>
                    </div>
                </div>
                <!--/ Carousel item end -->
                
                <div class="item">
                    <img class="img-responsive" src="img/A1.png" alt="slider">
                    <div class="slider-content">
                        <div class="col-md-12 text-center">
                            <h1 class="animated2">
                                <span><strong>BOTOLAN</strong>AGRICULTURE</span>
                            </h1>
                            <p class="animated1"><br> </p>   
                          
                        </div>
                    </div>
                </div>
                <!--/ Carousel item end -->
            </div>
            <!-- Carousel inner end-->

            <!-- Controls -->
            <a class="left carousel-control" href="#main-slide" data-slide="prev">
                <span><i class="fa fa-angle-left"></i></span>
            </a>
            <a class="right carousel-control" href="#main-slide" data-slide="next">
                <span><i class="fa fa-angle-right"></i></span>
            </a>
        </div>
        <!-- /carousel -->
    </section>
    <!-- End Home Page Slider -->

    <!-- Start Latest News Section -->

    <section id="latest-news" class="latest-news-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h3>Latest News</h3>
                        <p>

"These are the upcoming events for Botolan farmers."</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="latest-news">

 
 <?php
$display_query = "SELECT cem.event_id, cem.program_id, cem.event_start_date, cem.event_start_time, cem.event_end_date, cem.event_end_time, cem.event_location, cem.event_description, cem.status, p.prog_name, p.upload_url FROM calendar_event_master AS cem INNER JOIN programs AS p ON cem.program_id = p.program_id
                  WHERE cem.status = 'PENDING'";

$sqlQuery = mysqli_query($con, $display_query) or die(mysqli_error($con));

while ($row = mysqli_fetch_array($sqlQuery)) {
    $event_id = $row['event_id'];
    $event_name = $row['prog_name']; // Replaced 'event_name' with 'prog_name'
    $event_description = $row['event_description'];
    $event_location = unserialize($row['event_location']);
    $event_start_date = date('F j, Y', strtotime($row['event_start_date']));
    $event_start_time = date('g:i A', strtotime($row['event_start_time']));
    $event_end_date = date('F j, Y', strtotime($row['event_end_date']));
    $event_end_time = date('g:i A', strtotime($row['event_end_time']));


    $brgy = array("BANCAL" => "BANCAL", "BANGAN" => "BANGAN", "BATONLAPOC" => "BATONLAPOC", "BELBEL" => "BELBEL", "BENEG" => "BENEG", "BINUCLUTAN" => "BINUCLUTAN", "BURGOS" => "BURGOS", "CABATUAN" => "CABATUAN", "CAPAYAWAN" => "CAPAYAWAN", "CARAEL" => "CARAEL", "DANACBUNGA" => "DANACBUNGA", "MAGUISGUIS" => "MAGUISGUIS", "MALOMBOY" => "MALOMBOY", "MAMBOG" => "MAMBOG", "MORAZA" => "MORAZA", "NACOLCOL" => "NACOLCOL", "OWAOG-NIBLOC" => "OWAOG-NIBLOC", "PACO (POBLACION)" => "PACO (POBLACION)", "PALIS" => "PALIS", "PANAN" => "PANAN", "PAREL" => "PAREL", "PAUDPOD" => "PAUDPOD", "POONBATO" => "POONBATO", "PORAC" => "PORAC", "SAN ISIDRO" => "SAN ISIDRO", "SAN JUAN" => "SAN JUAN", "SAN MIGUEL" => "SAN MIGUEL", "SANTIAGO" => "SANTIAGO", "TAMPO (POBLACION)" => "TAMPO (POBLACION)", "TAUGTOG" => "TAUGTOG", "VILLAR" => "VILLAR");

    // Fetching upload_url from the result set
    $upload_url = $row['upload_url'];

    

    ?>

                   <div class="col-md-12">

                        <div class="latest-post">
                            
                           <img src="img/programs/<?php echo $upload_url; ?>" class="img-responsive" alt="" style="width: 300px; height: 300px;">

                            <h4 ><a href="#" ><?php echo $event_name; ?></a></h4>
                            <div class="post-details">
                                <span class="date"><strong><?php echo $event_start_date; ?></strong> <br>Start    <?php echo $event_start_time; ?>
                             <br>End    <?php echo $event_end_time; ?></span>
                                
                            </div>
                            <div class="">
                               <h5 style=" color: green;">BARANGAY PARTICIPANTS :</h5><h6><h5 style="color: black;"><?php foreach ($event_location as $value) {echo $value . ", "; }?></h5>

                               <div class="py-1"><h6 style=" color: green;">Description :</h6><?php echo $event_description; ?></div>
                           </div>
                           <!--  <a href="#" class="btn btn-primary">Read More</a> -->
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- End Latest News Section -->
    
   
    
  <!-- Start About Us Section -->
<section id="about-us" class="about-us-section-1">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="section-title text-center">
                    <h3>About Us</h3>
                    <p>Botolan Municipal Agriculture Office</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="welcome-section text-center">
                    <img src="img/galaxy.jpg" class="img-responsive" alt="..">
                    <h4>Office Philosophy</h4>
                    <div class="border"></div>
                    <div id="philosophyContent">
                        <p id="firstHalf">The Botolan Municipal Agriculture Office is committed to sustainable agriculture, empowering local farmers through innovation and responsible resource management.</p>
                        <p id="secondHalf" style="display: none;">They emphasize a harmonious relationship between nature and agriculture, focusing on biodiversity, soil health, and water conservation. Through education and collaboration, the office aims to boost resilience in the local farming community for food security, environmental stewardship, and the well-being of present and future generations.</p>
                    </div>
                    <button onclick="togglePhilosophyText()" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">Read More</button>
                </div>
            </div>

            <div class="col-md-4">
                <div class="welcome-section text-center">
                    <img src="img/galaxy.jpg" class="img-responsive" alt="..">
                    <h4>Office Mission & Vision</h4>
                    <div class="border"></div>
                    <div id="missionContent">
                        <p id="firstHalf2">The Botolan Municipal Agriculture Office strives for a community with thriving sustainable agriculture, promoting economic growth and food security.  </p>
                        <p id="secondHalf2" style="display: none;"> Their mission is to empower farmers through innovative, eco-friendly solutions, providing accessible training and support. By fostering environmental stewardship and technological advancement, the office aims to enhance productivity, raise living standards, and contribute to municipal prosperity. Through collaboration and community engagement, they work towards a resilient, self-reliant agricultural sector for the well-being of farmers and the broader community.</p>
                    </div>
                    <button onclick="toggleMissionText()" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">Read More</button>
                </div>
            </div>

            <div class="col-md-4">
                <div class="welcome-section text-center">
                    <img src="img/galaxy.jpg" class="img-responsive" alt="..">
                    <h4>Office Values & Rules</h4>
                    <div class="border"></div>
                    <div id="valuesContent">
                        <p id="firstHalf3">The Botolan Municipal Agriculture Office is dedicated to agricultural excellence and community service, guided by values of integrity, innovation, and accountability. </p>
                        <p id="secondHalf3" style="display: none;"> Prioritizing the well-being of local farmers, the office is committed to sustainable agricultural development, following ethical practices, transparency, and continuous improvement. Through teamwork and community engagement, the office aims to positively impact the agricultural sector, ensuring food security, environmental stewardship, and overall prosperity </p>
                    </div>
                    <button onclick="toggleValuesText()" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">Read More</button>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function togglePhilosophyText() {
        var secondHalf = document.getElementById("secondHalf");
        if (secondHalf.style.display === "none") {
            secondHalf.style.display = "block";
        } else {
            secondHalf.style.display = "none";
        }
    }

    function toggleMissionText() {
        var secondHalf2 = document.getElementById("secondHalf2");
        if (secondHalf2.style.display === "none") {
            secondHalf2.style.display = "block";
        } else {
            secondHalf2.style.display = "none";
        }
    }

    function toggleValuesText() {
        var secondHalf3 = document.getElementById("secondHalf3");
        if (secondHalf3.style.display === "none") {
            secondHalf3.style.display = "block";
        } else {
            secondHalf3.style.display = "none";
        }
    }
</script>

    <!-- End About Us Section -->

    <!-- Start Fun Facts Section -->
    <section class="fun-facts">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3">
                      <div class="counter-item">
                          <i class="fa-solid fa-hat-cowboy-side"></i>
                        <div class="timer" id="item1" data-to="<?php echo (isset($active_count['activecount'])) ? $active_count['activecount'] : '0'; ?>" data-speed="2000"></div>
                        <h5>Total Farmers</h5>                               
                      </div>
                    </div>  
                    <div class="col-xs-12 col-sm-6 col-md-3">
                      <div class="counter-item">
                        <i class="fa-solid fa-calendar-days"></i>
                        <div class="timer" id="item2" data-to="<?php echo (isset($event_count['eventcount'])) ? $event_count['eventcount'] : '0'; ?>" data-speed="2000"></div>
                        <h5>Upcoming Events</h5>                               
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                      <div class="counter-item">
                        <i class="fa-solid fa-location-dot"></i>
                        <div class="timer" id="item3" data-to="<?php echo (isset($staff_count['staffcount'])) ? $staff_count['staffcount'] : '0'; ?>" data-speed="2000"></div>
                        <h5> Number of Staffs</h5>                               
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                      <div class="counter-item">
                        <i class="fa-regular fa-file-lines"></i>
                         <div class="timer" id="item3" data-to="<?php echo (isset($accom_count['eventAccomcount'])) ? $accom_count['eventAccomcount'] : '0'; ?>" data-speed="2000"></div>
                        <h5>Accomplished Events</h5>                               
                      </div>
                    </div>
            </div>
        </div>
    </section>
    <!-- End Fun Facts Section -->

    <!-- Start Team Member Section -->
    <section id="team" class="team-member-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="section-title text-center">
                            <h3>Our Team</h3>
                            <p>Botolan Municipal Agriculture Office Personnels</p>
                        </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div id="team-section">
                                <div class="our-team">
                                   <?php
                                    $display_personnel = "SELECT * FROM personnel";
                                    $sqlQuery = mysqli_query($con, $display_personnel) or die( mysqli_error($con));
                                    
                                    while($row = mysqli_fetch_array($sqlQuery))
                                    {

                         
                                    $rank_id = $row['rank_id'];
                                    $rank = ''; // Initialize the $rank variable

                                    $get_rank = "SELECT * FROM ranks WHERE rank_id = '$rank_id'";
                                    $run_data = mysqli_query($con, $get_rank);

                                    if ($run_data && mysqli_num_rows($run_data) > 0) {
                                        $row1 = mysqli_fetch_assoc($run_data);
                                        $rank = $row1['rank_name'];
                                     }

                                    $personnel_id = $row['personnel_id'];
                                    $first_name = $row['first_name'];
                                    $middle_name = $row['middle_name'];
                                    $last_name = $row['last_name'];
                                    $extension_name = $row['extension_name'];
                                    $contact = $row['contact'];
                                    $sex = $row['sex'];
                                    
                                    $image = $row['upload_url'];
                                    ?>

                                    <div class="team-member">
                                        <img src="img/personnel/<?php echo $image; ?>" class="img-responsive" alt="">
                                        <div class="team-details">
                                            <h4><?php echo $first_name . " " . $middle_name . " " . $last_name . " " . $extension_name; ?></h4>
                                            <p><?php echo $rank; ?></p>
                                          
                                        </div>
                                    </div>

                              <?php } ?>


                        </div>                  
                    </div>
                </div>
            </div>
                
        </div>
    </section>
    <!-- End Team Member Section -->





    

    <section id="contact" class="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h3 style="color: white;">Contact With Us</h3>
                        <p  style="color: white;">"Harvesting Success, Cultivating Growth: Nurturing Botolan's Agricultural Future Together."</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
       <form name="sentMessage" id="contactForm" action="send_email.php" method="post">
   
             <div class="row">
                    <div class="col-md-6">     
             
                    <input type="hidden" class="form-control"  name="email" id="email" value="nmagsanop@gmail.com" readonly>        
              
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Your Name *" name="subject" id="subject" value="" required>
                    
                </div>
                 <div class="form-group">
                    <input type="text" class="form-control" placeholder="Your Email *" name="user_email" id="email" value="" required>
                    
                </div>
                <div class="form-group">
                    <input type="tel" class="form-control" placeholder="Your Phone *" name="contact" id="contact" value="" required>
                   
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <textarea class="form-control" placeholder="Your Message *" name="message" id="message" required></textarea>
                   
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-12 text-center">
                <div id="success"></div>
                <button type="submit" name="send" class="btn btn-primary">Send Message</button>
            </div>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    $(document).ready(function(){
        $("#contactForm").submit(function(event){
            event.preventDefault(); // Prevent the form from submitting normally

            // Perform an AJAX post request
            $.ajax({
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response){
                    // Display SweetAlert based on the response
                    if (response.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.message,
                        }).then(function() {
                            // Redirect to index.php
                            window.location.href = 'index.php';
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: response.message,
                        });
                    }
                },
                error: function(){
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'An error occurred while processing your request.',
                    });
                }
            });
        });
    });
</script>

                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="footer-contact-info">
                        <h4>Contact info</h4>
                        <ul>
                            <li><strong>E-mail :</strong> botolanmao@gmail.com</li>
                            <li><strong>Phone :</strong> +639957310087</li>
                            <li><strong>Mobile :</strong> +639957310087</li>
                            <li><strong>Web :</strong> bmao.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-4">
                    <div class="footer-contact-info">
                        <h4>Working Hours</h4>
                        <ul>
                            <li><strong>Mon-Wed :</strong> 8 am to 5 pm</li>
                            <li><strong>Thurs-Fri :</strong> 8 pm to 5 pm</li>
                            <li><strong>Sat :</strong> 9 am to 3 pm</li>
                            <li><strong>Sunday :</strong> Closed</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
      
        <footer class="style-1">
            <div class="container">
               <div class="col-md-4 col-xs-12 d-flex align-items-center justify-content-center text-center">
            <span class="copyright">Copyright &copy; <a href="http://BotolanMAO.com">BotolanMAO</a> 2023</span>
        </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="footer-social text-center">
                            <ul>
                                <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                              
                                <li><a href="#"><i class="fa-brands fa-square-instagram"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-square-twitter"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-telegram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="footer-link">
                            <ul class="pull-right">
                                <li><a href="#">Privacy Policy</a>
                                </li>
                                <li><a href="#">Terms of Use</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </section>


    <div id="loader">
        <div class="spinner">
            <div class="dot1"></div>
            <div class="dot2"></div>
        </div>
    </div>


  
    <!-- jQuery Version 2.1.1 -->

    <script src="jsindex/jquery-2.1.1.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="asset/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="jsindex/jquery.easing.1.3.js"></script>
    <script src="jsindex/classie.js"></script>
    <script src="jsindex/count-to.js"></script>
    <script src="jsindex/jquery.appear.js"></script>
    <script src="jsindex/cbpAnimatedHeader.js"></script>
    <script src="jsindex/owl.carousel.min.js"></script>
    <script src="jsindex/jquery.fitvids.js"></script>
    <script src="jsindex/styleswitcher.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="jsindex/jqBootstrapValidation.js"></script>
    <script src="jsindex/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="jsindex/script.js"></script>


</body>

</html>
