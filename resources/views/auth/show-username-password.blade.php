@php $type = 'show-password'; @endphp

<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>نمایش پسوورد جدید</title>
    @vite(['resources/css/show-password.css', 'resources/js/show-password.js'])
</head>

<body>
    <div class="container">
        <header>
            <img src="/images/logo-mobbox3.png" alt="">
            <h1>موبوکس</h1>
            <h2>نمایش پسوورد جدید</h2>
        </header>

        <main>
            <div class="container-info">

                <div class="info">
                    <div class="show-username">
                        <div class="serverText">Username: {{ session('UserName') }}</div>
                    </div>

                    <div class="new-password">
                        <div class="serverText">{{ session('NwePassword') }}</div>
                    </div>
                </div>
            </div>

            <a href="{{ route('login') }}" class="submit-btn">
                برگشت به صفحه ورود
            </a>

            <div class="terms">
                ورود شما به معنای پذیرش شرایط و قوانین حریم خصوصی است
            </div>
        </main>
    </div>
</body>

</html>
