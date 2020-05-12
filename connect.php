<?php
$firstname = filter_input(INPUT_POST, 'vorname');
$name = filter_input(INPUT_POST, 'nachname');
if (!empty($firstname)) {
	if (!empty($name)) {
		$host = "localhost";
		$dbusername = "root";
		$dbpassword = "";
        $dbname = "Kundenverwaltung";
        
// Create connection
		$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

		if (mysqli_connect_error()) {
			die('Connect Error (' . mysqli_connect_errno() . ') '
				. mysqli_connect_error());
		} else {
			$sql = "INSERT INTO kunde (vorname, nachname) values ('$firstname','$name')";
			if ($conn->query($sql)) {
                echo "Daten wurden erfolgreich eingetragen!";
              //  sleep(0.9);
              //  header( 'Location: index.html' ); Rückleitung Zur Seite
			} else {
				echo "Fehler: " . $sql . " " . $conn->error;
			}
			$conn->close();
		}
	} else {
		echo "Nachname darf nicht leer sein";
		die(); // exit
	}
} else {
	echo "Vorname darf nicht leer sein";
	die(); // exit
}