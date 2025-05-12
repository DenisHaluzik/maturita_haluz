<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta name="generator" content="PSPad editor, www.pspad.com">
  <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #007BFF;
            margin-top: 20px;
        }
        .error-message {
            margin-top: 20px;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
            padding: 10px;
            border-radius: 5px;
        }
        button {
            background-color: #28a745; 
            color: white;
            border: none;
            padding: 10px 20px;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
        button:hover {
            background-color: #218838;
        }
    </style>
  <title></title>
  </head>
  <body>
  <div class="container">
<?php

$spojeni = mysqli_connect("localhost","root","","deskovky");
$Id_hry = $_POST['Id_hry'];
$Id_typu_hry = $_POST['Id_typu_hry'];
$Id_vydavatele = $_POST['Id_vydavatele'];
$nazev_hry = $_POST['nazev_hry'];
$cena_hry = $_POST['cena_hry'];
$narocnost_hry = $_POST['narocnost_hry'];
$doporuceny_vek = $_POST['doporuceny_vek'];
$pocet_hracu = $_POST['pocet_hracu'];
$pocet_rozsireni = $_POST['pocet_rozsireni'];

$dotaz = "INSERT INTO nh VALUES ('$Id_hry', '$Id_typu_hry', '$Id_vydavatele', '$nazev_hry', '$cena_hry', '$narocnost_hry', '$doporuceny_vek', '$pocet_hracu', '$pocet_rozsireni')";

if ($spojeni->query($dotaz) === TRUE) {
    echo "<h1>Záznam byl úspěšně zapsán!</h1>";
} else {
    echo "Error: " . $dotaz . "<br>" . $spojeni->error;
}
   
mysqli_close($spojeni);

?>
<button onclick="window.location.href='index.php'">Zpět na hlavní stránku</button>
  </body>
</html>