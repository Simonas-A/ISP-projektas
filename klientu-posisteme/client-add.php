<link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<table class="center" style=" width:75%; border-width: 2px; border-style: dotted;">
<tr><td width=30%><a href="./client-menu.php">[Atgal]</a></td><td width=30%> 
</table>
<h1>You can add new client here</h1>
<form action="client-add.php" method="POST">
<table class="center" style=" width:75%; border-width: 2px; border-style: dotted;">
<tr><td>Client name:</td><td><input type="text" name="name" value=""></td></tr>
<tr><td>Client surname:</td><td><input type="text" name="surname" value=""></td></tr>
<tr><td>Client username:</td><td><input type="text" name="username" value=""></td></tr>
<tr><td>Client email:</td><td><input type="text" name="email" value=""></td></tr>
<tr><td>Client phone:</td><td><input type="text" name="phone" value=""></td></tr>
</table>
<button type="submit">Add client</button>
</form>
<?php
include("client-connect.php");
if (!empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['phone'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = substr(hash('sha256', $surname),5,32);
    $userid = substr(hash('sha256', $username),5,32);
    $sql = "INSERT INTO users (name, surname, username, password, userid, userlevel, email, phone, type) VALUES
                    ('$name', '$surname', '$username', '$password', '$userid', 4, '$email', '$phone', 'klientas')";
    if ($con->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $con->close();
}
else {
    echo "Please fill all fields";
}
?>