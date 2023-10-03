
<?php
require '../db_con.php';
if(isset($_REQUEST['add_student'])){
    // echo "<pre>";
    // print_r($_REQUEST) ;

    $name = trim($_REQUEST['name']);
    $roll = trim($_REQUEST['roll']);
    $bangla = $_REQUEST['bangla'];
    $english = $_REQUEST['english'];
    $math = $_REQUEST['math'];
    $physics = $_REQUEST['physics'];
    $chemistry = $_REQUEST['chemistry'];
    $ict = $_REQUEST['ict'];

    

    $input_errors = array();

    if($bangla > 100 || $bangla < 0) {
        $input_errors['bangla'] = "Bangla mark invalid!";
    }

    if($english > 100 || $english < 0) {
        $input_errors['english'] = "English mark invalid!";
    }

    if($math > 100 || $math < 0) {
        $input_errors['math'] = "Math mark invalid!";
    }

    if($physics > 100 || $physics < 0) {
      $input_errors['physics'] = "Physics mark invalid!";
    }

    if($chemistry > 100 || $chemistry < 0) {
        $input_errors['chemistry'] = "Chemistry mark invalid!";
    }

    if($ict > 100 || $ict < 0) {
        $input_errors['ict'] = "ICT mark invalid!";
    }

    if (count($input_errors) == 0) {

        $roll_check = mysqli_query($con, "SELECT * FROM `marksheets` WHERE `roll` = '$roll'");
        $roll_check_row = mysqli_num_rows($roll_check);
    
        if($roll_check_row == 0) {
            $result = mysqli_query($con, "INSERT INTO `marksheets`(`name`, `roll`, `bangla`, `english`, `math`, `physics`, `chemistry`, `ict`) VALUES ('$name','$roll', '$bangla','$english','$math','$physics','$chemistry','$ict')");
    
            if($result){
                $_SESSION['success'] = "Student Add Successfully";
                header("location: add_student.php");
                exit(0);
            }else{
                $_SESSION['error'] = "Student Not Saved.!";
                header("location: add_student.php");
                exit(0);
            }
        }else{
            $_SESSION['error'] = "Roll Already exist!";
            header("location: add_student.php");
            exit(0);
        }
    }


}
?>
<!doctype html>
<html lang="en">

<head>
  <title>Add Student Marks</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <div class="card col-md-6 mx-auto  mt-4">
    <div class="card-header">
        <div class="d-flex justify-content-between ">
            <h4 class= "text-success">Add Student Mark</h4>
            <a href="../index.php" class="btn btn-sm btn-info text-light">All Student</a>
        </div>
    </div>
    
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
                <div class="col-6 mb-4">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter name" aria-label="First name" value="<?= isset($name) ? $name:'' ?>" required>
                    
                </div>
                <div class="col-6 mb-4">
                    <label for="">Roll</label>
                    <input type="text" class="form-control" name="roll" placeholder="Enter Roll" aria-label="Last name" value="<?= isset($roll) ? $roll:'' ?>"  required>
                </div>
               
                <div class="col-6 mb-4">
                    <label for="">Bangla</label>
                    <input type="text" class="form-control" name="bangla" placeholder="Enter Bangla Mark" aria-label="Last name" value="<?= isset($bangla) ? $bangla:'' ?>"  required>
                    <?php 
                    if(isset($input_errors['bangla'])){
                        echo '<span class="text-danger" >'.$input_errors['bangla'].'</span>';
                    }
                    ?>
                </div>
                <div class="col-6 mb-4">
                    <label for="">English</label>
                    <input type="text" class="form-control" name="english" placeholder="Enter English Mark" aria-label="Last name" value="<?= isset($english) ? $english:'' ?>"  required>
                    <?php 
                    if(isset($input_errors['english'])){
                        echo '<span class="text-danger" >'.$input_errors['english'].'</span>';
                    }
                    ?>
                </div>
                <div class="col-6 mb-4">
                    <label for="">Math</label>
                    <input type="text" class="form-control" name="math" placeholder="Enter Math Mark" aria-label="Last name" value="<?= isset($math) ? $math:'' ?>"  required>
                    <?php 
                    if(isset($input_errors['math'])){
                        echo '<span class="text-danger" >'.$input_errors['math'].'</span>';
                    }
                    ?>
                </div>
                <div class="col-6 mb-4">
                    <label for="">Physics</label>
                    <input type="text" class="form-control" name="physics" placeholder="Enter Physics Mark" aria-label="Last name" value="<?= isset($physics) ? $physics:'' ?>"  required>
                    <?php 
                    if(isset($input_errors['physics'])){
                        echo '<span class="text-danger" >'.$input_errors['physics'].'</span>';
                    }
                    ?>
                </div>
                <div class="col-6 mb-4">
                    <label for="">Chemistry</label>
                    <input type="text" class="form-control" name="chemistry" placeholder="Enter Chemistry Mark" aria-label="Last name" value="<?= isset($chemistry) ? $chemistry:'' ?>"  required>
                    <?php 
                    if(isset($input_errors['chemistry'])){
                        echo '<span class="text-danger" >'.$input_errors['chemistry'].'</span>';
                    }
                    ?>
                </div>
                <div class="col-6 mb-4">
                    <label for="">ICT</label>
                    <input type="text" class="form-control" name="ict" placeholder="Enter ICT Mark" aria-label="Last name" value="<?= isset($ict) ? $ict:'' ?>"  required>
                    <?php 
                    if(isset($input_errors['ict'])){
                        echo '<span class="text-danger" >'.$input_errors['ict'].'</span>';
                    }
                    ?>
                </div>
            </div>
            <button class="btn btn-sm btn-success" type="submit" name="add_student">Submit</button>
        </form>
    </div>

    <!-- footer -->

    <div class="card-footer text-body-secondary text-center">
         Enter your current information carefully!
    </div>

  </div>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>