
// Smart Agile Project Management
// JavaScript functionality

// Confirm before submitting a task
function confirmTask() {
    return confirm("Are you sure you want to save this task?");
}

// Display welcome message
function welcomeMessage() {
    alert("Welcome to Smart Agile Project Management!");
}

// Validate task form
function validateTaskForm() {
    const taskName = document.getElementById("task_name");

    if (!taskName || taskName.value.trim() === "") {
        alert("Please enter a task name!");
        return false;
    }

    return true;
}

// Display current date
function showCurrentDate() {
    const dateElement = document.getElementById("currentDate");

    if (dateElement) {
        dateElement.textContent = new Date().toLocaleDateString();
    }
}

// Run when page loads
document.addEventListener("DOMContentLoaded", function () {
    console.log("Smart Agile Project Management Loaded Successfully!");
    showCurrentDate();
});
