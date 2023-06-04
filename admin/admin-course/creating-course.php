<?php
session_start();
require '../../vendor/connect.php';

if (!$_SESSION) {
    header('Location: ../../index.php');
}

require '../../vendor/connect.php';

$title = $_POST['title'];
$overview_text = $_POST['overview_text'];
$award_points = $_POST['award_points'];
$difficulty_level = $_POST['difficulty_level'];
$category = $_POST['category'];
$image_url = $_POST['image_url'];

// -----------------------------------------
header("Location: admin-courses.php");

$add = mysqli_query($conn, "INSERT INTO courses
    (course_title, course_overview, course_image, award_points, difficulty_level_id_difficulty_level, category_id_category) 
    VALUES ('$title', '$overview_text', '$image_url', '$award_points', '$difficulty_level', '$category');");

$courseId = mysqli_insert_id($conn);


$moduleTitles = $_POST['module_title'];
$moduleContents = $_POST['module_content'];
$questions = $_POST['question'];
$optionAs = $_POST['option_a'];
$optionBs = $_POST['option_b'];
$optionCs = $_POST['option_c'];
$correctAnswersAs = $_POST['correct_answer_a'];
$correctAnswersBs = $_POST['correct_answer_b'];
$correctAnswersCs = $_POST['correct_answer_c'];


for ($i = 0; $i < count($moduleTitles); $i++) {
    $moduleTitle = $moduleTitles[$i];
    $moduleContent = $moduleContents[$i];
    $question = $questions[$i];
    $optionA = $optionAs[$i];
    $optionB = $optionBs[$i];
    $optionC = $optionCs[$i];
    $correctAnswerA = $correctAnswersAs[$i];
    $correctAnswerB = $correctAnswersBs[$i];
    $correctAnswerC = $correctAnswersCs[$i];

    // Insert the outline into the `course_outlines` table
    $insertOutlineQuery = "INSERT INTO course_outlines (module_position, module_title, module_content, courses_id_courses)
                               VALUES ('$i', '$moduleTitle', '$moduleContent', '$courseId')";
    mysqli_query($conn, $insertOutlineQuery);

    // Retrieve the auto-generated ID of the newly inserted outline
    $outlineId = mysqli_insert_id($conn);

    // Insert the question into the `questions` table
    $insertQuestionQuery = "INSERT INTO questions (question_text, course_outlines_id_course_outlines, course_outlines_courses_id_courses)
                                VALUES ('$question', '$outlineId', '$courseId')";
    mysqli_query($conn, $insertQuestionQuery);

    // Retrieve the auto-generated ID of the newly inserted question
    $questionId = mysqli_insert_id($conn);

    // Insert the options into the `question_option` table
    $insertOptionAQuery = "INSERT INTO question_option (option_text, is_correct_option, questions_id_questions, questions_course_outlines_id_course_outlines, questions_course_outlines_courses_id_courses)
                       VALUES ('$optionA', " . (($correctAnswerA === 'a') ? '1' : '0') . ", '$questionId', '$outlineId', '$courseId')";
    mysqli_query($conn, $insertOptionAQuery);

    $insertOptionBQuery = "INSERT INTO question_option (option_text, is_correct_option, questions_id_questions, questions_course_outlines_id_course_outlines, questions_course_outlines_courses_id_courses)
                       VALUES ('$optionB', " . (($correctAnswerB === 'b') ? '1' : '0') . ", '$questionId', '$outlineId', '$courseId')";
    mysqli_query($conn, $insertOptionBQuery);

    $insertOptionCQuery = "INSERT INTO question_option (option_text, is_correct_option, questions_id_questions, questions_course_outlines_id_course_outlines, questions_course_outlines_courses_id_courses)
                       VALUES ('$optionC', " . (($correctAnswerC === 'c') ? '1' : '0') . ", '$questionId', '$outlineId', '$courseId')";
    mysqli_query($conn, $insertOptionCQuery);



}


header("Location: admin-courses.php");

?>