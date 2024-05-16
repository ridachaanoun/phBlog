
    // Function to handle click event on list items
    function handleClick(event) {
        // Remove 'clicked' class from all list items
        const listItems = document.querySelectorAll('.claso');
        listItems.forEach(item => item.classList.remove('clicked'));
        
        // Add 'clicked' class to the clicked list item
        event.currentTarget.classList.add('clicked'); // Use currentTarget instead of target

        // Load the page associated with the clicked link
        const pageURL = event.currentTarget.getAttribute('data-page');
        if (pageURL) {
            loadPage(pageURL, document.getElementById('main-content'));
        }
    }

    // Add click event listener to list items
    const listItems = document.querySelectorAll('.claso');
    listItems.forEach(item => item.addEventListener('click', handleClick));

    // Function to load page content
    function loadPage(pageURL, targetElement) {
        fetch(pageURL)
            .then(response => response.text())
            .then(data => {
                // Update the specified target element with the loaded page content
                targetElement.innerHTML = data;
            })
            .catch(error => console.error('Error fetching page:', error));
    }

