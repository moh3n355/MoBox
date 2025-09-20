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

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // ایجاد نقشه با مرکز تهران
            var map = L.map('map').setView([35.6892, 51.3890], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            var marker;

            // تابع کمکی برای گذاشتن مارکر و پر کردن فرم
            async function setMarkerAndAddress(lat, lng) {
                if (marker) map.removeLayer(marker);
                marker = L.marker([lat, lng]).addTo(map);

                try {
                    const res = await axios.get('https://nominatim.openstreetmap.org/reverse', {
                        params: { lat: lat, lon: lng, format: 'json' },
                        headers: { 'Accept-Language': 'fa' }
                    });

                    const data = res.data.address || {};

                    document.getElementById('plaque').value = data.house_number || '';
                    document.getElementById('street').value = data.road || data.pedestrian || '';
                    document.getElementById('alley').value = data.suburb || data.residential || data.neighbourhood || data.road || '';
                    document.getElementById('city').value = data.city || data.town || data.village || '';

                } catch (err) {
                    console.error(err);
                    alert('خطا در دریافت آدرس. ممکن است محدودیت CORS یا اتصال اینترنت باشد.');
                }
            }

            // کلیک روی نقشه
            map.on('click', function (e) {
                setMarkerAndAddress(e.latlng.lat, e.latlng.lng);
            });

            // دکمه پیدا کردن موقعیت کاربر
            document.getElementById('findLocation').addEventListener('click', function () {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        const lat = position.coords.latitude;
                        const lng = position.coords.longitude;

                        map.setView([lat, lng], 16);
                        setMarkerAndAddress(lat, lng);
                    }, function (err) {
                        alert('خطا در دریافت موقعیت مکانی: ' + err.message);
                    });
                } else {
                    alert('مرورگر شما از Geolocation پشتیبانی نمی‌کند.');
                }
            });
        });
    </script>
</body>
</html>
