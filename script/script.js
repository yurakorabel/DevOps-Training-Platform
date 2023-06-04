window.addEventListener('load', e => {

    function sortByCategoryNews() {
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
    }

    sortByCategoryNews()

    function sortByDifficultAndCategoryTask() {
        let btn = document.querySelector('.filter-button')

        if (btn != null) {
            let tasks = document.querySelectorAll('.task-js')

            btn.addEventListener('click', e => {
                let difficulty = document.querySelector('#difficulty').value
                let category = document.querySelector('#technology').value
                let notFoundTitle = document.querySelector('.not-found-js')

                let counter = 0
                notFoundTitle.style.display = 'none'

                tasks.forEach(elem => {
                    if (elem.querySelector('.task-diff-js').innerHTML == difficulty
                        && elem.querySelector('.task-cat-js').innerHTML == category)
                    {
                        elem.style.display = 'block'
                    }
                    else if (elem.querySelector('.task-diff-js').innerHTML == difficulty && category == 'All') {
                        elem.style.display = 'block'
                    }
                    else if (elem.querySelector('.task-cat-js').innerHTML == category && difficulty == 'All') {
                        elem.style.display = 'block'
                    }
                    else if (difficulty == 'All' && category == 'All') {
                        elem.style.display = 'block'
                    }
                    else{
                        elem.style.display = 'none'
                        counter++
                    }
                })

                if (counter == tasks.length)
                    notFoundTitle.style.display = 'block'

                counter = 0
            })
        }
    }

    sortByDifficultAndCategoryTask()
})




$(document).ready(function() {
    // Add requirement field
    $('.add-requirement').click(function() {
        var inputHtml = '<div class="requirement-input">' +
            '<input type="text" class="form-control" name="requirement[]" required>' +
            '<button type="button" class="remove-requirement btn btn-danger">Remove</button>' +
            '</div>';
        $('#requirements-container').append(inputHtml);
    });

    // Remove requirement field
    $('#requirements-container').on('click', '.remove-requirement', function() {
        $(this).parent('.requirement-input').remove();
    });
});

$(document).ready(function() {
    // Add requirement field
    $('.add-step').click(function() {
        var inputHtml = '<div class="step-input">' +
            '<input type="text" class="form-control" name="step[]" required>' +
            '<button type="button" class="remove-step btn btn-danger">Remove</button>' +
            '</div>';
        $('#steps-container').append(inputHtml);
    });

    // Remove requirement field
    $('#steps-container').on('click', '.remove-step', function() {
        $(this).parent('.step-input').remove();
    });
});

$(document).ready(function() {
    // Add requirement field
    $('.add-outline').click(function() {
        var inputHtml = '<div class="outline-input">' +
            '<div class="form-group">' +
            '<label for="exampleInputPassword1">Module Title</label>' +
            '<input type="text" class="form-control" name="module_title[]" required>' +
            '</div>' +
            '<div class="form-group">' +
            '<label for="exampleInputPassword1">Module Content</label>' +
            '<input type="text" class="form-control" name="module_content[]" required>' +
            '</div>' +
            '<div class="form-group">' +
            '<label for="exampleInputPassword1">Question</label>' +
            '<input type="text" class="form-control" name="question[]" required>' +
            '</div>' +
            '<div class="form-group">' +
            '<label for="exampleInputPassword1">Option A</label>' +
            '<input type="text" class="form-control" name="option_a[]" required>' +
            '</div>' +
            '<div class="form-group">' +
            '<label for="exampleInputPassword1">Option B</label>' +
            '<input type="text" class="form-control" name="option_b[]" required>' +
            '</div>' +
            '<div class="form-group">' +
            '<label for="exampleInputPassword1">Option C</label>' +
            '<input type="text" class="form-control" name="option_c[]" required>' +
            '</div>' +
            '<div class="form-group">' +
            '<label for="question">Correct Option:</label>' +
            '<div class="form-check">' +
            '<input class="form-check-input" type="radio" name="correct_answer_a" id="answer-a" value="a">' +
            '<label class="form-check-label" for="answer-a">A</label>' +
            '<input class="form-check-input" type="radio" name="correct_answer_b" id="answer-b" value="b">' +
            '<label class="form-check-label" for="answer-b">B</label>' +
            '<input class="form-check-input" type="radio" name="correct_answer_c" id="answer-c" value="c">' +
            '<label class="form-check-label" for="answer-c">C</label>' +
            '</div>' +
            '</div>' +
            '<button type="button" class="remove-outline btn btn-danger">Remove</button>' +
            '</div>';

        $('#outlines-container').append(inputHtml);
    });

    // Remove requirement field
    $('#outlines-container').on('click', '.remove-outline', function() {
        $(this).parent('.outline-input').remove();
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
