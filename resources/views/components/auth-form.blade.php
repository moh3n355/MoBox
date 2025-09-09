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
    @elseif ($type === 'set-username-password')
        @vite(['resources/css/set-username-password.css', 'resources/js/set-username-password.js'])
    @endif

    <div class="container">
        <header>

            @if ($type !== 'set-username-password')
                <img src="/images/logo-mobbox3.png" alt="">
                <h1>موبوکس</h1>
            @endif

            <h2>
                @if ($type === 'login')
                    ورود
                @elseif ($type === 'register')
                    ثبت‌نام
                @elseif ($type === 'forgot')
                    بازیابی رمز عبور
                @elseif ($type === 'verify')
                    تایید شماره تلفن
                @elseif ($type === 'set-username-password')
                    تکمیل پروفایل
                @endif
            </h2>

            {{-- مخصوص verify --}}
            @if ($type === 'verify')
                <div class="show-and-edit-phone">
                    <p>+98 993 891 7750</p>
                    <a href="">
                        <img id="edit-icon" src="/images/edit.png" alt="">
                    </a>
                </div>
            @endif
        </header>

        <main>
            <form method="" action="{{ route('ResumeAuth', ['type' => $type]) }}">
                @csrf

                <div class="input-group">
                    {{-- حالت verify --}}
                    @if ($type === 'verify')
                    <label>لطفا کد تایید ارسال شده را وارد کنید</label>
                    <div class="otp-container">
                        <div class="otp-inputs">
                            @for ($i = 0; $i < 5; $i++)
                            <input type="text" name="verify_code[]" maxlength="1"
                            pattern="[0-9]*" inputmode="numeric"
                            value="{{ old('verify_code.' . $i) }}"
                            style="text-align:center;">
                            @endfor
                        </div>
                        @error('verify_code')
                            <span class="error-forms">{{ $message }}</span>
                        @enderror
                    </div>



                        {{-- حالت login --}}
                    @elseif ($type === 'login')
                        <label for="username">لطفا نام کاربری خود را وارد کنید:</label>
                        <input type="text" name="username" value="{{ old('username') }}" required pattern=""
                            title="username">

                        @error('username')
                            <span class="error-forms">{{ $message }}</span>
                        @enderror


                        <label for="password">رمز عبور:</label>
                        <input type="text" name="password" value="{{ old('password') }}" required pattern=""
                            title="password">

                        @error('password')
                            <span class="error-forms">{{ $message }}</span>
                        @enderror


                        {{-- حالت register --}}
                    @elseif ($type === 'register')
                        <label for="phone">شماره موبایل:</label>
                        <input type="text" name="phone" value="{{ old('phone') }}" required pattern="^(09\d{9})$"
                            title="شماره تلفن باید ۱۱ رقم داشته باشد و برای ایران باشد">
                        @error('phone')
                            <span class="error-forms">{{ $message }}</span>
                        @enderror

                        {{-- حالت forgot --}}
                    @elseif ($type === 'forgot')
                        <label for="phone">شماره موبایل خود را وارد کنید:</label>
                        <input type="text" name="phone" value="{{ old('phone') }}" required pattern="^(09\d{9})$"
                            title="شماره تلفن باید ۱۱ رقم داشته باشد و برای ایران باشد">
                        @error('phone')
                            <span class="error-forms">{{ $message }}</span>
                        @enderror


                        {{-- حالت تنظیم نام کاربری و پسوورد --}}
                    @elseif($type === 'set-username-password')
                        {{-- بخش اختیاری آپلود عکس پروفایل --}}
                        <label for="profile_photo">آپلود عکس پروفایل :</label>
                        <div class="profile-upload-section">

                            <div class="profile-preview">
                                <img id="profilePreviewImg" src=""
                                    alt="">
                            </div>

                            <div class="file-upload-wrapper">
                                <input id="profile_photo" type="file" name="profile_photo" accept="image/*" hidden>
                                <label for="profile_photo" class="file-upload-label" id="upload-btn">انتخاب عکس پروفایل</label>
                            </div>
                            {{-- <small class="muted">فرمت‌های مجاز: jpg, jpeg, png, webp — حداکثر 2 مگابایت</small> --}}

                            @error('profile_photo')
                                <span class="error-forms">{{ $message }}</span>
                            @enderror
                        </div>

                        <label for="set-username">لطفا نام کاربری خود را تنظیم کنید:</label>
                        <input type="text" name="set-username" value="{{ old('set-username') }}" required pattern="[A-Za-z0-9_-]{3,20}"
                            title="set-username">

                        @error('set-username')
                            <span class="error-forms">{{ $message }}</span>
                        @enderror


                        <label for="set-password">تنظیم رمز عبور:</label>
                        <input type="password" name="set-password" value="{{ old('set-password') }}" required
                            title="set-password">

                        @error('set-password')
                            <span class="error-forms">{{ $message }}</span>
                        @enderror
                    @endif
                </div>
                {{-- دکمه تایید --}}
                <button type="submit" class="login-btn">
                    @if ($type === 'login')
                        ورود
                    @elseif ($type === 'register')
                        ثبت‌نام
                    @elseif ($type === 'verify')
                        تایید
                    @elseif ($type === 'set-username-password')
                        تایید اطلاعات
                    @else
                        ارسال کد تأیید
                    @endif
                </button>

                {{-- تایمر برای حالت وریفای --}}
                @if ($type === 'verify')
                    <div class="problem-to-verify">
                        <time id="resend-timer" datetime="">01:00</time>
                        <a href="">کد را دریافت نکردید؟ دریافت دوباره کد</a>
                    </div>
                @endif

                {{-- لینک‌های پایین فرم --}}
                @if ($type === 'login')
                    <div class="register-forgetpass">
                        <a href="{{ route('auth.dynamic', ['type' => 'register']) }}">ثبت‌نام</a>
                        <a href="{{ route('auth.dynamic', ['type' => 'forgot']) }}">فراموشی رمز عبور</a>
                    </div>
                @elseif ($type === 'register')
                    <div class="register-forgetpass">
                        <a href="{{ route('auth.dynamic', ['type' => 'login']) }}">ورود</a>
                    </div>
                @elseif ($type === 'forgot')
                    <div class="register-forgetpass">
                        <a href="{{ route('auth.dynamic', ['type' => 'login']) }}">بازگشت به ورود</a>
                    </div>
                @endif


                <div class="terms">
                    ورود شما به معنای پذیرش شرایط و قوانین حریم خصوصی است
                </div>




            </form>
        </main>
    </div>
</div>
