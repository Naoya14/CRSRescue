<?php
    session_start();

        if(!isset($_SESSION['username']))
         {
             header("Location:loginmanager.php");
         }

          echo "<b>Welcome to Meha Hospital Manager</b> " . $_SESSION['username'];

          echo "<br>Click <a style='color:red;' href='logoutmanager.php'> Logout Manager</a> to logout";
  ?>
<?php

            $conn = mysqli_connect("localhost", "root","","mehahospital");

            //check connection
            if ($conn->connect_error)
            {die("Connection Failed: ". $conn->connect_error);}

            $sql = "SELECT testerID, testerusername, testerpassword, testername, testcentre FROM recordtester";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
            echo "<tbody>
            <tr>
            <td>" . $row["testerID"]. "</td>
            <td>" . $row["testerusername"] . "</td>
            <td>" . $row["testerpassword"]. "</td>
            <td>" . $row["testername"]. "</td>
            <td>" . $row["testcentre"]. "</td>
            </tr>
            </tbody>";
            }

            echo "</table>";
            } else { echo "0 results"; }
            $conn->close();

            ?>
