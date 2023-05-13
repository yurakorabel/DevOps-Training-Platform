// Get references to the category links and articles
const categoryLinks = document.querySelectorAll('.list-group-item');
const articles = document.querySelectorAll('article');

// Add click event listeners to the category links
categoryLinks.forEach(link => {
    link.addEventListener('click', (event) => {
        event.preventDefault();

        // Get the category name from the link
        const categoryName = link.textContent.trim();

        // Hide all articles initially
        articles.forEach(article => {
            article.style.display = 'none';
        });

        // Show articles that belong to the selected category
        articles.forEach(article => {
            if (article.querySelector('p').textContent === categoryName) {
                article.style.display = 'block';
            }
        });
    });
});












// $(document).ready(function() {
//     // Login form submit event handler
//     $("#login-form").submit(function(event) {
//         event.preventDefault();
//         var email = $("#login-email").val();
//         var password = $("#login-password").val();
//         // Perform login API call with email and password data
//         $.ajax({
//             url: "/api/login",
//             method: "POST",
//             data: { email: email, password: password },
//             success: function(data) {
//                 // Redirect to dashboard page after successful login
//                 window.location.href = "/dashboard";
//             },
//             error: function(jqXHR, textStatus, errorThrown) {
//                 // Display error message for invalid login credentials
//                 $("#login-error").text("Invalid email or password");
//             }
//         });
//     });
//
//     // Signup form submit event handler
//     $("#signup-form").submit(function(event) {
//         event.preventDefault();
//         var name = $("#signup-name").val();
//         var email = $("#signup-email").val();
//         var password = $("#signup-password").val();
//         // Perform signup API call with name, email, and password data
//         $.ajax({
//             url: "/api/signup",
//             method: "POST",
//             data: { name: name, email: email, password: password },
//             success: function(data) {
//                 // Redirect to dashboard page after successful signup
//                 window.location.href = "/dashboard";
//             },
//             error: function(jqXHR, textStatus, errorThrown) {
//                 // Display error message for invalid signup data
//                 $("#signup-error").text("Invalid data. Please try again.");
//             }
//         });
//     });
// });
