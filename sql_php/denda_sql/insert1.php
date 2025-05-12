<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="nova.css">
    <title>Insert Uzivatele</title>
</head>
<body>
<h2>Insert Clanku</h2>
<form method="post">
    <label for="idc">IDC:</label><br>
    <input type="number" id="idc" name="idc" value="" required><br>
    <label for="Nadpis">Nadpis:</label><br>
    <input type="text" id="nadpis" name="nadpis" required><br>
    <label for="obsah">Obsah:</label><br>
    <input type="text" id="obsah" name="obsah" required><br>
    <label for="publikace">Publikace:</label><br>
    <input type="date" id="publikace" name="publikace" required><br>
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

    $idc = ($_POST['idc']);
    $nadpis = ($_POST['nadpis']);
    $obsah = ($_POST['obsah']);
    $publikace = ($_POST['publikace']);

    $sql = "INSERT INTO clanek (IDC, nadpis, obsah, publikace)
            VALUES ('$idc', '$nadpis', '$obsah', '$publikace')";

    if ($conn->query($sql) === TRUE) {
        echo "Nový záznam úspěšně zapsán";
        header("Location: clanek.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
</body>
</html>
