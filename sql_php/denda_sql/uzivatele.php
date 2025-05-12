<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="nova.css">
    <title>Uživatel</title>
</head>
<body>
<header>
<button class="action-button" onclick="location.href='ins.html'">Zpátky na hlavní stránku</button>
</header>

<h2>Uzivatele</h2>
<table>
    <thead>
        <tr>
            <th>IDU</th>
            <th>Jmeno</th>
            <th>Prijmeni</th>
            <th>Tel</th>
            <th>Vek</th>
            <th>Mail</th>
            <th>Zalozeni</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "bumbum");
        $result = mysqli_query($conn, "SELECT * FROM uzivatele");
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["IDU"] . "</td>";
            echo "<td>" . $row["jmeno"] . "</td>";
            echo "<td>" . $row["prijmeni"] . "</td>";
            echo "<td>" . $row["tel"] . "</td>";
            echo "<td>" . $row["vek"] . "</td>";
            echo "<td>" . $row["mail"] . "</td>";
            echo "<td>" . $row["zalozeni"] . "</td>";
            echo "</tr>";
        }
            
        mysqli_close($conn);
        ?>
    </tbody>
</table>

<div class="button-container">
    <button class="action-button" onclick="location.href='update.php'">Upravit</button>
    <button class="action-button" onclick="location.href='insert.php'">Přidat</button>
    <button class="action-button" onclick="location.href='delete.php'">Vymazat</button>
</div>
</body>
</html>
