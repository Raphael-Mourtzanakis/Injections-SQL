<?php
// code source de articles.php
$host = "localhost";
$user_mysql = "root"; // nom d'utilisateur de l'utilisateur de MySQL
$password_mysql = ""; // mot de passe de l'utilisateur de MySQL
$database = "sio_injections_sql";
$db = mysqli_connect($host, $user_mysql, $password_mysql, $database);
mysqli_set_charset($db, "utf8");
?>
<!DOCTYPE>
<html>
<head>
    <title></title>
</head>
<body>
<?php
if(ctype_digit($_GET['category'])) // Vérifier si chaque caractère dans la valeur de category est un chiffre
{
    $category = mysqli_real_escape_string($db, $_GET['category']);
    $p_query = $db->prepare("SELECT id, title, DATE_FORMAT(date, '%d/%m/%Y') AS date FROM articles WHERE category_id = ?");
    $p_query->bind_param('id','category');
    $p_query->execute();
         
    $p_query->bind_result($id, $title, $date);
    while($p_query->fetch())
        {
            echo "<li><a href=\"#\">".$id." ".$title." ".$date."</a></li><br>";
        }
}
?>
</body>
</html>