<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ثبت آدرس با نقشه</title>

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <!-- Axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <style>
        .container {
            width: 100%;
            max-width: 600px;
            margin: 30px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }

        #map {
            width: 100%;
            height: 400px;
            border-radius: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        form label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        form input[type="text"] {
            width: 100%;
            padding: 10px 12px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 14px;
            transition: 0.3s;
        }

        form input[type="text"]:focus {
            border-color: #4e9cff;
            box-shadow: 0 0 5px rgba(78,156,255,0.3);
            outline: none;
        }

        button, form button[type="submit"] {
            padding: 12px 20px;
            background-color: #4e9cff;
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover, form button[type="submit"]:hover {
            background-color: #3577d4;
        }

        #findLocation {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        @media (max-width: 480px) {
            .container { padding: 15px; }
            form input[type="text"], button, form button[type="submit"] { font-size: 13px; }
        }
    </style>
</head>
<body>
    <div class="container">
        <div id="map"></div>

        <button type="button" id="findLocation">
            <span style="font-size:16px;">📍</span> پیدا کردن موقعیت من
        </button>

        <form id="addressForm" method="POST" action="">
            @csrf
            <div>
                <label>شهر:</label>
                <input type="text" name="city" id="city" class="form-control">
            </div>
            <div>
                <label>خیابان:</label>
                <input type="text" name="street" id="street" class="form-control">
            </div>
            <div>
                <label>کوچه:</label>
                <input type="text" name="alley" id="alley" class="form-control">
            </div>
            <div>
                <label>پلاک:</label>
                <input type="text" name="plaque" id="plaque" class="form-control">
            </div>

            <button type="submit">ثبت آدرس</button>
        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // ایجاد نقشه با مرکز تهران
            var map = L.map('map').setView([35.6892, 51.3890], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            var marker;

            // تابع کمکی برای گذاشتن مارکر و پر کردن فرم
            async function setMarkerAndAddress(lat, lng) {
                // حذف مارکر قبلی
                if (marker) map.removeLayer(marker);
                marker = L.marker([lat, lng]).addTo(map);

                try {
                    // درخواست reverse geocoding از Nominatim
                    const res = await axios.get('https://nominatim.openstreetmap.org/reverse', {
                        params: { lat: lat, lon: lng, format: 'json' },
                        headers: { 'Accept-Language': 'fa' } // برای آدرس فارسی
                    });

                    const data = res.data.address || {};

                    // پر کردن فرم
                    document.getElementById('plaque').value = data.house_number || '';
                    document.getElementById('street').value = data.road || data.pedestrian || '';
                    document.getElementById('alley').value =
                        data.suburb || data.residential || data.neighbourhood || data.road || '';
                    document.getElementById('city').value = data.city || data.town || data.village || '';

                } catch (err) {
                    console.error(err);
                    alert('خطا در دریافت آدرس. ممکن است محدودیت CORS یا اتصال اینترنت باشد.');
                }
            }

            // کلیک روی نقشه
            map.on('click', function(e) {
                setMarkerAndAddress(e.latlng.lat, e.latlng.lng);
            });

            // دکمه پیدا کردن موقعیت کاربر
            document.getElementById('findLocation').addEventListener('click', function() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        const lat = position.coords.latitude;
                        const lng = position.coords.longitude;

                        map.setView([lat, lng], 16); // زوم روی مکان کاربر
                        setMarkerAndAddress(lat, lng);
                    }, function(err) {
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
