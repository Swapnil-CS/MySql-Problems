<?php
    include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Book Data Insertion</title>
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
    <h3>Data Insertion for table Book</h3>

    <form action ="insert.php" method="POST"><br><br>
        <table>
        <tr>
            <th>Attributes</th>
            <th>Data Fields</th>
        </tr>
        <tr>
            <td>Book ID</td>
            <td><input type="text" name="id" required placeholder="BXX format"></td>
        </tr>
        <tr>
            <td>Book Title</td>
            <td><input type="text" name="name" required placeholder=""></td>
        </tr>
        <tr>
            <td>Author Name</td>
            <td><input type="text" name="auth" required placeholder=""></td>
        </tr>
        <tr>
            <td>Subject</td>
            <td><input type="text" name="sub" required placeholder=""></td>
        </tr>
        <tr>
            <td>Edition</td>
            <td><input type="text" name="edn" required placeholder="Xth format"></td>
        </tr>  
        </table><br><br>
        <button type ="submit" name="insert">INSERT</button><br><br>
    </form> <br><br>
    
    
    <?php
        if (isset($_POST["insert"])) 
        {
            $id = $_POST["id"];
            $name = $_POST["name"];
            $auth = $_POST["auth"];
            $sub = $_POST["sub"];
            $edn = $_POST["edn"];
              
            $query = "select * from book where bid='$id'";
            $res = mysqli_query($con, $query);
            if (mysqli_num_rows($res) != 0) 
            {
                echo "<h3 style='color: red'>Book with same id already exsits</h3>";
            } 
            else 
            {
                $query = "insert into book values ('$id', '$name', '$auth', '$sub', '$edn');";
                $res = mysqli_query($con, $query);
                if ($res) 
                {
                    echo "<h3 style='color: green'>Book inserted succesfully</h3>";
                }
            }
        }
    ?>
</body>
</html>