
<?php
    require_once'../db_con.php';

    $id = $_GET['user_id'];
    $result = mysqli_query($con, "SELECT * FROM `marksheets` WHERE `id` = '$id' ");

    function Grate($marks){
        if($marks > 100){
            return "invalid!";
        }elseif( $marks >= 80 && $marks <= 100){
            return "A+";
        } elseif ($marks >= 70 && $marks <= 79) {
            return "A";
        } elseif ($marks >= 60 && $marks <= 69)  {
            return "A-";
        } elseif ($marks >= 50 && $marks <= 59)  {
            return "B";
        } elseif ($marks >= 40 && $marks <= 49 ) {
            return "C";
        } elseif ($marks >= 33 && $marks <= 39 ) {
            return "D";
        }else {
            return "F";
        } 
    }

    function Point($marks) {
        if ($marks > 100 ) {
            return "Invalid";
        } elseif ($marks >= 80 && $marks <= 100) {
            return "5.00";
        } elseif ($marks >= 70 && $marks <= 79) {
            return "4.00";
        } elseif ($marks >= 60 && $marks <= 69)  {
            return "3.50";
        } elseif ($marks >= 50 && $marks <= 59)  {
            return "3.00";
        } elseif ($marks >= 40 && $marks <= 49 ) {
            return "2.00";
        } elseif ($marks >= 33 && $marks <= 39 ) {
            return "1.00";
        }else {
            return "0.00";
        } 

    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Marksheet</title>
    <!-- Favicon -->
 
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin /> -->
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    
    <style>
        body{
            margin: 0;
        }
        .print-area{
        width: 760px;
        height: 1050px;
        margin: auto;
        box-sizing: border-box;
        page-break-after: always;
        }
        .data-info{
            margin-top: 60px;
        }
        .data-info table{
            width: 100%;
            border-collapse: collapse;
        }
        .data-info table th,
        .data-info table td{
            border: 1px solid black;
            padding: 4px;
            line-height: 2em;
            text-align: center;
        }
    </style>

</head>

<body onload="window.print()">
    <?php 
        $total = mysqli_num_rows($result);
        while($row = mysqli_fetch_assoc($result)){
        ?>
        <div class="print-area">
        
            <div class="data-info">
                <table>
                    <tr>
                        <th colspan="6">
                            Marksheet of a Student  <br><br>
                            <?= ucwords($row['name']) ?><br><br>
                            <?= $row['roll'] ?>
                        </th>
                    </tr>
                    <tr>
                        <th >Subject</th>
                        <th >Mark</th>
                        <th >Grate</th>
                        <th >Point</th>
                    </tr>
                    <tr>
                        <td>Bangla</td>
                        <td><?= $row['bangla'] ?></td>
                        <td><?= Grate($row["bangla"]) ?></td>
                        <td><?= Point($row["bangla"]) ?></td>
                    </tr>
                    <tr>
                        <td>English</td>
                        <td><?= $row['english'] ?></td>
                        <td><?= Grate($row["english"]) ?></td>
                        <td><?= Point($row["english"]) ?></td>
                    </tr>
                    <tr>
                        <td>Math</td>
                        <td><?= $row['math'] ?></td>
                        <td><?= Grate($row["math"]) ?></td>
                        <td><?= Point($row["math"]) ?></td>
                    </tr>
                    <tr>
                        <td>Physics</td>
                        <td><?= $row['physics'] ?></td>
                        <td><?= Grate($row["physics"]) ?></td>
                        <td><?= Point($row["physics"]) ?></td>
                    </tr>
                    <tr>
                        <td>Chemistry</td>
                        <td><?= $row['chemistry'] ?></td>
                        <td><?= Grate($row["chemistry"]) ?></td>
                        <td><?= Point($row["chemistry"]) ?></td>
                    </tr>
                    <tr>
                        <td>Ict</td>
                        <td><?= $row['ict'] ?></td>
                        <td><?= Grate($row["ict"]) ?></td>
                        <td><?= Point($row["ict"]) ?></td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                        <td >
                        GPA : 
                        <?php
                        if(Point($row["bangla"]) == 0 || Point($row["english"]) == 0 || Point($row["math"]) == 0 || Point($row["physics"]) == 0 || Point($row["chemistry"]) == 0 || Point($row["ict"]) == 0){
                            echo "F";
                        }else{
                            $total = Point($row["bangla"])+Point($row["english"])+Point($row["math"])+Point($row["physics"])+Point($row["chemistry"])+ Point($row["ict"]);
                            echo $gpa = $total/6;
                        }
                        ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <?php
        
        }
    ?>   
</body>
</html>     

