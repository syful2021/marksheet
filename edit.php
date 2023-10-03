
<?php
    require  'db_con.php';

    if(isset($_GET['user_edit'])){
        $id = $_GET['user_edit'];
        $result = mysqli_query($con, "SELECT * FROM `marksheets` WHERE `id` = '$id'");
        $user_info = mysqli_fetch_assoc($result); 
        if(isset($_REQUEST['add_student'])){

            $name = trim($_REQUEST['name']);
            $roll = trim($_REQUEST['roll']);
            $bangla = $_REQUEST['bangla'];
            $english = $_REQUEST['english'];
            $math = $_REQUEST['math'];
            $physics = $_REQUEST['physics'];
            $chemistry = $_REQUEST['chemistry'];
            $ict = $_REQUEST['ict'];

            $input_errors = array();
            if($bangla > 100 || $bangla <0){
                $input_errors['bangla'] = "Bangla mark invalid!";
            }
            if($english > 100 || $english <0){
                $input_errors['english'] = "English mark invalid!";
            }
            if($math > 100 || $math < 0) {
                $input_errors['math'] = "Math mark invalid!";
            }
            if($ict > 100 || $ict < 0) {
                $input_errors['ict'] = "ICT mark invalid!";
            }
    
            if($physics > 100 || $physics < 0) {
            $input_errors['physics'] = "Physics mark invalid!";
            }
    
            if($chemistry > 100 || $chemistry < 0) {
                $input_errors['chemistry'] = "Chemistry mark invalid!";
            }

                
            if (count($input_errors) == 0) {
                
                $result = mysqli_query($con, "UPDATE `marksheets` SET `name`='$name',`roll`='$roll', `bangla`='$bangla',`english`='$english',`math`='$math',`physics`='$physics',`chemistry`='$chemistry',`ict`='$ict' WHERE `id` = '$id'");
        
                if($result){
                    $_SESSION['success'] = "Student Update Successfully";
                    header("location: index.php");
                    exit(0);
                }else{
                    $_SESSION['error'] = "Data Not Saved.!";
                    header("location: index.php");
                    exit(0);
                }
            }
    
    
        }
    }
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Add student mark</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>
<body>

<div class="card-body">
        <form class="g-3 p-3" action="" method="POST">
            <?php
            
            if(isset($_SESSION['success'])){
            ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <?= $_SESSION['success']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
            unset($_SESSION['success']);
            }
            if(isset($_SESSION['error'])){
            ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <?= $_SESSION['error']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
            unset($_SESSION['error']);
            }
            ?>
            <div class="row ">
                <div class="col-6 mb-2">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter name" aria-label="First name" value="<?= $user_info['name'] ?>" required>
                    
                </div>
                <div class="col-6 mb-2">
                    <label for="">Roll</label>
                    <input type="text" class="form-control" name="roll" placeholder="Enter Roll" aria-label="Last name" value="<?= $user_info['roll'] ?>"  required>
                </div>
               
                <div class="col-6 mb-2">
                    <label for="">Bangla</label>
                    <input type="text" class="form-control" name="bangla" placeholder="Enter Bangla Mark" aria-label="Last name" value="<?= $user_info['bangla'] ?>"  required>
                    <?php 
                    if(isset($input_errors['bangla'])){
                        echo '<span class="text-danger" >'.$input_errors['bangla'].'</span>';
                    }
                    ?>
                </div>
                <div class="col-6 mb-2">
                    <label for="">English</label>
                    <input type="text" class="form-control" name="english" placeholder="Enter English Mark" aria-label="Last name" value="<?= $user_info['english'] ?>"  required>
                    <?php 
                    if(isset($input_errors['english'])){
                        echo '<span class="text-danger" >'.$input_errors['english'].'</span>';
                    }
                    ?>
                </div>
                <div class="col-6 mb-2">
                    <label for="">Math</label>
                    <input type="text" class="form-control" name="math" placeholder="Enter Math Mark" aria-label="Last name" value="<?= $user_info['math'] ?>"  required>
                    <?php 
                    if(isset($input_errors['math'])){
                        echo '<span class="text-danger" >'.$input_errors['math'].'</span>';
                    }
                    ?>
                </div>
                <div class="col-6 mb-2">
                    <label for="">Physics</label>
                    <input type="text" class="form-control" name="physics" placeholder="Enter Physics Mark" aria-label="Last name" value="<?= $user_info['physics'] ?>"  required>
                    <?php 
                    if(isset($input_errors['physics'])){
                        echo '<span class="text-danger" >'.$input_errors['physics'].'</span>';
                    }
                    ?>
                </div>
                <div class="col-6 mb-2">
                    <label for="">Chemistry</label>
                    <input type="text" class="form-control" name="chemistry" placeholder="Enter Chemistry Mark" aria-label="Last name" value="<?= $user_info['chemistry'] ?>"  required>
                    <?php 
                    if(isset($input_errors['chemistry'])){
                        echo '<span class="text-danger" >'.$input_errors['chemistry'].'</span>';
                    }
                    ?>
                </div>
                <div class="col-6 mb-4">
                    <label for="">ICT</label>
                    <input type="text" class="form-control" name="ict" placeholder="Enter ICT Mark" aria-label="Last name" value="<?= $user_info['ict'] ?>"  required>
                    <?php 
                    if(isset($input_errors['ict'])){
                        echo '<span class="text-danger" >'.$input_errors['ict'].'</span>';
                    }
                    ?>
                </div>
            </div>
            <button class="btn btn-sm btn-primary" type="submit" name="add_student">Submit</button>
        </form>
    </div>
  </div>


    
</body>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>

</html>