@php $type = 'forgot'; @endphp

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>بازیابی رمز عبور</title>
    @vite(['resources/css/forgot.css', 'resources/js/forgot.js'])
</head>
<body>
<div class="container">
    <header>
        <img src="/images/logo-mobbox3.png" alt="">
        <h1>موبوکس</h1>
        <h2>بازیابی رمز عبور</h2>
    </header>

    <main>
        <form method="POST" action="{{ route('Resumeforgot')}}">
            @csrf
            <div class="input-group">
                <label for="phone">شماره موبایل خود را وارد کنید:</label>
                <input type="text" name="phone" value="{{ old('phone') }}" required
                    pattern="^(09\d{9})$" title="شماره تلفن باید ۱۱ رقم داشته باشد و برای ایران باشد">
                @error('phone')
                    <span class="error-forms">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="submit-btn">ارسال کد تأیید</button>

            <div class="register-forgetpass">
                <a href="{{ route('auth.dynamic', ['type' => 'login']) }}">بازگشت به ورود</a>
            </div>

            <div class="terms">
                ورود شما به معنای پذیرش شرایط و قوانین حریم خصوصی است
            </div>
        </form>
    </main>
</div>
</body>
</html>
