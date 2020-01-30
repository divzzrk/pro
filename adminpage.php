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
                        <li><a href="viewstud.php">View Students</a></li>
                        <li><a href="logout.php">Logout <span class="glyphicon glyphicon-log-out"></span></a></li>
                    </ul>
                    </div>
                </div>
            </nav>
        </header>
        <div class="container-fluid welcome">
            <div class="hero-text">
                <h2><div class="animated bounceInLeft">WELCOME MENTOR DON MATHEW</div></h2>
            </div>
        </div>
        <!-- to be edited-->
        <!--div class="wrapper container" id="card">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="heading"></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <a class="dashboard-stat purple" href="volcard.php?name=issuever">
                        <div class="visual"><i class="fa fa-hourglass-start"></i></div>
                        <div class="details">
                            <div class="number"><span>2</span></div>
                        <div class="desc">Issues to be verified</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <a class="dashboard-stat blue" href="volcard.php?name=issuetod">
                        <div class="visual"><i class="fa fa-line-chart"></i></div>
                        <div class="details">
                            <div class="number"><span>2</span></div>
                        <div class="desc">Issues Reported Today</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <a class="dashboard-stat hoki" href="volcard.php?name=issueyou">
                        <div class="visual"><i class="fa fa-thumbs-up"></i></div>
                        <div class="details">
                            <div class="number"><span>2</span></div>
                        <div class="desc">Verified Issues by you</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <a class="dashboard-stat red" href="volcard.php?name=issuespam">
                        <div class="visual"><i class="fa fa-exclamation-triangle"></i></div>
                        <div class="details">
                            <div class="number"><span>2</span></div>
                        <div class="desc">Issues marked spam by you</div>
                        </div>
                    </a>
                </div>  
            </div>
        </div-->
        <div id="addmodule" class="container-fluid text-center">
            <h2>The Existing Courses</h2><br>
            <div style="overflow-x:auto;">
                <table class="table table-hover" id="table1">
                    <tr style="background-color: #f2f2f2;">
                        <th class="col-sm-2" style="text-align:center;">ID</th>
                        <th class="col-sm-6" style="text-align:center;">Course Name</th>
                        <th class="col-sm-4" style="text-align:center;">Oprations</th>
                    </tr>
                    <?php
                        $con = new mysqli("localhost","root","","learndb");
                        $sel="select * from excoursetb";
                        $result=$con->query($sel);
                        if($result->num_rows>0){
                            while($row=$result->fetch_assoc()){
                                $id = $row['courseid'];
                                $name = $row['coursename'];
                    ?>
                    <tr>
                        <td class="col-sm-2"><?php echo $id ?></td>
                        <td class="col-sm-6"><?php echo $name ?></td>
                        <td class="col-sm-4"><a class="btn btn-success" href = "addmodule.php?cid=<?php echo $id;?>">ADD MODULE</a> &nbsp;&nbsp;
                        <a class="btn btn-primary" href = "viewmodule.php?cid=<?php echo $id;?>">VIEW MODULES</a>
                    </td>
                    </tr>
                    <?php
                            }
                        }
                    ?>
                </table>
            </div>  
        </div>
        <script>
            $(window).load(function(){
                // Animate loader off screen
                $(".se-pre-con").fadeOut("slow");
            });
        </script>
    </body>
</head>