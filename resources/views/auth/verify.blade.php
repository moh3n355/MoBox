@php $type = 'verify'; @endphp

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تایید شماره تلفن</title>
    @vite(['resources/css/verify.css', 'resources/js/verify.js'])
</head>
<body>
<div class="container">
    <header>
        <img src="/images/logo-mobbox3.png" alt="">
        <h1>موبوکس</h1>
        <h2>تایید شماره تلفن</h2>

        <div class="show-and-edit-phone">
            <p>{{ session('phone') }}</p>
            <a href="{{ url()->previous() }}">
                <img id="edit-icon" src="/images/edit.png" alt="">
            </a>
        </div>
    </header>

    <main>
        <form method="POST" action="{{ route('VerifyCode')}}">
            @csrf
            <div class="input-group">
                <label>لطفا کد تایید ارسال شده را وارد کنید</label>
                <div class="otp-container">
                    <div class="otp-inputs">
                        @for ($i = 0; $i < 5; $i++)
                            <input type="text" name="verify_code[]" maxlength="1" pattern="[0-9]*"
                                inputmode="numeric" value="{{ old('verify_code.' . $i) }}" style="text-align:center;">
                        @endfor
                    </div>
                    @error('verify_code')
                        <span class="error-forms">{{ $message }}</span>
                    @enderror
                </div>
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

<!-- اضافه کردن پاپ‌آپ -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        alert("با توجه به اینکه پروژه در حال توسعه میباشد, درحال حاضر کد تایید پیامک نمیشود و کد تایید 12345 در نظر گرفته میشود"); // متن دلخواه خودت رو اینجا بذار
    });
</script>

</body>
</html>
