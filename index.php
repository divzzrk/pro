<?php
    session_start();
?>
<!DOCTYPE html>
<html>
	<head>
	    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#4E0096" />
        <meta name="google-signin-client_id" content="252756185302-bcqgkfdv77as31u2u7p2lqp1r1tdp0bu.apps.googleusercontent.com">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <!--sweetalert-->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        <link rel="stylesheet" href="style.css">
        <script src="script.js"></script>
        <style>
            footer{
                background-color: #4E0096;
                color: white;
            }
            footer .glyphicon {
                font-size: 20px;
                margin-bottom: 20px;
                margin-top: 20px;
                color: #D8BFD8;
                text-decoration: none;
            }
            a:hover{
                text-decoration: none;
            }
            #courses{
                padding-top: 5%;
                padding-bottom: 3%;
                background-color: #eff5f5;
            }
            #about{
                padding-top: 5%;
                padding-bottom: 3%;
                background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)),url(tbg.jpg);
                color: white;
                background-attachment: fixed;
            }
            #contact{
                padding-top: 5%;
                padding-bottom: 3%;
            }
            #about h3{
                color: lightgrey;
                font-style: italic;
                text-align: left;
                padding-left: 5%;
            }
            .myimg{
                height: 70%;
                width: 100%; 
                object-fit: cover;
            }
            .flip-box-front h3{
                color: dimgrey;
            }
            hr.style1 {
                width: 8%;
                border-top: 1px solid dimgrey;
                display: inline-block;
            }
            .column {
				float: left;
				width: 50%;
				margin-top: 6px;
				padding: 20px;
            }
            /* for floating labels*/
            .input-group {
                position: relative;
                margin: 40px 0 20px;
            }

            input,textarea {
                font-size: 18px;
                padding: 10px 10px 10px 5px;
                display: block;
                width: 280px;
                border: none;
                border-bottom: 1px solid #757575;
            }

            input:focus,
            textarea:focus {
                outline: none;
            }

            label {
                color: #999;
                font-size: 18px;
                font-weight: normal;
                position: absolute;
                pointer-events: none;
                left: 5px;
                top: 10px;
                transition: 0.2s ease all;
                -moz-transition: 0.2s ease all;
                -webkit-transition: 0.2s ease all;
            }

            input:focus ~ label,
            input:valid ~ label,
            textarea:focus ~ label, 
            textarea:valid ~ label {
                top: -20px;
                font-size: 14px;
                color: #4E0096;
            }

            .bar {
                position: relative;
                display:block;
                width:300px;
            }

            .bar:before,
            .bar:after {
                content: '';
                height: 2px;
                width: 0;
                bottom: 1px;
                position: absolute;
                background: #4E0096;
                transition: 0.2s ease all;
                -moz-transition: 0.2s ease all;
                -webkit-transition: 0.2s ease all;
            }

            .bar:before {
                left: 50%;
            }

            .bar:after {
                right: 50%;
            }

            input:focus ~ .bar:before,
            input:focus ~ .bar:after,
            textarea:focus ~ .bar:before,
            textarea:focus ~ .bar:after {
                width: 50%;
            }

            .highlight {
                position: absolute;
                height: 60%;
                width: 100px;
                top: 25%;
                left: 0;
                pointer-events: none;
                opacity: 0.5;
            }

            input:focus ~ .highlight,
            textarea:focus ~ .highlight {
                -webkit-animation: inputHighlighter 0.3s ease;
                -moz-animation: inputHighlighter 0.3s ease;
                animation: inputHighlighter 0.3s ease;
            }
            /* animations */
            @-webkit-keyframes inputHighlighter {
                from { background: #4E0096; }
                to   { width: 0; background: transparent; }
            }
            @-moz-keyframes inputHighlighter {
                from { background: #4E0096; }
                to   { width: 0; background: transparent; }
            }
            @keyframes inputHighlighter {
                from { background: #4E0096; }
                to   { width: 0; background: transparent; }
            }
            @media screen and (max-width: 600px) {
				.column, input[type=submit] {
					width: 100%;
					margin-top: 0;
				}
            }
            .no-js #loader { display: none;  }
            .js #loader { display: block; position: absolute; left: 100px; top: 0; }
            .se-pre-con {
                position: fixed;
                left: 0px;
                top: 0px;
                width: 100%;
                height: 100%;
                z-index: 9999;
                background: url(img/ballon_loader.gif) center no-repeat #fff;
            }
        </style>
    </head>
    <body id="mypage" data-spy="scroll" data-target=".navbar" data-offset="60">
        <div class="se-pre-con"></div>
        <header>
            <nav class="navbar navbar-inverse navbar-fixed-top" style=" margin:0%; background-color: #4E0096; border: 0%; border-radius:0%;">
                <div class="container-fluid">
                    <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php#mypage" style="color:white;">LearnME</a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#courses">Courses</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#contact">Contact Us</a></li>
                        <?php
                            if(isset($_SESSION['username']))
                                echo "<li><a href='logout.php'>Logout</a></li>";
                            else
                                echo "<li><a href='#' role='button'  data-toggle='modal' data-target='#loginModal'>Login / Register</a></li>";
                        ?>
                    </ul>
                    </div>
                </div>
            </nav>
        </header>
        <div class="hero-image">
            <div class="hero-text">
                <h1 class="animated fadeInLeft" style="color: black;">LearnME</h1>
                <div class="typewriter">
                    <h3 style="color: black;">Where Tech Meets Passion</h3>
                </div>
            </div>
        </div>  
        <div id="courses" class="container-fluid text-center">
            <h2>Explore The Courses Provided By Our Mentor</h2><hr class="style1"><br>
            <div class="courseimg ">
			    <a href="viewoutmodule.php?cid=java"><div class="flip-box slideanim">
				    <div class="flip-box-inner">
                        <div class="flip-box-front">
                            <img src="java_logo_640.jpg" class="myimg"/>
                            <h2>Java</h2>
                            <h3><span class="counter">200</span>+ Students Enrolled</h3>
                        </div>
                    </div>
                </div></a>
                <a href="viewoutmodule.php?cid=python"><div class="flip-box slideanim">
				    <div class="flip-box-inner">
                        <div class="flip-box-front">
                            <img src="python-logo.png" class="myimg"/>
                            <h2>Python</h2>	
                            <h3><span class="counter">200</span>+ Students Enrolled</h3>
                        </div>
                    </div>
                </div></a>
                <a href="viewoutmodule.php?cid=cpp"><div class="flip-box slideanim">
				    <div class="flip-box-inner">
                        <div class="flip-box-front">
                            <img src="cicon.png" class="myimg"/>
                            <h2>C Programming</h2>	
                            <h3><span class="counter">200</span>+ Students Enrolled</h3>
                        </div>
                    </div>
                </div></a>
            </div>
        </div>
        <div id="about" class="container-fluid text-center">
            <h2>About Our Mentor</h2><hr class="style1"><br>
            <div class="row">
                <div class="col-sm-12">
                    <h3>Don Mathew</h3><br>
                    <p>A gifted programmer who wants to share his talents by influencing others through teaching<br>
                    A programmer is an individual that writes/creates computer software or applications by giving the computer specific programming instructions. Most programmers have a broad computing and coding background across multiple programming languages and platforms, including Python, C++ and Java.</p>
                </div>
                
            </div><br>
         
        </div>
        <div id="contact" class="container-fluid text-center">
            <h2>Contact Us</h2><hr class="style1"><br>
            <h3>Got any questions?? We would love to hear from you</h3>
            <div class="row">
			<div class="col-sm-6 c1">
            	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7779.786559818448!2d74.84302807439339!3d12.850168913742376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba35bb9118adc71%3A0x61d722082c13920a!2sMangala+Nagar%2C+Mangaluru%2C+Karnataka!5e0!3m2!1sen!2sin!4v1565021653719!5m2!1sen!2sin" width="100%" height="375" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
			<div class="col-sm-6 c1">
				<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
					<div class="input-group">
						<input type="text" name="contactname" required>
						<span class="highlight"></span>
						<span class="bar"></span>
						<label>Your name</label>
					</div>
					<div class="input-group">
						<input type="email" name="contactemail" required>
						<span class="highlight"></span>
						<span class="bar"></span>
						<label>Email</label>
					</div>
					<div class="input-group">
						<textarea name="contactmessage" required></textarea>
						<span class="highlight"></span>
						<span class="bar"></span>
						<label>Message</label>
                    </div>
					<input type="submit" value="SEND MESSAGE" class="button button5 pull-left" name="contactbtn"/>
				</form>
			</div>
  		</div>		
        </div>
        <?php
            if(isset($_POST['loginbtn'])){
                
                $con = new mysqli("localhost","root","","learndb");
                $username = $_POST['username'];
                $password = $_POST['password'];
                $search = "SELECT cname, cemail, cpassword, usertype FROM userstb WHERE email='$username' AND password='$cpassword')";
                $result = $conn->query($search); 
                $row=$result->fetch_assoc();
                $name = $row['cname'];
                $match  = mysqli_num_rows($result);
                $usertype = $row['usertype'];
                if($match > 0 && $usertype == 'u'){
                    $_SESSION['username'] = $username;
                    echo "<meta http-equiv=Refresh content=0.5;url=userpage.php>";
                }
                elseif($match > 0 && $usertype == 'a'){
                    $_SESSION['username'] = $username;
                    echo "<meta http-equiv=Refresh content=0.5;url=adminpage.php>";
                }
                else{
                ?>
                <script type="text/javascript">
                    Swal.fire({
                        title: 'Invalid credentials!',
                        type: 'error'
                    });
                </script>
                <?php
                }
            }
            if(isset($_POST['regbtn'])){
                $conn = new mysqli("localhost","root","","learndb");
                $regname = $_POST['cname'];
                $regemail = $_POST['cemail'];
                $password = $_POST['cpassword'];
                $regemail = filter_var($regemail,FILTER_SANITIZE_EMAIL);
                $usertype = 'u';
                if(!filter_var($regemail,FILTER_VALIDATE_EMAIL)){
			?>
            <script type="text/javascript">
                Swal.fire({
                    title: 'Please verify your email address!',
                    type: 'error',
                    allowOutsideClick: false,
                    animation: false,
                    customClass: {
                        popup: 'animated fadeInRight'
                    }
                })
            </script>
            <?php
                }
                else{
					?>
					<?php
                    $ins = "INSERT INTO userstb VALUES(
                        '". ($regemail) ."', 
                        '". ($regname) ."', 
                        '". ($password) ."', 
                        '". ($usertype) ."',
                        0) ";
                    $result = $conn->query($ins);
                    if($conn->connect_error){
			?>
            <script type="text/javascript">
                Swal.fire({
                    title: 'There was some connection Error! Please try again',
                    type: 'error',
                    allowOutsideClick: false,
                    animation: false,
                    customClass: {
                        popup: 'animated fadeInRight'
                    }
                });
            </script>
            <?php
					}
					else if(!$result){
						?>
            <script type="text/javascript">
                Swal.fire({
                    title: 'It seems that the provided email already exists!',
                    type: 'error',
                    allowOutsideClick: false,
                    animation: false,
                    customClass: {
                        popup: 'animated fadeInRight'
                    }
                });
            </script>
            <?php
					}
					else{
                        $_SESSION['username'] = $regemail;
                        echo "<meta http-equiv=Refresh content=0.5;url=userpage.php>";
					}
                }
            }
            if(isset($_POST['contactbtn'])){
                $cname = $_POST['contactname'];
                $cemail = $_POST['contactemail'];
                $cmsg = $_POST['contactmessage'];
                $cemail=filter_var($cemail,FILTER_SANITIZE_EMAIL);
                if(!filter_var($cemail,FILTER_VALIDATE_EMAIL)){
        ?>
        <script type="text/javascript">
            Swal.fire({
                title: 'Invalid email address!',
                type: 'warning',
                allowOutsideClick: false,
                animation: false,
                customClass: {
                    popup: 'animated fadeInRight'
                }
            })
        </script>
        <?php
                }
                else{
                    ini_set( 'display_errors', 1 );
			        error_reporting( E_ALL );
			        $from = "no-reply@learnme.com";
			        $to = $cemail;
			        $subject = "Thankyou for contacting us";
			        $message = "We are glad to hear from you. Thank you for your valuable message. We will look into the matter and do the necassary. \n\nRegards, \nLearn ME";
			        $headers = "From:" . $from;
                    mail($to,$subject,$message, $headers);
                    $to = "learnme@gmail.com";
                    $subject = "New contact us feed";
                    $headers = "From:" . $cemail;
                    $message = "Name: ".$cname."\nEmail id: ".$cemail."\nMessage: ".$cmsg;
                    mail($to,$subject,$message,$headers);
        ?>
        <script type="text/javascript">
            Swal.fire({
                title: 'Your message has been successfuly sent',
                type: 'success',
                allowOutsideClick: false,
                animation: false,
                customClass: {
                    popup: 'animated fadeInRight'
                }
            })
        </script>
        <?php
                }
            }
        ?>
        <footer class="container-fluid text-center">
            <a href="#mypage" title="To Top">
                <span class="glyphicon glyphicon-chevron-up"></span>
            </a><br>
            <p>Invite Your Friends To Also Be A Part</p>
            <!-- AddToAny BEGIN -->
            <div class="a2a_kit a2a_kit_size_32 a2a_default_style" style="display: inline-block;">
            <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
            <a class="a2a_button_facebook"></a>
            <a class="a2a_button_twitter"></a>
            <a class="a2a_button_email"></a>
            <a class="a2a_button_whatsapp"></a>
            </div>
            <script async src="https://static.addtoany.com/menu/page.js"></script>
            <!-- AddToAny END -->
            <p>Copyright © <font style="color: #D8BFD8;">LearnME</font><br> All Rights Reserved.</p>
        </footer>
        <!-- Modal-->
        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style="color: #4E0096;">LOGIN OR SIGNUP FORM</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul class="nav nav-pills">
                            <li class="active"><a data-toggle="pill" href="#loginmenu">Login</a></li>
                            <li><a data-toggle="pill" href="#signupmenu">Sign Up</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="loginmenu" class="tab-pane fade in active">
                                <form id="loginForm" action="login.php" method="POST">
                                    <div class="input-group loginreg">
                                        <input type="text" name="username" required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Username</label>
                                    </div>
                                    <div class="input-group loginreg">
                                        <input type="password" name="password" required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Password</label>
                                    </div>
                                    <input type="submit" value="LOGIN" name="loginbtn" class="button button5" style="width:35%;"/>
                                </form>                    
                            </div>
                            <div id="signupmenu" class="tab-pane fade">
                                <form id="signupForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                                    <div class="input-group loginreg">
                                        <input type="text" name="cname" required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Name</label>
                                    </div>
                                    <div class="input-group loginreg">
                                        <input type="text" name="cemail" required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Email id (Username)</label>
                                    </div>
                                    <div class="input-group loginreg">
                                        <input type="password" name="cpassword" required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Password</label>
                                    </div>
                                    <input type="submit" value="SIGN UP" name="regbtn" class="button button5" style="width:35%;"/>
                                </form>        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(window).load(function() {
                // Animate loader off screen
                $(".se-pre-con").fadeOut("slow");;
            });
            function onSignIn(googleUser) {
                var profile = googleUser.getBasicProfile();
                console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
                console.log('Name: ' + profile.getName());
                console.log('Image URL: ' + profile.getImageUrl());
                console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
                var name = profile.getName();
                var email =  profile.getEmail();
                if(profile.getId() && profile.getEmail()){
                    $.ajax({
                        url: "googleverify.php",
                        type: 'POST',
                        data: {name: name, email: email},
                        success: function(response) {
                            console.log("success");
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log(textStatus, errorThrown);
                        }
                    });
                }
            }
            function onFailure(error){
                console.log(error);
            }
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 10,
                    time: 1000,
                });
            });
        </script>
    </body>
</html>