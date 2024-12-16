// Initialize Typed.js for text effects
window.onload = function () {
    var options = {
        strings: [
            "Manage your tasks with ease!",
            "Add new tasks and view them.",
            "This is a free and open-source project!"
        ],
        typeSpeed: 50,
        backSpeed: 30,
        backDelay: 1500,
        startDelay: 1000,
        loop: true
    };
    var typed = new Typed("#typed-output", options);

    // Generate a random quote of the day
    showQuote();

    // Toggle theme when the button is clicked
    document.getElementById('theme-toggle').addEventListener('click', function () {
        document.body.classList.toggle('light-theme');
    });
};

// Array of quotes
const quotes = [
    "Success is not final, failure is not fatal: it is the courage to continue that counts.",
    "There are no impossible things, only small steps.",
    "Believing in yourself is the first step to success.",
    "Life is what happens while we are busy making plans."
];

// Function to display a random quote
function showQuote() {
    var quote = quotes[Math.floor(Math.random() * quotes.length)];
    document.getElementById('quote-of-day').textContent = quote;
}
