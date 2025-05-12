<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vyvyvyvyyyspti</title>
</head>
<body>
    <h1>zaznamy</h1>

    <?php
        $s = mysqli_connect("localhost","root","","nova");
        $d = "insert into odd values(" . $_POST['cislo'] . ",'". $_POST['nazev'] . "')";
        $v = mysqli_query($s, $d);
        $vysledek = mysqli_query($s,"select * from odd ");
        while ($z = mysqli_fetch_array($vysledek))
            echo "cislo: ". $z["ido"] . "Nazev: " . $z["nazev"] . "<br>\n";
        mysqli_close($s);

    ?> 
</body>
</html>