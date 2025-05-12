<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="generator" content="PSPad editor, www.pspad.com">
    <title>Úprava záznamu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        h1 {
            color: #007BFF; 
          
        }
        h2 {
            color: #FF0000; 
          
        }
        .container {
            max-width: 600px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
        }
        p {
            margin-top: 20px;
            font-size: 18px;
            color: #28a745;
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
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }
        button:hover {
            background-color: #218838; 
        }
    </style>
</head>
<body>
<div class="container">
<?php
  
$spojeni = mysqli_connect("localhost","root","","deskovky");
$nah = $_POST["nah"];
$idv = $_POST['idv'];
$idt = $_POST['idt'];
$ce = $_POST['cena_hry'];
$naro = $_POST['narocnost_hry'];
$dv = $_POST['doporuceny_vek'];
$ph = $_POST['pocet_hracu'];
$ro = $_POST['pocet_rozsireni'];
$dotaz = "update nh set nah = '" . $nah ."', idt = '" . $idt ."', idv = '" . $idv ."', ce = '" . $ce ."', naro = '" . $naro ."', dv = '" . $dv ."', ph = '" . $ph ."', ro = '" . $ro ."' where idh = '" . $_POST['cislo'] ."'";
$vysledek = mysqli_query($spojeni, $dotaz);

if ($spojeni->query($dotaz) === TRUE) {
  echo "<h1>Záznam byl úspěšně změněn!</h1>";
} else {
  echo "<p class='error-message'>Error: " . $dotaz . "<br>" . $spojeni->error . "</p>";
}
 
mysqli_close($spojeni);

?>
<button onclick="window.location.href='index.php'">Zpět na hlavní stránku</button>

</body>
</html>
