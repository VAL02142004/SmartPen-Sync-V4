<?php
// Static quiz data
$questions = [
    [
        'question' => 'What does SDLC stand for?',
        'options' => ['Software Development Life Cycle', 'System Design Life Cycle', 'Software Design Life Cycle'],
        'correct_answer' => 'Software Development Life Cycle',
        'name' => 'answer_1'
    ],
    [
        'question' => 'Which of the following is NOT a phase in the SDLC?',
        'options' => ['Planning', 'Analysis', 'Deployment', 'Design'],
        'correct_answer' => 'Deployment',
        'name' => 'answer_2'
    ],
    [
        'question' => 'In which SDLC phase is the feasibility of the project analyzed?',
        'options' => ['Planning', 'Analysis', 'Design'],
        'correct_answer' => 'Analysis',
        'name' => 'answer_3'
    ],
    [
        'question' => 'Which SDLC model is based on a linear approach where each phase must be completed before moving to the next?',
        'options' => ['Waterfall Model', 'Agile Model', 'V-Model'],
        'correct_answer' => 'Waterfall Model',
        'name' => 'answer_4'
    ]
];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_quiz'])) {
    // Collect user answers
    $user_answers = [];
    foreach ($questions as $question) {
        if (isset($_POST[$question['name']])) {
            $user_answers[$question['name']] = $_POST[$question['name']];
        }
    }

    // Score calculation
    $score = 0;
    foreach ($questions as $question) {
        if (strtolower(trim($user_answers[$question['name']])) == strtolower(trim($question['correct_answer']))) {
            $score++;
        }
    }

    // Display result
    echo "<h2>Quiz Results</h2>";
    echo "<p>You scored $score out of " . count($questions) . "!</p>";
}
?>