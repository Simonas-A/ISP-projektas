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
            <!-- top -->
            <div class="row">
                <div class="col-lg-8">
                    <h1>Iš viso išleista suma</h1>
                </div>
            </div>

            <?php
            include("client-connect.php");
            session_start();
            $userid=$_SESSION['userid'];
            echo "Jūsų vartotojo ID: " . $userid . "<br>";
            $sql = "SELECT SUM(kaina) suma FROM pirkimai WHERE fk_vartotojas_id = '$userid'";
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                echo "<h1>Iš viso išleista suma</h1>";
                echo "<table class='center' style=' width:75%; border-width: 2px; border-style: dotted'>";
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

