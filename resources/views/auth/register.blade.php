@php $type = 'register'; @endphp

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>ثبت شماره تلفن</title>
    @vite(['resources/css/register.css', 'resources/js/register.js'])
</head>
<body>
<div class="container">
    <header>
        <img src="/images/logo-mobbox3.png" alt="">
        <h1>موبوکس</h1>
        <h2>ثبت شماره تلفن</h2>
    </header>

    <main>
        <form method="POST" action="{{ route('ResumeRegister')}}">
            @csrf
            <div class="input-group">
                <label for="phone">شماره موبایل:</label>
                <input type="text" name="phone" value="{{ old('phone', session('phone')) }}" required
                    pattern="^(09\d{9})$" title="شماره تلفن باید ۱۱ رقم داشته باشد و برای ایران باشد">
                @error('phone')
                    <span class="error-forms">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="submit-btn">ثبت نام</button>

            <div class="register-forgetpass">
                <a href="{{ route('auth.dynamic', ['type' => 'login']) }}">ورود</a>
            </div>

            <div class="terms">
                ورود شما به معنای پذیرش شرایط و قوانین حریم خصوصی است
            </div>
        </form>
    </main>
</div>
</body>
</html>
