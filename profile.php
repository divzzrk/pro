<?php
    session_start();
    $db_host = "localhost"; //can be "localhost" for local development
    $db_username = "root";
    $db_password = "";
    $db_name = "learndb";
    $conn = new mysqli($db_host,$db_username,$db_password,$db_name) or die(mysqli_error());
    $username = $_SESSION['username'];
                $search = "SELECT cname, cemail, cpassword, usertype, star FROM userstb WHERE cemail='$username'";
                $result = $conn->query($search); 
                $row=$result->fetch_assoc();
                $name = $row['cname'];
                $star = $row['star'];
?>
<!DOCTYPE html>
<html>
	<head>
	    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#4E0096" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!--sweetalert-->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="admincss.css">
        <script src="script.js"></script>
        <link rel="stylesheet/less" type="text/css" href="styles.less" />
        <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.9.0/less.min.js" ></script>
        <style>
            .no-js #loader { display: none;  }
            .js #loader { display: block; position: absolute; left: 100px; top: 0; }
            .se-pre-con {
                position: fixed;
                left: 0px;
                top: 0px;
                width: 100%;
                height: 100%;
                z-index: 9999;
                background: url(img/loader.gif) center no-repeat #fff;
            }
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
            .card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}



button:hover, a:hover {
  opacity: 0.7;
}
        </style>
    </head>
    <body id="mypage" data-spy="scroll" data-target=".navbar" data-offset="60">
    <?php
    
    if(!isset($_SESSION['username'])){
    ?>
        <script type="text/javascript">
            Swal.fire({
                title: 'Unauthorized user!',
                type: 'error',
                onAfterClose: function() {
                    location.assign('index.php');
                }
            });
        </script>
        <?php
        die();
    }
?>
        <!--div class="se-pre-con"></div-->
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
                    <a class="navbar-brand" href="userpage.php" style="color:white;"> Learn ME</a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="logout.php">Logout <span class="glyphicon glyphicon-log-out"></span></a></li>
                    </ul>
                    </div>
                </div>
            </nav>
        </header>
        <div class="container-fluid welcome">
            <div class="hero-text">
                <h2><div class="animated bounceInLeft">WELCOME <?php echo $name; ?></div></h2>
            </div>
        </div><br>
        <!-- to be edited-->
        <div class="card">
  <img src="User_Avatar-04-512.png" alt="John" style="width:100%">
  <h2><?php echo $name; ?></h2>
  <p>Stars:<?php echo $star; ?></p>
  <p>Courses:</p>
  <p>
    <?php
        $search = "SELECT coursename FROM enrolled WHERE cemail='$username'";
        $result = $conn->query($search); 
        while($row=$result->fetch_assoc()){
            $x=$row['coursename'];
            $sql = "SELECT coursename FROM excoursetb WHERE courseid='$x'";
            $res = $conn->query($sql); 
            $c=$res->fetch_assoc();
            echo $c['coursename'];
            ?>
            <br>
            <?php
        }
    ?>
    </p>
</div>

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
        <script>
            $(window).load(function(){
                // Animate loader off screen
                $(".se-pre-con").fadeOut("slow");
            });
        </script>
    </body>
</head>