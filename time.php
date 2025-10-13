<?php
	// code source de time.php
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
		<title>Time</title>
		<meta charset="UTF-8" />
	</head>
	<body>
		<?php
			/*if (!empty($_GET['id'])) {
				$id = mysqli_real_escape_string($db, $_GET['id']);
				$query = "SELECT id, username FROM users WHERE id = ".$id;
				$rs_article = mysqli_query($db, $query);
			}*/
			if (ctype_digit($_GET['id'])) {
				$id = mysqli_real_escape_string($db, $_GET['id']);
				$p_query = $db->prepare("SELECT id, username FROM users WHERE id = ?");
				$p_query->bind_param("id");
				$p_query->execute();
				$p_query->store_result();
				if ($p_query->num_rows == 1) {
					$p_query->bind_result($id);
					$p_query->fetch();
				} else {
					echo "Cet ID n'existe pas";
				}
				$p_query->close();
				$db->close();
			}
		?>
	</body>
</html>