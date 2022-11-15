<html>
    <head>
        <meta http-equiv="Content-Type" 
            content="text/html; charset=UTF-8">
   
        <title>Iš viso išleista suma</title>
   
        <link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

        <link rel="stylesheet" 
            href="css/style.css">
    </head>
   
    <body>   
        <div class="container mt-5">
            <a class='btn btn-danger' href="./client-menu.php">[Atgal]</a>


            <input type="date" id="myInput"  onkeyup="myFunction()" placeholder="start date">
            <input type="date" id="myInput2" onkeyup="myFunction()" placeholder="end date">

            <!-- top -->
            <?php
            include("client-connect.php");
            session_start();
            $userid=$_SESSION['userid'];
            $sql = "SELECT SUM(kaina) suma FROM pirkimai WHERE fk_vartotojas_id = '$userid'";
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                echo "<h1>Iš viso išleista suma</h1>";
                echo "<table class='table table-hover'>";
                echo "<tr><td><b>Suma</b></td></tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["suma"]. "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
            $con->close();

            ?>
        </div>
    </body>
</html>

        </div>