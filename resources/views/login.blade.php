<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>موبوکس - ورود | ثبت‌نام</title>
    @vite('resources/css/login.css')
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

                    <form action="{{ route('login-post') }}" method="POST">
                        @csrf
                        <input type="text" name="phone_or_email" required>
                        <button type="submit" class="login-btn">ورود</button>
                    </form>

                    <div class="error-message">لطفا این قسمت را خالی نگذارید</div>


                </div>



                <div class="terms">
                    ورود شما به معنای پذیرش شرایط و قوانین حریم خصوصی است
                </div>
            </form>
        </main>
    </div>

    <script src="script.js"></script>
</body>

</html>
