<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="nova.css">
    <title>Insert Uzivatele</title>
</head>
<body>
<h2>Insert Uzivatele</h2>
<form method="post">
    <label for="idu">IDU:</label><br>
    <input type="number" id="idu" name="idu" value="" required><br>
    <label for="jmeno">Jméno:</label><br>
    <input type="text" id="jmeno" name="jmeno" required><br>
    <label for="prijmeni">Příjmení:</label><br>
    <input type="text" id="prijmeni" name="prijmeni" required><br>
    <label for="tel">Telefon:</label><br>
    <input type="tel" id="tel" name="tel" required><br>
    <label for="vek">Věk:</label><br>
    <input type="number" id="vek" name="vek" required><br>
    <label for="mail">Email:</label><br>
    <input type="email" id="mail" name="mail" required><br>
    <label for="zalozeni">Založení:</label><br>
    <input type="date" id="zalozeni" name="zalozeni" required><br><br>
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

    $idu = ($_POST['idu']);
    $jmeno = ($_POST['jmeno']);
    $prijmeni = ($_POST['prijmeni']);
    $tel = ($_POST['tel']);
    $vek = intval($_POST['vek']);
    $mail = ($_POST['mail']);
    $zalozeni = ($_POST['zalozeni']);

    $sql = "INSERT INTO uzivatele (IDU, jmeno, prijmeni, tel, vek, mail, zalozeni)
            VALUES ('$idu', '$jmeno', '$prijmeni', '$tel', '$vek', '$mail', '$zalozeni')";

    if ($conn->query($sql) === TRUE) {
        echo "Nový záznam úspěšně zapsán";
        header("Location: uzivatele.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
</body>
</html>
