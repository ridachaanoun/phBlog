<?php
// Database connection
$con = new PDO('mysql:host=localhost;dbname=blog_db', 'root', "");
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function getArticles($con) {
    $stmt = $con->query("SELECT * FROM articles");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

if (isset($_POST['show_articles'])) {
    $articles = getArticles($con);
}

$articles = isset($articles) ? $articles : getArticles($con);
?>