<!doctype html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>ویرایش پروفایل</title>
    @vite(['resources/css/edit-profile.css', 'resources/js/edit-profile.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
</head>

<body>


    <div class="container">
        <!-- left column - profile summary -->


        <!-- right column - edit form -->
        <div class="card">
            <h2 style="margin:0 0 12px 0;font-size:20px;color:#28304a">ویرایش پروفایل:</h2>

            <form id="profileForm" novalidate>


                <div class="row">
                    <div class="col">
                        <label for="fullName">نام و نام خانوادگی</label>
                        <input id="fullName" name="fullName" type="text" value="{{ old('fullName') }}" required>
                        <div class="field-error"></div>
                        <div class="help">نام شما همان‌طور که در سایت نمایش داده می‌شود.</div>
                    </div>
                    <div class="col">
                        <label for="username"><i class="fas fa-user"></i> نام کاربری:</label>
                        <input id="username" name="username" type="text" value="{{ old('username') }}" required>
                        <div class="field-error"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="email"><i class="fas fa-envelope"></i> ایمیل:</label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required>
                        <div class="field-error"></div>
                    </div>
                    <div class="col">
                        <label for="phone"><i class="fas fa-phone"></i> شماره همراه:</label>
                        <input id="phone" name="phone" type="tel" value="{{ old('phone') }}">
                        <div class="field-error"></div>
                    </div>
                </div>

                {{-- <div>
                    <label for="address"><i class="fas fa-map-marker-alt"></i> نشانی محل سکونت:</label>
                    <textarea id="address" placeholder="چند خط درباره خودتان بنویسید...">توسعه‌دهنده فرانت‌اند و علاقه‌مند به طراحی رابط کاربری.</textarea>
                    <div id="map" style="height:300px; width: 400px;"></div>
                    <input type="hidden" id="latitude" name="latitude">
                    <input type="hidden" id="longitude" name="longitude">

                </div> --}}

                <div class="row">
                    <div class="col">
                        <label for="password"><i class="fas fa-key"></i> تغییر رمز عبور :</label>
                        <div style="position:relative;">

                            <input class="password-field" id="old-pass" type="password" placeholder="رمز عبور قبلی"
                                pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" required>
                                <div class="field-error"></div>
                            <input class="password-field" id="password" type="password" placeholder="رمز عبور جدید"
                                pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" required>
                                <div class="field-error"></div>

                            <button type="button" id="togglePwd"
                                style="position:absolute;left:8px;top:8px;padding:6px;border-radius:8px;border:none;background:transparent;cursor:pointer">
                                <i class="fas fa-eye-slash" id="toggleIcon"></i>
                            </button>

                        </div>
                        <div class="help">رمز را فقط در صورت نیاز تغییر دهید.</div>
                    </div>
                </div>


                <div class="actions">
                    <button class="btn btn-primary" type="submit">ذخیره تغییرات</button>
                    <button class="btn btn-danger" type="button" id="cancelBtn">لفو</button>
                </div>

            </form>

        </div>
    </div>

</body>

</html>
