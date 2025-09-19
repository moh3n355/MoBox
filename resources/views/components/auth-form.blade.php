<div>
    @php
        $lastPart = basename(parse_url(url()->previous(), PHP_URL_PATH));
    @endphp

    {{-- فایل‌های CSS/JS متناسب با نوع فرم --}}

    @if ($type === 'login')
        @vite(['resources/css/login.css', 'resources/js/login.js'])
    @elseif ($type === 'register')
        @vite(['resources/css/register.css', 'resources/js/register.js'])
    @elseif ($type === 'forgot')
        @vite(['resources/css/forgot.css', 'resources/js/forgot.js'])
    @elseif ($type === 'verify')
        @php
            if ($lastPart !== 'forgot' && $lastPart !== 'register' && $lastPart !== 'verify') {
                abort(403);
            }
        @endphp

        @vite(['resources/css/verify.css', 'resources/js/verify.js'])
    @elseif ($type === 'set-username-password')
        @php
            if ($lastPart !== 'verify' && $lastPart !== 'set-username-password') {
                abort(403);
            }
        @endphp
        @vite(['resources/css/set-username-password.css', 'resources/js/set-username-password.js'])
    @elseif ($type === 'show-password')
        @php
            if ($lastPart !== 'verify') {
                return redirect()->route('home');
            }
        @endphp

        @vite(['resources/css/show-password.css', 'resources/js/show-password.js'])
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
                    ثبت‌ شماره تلفن
                @elseif ($type === 'forgot')
                    بازیابی رمز عبور
                @elseif ($type === 'verify')
                    تایید شماره تلفن
                @elseif ($type === 'set-username-password')
                    تکمیل پروفایل
                @elseif ($type === 'show-password')
                    نمایش پسوورد جدید
                @endif
            </h2>

            {{-- مخصوص verify --}}
            @if ($type === 'verify')
                <div class="show-and-edit-phone">
                    <p>{{ session('phone') }}</p>
                    <a href="{{ url()->previous() }}">
                        <img id="edit-icon" src="/images/edit.png" alt="">
                    </a>
                </div>
            @endif
        </header>

        <main>
            <form method="" id="registerForm" action="{{ route('ResumeAuth', ['type' => $type]) }}">
                @csrf

                <div class="input-group">
                    {{-- حالت verify --}}
                    @if ($type === 'verify')
                        <label>لطفا کد تایید ارسال شده را وارد کنید</label>
                        <div class="otp-container">
                            <div class="otp-inputs">
                                @for ($i = 0; $i < 5; $i++)
                                    <input type="text" name="verify_code[]" maxlength="1" pattern="[0-9]*"
                                        inputmode="numeric" value="{{ old('verify_code.' . $i) }}"
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
                        <input type="text" name="username" value="{{ old('username') }}" required
                            pattern="[A-Za-z][A-Za-z0-9]{3,20}"
                            title="نام کاربری باید فقط شامل حروف و اعداد باشد و بین ۳ تا ۲۰ کاراکتر باشد و نمی تواند با عدد شروع شود">

                        @error('username')
                            <span class="error-forms">{{ $message }}</span>
                        @enderror


                        <label for="password">رمز عبور:</label>
                        <input type="password" name="password" value="{{ old('password') }}" required id="password"
                            pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"
                            title="رمز عبور باید حداقل ۸ کاراکتر باشد و شامل حداقل یک حرف بزرگ، یک حرف کوچک، یک عدد و یک کاراکتر خاص (@$!%*?&) باشد">


                        @error('password')
                            <span class="error-forms">{{ $message }}</span>
                        @enderror



                        {{-- حالت register --}}
                    @elseif ($type === 'register')
                        <label for="phone">شماره موبایل:</label>
                        <input type="text" name="phone" value="{{ old('phone', session('phone')) }}" required
                            pattern="^(09\d{9})$" title="شماره تلفن باید ۱۱ رقم داشته باشد و برای ایران باشد">
                        @error('phone')
                            <span class="error-forms">{{ $message }}</span>
                        @enderror
                        <x-captcha></x-captcha>

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
                        <label for="set-username">لطفا نام کاربری خود را تنظیم کنید:</label>
                        <input type="text" name="set-username" value="{{ old('set-username') }}" required
                            pattern="[A-Za-z][A-Za-z0-9]{3,20}"
                            title="نام کاربری باید فقط شامل حروف و اعداد باشد و بین ۳ تا ۲۰ کاراکتر باشد و نمی تواند با عدد شروع شود">

                        @error('set-username')
                            <span class="error-forms">{{ $message }}</span>
                        @enderror


                        <label for="set-password">تنظیم رمز عبور:</label>
                        <input type="password" id="set-password" name="set-password" value="{{ old('set-password') }}"
                            required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"
                            title="رمز عبور باید حداقل ۸ کاراکتر باشد و شامل حداقل یک حرف بزرگ، یک حرف کوچک، یک عدد و یک کاراکتر خاص (@$!%*?&) باشد">



                        {{-- rules of password --}}
                        <div class="pwd-strength" data-target-input="set-password">
                            <div class="pwd-progress-wrap" aria-hidden="true">
                                <div class="pwd-progress" style="width:0%"></div>
                            </div>

                            <div class="pwd-meta">
                                <span class="pwd-percent">0%</span>
                                <span class="pwd-label">ضعیف</span>
                            </div>

                            <a type="button" id="toggle-rules" class="btn-rules">
                                <i class="fa-solid fa-plus"></i>
                            </a>

                            <div class="pwd-rules" aria-hidden="true">
                                <p id="rule-length" class="rule">❌ حداقل ۸ کاراکتر</p>
                                <p id="rule-lower" class="rule">❌ حداقل یک حرف کوچک</p>
                                <p id="rule-upper" class="rule">❌ حداقل یک حرف بزرگ</p>
                                <p id="rule-number" class="rule">❌ حداقل یک عدد</p>
                                <p id="rule-special" class="rule">❌ حداقل یک کاراکتر خاص (@$!%*?&)</p>
                            </div>
                        </div>

                        @error('set-password')
                            <span class="error-forms">{{ $message }}</span>
                        @enderror

                        {{-- نمایش پسوورد --}}
                    @elseif($type === 'show-password')
                        <div class="container-info">
                            <div class="show-username">

                                <div class="serverText">Username:  {{ session(key: 'UserName') }}</div>

                            </div>


                            <div class="new-password">

                                <div class="serverText">{{ session(key: 'NwePassword') }}</div>

                            </div>
                        </div>
                        {{-- @error('set-username')
                            <span class="error-forms">{{ $message }}</span>
                        @enderror --}}


                    @endif
                </div>




                {{-- دکمه تایید --}}
                @if ($type === 'show-password')
                    <a href="{{ route('auth.dynamic', ['type' => 'login']) }}" class="login-btn">
                        برگشت به صفحه ورود
                    </a>
                @else
                    <button type="submit" class="login-btn" id="login-btn">
                        @if ($type === 'login')
                            ورود
                        @elseif ($type === 'register')
                            شماره تلفن خود را وارد کنید
                        @elseif ($type === 'verify')
                            تایید
                        @elseif ($type === 'set-username-password')
                            تایید اطلاعات
                        @else
                            ارسال کد تأیید
                        @endif
                    </button>
                @endif
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
