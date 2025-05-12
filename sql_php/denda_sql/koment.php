<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="nova.css">
    <title>Komentáře</title>
</head>
<body>

<header>
<button class="action-button" onclick="location.href='ins.html'">Zpátky na hlavní stránku</button>
</header>

<h2>Komentar</h2>
	<table>
		<thead>
			<tr>
				<th>IDK</th>
				<th>Text</th>
				<th>Vytvoreni</th>
				<th>IDC</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$conn = mysqli_connect("localhost", "root", "", "bumbum");
			$result = mysqli_query($conn, "SELECT * FROM komentar");
			while($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $row["IDK"] . "</td>";
				echo "<td>" . $row["text"] . "</td>";
				echo "<td>" . $row["vytvoreni"] . "</td>";
				echo "<td>" . $row["IDC"] . "</td>";
				echo "</tr>";
			}
			mysqli_close($conn);
			?>
		</tbody>
	</table>

    <div class="button-container">
    <button class="action-button" onclick="location.href='insert2.php'">Přidat</button>
    <button class="action-button" onclick="location.href='delete2.php'">Vymazat</button>
</div>
</body>
</html>