document.addEventListener('DOMContentLoaded', function() {
    // Check if dark mode preference is stored in localStorage
    const isDarkMode = localStorage.getItem('darkMode') === 'true';

    // Set the initial dark mode state based on the stored preference
    if (isDarkMode) {
        document.body.classList.add('dark-mode');
    }

    // Add event listener to the moon icon
    const darkModeToggle = document.getElementById('dark-mode-toggle');
    darkModeToggle.addEventListener('click', function() {
        // Toggle the 'dark-mode' class on the body element
        document.body.classList.toggle('dark-mode');

        // Store the dark mode preference in localStorage
        const isDarkMode = document.body.classList.contains('dark-mode');
        localStorage.setItem('darkMode', isDarkMode);
    });
});
