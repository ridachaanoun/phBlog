<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./output.css">
    
</head>
<body>
    <aside class="sidbare">
<ul id="articleList">
    <li class="nav"><span class="hello"><img src="./images/logo.png"><p>Bl<span class="candy">og</span> &nbsp;Manag<span class="candy">ement</span></p></span></li>
     <hr >
     <div class="items">
   
     <li><a href="/phBlog/src/dashboard.php" class="claso"><img src="./images/homte.png"><span>Dashboard</span></a></li>
        <li><a href="/phBlog/src/users/users.php" class="claso"><img src="./images/users.png"><span>Users</span></a></li>
        <li><a href="/phBlog/src/articles/articles.php" class="claso"><img src="./images/shooww.png"><span>Articles</span></a></li>
        <li><a href="/phBlog/src/comments/comments.php" class="claso" data-page="./comments/comments.php"><img src="./images/again.png"><span>Comments</span></a></li>
        <li><a href="/phBlog/src/categories/categories.php" class="claso" data-page="categories/categories.php"><img src="./images/dating-categories.jpg"><span>Categories</span></a></li>
        <li><a href="./setting/profile.php" class="claso" data-page="setting/profile.php"><img src="images/setting.png"><span>Setting</span></a></li>
    </div>
</ul>
    </aside>
    
    </div>
   
    <script>
        // Function to handle click event on list items
        function handleClick(event) {
            // Remove 'clicked' class from all list items
            const listItems = document.querySelectorAll('#articleList li');
            listItems.forEach(item => item.classList.remove('clicked'));
            
            // Add 'clicked' class to the clicked list item
            event.currentTarget.classList.add('clicked'); // Use currentTarget instead of target
        }

        // Add click event listener to list items
        const listItems = document.querySelectorAll('#articleList li');
        listItems.forEach(item => item.addEventListener('click', handleClick));
    </script>
    <script>
        // Add the clicked class to the second li element when the page loads
        document.addEventListener('DOMContentLoaded', function() {
            // Get the list of li elements
            var liElements = document.querySelectorAll('.sidbare li');
            // Check if there is a second li element
            if (liElements.length >= 2) {
                // Add the clicked class to the second li element
                liElements[1].classList.add('clicked');
            }
        });
    </script>
</body>
</html>