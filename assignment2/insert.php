<?php
    include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Room Data Insertion</title>
  <style>
    table,
    th,
    td {
      border: 1px solid black;
      border-collapse: collapse;
    }
    th,
    td {
      padding: 5px 10px;
    }

  </style>
</head>

<body>
    <h3>Data Insertion for table Room</h3>

    <form action ="insert.php" method="POST"><br><br>
        <table>
        <tr>
            <th>Attributes</th>
            <th>Data Fields</th>
        </tr>
        <tr>
            <td>Room Number</td>
            <td><input type="text" name="num" required placeholder="RXX format"></td>
        </tr>
        <tr>
            <td>Room Type</td>
            <td><input type="text" name="type" required placeholder=""></td>
        </tr>
        <tr>
            <td>Floor</td>
            <td><input type="text" name="flr" required placeholder="in words"></td>
        </tr>
        <tr>
            <td>Rate</td>
            <td><input type="number" name="rate" required placeholder="4 digits"></td>
        </tr> 
        </table><br><br>
        <button type ="submit" name="insert">INSERT</button><br><br>
    </form> <br><br>
    
    
    <?php
        if (isset($_POST["insert"])) 
        {
            $num = $_POST["num"];
            $type = $_POST["type"];
            $flr = $_POST["flr"];
            $rate = $_POST["rate"];
              
            $query = "select * from room where rno='$num'";
            $res = mysqli_query($con, $query);
            if (mysqli_num_rows($res) != 0) 
            {
                echo "<h3 style='color: red'>Room with same room number already exsits</h3>";
            } 
            else 
            {
                $query = "insert into room values ('$num', '$type', '$flr', $rate);";
                $res = mysqli_query($con, $query);
                if ($res) 
                {
                    echo "<h3 style='color: green'>Room inserted succesfully</h3>";
                }
            }
        }
    ?>
</body>
</html>