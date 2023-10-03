
    <!-- here will php -->

<?php
 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> All Students </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


</head>
<body>
    <div class="container mt-4">
        <div class="card col-md-8 p-5 mx-auto">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3 class=" text-success">All Students</h3>
                   
                     <a href="./view/add_student.php" class="btn btn-sm btn-info text-light">Add Student</a>
                </div>

           
                <div class="card-body">
                    <?php
                        if(isset($_SESSION['success'])){

                    ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <?= $_SESSION['success']?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                        unset($_SESSION['success']);
                        }
                        if(isset($_SESSION['error'])){
                         
                    ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                            <?= $_SESSION['error'] ; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                        unset($_SESSION['error']);
                        } 
                    ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope= "col"> #</th>
                                <th scope= "col"> Name</th>
                                <th scope= "col"> Roll</th>
                                <!-- <th scope= "col"> Session</th> -->
                                <th scope= "col"> Status</th>
                                <th scope= "col"> Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $result = mysqli_query($con, "SELECT * FROM `marksheets` ");
                                $sl = 0;
                                while($row = mysqli_fetch_assoc($result)){
                                    $sl++;
                                 
                            ?>
                            <tr>
                                <th scope="row"> <?= $sl ?></th>
                                <td><?= $row['name']?></td>
                                <td><?= $row['roll']?></td>
                                
                                <td>
                                    <?php
                                        if($row['status'] == 1 ){
                                      
                                        ?>
                                        <a class="badge bg-success text-white" href="update.php? user_deactive=<?= $row['id']?>" > <i class="bx bx-transfer-alt me-1"></i>  Active </a>
                                        <?php
                                    }else{
                                        ?>
                                        <a class="badge bg-danger text-white"  href="update.php? user_active=<?= $row['id']?>"> <i class="bx bx-transfer-alt me-1"></i>  Deactive </a>
                                        <?php
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="edit.php? user_edit= <?= $row['id']?>"  class="fs-4 lh-4 text-mute "> <i class="bx bx-edit-alt"></i></a>
                                    <a target="_blank" href="view/marksheet.php? user_id= <?= $row['id']?>" class="fs-4 lh-4 text-mute"> <i class="bx bx-show"> </i></a>
                                    <a href="update.php?user_delete=<?= $row['id'] ?>" class="fs-4 lh-4 text-danger"><i class='bx bx-trash'></i></a>
                                </td>
                            </tr>
                            <?php

                             }

                            ?>
                        </tbody>
                    </table>
                 
                </div>
            </div>
        </div>
    </div>

    <!-- javascript -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
   <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    
</body>
</html>