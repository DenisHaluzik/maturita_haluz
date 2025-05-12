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
$dotaz = "update nh set nah = '" . $_POST['nah'] ."' where idh = '" . $_POST['cislo'] ."'";
$vysledek = mysqli_query($spojeni, $dotaz);

if ($vysledek == false) :
    echo "Chyba!";
else :
    $vysledek = mysqli_query($spojeni, "select * from nh order by idh asc");
    echo "<H2>V tabulce deskových her jsou nyní tyto záznamy: </H2>";
    echo "<table border=5 align=center><TR> <TH> Číslo hry<TH> Název hry <br>";
    while ($zaznam = mysqli_fetch_array($vysledek, MYSQLI_ASSOC))
        echo "<TR> <TD> " . $zaznam["idh"] ."<TD>" . $zaznam["nah"] . "<br>\n";
endif;   
mysqli_close($spojeni);

?>
  </body>
</html>