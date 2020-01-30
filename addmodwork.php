<?php
    session_start();
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<body>
<?php
    if(isset($_POST)){
    $modulename = addslashes($_POST['title']);
    $name = $_SESSION["course"];
    $description = addslashes($_POST['details']);
    $uploadOk = 1;
    $pi = $_FILES["Image"];
    if($pi['name'] != NULL){
        $target_dir = "report/";
        $target_file = $target_dir . basename($_FILES["Image"]["name"]);
        $uploadOk = 1;
        $type = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["Image"]["tmp_name"]);
        if (move_uploaded_file($_FILES["Image"]["tmp_name"], $target_file)) {
            $uploadOk = 1;
        }
        else{
            $uploadOk = 0;
    ?>
    <script type="text/javascript">
            Swal.fire({
                title: 'There was some error in uploading your image or video!',
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
    }
    if($uploadOk == 1){
        
            $con = new mysqli("localhost","root","","learndb");
            $ins="insert into coursetb values ('$modulename','$name','$description','$target_file','$type')";
            $result=$con->query($ins);
            if($con->connect_error){
    ?>
        <script type="text/javascript">
            Swal.fire({
                title: 'There was some Connection Error!!',
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
            else if(!$result){
    ?>
    <script type="text/javascript">
            Swal.fire({
                title: 'We could not insert your data try again!!',
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
    ?>
    <script type="text/javascript">
            Swal.fire({
                title: 'Added successfully!!',
                type: 'success',
                allowOutsideClick: false,
                animation: false,
                customClass: {
                    popup: 'animated fadeInRight'
                },
                onAfterClose: function(){
                    location.assign("adminpage.php");
                }
            });
    </script>
    <?php
            }
        
    }
}