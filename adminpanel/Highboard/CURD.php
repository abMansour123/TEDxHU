<?php
include("/xampp/htdocs/tedx/shared/config.php");

$select = "SELECT * FROM (`highboard`
join `sections` 
on `highboard`.`highboard_section`=`sections`.`section_id`)
";
$runselect = mysqli_query($conn, $select);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="table.css">
    <title>Table</title>
</head>
<body>
<?php include '../nav/nav.php';?>
    <table>
        <tr>
            <th colspan="8" style="font-size:x-large;" id="header">HighBoard <span style="float: right; padding-right:20px;"><a class="add" href="HighBoard.php">+</a></span></th>
        </tr>

        <tr id="header">
            <th>Name</th>
            <th>Postion</th>
            <th>section</th>
            <th>Image</th>
            <th colspan="2">action</th>
        </tr>
        <tbody>
        
        <?php foreach ($runselect as $data) {  ?>
                        <tr>
                            <td><?php echo $data['highboard_name']; ?></td>
                            <td><?php echo $data['highboard_position']; ?></td>
                            <td><?php echo $data['section_name']; ?></td>
                            <td><img width="150" height="100" src="/tedx/upload/<?php echo $data['highboard_image']; ?>"></td>
                            <td><a class="edit" href="HighBoard.php?edit=<?php echo $data['highboard_id']; ?>">EDIT</a></td>
                            <td><a class="delete" href="CURD.php?delete=<?php echo $data['highboard_id']; ?>">DELETE</a></td>
                        </tr>
                </tbody>
            <?php } ?>
    </table>
    
</body>
</html>
<?php

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE FROM `highboard` WHERE `highboard_id`='$id'";
    $deleteRun = mysqli_query($conn, $delete);

        header('location:CURD.php');
    
}
