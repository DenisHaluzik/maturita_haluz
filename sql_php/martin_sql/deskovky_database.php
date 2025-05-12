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

$dotaz = "select * from nh, vy, th where nh.idv=vy.idv and nh.idt=th.idt";
$vysledek = mysqli_query($spojeni, $dotaz);


if ($vysledek == false) :
    echo "Chyba!";
else :
    $vysledek = mysqli_query($spojeni, "select * from nh, vy, th where nh.idv=vy.idv and nh.idt=th.idt order by idh asc");
    echo "<H2>V tabulce deskových her jsou tyto záznamy: </H2>";
    echo "<table border=5 align=center><TR> <TH> Číslo hry<TH> Typ hry <TH> Název vydavatele <TH> Název hry <TH> Cena v Kč <TH> Náročnost <TH> Doporučený věk <TH> Počet hráčů <TH> Počet rozšíření <br>";
    while ($zaznam = mysqli_fetch_array($vysledek, MYSQLI_ASSOC))
        echo "<TR> <TD> " . $zaznam["idh"] ."<TD>" . $zaznam["nt"] . "<TD>" . $zaznam["nah"] . "<TD>" . $zaznam["nah"] . "<TD>" . $zaznam["ce"] . "<TD>" . $zaznam["naro"] . "<TD>" . $zaznam["dv"] . "<TD>" . $zaznam["ph"] . "<TD>" . $zaznam["ro"] . "<br>\n";
endif;   
mysqli_close($spojeni);

?>
  </body>
</html>