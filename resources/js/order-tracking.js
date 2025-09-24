let currentStep = 3; // مرحله ۲: آماده‌سازی

const circles = document.querySelectorAll(".circle");
const progress = document.getElementById("progress");

circles.forEach((circle, index) => {
    if (index < currentStep - 1) {
        circle.classList.add("done");
    }
    if (index === currentStep - 1) {
        circle.classList.add("active");
    }
});

progress.style.width = ((currentStep - 1) / (circles.length - 1)) * 100 + "%";