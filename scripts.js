// scripts.js

// Wait for the DOM to be fully loaded
document.addEventListener('DOMContentLoaded', function() {
    // Get the form elements
    var inputTitle = document.getElementById('oai_bcg_wp_input_title');
    var lengthShort = document.getElementById('oai_bcg_wp_length_short');
    var lengthMedium = document.getElementById('oai_bcg_wp_length_medium');
    var lengthLong = document.getElementById('oai_bcg_wp_length_long');

    // Listen for form submission
    document.getElementById('oai_bcg_wp_form').addEventListener('submit', function(e) {
        // Prevent the form from submitting normally
        e.preventDefault();

        // Get the selected length
        var length;
        if (lengthShort.checked) {
            length = 'short';
        } else if (lengthMedium.checked) {
            length = 'medium';
        } else if (lengthLong.checked) {
            length = 'long';
        }

        // Send an AJAX request to generate the post
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'admin-ajax.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (this.status >= 200 && this.status < 400) {
                // Success! The post was generated
                alert('Post generated successfully!');
            } else {
                // We reached our target server, but it returned an error
                alert('An error occurred while generating the post.');
            }
        };
        xhr.onerror = function() {
            // There was a connection error of some sort
            alert('An error occurred while generating the post.');
        };
        xhr.send('action=oai_bcg_wp_generate_post&title=' + encodeURIComponent(inputTitle.value) + '&length=' + length);
    });
});
