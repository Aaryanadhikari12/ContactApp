<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact APP</title>
    <style>
        h1 {
            background-color: green;
            color: #fff;
            padding: 20px;
        }
        table th,td{
            border:1px solid black;
        }
    </style>
</head>

<body>
    <header>
        <h1>Contact App</h1>
    </header>

    <form action="adddata.php" method="post">
        <div class="main">
            <label for="name">Name:</label><br>
            <input type="text" name="name" required id="name"><br><br>
            <label for="contact">Number:</label><br>
            <input type="number" name="contact" required id="contact"> <br> <br>
            <input type="submit" value="Save">

        </div>
    </form>

    <hr>
<h2>List of contacts.</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Phone no.</th>
            <th>Actions</th>
        </tr>


        <?php

        include 'db.php';
        $sql = "SELECT * FROM names";
        $result = mysqli_query($conn, $sql);

        if($result){
            while($row = mysqli_fetch_assoc($result)){
                $id = $row['id'];
                $name = $row['name'];
                $phone= $row['phone'];

                ?>
<tr>
    <td><?php echo $name ?></td>
    <td><?php echo $phone ?></td>
    <td>
    <a href="edit.php?id=<?php echo $id ?>">Update</a>
    <a href="delete.php?id=<?php echo $id ?>">Delete</a>
    </td>
</tr>
                <?php
            }
        }

        ?>
        

    </table>

</body>

</html>