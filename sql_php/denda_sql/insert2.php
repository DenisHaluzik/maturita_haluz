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
    <label for="text">Text:</label><br>
    <input type="text" id="text" name="text" required><br>
    <label for="vytvoreni">Vytvoření:</label><br>
    <input type="date" id="vytvoreni" name="vytvoreni" required><br>
    <input type="submit" value="Přidat">
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
    $text = ($_POST['text']);
    $vytvoreni = ($_POST['vytvoreni']);

    $sql = "INSERT INTO komentar (IDK, text, vytvoreni)
            VALUES ('$idk', '$text', '$vytvoreni')";

    if ($conn->query($sql) === TRUE) {
        echo "Nový záznam úspěšně zapsán";
        header("Location: koment.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>


</body>
</html>