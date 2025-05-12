<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta name="generator" content="PSPad editor, www.pspad.com">
  <title></title>
  <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .container {
            display: flex;
            align-items: flex-start;
            justify-content: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
        .buttons {
            display: flex;
            flex-direction: column;
            margin-right: 20px;
        }
        .buttons button, .buttons form {
            display: block;
            margin-bottom: 10px;
        }
        .buttons a {
            text-decoration: none;
            color: white;
        }
        .buttons .update {
            background-color: #FFA500;
        }
        .buttons .insert {
            background-color: #28a745;
        }
        .buttons .delete {
            background-color: #dc3545; 
        }
        .buttons button, .buttons input[type="submit"] {
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
        }
        .buttons button:hover, .buttons input[type="submit"]:hover {
            opacity: 0.8;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-left: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        h1 {
            margin-bottom: 20px;
        }
    </style>
  </head>
  <body>
<?php
$spojeni = mysqli_connect("localhost","root","","deskovky");
$Id_typu_hry =$_POST['Id_typu_hry'];

$dotaz = "select * from nh, vy, th where nh.idv=vy.idv and nh.idt=th.idt";
$vysledek = mysqli_query($spojeni, $dotaz);


if ($vysledek == false) :
    echo "Chyba!" . $dotaz . "<br>" . $spojeni->error;
else :
    $vysledek = mysqli_query($spojeni, "select * from nh, vy, th where nh.idv=vy.idv and nh.idt=th.idt and nt='$Id_typu_hry' order by idh asc");
    echo "<H2>V tabulce deskových her jsou tyto záznamy: </H2>";
    echo "<table border=5 align=center><TR> <TH> Číslo hry<TH> Typ hry <TH> Název vydavatele <TH> Název hry <TH> Cena v Kč <TH> Náročnost <TH> Doporučený věk <TH> Počet hráčů <TH> Počet rozšíření <br>";
    while ($zaznam = mysqli_fetch_array($vysledek, MYSQLI_ASSOC))
        echo "<TR> <TD> " . $zaznam["idh"] ."<TD>" . $zaznam["nt"] . "<TD>" . $zaznam["na"] . "<TD>" . $zaznam["nah"] . "<TD>" . $zaznam["ce"] . "<TD>" . $zaznam["naro"] . "<TD>" . $zaznam["dv"] . "<TD>" . $zaznam["ph"] . "<TD>" . $zaznam["ro"] . "<br>\n";
    
endif; 
mysqli_close($spojeni);

?>
</table>
  <button onclick="window.location.href='index.php'">Návrat na hlavní stránku</button>
  </body>
</html>