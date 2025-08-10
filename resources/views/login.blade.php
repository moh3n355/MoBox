<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>دبیرگالا - ورود | ثبت‌نام</title>
    @vite(['resources/css/login.css', 'resources/js/login.js'])
</head>

<body>
    <div class="container">
        <header>
            <img src="/images/logo-mobbox3.png" alt="">
            <h1>موبوکس</h1>
            <h2>ورود | ثبت‌نام</h2>
        </header>

        <main>
            <form id="loginForm">


                <div class="input-group">
                    <label for="username">لطفا شماره موبایل یا ایمیل خود را وارد کنید</label>
                    <form action="" >
                        <input type="text" id="phone_or_email" name="phone_or_email" required>
                    </form>

                    <div class="error-message">لطفا این قسمت را خالی نگذارید</div>


                </div>

                <button type="submit" class="login-btn">ورود</button>

                <div class="terms">
                    ورود شما به معنای پذیرش شرایط و قوانین حریم خصوصی است
                </div>
            </form>
        </main>
    </div>

    <script src="script.js"></script>
</body>

</html>
