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
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        form {
            max-width: 600px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #007BFF;
            text-align: center;
        }
        input[type="text"], input[type="number"], select {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
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
<?php
$spojeni = mysqli_connect("localhost","root","","deskovky");
$dotaz = "select * from nh where idh = '" . $_POST['cislo'] ."'";
$vysledek = mysqli_query($spojeni, $dotaz);
$zaznam = mysqli_fetch_array($vysledek, MYSQLI_ASSOC);
if ($zaznam == false):
    echo "Taková desková hra v tabulce není!";
else:
?>
<h1>Vybrali jste tuto hru: </h1>
<FORM action= "update_deskovky.php" method="post">
    <br>
    <input type="hidden" name="cislo" value="<?php echo $zaznam["idh"] ?>">      
    Název hry: <input type="text" name="nah" value="<?php echo $zaznam["nah"]?>" size="30"><br>
    Typ hry: 
        <select name="idt" value="<?php echo $zaznam["idt"]?>">
            <option value="1">Strategie</option>
            <option value="2">Společenská</option>
            <option value="3">Logická</option>
            <option value="4">Karetní</option>
            <option value="5">Desková</option>
        </select><br>
    Vydavatel: 
        <select name="idv" value="<?php echo $zaznam["idv"]?>">
            <option value="1">ALBI</option>
            <option value="2">AEG</option>
            <option value="3">MINDOK</option>
            <option value="4">Czech Games Edition</option>
            <option value="5">Blackfire</option>
        </select><br>
        Cena hry: <input type="number" name="cena_hry" value="<?php echo $zaznam["ce"]?>"><br>
        Náročnost hry: <input type="text" name="narocnost_hry" value="<?php echo $zaznam["naro"]?>" ><br>
        Doporučený věk: <input type="text" name="doporuceny_vek" value="<?php echo $zaznam["dv"]?>"><br>
        Počet hráčů: <input type="text" name="pocet_hracu" value="<?php echo $zaznam["ph"]?>"><br>
        Počet rozšíření: <input type="number" name="pocet_rozsireni" value="<?php echo $zaznam["ro"]?>"><br>
        <br>
        <input type="submit" value="Odeslat">
</FORM>
<button onclick="window.location.href='index.php'">Návrat na hlavní stránku</button>
<?php
    endif;
    mysqli_close($spojeni);
?>
  </body>
</html>