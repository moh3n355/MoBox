import './bootstrap';

// ـــــنیازمند اپدیت (شروع فانکشن با ارسال فرم شماره تلفن و ولیدیشن)ـــــــــــ

document.addEventListener("DOMContentLoaded", function () {
    let timerElement = document.getElementById("resend-timer");
    let resendLink = document.querySelector(".problem-to-verify a");

    let totalTime = 60; // 60 ثانیه

    let countdown = setInterval(() => {
        totalTime--;

        // محاسبه دقیقه و ثانیه
        let minutes = Math.floor(totalTime / 60);
        let seconds = totalTime % 60;

        // نمایش با فرمت mm:ss
        timerElement.textContent =
            String(minutes).padStart(2, "0") + ":" + String(seconds).padStart(2, "0");

        // وقتی تایمر تموم شد
        if (totalTime <= 0) {
            clearInterval(countdown);
            timerElement.style.display = "none"; // مخفی کردن تایمر
            resendLink.style.display = "block"; // نمایش لینک دریافت دوباره
        }
    }, 1000);
});
