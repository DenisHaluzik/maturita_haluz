<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta name="generator" content="PSPad editor, www.pspad.com">
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
<FORM action= "indesrt_deskovky.php" method="post">
    Zapište potřebné údaje o nové hře <br>
    Číslo: <input type="number" name="cislo">"> <br> <br>
    Název: <input type="text" name="nah">" size="30"> <br> <br>
    <input type="submit" value="odesli"> <br> <br>
</FORM>
<?php
    endif;
    mysqli_close($spojeni);
?>
  </body>
</html>