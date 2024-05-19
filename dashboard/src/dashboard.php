<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
        <link rel="stylesheet" href="./cards.css">
        <link rel="stylesheet" href="../css/test.css">
    <link rel="stylesheet" href="../output.css">
    <link rel="stylesheet" href="../css/user.css">
    <style>
      
    </style>
</head>
<body>
    
    <?php include 'sidebar.php' ?>

    <div class="containerr">
        <div class="grid">
            <!-- Card 1 -->
            <div class="card f">
            &nbsp;&nbsp;
                <h2><svg width=55px fill="#040985" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5 5a5 5 0 0 1 10 0v2A5 5 0 0 1 5 7V5zM0 16.68A19.9 19.9 0 0 1 10 14c3.64 0 7.06.97 10 2.68V20H0v-3.32z"/></svg></h2>
                <h3>Admin<h3/>
            </div>
            <!-- Card 2 -->
            <div class="card f">
               <img src="./images/shooww.png">
                <h3>30 Articles</h3>
            </div>
            <!-- Card 3 -->
            <div class="card f">
               <img src="./images/users.png">
                <h3>50 Users</h3>
            </div>
        </div>
        <div class="grid">
            <!-- Card 1 -->
            <div class="cardd ">
            &nbsp;&nbsp;
               <img src="./images/homte.png"></br>
               <button><a href="dashboard.php">Dashboard<svg fill="white" width="15px" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><title/><g data-name="1" id="_1"><path d="M202.1,450a15,15,0,0,1-10.6-25.61L365.79,250.1,191.5,75.81A15,15,0,0,1,212.71,54.6l184.9,184.9a15,15,0,0,1,0,21.21l-184.9,184.9A15,15,0,0,1,202.1,450Z"/></g></svg></a></button>
            </div>
            <!-- Card 2 -->
            <div class="cardd">
               <img src="./images/users.png">
               </br><a href="users/users.php"><button>Users <svg fill="white" width="15px" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><title/><g data-name="1" id="_1"><path d="M202.1,450a15,15,0,0,1-10.6-25.61L365.79,250.1,191.5,75.81A15,15,0,0,1,212.71,54.6l184.9,184.9a15,15,0,0,1,0,21.21l-184.9,184.9A15,15,0,0,1,202.1,450Z"/></g></svg></a></button>
            </div>
            <!-- Card 3 -->
            <div class="cardd">
               <img src="./images/shooww.png">
           </br><a href="articles/articles.php"><button>Articles <svg fill="white" width="15px" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><title/><g data-name="1" id="_1"><path d="M202.1,450a15,15,0,0,1-10.6-25.61L365.79,250.1,191.5,75.81A15,15,0,0,1,212.71,54.6l184.9,184.9a15,15,0,0,1,0,21.21l-184.9,184.9A15,15,0,0,1,202.1,450Z"/></g></svg></a></button>
            </div>
            
        </div>
        <div class="grid">
            <!-- Card 1 -->
            <div class="cardd ">
            &nbsp;&nbsp;
            <img src="./images/again.png">
           </br><a href="comments/comments.php"><button>Comments<svg fill="white" width="15px" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><title/><g data-name="1" id="_1"><path d="M202.1,450a15,15,0,0,1-10.6-25.61L365.79,250.1,191.5,75.81A15,15,0,0,1,212.71,54.6l184.9,184.9a15,15,0,0,1,0,21.21l-184.9,184.9A15,15,0,0,1,202.1,450Z"/></g></svg></a></button>
            </div>
            <!-- Card 2 -->
            <div class="cardd">
               <img src="./images/dating-categories.jpg">
               </br><a href="categories/categories.php"><button>Categories<svg fill="white" width="15px" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><title/><g data-name="1" id="_1"><path d="M202.1,450a15,15,0,0,1-10.6-25.61L365.79,250.1,191.5,75.81A15,15,0,0,1,212.71,54.6l184.9,184.9a15,15,0,0,1,0,21.21l-184.9,184.9A15,15,0,0,1,202.1,450Z"/></g></svg></a></button>
            </div>
          
            
        </div>
    </div>
</body>
</html>
