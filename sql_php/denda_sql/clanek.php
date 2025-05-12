<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="nova.css">
    <title>Článek</title>
</head>
<body>

<header>
<button class="action-button" onclick="location.href='ins.html'">Zpátky na hlavní stránku</button>
</header>

<h2>Clanek</h2>
	<table>
		<thead>
			<tr>
				<th>IDC</th>
				<th>Nadpis</th>
				<th>Obsah</th>
				<th>Publikace</th>
				<th>IDU</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$conn = mysqli_connect("localhost", "root", "", "bumbum");
			$result = mysqli_query($conn, "SELECT * FROM clanek");
			while($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $row["IDC"] . "</td>";
				echo "<td>" . $row["nadpis"] . "</td>";
				echo "<td>" . $row["obsah"] . "</td>";
				echo "<td>" . $row["publikace"] . "</td>";
				echo "<td>" . $row["IDU"] . "</td>";
				echo "</tr>";
			}
			mysqli_close($conn);
			?>
            
		</tbody>
	</table>
</body>

<div class="button-container">
    <button class="action-button" onclick="location.href='insert1.php'">Přidat</button>
    <button class="action-button" onclick="location.href='delete1.php'">Vymazat</button>
</div>
</html>