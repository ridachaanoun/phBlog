<?php
$con = new PDO('mysql:host=localhost;dbname=blog_db', 'root', "");
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function getCommentsWithPagination($con, $offset, $limit)
{
    $stmt = $con->prepare("SELECT * FROM comments LIMIT :limit OFFSET :offset");
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function deleteArticle($con, $ID_comment)
{
    $stmt = $con->prepare("DELETE FROM comments WHERE ID_comment = :ID_comment");
    $stmt->bindParam(':ID_comment', $ID_comment, PDO::PARAM_INT);
    $stmt->execute();
}
if (isset($_POST['delete'])) {
    $ID_comment = $_POST['ID_comment'];
    deleteArticle($con, $ID_comment);
    header("Location: {$_SERVER['PHP_SELF']}");
    exit;
}
$commentsPerPage = 10;
$page = isset($_GET['page']) ? $_GET['page'] : 1;

$offset = ($page - 1) * $commentsPerPage;

$comments = getCommentsWithPagination($con, $offset, $commentsPerPage);

$totalComments = $con->query("SELECT COUNT(*) FROM comments")->fetchColumn();
$totalPages = ceil($totalComments / $commentsPerPage);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments</title>
    <link rel="stylesheet" href="../css/test.css">
    <link rel="stylesheet" href="../output.css">
    <link rel="stylesheet" href="../css/user.css">
    <style>
        .container tbody tr button {
            border: none;
            border-radius: 0;
            border-width: 0;
            outline: none;
            background-color: white;
            width: 0px;
            height: 0px;
        }

        tbody tr:nth-child(odd) button {
            background-color: #ccc;
        }
    </style>
</head>

<body>
    <?php include '../aside2.php'; ?>

    <section class="expression">
<p>View,Delete,You can use all features as Admin!!</p>
</section>
    <div class="container scrollable-container">
        <table class="articles-table">
      
            <thead>
            <tr class="items">
                    <th class="title" colspan="1">ALL Comments</th>
                    <th class="th" colspan="9"></th>

                </tr>
                <tr>
                    <th>ID</th>
                    <th>Content</th>
                    <th>Published Date</th>
                    <th>User ID</th>
                    <th>Article ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($comments as $comment) : ?>
                    <tr>
                        <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   &nbsp;     
                        <?php echo $comment['ID_comment']; ?></td>
                        <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;          
                        <?php echo $comment['Contenu_com']; ?></td>
                        <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;              
                        <?php echo $comment['Date_created_com']; ?></td>
                        <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;    
                        <?php echo $comment['ID_user']; ?></td>
                        <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;    
                        <?php echo $comment['ID_arti']; ?></td>
                        <td>  <form method="post" action="" class="inline-flex ml-2" onsubmit="return confirm('Are you sure you want to delete this comment?');">
    <input type="hidden" name="ID_comment" value="<?php echo $comment['ID_comment']; ?>">
    <button type="submit" name="delete" class="text-red-500 hover:text-red-700 p-2 no-border">
        <svg width="18px" height="18px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M17.7 23.3H6.3C5.3 23.3 4.6 22.5 4.6 21.5V6.6H19.4V21.5C19.4 22.5 18.6 23.3 17.7 23.3ZM20.4 6V4.2C20.4 3.5 19.8 2.8 19.1 2.8H15.4L14.6 1.4C14.4 1 14.1 0.8 13.6 0.8H10.4C9.9 0.8 9.6 1 9.4 1.4L8.6 2.8H4.9C4.2 2.8 3.6 3.5 3.6 4.2V6C3.6 6.3 3.9 6.6 4.2 6.6H19.8C20.1 6.6 20.4 6.3 20.4 6ZM8.8 10.2V19.7M12 10.2V19.7M15.2 10.2V19.7" stroke="red" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </button>
</form></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="pagination">
        <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
            <a href="?page=<?php echo $i; ?>" class="<?php echo $page == $i ? 'active' : ''; ?>"><?php echo $i; ?></a>
        <?php endfor; ?>
    </div>

</body>

</html>
