<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="nova.css">
    <title>Document</title>
</head>
<body>
<h2>Delete clanku</h2>
<form method="post">
    <label for="idc">IDC:</label><br>
    <input type="number" id="idc" name="idc" value="" required><br>
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

    $idc = ($_POST['idc']);

    $sql = "DELETE FROM clanek WHERE IDC = $idc";

    if ($conn->query($sql) === TRUE) {
        echo "úspěšně vymazáno";
        header("Location: clanek.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    }
    ?>
</body>
</html>