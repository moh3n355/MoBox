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


            <form id="loginForm" action="" method="">
                @csrf

                <div class="input-group">
                    <label for="username">لطفا شماره موبایل را وارد کنید</label>



                    <input type="text" name="phone" value="{{ old('phone') }}" required pattern="^(09\d{9})$"
                        title="شماره تلفن باید ۱۱ رقم داشته باشد و برای ایران باشد">

                    @error('phone')
                        <span class="error-forms">{{ $message }}</span>
                    @enderror



                </div>
                <button type="submit" class="login-btn">ورود</button>


                <div class="terms">
                    ورود شما به معنای پذیرش شرایط و قوانین حریم خصوصی است
                </div>
            </form>
        </main>
    </div>

</body>
</html>
