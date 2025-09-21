<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ثبت آدرس با نقشه</title>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <!-- Axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    @vite(['resources/css/add-address.css', 'resources/js/add-address.js'])
</head>

<body>
    <div class="container">
        <!-- 🗺 نقشه -->
        <div id="map"></div>

        <!-- 📍 دکمه پیدا کردن موقعیت -->
        <button type="button" id="findLocation">
            <i class="fas fa-location-arrow"></i>
            <span>موقعیت من</span>
        </button>

        <!-- 📋 فرم آدرس -->
        <form id="addressForm" method="POST" action="/verify/address">
            @csrf

            <div>
                <label><span class="required">*</span> شهر:</label>
                <input type="text" name="city" id="city" class="form-control">
            </div>

            <div>
                <label><span class="required">*</span> خیابان:</label>
                <input type="text" name="street" id="street" class="form-control">
            </div>

            <div>
                <label><span class="required">*</span> کوچه:</label>
                <input type="text" name="alley" id="alley" class="form-control">
            </div>

            <div>
                <label><span class="required">*</span> پلاک:</label>
                <input type="text" name="plaque" id="plaque" class="form-control">
            </div>

            <div>
                <label><span class="required">*</span> طبقه:</label>
                <input type="text" name="floor" id="floor" class="form-control">
            </div>

            <div class="full-width">
                <label>توضیحات:</label>
                <textarea name="describtion" id="describtion" class="form-control" rows="3" placeholder="توضیحات اضافی..."></textarea>
            </div>

            <!-- دکمه ثبت -->
            <button type="submit" class="full-width">ثبت آدرس</button>
        </form>
    </div>
</body>
</html>
