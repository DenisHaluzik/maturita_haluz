<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="nova.css">
    <title>insert</title>
</head>
<body>
<h2>Insert komentar</h2>
<form method="post">
    <label for="idk">IDK:</label><br>
    <input type="number" id="idk" name="idk" value="" required><br>
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

    $idk = ($_POST['idk']);

    $sql = "DELETE FROM komentar WHERE IDK = $idk";

    if ($conn->query($sql) === TRUE) {
        echo "úspěšně vymazáno";
        header("Location: koment.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
