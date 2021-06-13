<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
</head>
<body>
    <p><br/></p>
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>file</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php  
                include "config.php";
                $stmt =$db->prepare("select * from file");
                $stmt->execute();
                while($row=$stmt->fetch()){
                ?>
                    <tr>
                        <td><?php echo $row['id']?></td>
                        <td><?php echo $row['file_name']?></td>
                        <td class="text-center"><a href="download.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">Download</a></td>
                    </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>