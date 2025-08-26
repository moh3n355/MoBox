<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>موبوکس تایید شماره تلفن</title>
    @vite(['resources/css/login.css'])
</head>

<body>

    <div class="container">
        <header>
            <img src="/images/logo-mobbox3.png" alt="">
            <h1>موبوکس</h1>
            <h2>تایید شماره تلفن</h2>
            <div class="show-and-edit-phone">
                <p>7750 891 993 98+</p>
                <a href="{{ route('login') }}"><img id="edit-icon" src="/images/edit.png" alt=""></a>
            </div>
        </header>

        <main>


            <form id="" action="" method="">
                @csrf

                <div class="input-group">
                    <label>لطفا کد تایید ارسال شده را وارد کنید</label>



                    <input type="text" name="verify-code" value="{{ old('verify-code') }}" required
                        pattern="^(09\d{9})$" title="کد تایید ارسال شده را وارد کنید">

                    @error('verify-code')
                        <span class="error-forms">{{ $message }}</span>
                    @enderror



                </div>
                <button type="submit" class="login-btn">تایید</button>



                <div class="problem-to-verify">
                    <time id="resend-timer" datetime="">01:00</time>
                    <a href="">کد را دریافت نکردید؟ دریافت دوباره کد</a>
                </div>

                <div class="terms">
                    ورود شما به معنای پذیرش شرایط و قوانین حریم خصوصی است
                </div>
            </form>
        </main>
    </div>

</body>

</html>
