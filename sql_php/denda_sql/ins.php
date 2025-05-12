<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="nova.css">
	<title>bumbum Database</title>
	<style>
		table {
			border-collapse: collapse;
		}
		th, td {
			border: 1px solid #ddd;
			padding: 8px;
			text-align: left;
		}
	</style>
</head>
<body>
	<h1>bumbum Database</h1>
	
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
	<h2>Update uzivatele</h2>
    <form action="moje.php" method="post">
        <label for="idu">IDU:</label><br>
        <input type="number" id="idu" name="idu" value="0"><br>
        <label for="jmeno">Jméno:</label><br>
        <input type="text" id="jmeno" name="jmeno"><br>
        <label for="prijmeni">Příjmení:</label><br>
        <input type="text" id="prijmeni" name="prijmeni"><br>
        <label for="tel">Telefon:</label><br>
        <input type="tel" id="tel" name="tel"><br>
        <label for="vek">Věk:</label><br>
        <input type="text" id="vek" name="vek"><br>
        <label for="mail">Email:</label><br>
        <input type="email" id="mail" name="mail"><br>
        <label for="zalozeni">Založení:</label><br>
        <input type="date" id="zalozeni" name="zalozeni"><br>
        <input type="submit" value="Update"><input type="submit" value="submit">
      </form>
<br><br><br>
    <h2>Insert Koment</h2>
      <form action="insert.php" method="post">
    <label for="IDK">IDK:</label><br>
    <input type="text" id="IDK" name="IDK" required><br>
    <label for="text">Text:</label><br>
    <input type="text" id="text" name="text" required><br>
    <label for="vytvoreni">Creation date:</label><br>
    <input type="date" id="vytvoreni" name="vytvoreni" required><br>
    <input type="submit" value="Submit">
</form>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bumbum";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$IDK = $_POST['IDK'];
$text = $_POST['text'];
$vytvoreni = $_POST['vytvoreni'];

$sql = "INSERT INTO komentar (IDK, text, vytvoreni)
VALUES ('$IDK', '$text', '$vytvoreni')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>