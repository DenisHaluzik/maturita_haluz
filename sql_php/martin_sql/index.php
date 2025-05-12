<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="generator" content="PSPad editor, www.pspad.com">
    <title>databaze</title>
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
        .buttons .vyhledani {
            background-color: #A020F0;
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
    $spojeni = mysqli_connect("localhost", "root", "", "deskovky");

    $dotaz = "select * from nh, vy, th where nh.idv=vy.idv and nh.idt=th.idt";
    $vysledek = mysqli_query($spojeni, $dotaz);

    if ($vysledek == false) :
        echo "Chyba!";
    else :
        $vysledek = mysqli_query($spojeni, "select * from nh, vy, th where nh.idv=vy.idv and nh.idt=th.idt order by idh asc");
        echo "<H1>Databáze stolních her</H1>";
        echo "<div class='container'>";
        echo "<div class='buttons'>";
        echo "<button class='vyhledani'><a href='vyhledani_deskovky.html'>Vyhledání her podle typu</a></button>";
        echo "<button class='insert'><a href='insert_deskovky.html'>Přidání nové hry</a></button>";
        echo "<button class='update'><a href='update_deskovky.html'>Upravení hry</a></button>";
        echo "<form action='delete_deskovky.html'>";
        echo "<input type='submit' value='Smazání hry z databáze' class='delete'>";
        echo "</form>";
        echo "</div>";
        echo "<table><tr> <th> Číslo hry</th> <th> Typ hry </th> <th> Název vydavatele </th> <th> Název hry </th> <th> Cena v Kč </th> <th> Náročnost </th> <th> Doporučený věk </th> <th> Počet hráčů </th> <th> Počet rozšíření </th></tr>";
        while ($zaznam = mysqli_fetch_array($vysledek, MYSQLI_ASSOC))
            echo "<tr> <td> " . $zaznam["idh"] ."</td><td>" . $zaznam["nt"] . "</td><td>" . $zaznam["na"] . "</td><td>" . $zaznam["nah"] . "</td><td>" . $zaznam["ce"] . "</td><td>" . $zaznam["naro"] . "</td><td>" . $zaznam["dv"] . "</td><td>" . $zaznam["ph"] . "</td><td>" . $zaznam["ro"] . "</td></tr>";
        echo "</table>";
        echo "</div>";
    endif;
    mysqli_close($spojeni);
    
    ?>
</body>
</html>