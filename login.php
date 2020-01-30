<?php
    session_start();
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<body>
<?php
    if(isset($_POST)){
        $con = new mysqli("localhost","root","","learndb");
        $username = $_POST['username'];
        $password = $_POST['password'];
        $search = "SELECT cname, cemail, cpassword, usertype FROM userstb WHERE cemail='$username' AND cpassword='$password'";
        $result = $con->query($search); 
        $row=$result->fetch_assoc();
        $name = $row['cname'];
        $match  = mysqli_num_rows($result);
        $usertype = $row['usertype'];
       

        if($match > 0 && $usertype == 'u'){
          // echo "sdsfdsfs";
          $_SESSION['username'] = $username;
           echo "<meta http-equiv=Refresh content=0.5;url=userpage.php>";
        }
        elseif($match > 0 && $usertype == 'a'){
           // echo "22222222";
           $_SESSION['admin'] = $username;
            header("Location: adminpage.php");
        }
        else{
        ?>
        <script type="text/javascript">
            Swal.fire({
                title: 'Invalid credentials!',
                type: 'error',
                onAfterClose: function() {
                    location.assign('index.php');
                }
            });
        </script>
        <?php
        }
    }



?>
</body>