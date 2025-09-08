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





// حرکت خودکار بین خانه های کد تایید
    const inputs = document.querySelectorAll('.otp-inputs input');

    inputs.forEach((input, index) => {
        input.addEventListener('input', function () {
            if (input.value.length > 0 && index < inputs.length - 1) {
                inputs[index + 1].focus();
            }
        });

        input.addEventListener('keydown', function(e) {
            if (e.key === 'Backspace' && input.value === '' && index > 0) {
                inputs[index - 1].focus();
            }
        });
    });

});



