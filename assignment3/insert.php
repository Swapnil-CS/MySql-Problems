<?php
    include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Employee Data Insertion</title>
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
    <h3>Data Insertion for table Employee</h3>

    <form action ="insert.php" method="POST"><br><br>
        <table>
        <tr>
            <th>Attributes</th>
            <th>Data Fields</th>
        </tr>
        <tr>
            <td>Employee ID</td>
            <td><input type="text" name="id" required placeholder="EXX format"></td>
        </tr>
        <tr>
            <td>Employee Name</td>
            <td><input type="text" name="name" required placeholder=""></td>
        </tr>
        <tr>
            <td>Date of Birth</td>
            <td><input type="date" name="dob" required placeholder=""></td>
        </tr>
        <tr>
            <td>Salary</td>
            <td><input type="number" name="sal" required placeholder="5 digits"></td>
        </tr>
        <tr>
            <td>Department Number</td>
            <td><input type="text" name="dno" required placeholder="DXX format"></td>
        </tr>
        <tr>
            <td>Gender</td>
            <td><input type="text" name="gen" required placeholder=""></td>
        </tr>  
        </table><br><br>
        <button type ="submit" name="insert">INSERT</button><br><br>
    </form> <br><br>
    
    
    <?php
        if (isset($_POST["insert"])) 
        {
            $id = $_POST["id"];
            $name = $_POST["name"];
            $dob = $_POST["dob"];
            $sal = $_POST["sal"];
            $dno = $_POST["dno"];
            $gen = $_POST["gen"];
              
            $query = "select * from employee where eid='$id'";
            $res = mysqli_query($con, $query);
            if (mysqli_num_rows($res) != 0) 
            {
                echo "<h3 style='color: red'>Employee with same id already exsits</h3>";
            } 
            else 
            {
                $query = "insert into employee values ('$id', '$name', '$dob', $sal, '$dno', '$gen');";
                $res = mysqli_query($con, $query);
                if ($res) 
                {
                    echo "<h3 style='color: green'>Employee inserted succesfully</h3>";
                }
            }
        }
    ?>
</body>
</html>