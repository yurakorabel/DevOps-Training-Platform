window.addEventListener('load', e => {
    const categoryWraps = document.querySelectorAll('.category-wrap-js');
    const articles = document.querySelectorAll('.article-js');

    if (categoryWraps != null) {
        categoryWraps.forEach(elem => {
            elem.addEventListener('click', e => {
                let categoryName = elem.querySelector('.category-span-js').textContent.trim();

                articles.forEach(elem => {
                    if (elem.querySelector('.newsCategory').textContent.trim() == categoryName) {
                        elem.style.display = 'block'
                    }
                    else if (categoryName == 'All') {
                        elem.style.display = 'block'
                    }
                    else{
                        elem.style.display = 'none'
                    }
                })

            })
        })
    }
})











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
