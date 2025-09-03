<div>
    {{-- فایل‌های CSS/JS متناسب با نوع فرم --}}

    @if ($type === 'login')
    @vite(['resources/css/login.css', 'resources/js/login.js'])
@elseif ($type === 'register')
    @vite(['resources/css/register.css', 'resources/js/register.js'])
@elseif ($type === 'forgot')
    @vite(['resources/css/forgot.css', 'resources/js/forgot.js'])
@elseif ($type === 'verify')
    @vite(['resources/css/verify.css', 'resources/js/verify.js'])
@endif

    <div class="container">
        <header>
            <img src="/images/logo-mobbox3.png" alt="">
            <h1>موبوکس</h1>

            <h2>
                @if ($type === 'login')
                    ورود
                @elseif ($type === 'register')
                    ثبت‌نام
                @elseif ($type === 'forgot')
                    بازیابی رمز عبور
                @elseif ($type === 'verify')
                    تایید شماره تلفن
                @endif
            </h2>

            {{-- مخصوص verify --}}
            @if ($type === 'verify')
                <div class="show-and-edit-phone">
                    <p>+98 993 891 7750</p>
                    <a href="{{ route('login') }}">
                        <img id="edit-icon" src="/images/edit.png" alt="">
                    </a>
                </div>
            @endif
        </header>

        <main>
            <form method="POST" action="">
                @csrf

                <div class="input-group">
                    {{-- حالت verify --}}
                    @if ($type === 'verify')
                        <label>لطفا کد تایید ارسال شده را وارد کنید</label>
                        <input type="text" name="verify-code" value="{{ old('verify-code') }}" required
                               pattern="\d{4,6}" title="کد تایید ارسال شده را وارد کنید">
                        @error('verify-code')
                            <span class="error-forms">{{ $message }}</span>
                        @enderror


                    {{-- حالت login --}}
                    @elseif ($type === 'login')


                        <label for="username">لطفا نام کاربری خود را وارد کنید:</label>
                        <input type="text" name="username" value="{{ old('username') }}" required pattern=""
                            title="username">

                        @error('username')
                            <span class="error-forms">{{ $message }}</span>
                        @enderror


                        <label for="username">رمز عبور:</label>
                        <input type="text" name="password" value="{{ old('password') }}" required pattern=""
                            title="password">

                        @error('password')
                            <span class="error-forms">{{ $message }}</span>
                        @enderror


                    {{-- حالت register --}}
                    @elseif ($type === 'register')
                        <label for="phone">شماره موبایل:</label>
                        <input type="text" name="phone" value="{{ old('phone') }}" required
                               pattern="^(09\d{9})$"
                               title="شماره تلفن باید ۱۱ رقم داشته باشد و برای ایران باشد">
                        @error('phone')
                            <span class="error-forms">{{ $message }}</span>
                        @enderror

                    {{-- حالت forgot --}}
                    @elseif ($type === 'forgot')
                        <label for="phone">شماره موبایل خود را وارد کنید:</label>
                        <input type="text" name="phone" value="{{ old('phone') }}" required
                               pattern="^(09\d{9})$"
                               title="شماره تلفن باید ۱۱ رقم داشته باشد و برای ایران باشد">
                        @error('phone')
                            <span class="error-forms">{{ $message }}</span>
                        @enderror
                    @endif
                </div>

                <button type="submit" class="login-btn">
                    @if ($type === 'login')
                        ورود
                    @elseif ($type === 'register')
                        ثبت‌نام
                    @elseif ($type === 'verify')
                        تایید
                    @else
                        ارسال کد تأیید
                    @endif
                </button>

                {{-- تایمر برای حالت وریفای --}}
                @if($type === 'verify')
                <div class="problem-to-verify">
                    <time id="resend-timer" datetime="">01:00</time>
                    <a href="">کد را دریافت نکردید؟ دریافت دوباره کد</a>
                </div>
                @endif

                {{-- لینک‌های پایین فرم --}}
                @if ($type === 'login')
                    <div class="register-forgetpass">
                        <a href="{{ route('register') }}">ثبت‌نام</a>
                        <a href="">فراموشی رمز عبور</a>
                    </div>
                @elseif ($type === 'register')
                    <div class="register-forgetpass">
                        <a href="{{ route('login') }}">ورود</a>
                    </div>
                @elseif ($type === 'forgot')
                    <div class="register-forgetpass">
                        <a href="{{ route('login') }}">بازگشت به ورود</a>
                    </div>
                @endif

                <div class="terms">
                    ورود شما به معنای پذیرش شرایط و قوانین حریم خصوصی است
                </div>
            </form>
        </main>
    </div>
</div>
