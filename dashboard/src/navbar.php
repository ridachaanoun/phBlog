<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="output.css">
    <link rel="stylesheet" href="css/user.css">
</head>

<body class="blok">


    <main>
        <div class="pages">
            <span>Pages / <a href="#">Dashboard</a></span>
            <span><a href="#">Dashboard</a></span>
        </div>
        <div class="search">
            <svg class="feather feather-search" style="color: #ACA7A7;" fill="white" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                <circle cx="11" cy="11" r="8"/>
                <line x1="21" x2="16.65" y1="21" y2="16.65"/>
            </svg>
            <input id="searchInput" placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Type here...">
        </div>

        <div class="logout">
            <h5 id="admin">Admin</h5>
            <h5><a href="#"><img class="img" src="./images/image.png">&nbsp;Logout</a></h5>
            <img id="setting" class="img" src="./images/setting-svg.png">
        </div>

       
    </main>
  
  
</section>
<footer class="footer">
    <p>&copy; 2024 🖤 Copyright Blog Management.</p></footer>
    </div>

    <script>
        fetch('dashboard.html')
            .then(response => response.text())
            .then(data => {
                document.getElementById('sidebar').innerHTML = data;
            })
            .catch(error => console.error('Error fetching sidebar:', error));

        const searchInput = document.getElementById('searchInput');
        const searchIcon = document.querySelector('.feather-search');

        searchInput.addEventListener('input', function() {
            // Check if the input value is empty
            if (searchInput.value.trim() === '') {
                // Show the SVG icon if the input is empty
                searchIcon.classList.remove('hidden');
            } else {
                // Hide the SVG icon if there is text in the input
                searchIcon.classList.add('hidden');
            }
        });

        // Function to handle click event on user link
        const userLink = document.querySelector('.user-link');
        userLink.addEventListener('click', function() {
            // Remove 'clicked' class from all user links
            const userLinks = document.querySelectorAll('.user-link');
            userLinks.forEach(link => link.classList.remove('clicked'));
            
            // Add 'clicked' class to the clicked user link
            userLink.classList.add('clicked');
        });
    </script>

</body>
</html>
