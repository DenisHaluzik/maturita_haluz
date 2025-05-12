<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="nova.css">
    <title>Delete Uzivatele</title>
</head>
<body>
<h2>Delete Uzivatele</h2>
<form method="post">
    <label for="idu">IDU:</label><br>
    <input type="number" id="idu" name="idu" value="" required><br><br>
    <input type="submit" value="Vymazat">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bumbum";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $idu = ($_POST['idu']);

    $sql = "DELETE FROM uzivatele WHERE IDU = $idu";

    if ($conn->query($sql) === TRUE) {
        echo "úspěšně vymazáno";
        header("Location: uzivatele.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
</body>
</html>

</body>
</html>