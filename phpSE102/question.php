<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Quiz Page</title>
    <link rel="stylesheet" href="css/question.css"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
</head>
<body>
    <div class="flex h-screen">

        <div class="sidebar">
            <div class="flex items-center mb-4">
                <i class="fas fa-chevron-left text-lg"></i>
                <button class="ml-2 text-lg">Dashboard</button>
            </div>
            <div class="mb-4">
                <img alt="Profile picture of a cat" class="profile-picture" src="asset/profile-image.jpg"/>
            </div>
            <div class="text-center mb-4">
                <p class="font-bold">Ariane Banquiqueo</p>
            </div>
            <div class="w-full">
                <p class="font-bold mb-2">COURSES</p>
                <ul>
                    <li class="course-item">HCI</li>
                    <li class="course-item">SE 101</li>
                    <li class="course-item">ATFL 101</li>
                    <li class="course-item">FBA 101</li>
                    <li class="course-item">PROGRAMMING</li>
                </ul>
            </div>
        </div>

        <div class="main-content">
            <div class="flex justify-between items-center mb-4">
                <div class="search-container">
                    <input class="search-input" placeholder="Search..." type="text"/>
                    <i class="fas fa-search absolute top-2 right-4 text-gray-600"></i>
                </div>
                <i class="fas fa-bars text-2xl"></i>
            </div>
            <div class="quiz-container">
                <h2 class="text-center text-xl font-bold mb-4">Quiz 1</h2>
                <p class="text-center mb-4">Individual interactions are more important than processes and tools.</p>
                <p class="text-right mb-4">Timer: <span class="timer">00:25:00</span></p>
                <div class="space-y-4">
                    <div class="quiz-question">
                        <p>1. What does SDLC stand for?</p>
                    </div>
                    <div class="quiz-question">
                        <p>2. Which of the following is NOT a phase in the SDLC?</p>
                    </div>
                    <div class="quiz-question">
                        <p>3. In which SDLC phase is the feasibility of the project analyzed?</p>
                    </div>
                    <div class="quiz-question">
                        <p>4. Which SDLC model is based on a linear approach where each phase must be completed before moving to the next?</p>
                    </div>
                </div>
                <div class="flex justify-center mt-8">
                    <button class="submit-button">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let timer = 5 * 60; 
        const timerElement = document.querySelector('.timer');

        function startTimer() {
            setInterval(function() {
                if (timer <= 0) {
                    document.querySelector('form').submit();
                } else {
                    let minutes = Math.floor(timer / 60);
                    let seconds = timer % 60;
                    timerElement.innerText = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
                    timer--;
                }
            }, 1000);
        }

        startTimer();
    </script>
</body>
</html>
