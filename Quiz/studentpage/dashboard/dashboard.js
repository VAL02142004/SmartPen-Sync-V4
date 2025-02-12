function selectItem(itemType, itemName) {
    alert("Selected " + itemType + ": " + itemName);
}

function openSettings() {
    alert("Settings opened");
}

function viewQuizHistory() {
    alert("Viewing quiz history");
}
function selectCourse(courseName) {
    selectItem("Course", courseName);
}

function selectAvailableQuiz(quizName) {
    selectItem("Available Quiz", quizName);
}

function selectSubject(subjectName) {
    selectItem("Subject", subjectName);
}
