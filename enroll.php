<?php
    session_start();
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
        <link rel="stylesheet" href="formstyle.css">
        <link rel="stylesheet" href="admincss.css">
        <script src="script.js"></script>
        <link rel="stylesheet/less" type="text/css" href="styles.less" />
        <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.9.0/less.min.js" ></script>
        <style>
            #existingcourses{
                padding-top: 5%;
                padding-bottom: 3%;
                background-color: #eff5f5;
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
                background: url(img/loader.gif) center no-repeat #fff;
            }
        </style>
    </head>
    <body id="mypage" data-spy="scroll" data-target=".navbar" data-offset="60">
    <?php
    
    if(!isset($_SESSION['username'])){
    ?>
        <script type="text/javascript">
            Swal.fire({
                title: 'Unauthorized access!',
                type: 'warning',
                onAfterClose: function() {
                    location.assign('index.php');
                }
            });
        </script>
        <?php
        die();
    }
?>
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
                    <a class="navbar-brand" href="index.php#mypage" style="color:white;"> Learn ME</a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="logout.php">Logout <span class="glyphicon glyphicon-log-out"></span></a></li>
                    </ul>
                    </div>
                </div>
            </nav>
        </header>
        <div class="jumbotron">
            <br><h2 class="text-center">ENROLL TO A PARTICULAR COURSE</h2>
        </div>
        <div class="loginwhite" style="text-align:center;">
            <h6 style="color:grey">[Choose the required course]</h6>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
                <select name="issue" class="category" id="issue">
                    <option value="" selected>Select your course</option>
                    <option value="cpp">Programming in CPP</option>
                    <option value="java">Programming using Java</option>
                    <option value="python">Python Programming</option>
				</select><br>
                <button type="submit" name='submit' class="mybtn">SELECT</button>
            </form>
        </div>
        <?php
            if(isset($_POST['submit'])){
                $selected = $_POST["issue"];
                $username = $_SESSION['username'];
                if($selected==""){
        ?>
        <script type="text/javascript">
            Swal.fire({
                title: 'Please select a course!',
                type: 'warning',
                //onAfterClose: function() {
                //    location.assign('enroll.php');
                //}
            });
        </script>
        <?php
                }
                else{
                    $con = new mysqli("localhost","root","","learndb");
                    $ins="insert into enrolled values ('$username','$selected')";
                    $result=$con->query($ins);
                    if($con->connect_error){
        ?>
        <script type="text/javascript">
            Swal.fire({
                title: 'Connection error!',
                type: 'warning',
                //onAfterClose: function() {
                //    location.assign('enroll.php');
                //}
            });
        </script>
        <?php
                    }
                        elseif(!$result){
        ?>
        <script type="text/javascript">
            Swal.fire({
                title: 'You have already enrolled for that particular course!',
                type: 'warning',
                //onAfterClose: function() {
                //    location.assign('enroll.php');
                //}
            });
        </script>
        <?php
                        }else{
        ?>
        <script type="text/javascript">
            Swal.fire({
                title: 'Thankyou for enrolling!',
                type: 'success',
                onAfterClose: function() {
                    location.assign('userpage.php');
                }
            });
        </script>
        <?php
                        }
                    }
                }
            
        ?>
        <script>
            $(window).load(function(){
                // Animate loader off screen
                $(".se-pre-con").fadeOut("slow");
            });
        </script>
    </body>
</html>