<?php
	// code source de user.php
	$host = "localhost";
	$user_mysql = "root"; // nom d'utilisateur de l'utilisateur de MySQL
	$password_mysql = ""; // mot de passe de l'utilisateur de MySQL
	$database = "sio_injections_sql";
	$db = mysqli_connect($host, $user_mysql, $password_mysql, $database);
	mysqli_set_charset($db, "utf8");
?>

<!DOCTYPE html>
	<html lang="fr">
		<head>
			<title>User</title>
			<meta charset="UTF-8" />
		</head>
	<body>
		<?php
			if (!empty($_GET['id'])) {
				$id = mysqli_real_escape_string($db, $_GET['id']);
				$query = "SELECT id, username FROM users WHERE id = ".$id;
				$rs_article = mysqli_query($db, $query);
				if (mysqli_num_rows($rs_article) == 1) {
					echo "<p>Utilisateur existant.</p>";
				} else {
					echo "<p>Utilisateur inexistant.</p>";
				}
			}
		?>
	</body>
</html>