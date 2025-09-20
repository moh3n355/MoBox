<!doctype html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>ویرایش پروفایل</title>
    @vite(['resources/css/edit-profile.css', 'resources/js/edit-profile.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    {{-- <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script> --}}
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <!-- Axios برای درخواست HTTP -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

</head>

<body>


    <div class="container">
        <!-- left column - profile summary -->


        <!-- right column - edit form -->
        <div class="card">
            <h2 style="margin:0 0 12px 0;font-size:20px;color:#28304a">ویرایش پروفایل:</h2>

            <form id="profileForm" action="{{ route('verify-edit-profile') }}" novalidate>


                <div class="row">
                    <div class="col">

                        <label class="fields" for="fullName"><span class="required">*</span>
                            نام و نام خانوادگی:
                        </label>
                        <input id="fullName" name="fullName" type="text" value="{{ auth()->user()->fullName }}"
                            required>
                        <div class="field-error"></div>
                        @error('fullName')
                            <p class="field-error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col">
                        <label class="fields" for="username"><span class="required">*</span>
                            <i class="fas fa-user"></i> نام کاربری:</label>
                        <input id="username" name="username" type="text" value="{{ auth()->user()->username }}"
                            required>
                        @error('username')
                            <p class="field-error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label class="fields" for="email"><i class="fas fa-envelope"></i> ایمیل:</label>
                        <input id="email" name="email" type="email" value="{{ auth()->user()->email }}">
                        @error('email')
                            <p class="field-error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col">
                        <label class="fields" for="phone"><i class="fas fa-phone"></i> شماره همراه:</label>
                        <div class="phone-edit">
                            <a href="{{ route('edit-phone') }}">ویرایش</a>
                            <p id="phone" type="tel">{{ auth()->user()->phone }}</p>

                        </div>
                        @if(session('phonestatus'))
                        <div class="success-field">
                            {{ session('phonestatus') }}
                        </div>
                    @endif
                    </div>
                </div>

                <div>
                    <label class="fields" for="my-address">
                        <i class="fas fa-map-marker-alt"></i> آدرس های من:
                    </label>
                    <div class="address-list">
                        @foreach($addresses as $i => $address)
                            @if(!empty($address))
                            <div class="address">
                                <input type="radio" name="address" value="{{ $i }}">
                                <span>
                                    {{ $address['city'] ?? '' }} -
                                    {{ $address['street'] ?? '' }} -
                                    {{ $address['alley'] ?? '' }} -
                                    پلاک: {{ $address['plaque'] ?? '' }}
                                    طبقه: {{ $address['floor'] ?? '' }}
                                    @if(!empty($address['describtion'])) - {{ $address['describtion'] }} @endif
                                </span>

                                <div class="delete-address">
                                   <a href=""><i class="fas fa-trash-alt"></i></a>
                                </div>

                        </div>
                            @endif
                        @endforeach
                    </div>

                    <div class="add-address-parent">
                        <a href="{{ route('add-address') }}" class="add-address">
                            <span >افزودن آدرس جدید </span>
                            <i class="fas fa-circle-plus"></i>
                        </a>
                    </div>
                    @if(session('addressstatus'))
                        <div class="success-field">
                            {{ session('addressstatus') }}
                        </div>
                    @endif
                </div>

                {{-- <div id="map" style="height:300px; width: 400px;"></div>
                    <input type="hidden" id="latitude" name="latitude">
                    <input type="hidden" id="longitude" name="longitude"> --}}

                <div class="row">
                    <div class="col">
                        <label class="fields" for="password"><i class="fas fa-key"></i> تغییر رمز عبور :</label>
                        <div style="position:relative;">

                            <input class="password-field" id="old-pass" type="password" placeholder="رمز عبور قبلی"
                                name="OldPassword"
                                pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" required>

                            @error('OldPassword')
                                <p class="field-error">{{ $message }}</p>
                            @enderror

                            <input class="password-field" id="password" type="password" placeholder="رمز عبور جدید"
                                name="NwePassword"
                                pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" required>

                            @error('NwePassword')
                                <p class="field-error">{{ $message }}</p>
                            @enderror

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
