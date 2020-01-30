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
            #imageUpload
			{
					display: none;
			}
			#profileImage
			{
					cursor: pointer;
			}
			#profile-container {
					width: 200px;
					height: 200px;
					overflow: hidden;
					margin: 0 auto;
			}
			#profile-container img {
					width: 200px;
					height: 200px;
			}
			#profile-container:hover {
				opacity:0.5;
			}
        </style>
    </head>
    <body id="mypage" data-spy="scroll" data-target=".navbar" data-offset="60">
    <?php
    
    if(!isset($_SESSION['admin'])){
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
            <?php
                $course = $_GET["cid"];
                $_SESSION["course"] = $course;
                $con = new mysqli("localhost","root","","learndb");
                $sel="select * from excoursetb where courseid='$course'";
                $result=$con->query($sel);
                if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){
                        $name = $row['coursename'];
            ?><br/>
            <h2 style="text-align: center;"><?php echo $name; ?></h2>
            <?php
                    }
                }else{
            ?>
            <h2 style="color:red;">There are no course in this particular course</h2>
            <?php
                }
            ?>
            <div class="loginwhite" style="text-align:center;">
                <h3>ADD A MODULE</h3>
                <h6 style="color:grey">[All the fields are mandatory]</h6>
                <form action="addmodwork.php" method="POST" enctype="multipart/form-data">
                    <input type="text" placeholder="Enter module title " name="title" required>
                    <textarea name="details" placeholder="Give course content in detail " required></textarea><br>
				    <label for="Image" style="color:#4E0096;">Add a photo or a video</label>
				    <div id="profile-container">
                	    <img id="profileImage" src="img/addpic.png" alt=" Uploaded file"/>
				    </div>
				    <input id="imageUpload" type="file" name="Image" placeholder="Photo" accept="image/*,video/*" />
                    <br>
                    <button type="submit" name='submit' class="mybtn">ADD MODULE</button>
                </form>
            </div>
        </div>
        <script>
            $(window).load(function(){
                // Animate loader off screen
                $(".se-pre-con").fadeOut("slow");
            });
            $("#profileImage").click(function(e) {
				$("#imageUpload").click();
			});
			function fasterPreview( uploader ) {
				if ( uploader.files && uploader.files[0] ){
					$('#profileImage').attr('src', window.URL.createObjectURL(uploader.files[0]) );
				}
			}
			$("#imageUpload").change(function(){
				fasterPreview( this );
			});
        </script>
    </body>
</html>