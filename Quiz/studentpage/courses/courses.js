document.addEventListener("DOMContentLoaded", function () {
    const courses = document.querySelectorAll(".course");
    
    courses.forEach(course => {
        course.addEventListener("click", function () {
            alert(`You selected: ${course.textContent}`);
        });
    });

    const menuBtn = document.querySelector(".menu-btn");
    menuBtn.addEventListener("click", function () {
        alert("Menu button clicked!");
    });
});
