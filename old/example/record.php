<?php
    session_start();

        if(!isset($_SESSION['username']))
         {
             header("Location:recordStaff.php");
         }

          echo "<b>Welcome to CRS Rescue Manager</b> " . $_SESSION['username'];

          echo "<br>Click <a style='color:red;' href='logout.php'> Logout Manager</a> to logout";
  ?>
<?php

            $conn = mysqli_connect("localhost", "root","","crsrescue_db");

            //check connection
            if ($conn->connect_error)
            {die("Connection Failed: ". $conn->connect_error);}

            $sql = "SELECT username, password, name, phone, position, dateJoin FROM tb_staffs";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
            echo "<tbody>
            <tr>
            <td>" . $row["username"]. "</td>
            <td>" . $row["password"] . "</td>
            <td>" . $row["name"]. "</td>
            <td>" . $row["phone"]. "</td>
            <td>" . $row["position"]. "</td>
            <td>" . $row["dateJoin"]. "</td>
            </tr>
            </tbody>";
            }

            echo "</table>";
            } else { echo "0 results"; }
            $conn->close();

            ?>
