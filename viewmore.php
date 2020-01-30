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
        <link rel="stylesheet" href="admincss.css">
        <script src="script.js"></script>
        <link rel="stylesheet/less" type="text/css" href="styles.less" />
        <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.9.0/less.min.js" ></script>
        <style>
			@media screen and (min-width:320px){  
				#owl-demo .item img{
					height: 100px;
				}
				.w3-card-4{
					width: 90%;
					margin:0 auto;
					padding: 0%;
					margin-top:3%;
				}
				.postimg{
					width: 100%;
					max-height:400px;
					-o-object-fit: contain;
				}
			}
			@media screen and (min-width:600px){ 
				h2{
					font-size: 20px;
				} 
				#owl-demo .item img{
					height: 150px;
				}
				h3{
					font-size: 18px;
				}
				.w3-card-4{
					width: 60%;
				}
			}
			@media screen and (min-width:1050px){ 
				h2{
					font-size: 25px;
				} 
				h3{
					font-size: 20px;
				}
				#owl-demo .item img{
					height: 200px;
				}
				.w3-card-4{
					width: 50%;
				}
				.postimg{
					width: 100%;
					max-height:400px;
					-o-object-fit: contain;
				}
			}
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
        <?php
            $mname = $_GET["mname"];
        ?>
        <div class="jumbotron">
            <br><h2 class="text-center"><?php echo $mname; ?></h2>
        </div>
        <?php
            $con = new mysqli("localhost","root","","learndb");
            $sel="select * from coursetb where modulename='$mname'";
            $result=$con->query($sel);
            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    $coursename = $row["coursename"];
                    $description = $row["description"];
                    $videoid = $row["videoid"];
                    $type = $row["type"];
                    if($type==NULL){
						$typeshown = "empty";
					}
					else if($type == 'gif' || $type == 'jpg' || $type == 'jpeg' || $type == 'png'){
						$typeshown = "image";
					}
					else{
						$typeshown = "video";
					}
        ?>
        <div class="w3-container">
			<div class="w3-card-4">
		<?php
					if($typeshown == "image"){
		?>
				<img id="#myimg" src="<?php echo $videoid ?>" class="postimg" alt="Alps">
		<?php
					}
					else if($typeshown == "video"){
		?>
				<video class="postimg" controls>
					<source src="<?php echo $videoid; ?>" type="video/mp4">
				</video>
		<?php
					}
		?>
				<div style="padding:1%;color:dimgrey;text-align:center;font-weight:bold;font-size:24px;"><?php echo $coursename ?></div>
				<div style="padding:1%;color:dimgrey;"> <?php echo $description ?></div>
				<div class="w3-container w3-center">	
				</div>
			</div>
		</div>
        <?php
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