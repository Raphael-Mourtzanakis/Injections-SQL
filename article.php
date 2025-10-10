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
if(!empty($_GET['category']))
{
    $category = mysqli_real_escape_string($db, $_GET['category']);
    $query = "SELECT id, title, DATE_FORMAT(date, '%d/%m/%Y') AS date FROM articles WHERE category_id = ".$category;
    $rs_articles = mysqli_query($db, $query);
    echo "<u>\n";
    if(mysqli_num_rows($rs_articles) > 0)
    {
        while($r = mysqli_fetch_assoc($rs_articles))
        {
            echo "<li><a href=\"#\">".htmlspecialchars($r['title'])." - ".$r['date']."</a></li>\n";
        }
    }
    echo "</u>\n";
}
?>
</body>
</html>