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