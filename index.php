<?php     
    $conn = new mysqli("localhost", "root", "","ecmmerce");

    if($conn->connect_error){
        die("Failed connecting to DB:" . $conn->connect_error);
    }else{
        echo "Connection was successful!" . "<br>";
    }

    $sql = "SELECT itemcode, name FROM Product";
    $result = $conn->query($sql);  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, tr, td, th{
            border: 1px solid red;
        }

        th {
            background-color: blue;
            color: white;
        }
    </style>
</head>
<body>

    <h1>Product List</h1>
    <?php
        if($result->num_rows > 0){
            
            echo "<table>";
            echo "<tr>";
            echo "<th>Item Code</th>";
            echo "<th>Name</th>";
            echo "<tr>";

            while($row = $result->fetch_assoc()){
                echo "<tr>";
                echo "<td>". $row['itemcode'] ."</td>" ;
                echo "<td>". $row['name'] ."</td>" ;
                echo "</tr>";
            }

            echo '</table>';
        }
    ?>

    <form action="process.php" method="post">
        <fieldset>
            <label for="name">Name</label>
            <input type="text" name="name">
            <label for="itemcode">Item Code</label>
            <input type="text" name="itemcode">

            <input type="submit" value="submit" />
        </fieldset>
    </form>
    
</body>
</html>