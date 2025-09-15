<div>
    <style>
        .captcha {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 1rem;
            font-family: sans-serif;
        }

        #equation {
            font-size: 1.2rem;
            min-width: 50px;
            text-align: center;
            font-weight: bold;
        }

        #captchaInput {
            width: 80px;
            padding: 0.3rem 0.4rem;
            text-align: center;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            transition: border-color 0.2s;
        }

        #captchaInput:focus {
            border-color: #007bff;
        }

        #newBtn {
            padding: 0.25rem 0.4rem;
            font-size: 0.8rem;
            cursor: pointer;
            border: none;
            background-color: #007bff;
            color: white;
            border-radius: 4px;
            transition: background-color 0.2s;
        }

        #newBtn:hover {
            background-color: #0056b3;
        }

        #captchaError {
            color: red;
            font-size: 0.9rem;
            margin-left: 0.5rem;
        }

        #newBtn img {
            width: 18px;
            height: 18px;
            display: block;
            filter: invert(1);
            /* سفید کردن آیکون چون بک‌گراند آبی هست */
            transition: transform 0.2s ease;
            margin: auto;
        }

        #newBtn:hover img {
            transform: rotate(90deg);
            /* انیمیشن چرخش هنگام هاور */
        }
    </style>
    {{-- Captcha --}}
    <div class="captcha">

        <input type="text" id="captchaInput" name="captcha" placeholder="answer" >
        <div id="equation" ></div>



        <button type="button" id="newBtn"><img
                src="/images/refresh.png"
                alt=""></button>


    </div>
    <div id="captchaError"></div> <!-- فقط برای JS پیام خطا -->

    <script>
        let currentAnswer = null;
        const eqDiv = document.getElementById('equation');
        const inp = document.getElementById('captchaInput');
        const errorDiv = document.getElementById('captchaError');
        const form = document.getElementById('registerForm');

        // تولید معادله تصادفی
        function randomEquation(min = 1, max = 9) {
            const operators = ['+', '*'];
            const randInt = (a, b) => Math.floor(Math.random() * (b - a + 1)) + a;
            const a = randInt(min, max);
            const b = randInt(min, max);
            const op = operators[Math.floor(Math.random() * operators.length)];

            let result;
            switch (op) {
                case '+':
                    result = a + b;
                    break;
                case '*':
                    result = a * b;
                    break;
            }
            return {
                expression: `${a} ${op} ${b}`,
                result
            };
        }

        // تولید معادله جدید
        document.getElementById('newBtn').addEventListener('click', () => {
            const e = randomEquation();
            eqDiv.textContent = e.expression;
            currentAnswer = e.result;
            inp.value = "";
            errorDiv.textContent = ""; // پاک کردن پیام خطا
        });

        // بار اول معادله تولید شود
        document.getElementById('newBtn').click();

        // جلوگیری از ارسال فرم اگر جواب اشتباه باشد
        form.addEventListener('submit', function(e) {
            const userAnswer = parseInt(inp.value);
            if (currentAnswer === null || isNaN(userAnswer) || userAnswer !== currentAnswer) {
                e.preventDefault();
                errorDiv.textContent = "جواب کپچا اشتباه است."; // پیام ساده JS
                return false;
            }
        });
    </script>

</div>
