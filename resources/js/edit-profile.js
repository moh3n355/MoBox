     // نقشه Leaflet
     document.addEventListener('DOMContentLoaded', () => {
        const map = L.map('map').setView([35.6892, 51.3890], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        let marker;
        map.on('click', function(e) {
            if (marker) {
                marker.setLatLng(e.latlng);
            } else {
                marker = L.marker(e.latlng).addTo(map);
            }

            document.getElementById('latitude').value = e.latlng.lat;
            document.getElementById('longitude').value = e.latlng.lng;
        });
    });


// toggle password visibility
const toggle = document.getElementById('togglePwd');
const passwords = document.querySelectorAll('.password-field');
const icon = document.getElementById('toggleIcon');

toggle.addEventListener('click', () => {
passwords.forEach(pwd => {
    pwd.type = pwd.type === 'password' ? 'text' : 'password';
});
icon.classList.toggle('fa-eye');
icon.classList.toggle('fa-eye-slash');
});

const form = document.getElementById('profileForm');

// // رمز قدیمی نمونه (در عمل از سرور باید بررسی شود)
// const correctOldPassword = "Test@1234";

// form.addEventListener('submit', e => {
// e.preventDefault();

// const fields = [
//     { el: document.getElementById('fullName'), name: 'نام و نام خانوادگی' },
//     { el: document.getElementById('username'), name: 'نام کاربری' },
//     { el: document.getElementById('email'), name: 'ایمیل' },
//     { el: document.getElementById('phone'), name: 'شماره همراه' },
//     { el: document.getElementById('old-pass'), name: 'رمز عبور قدیمی' },
//     { el: document.getElementById('password'), name: 'رمز عبور جدید' }
// ];

// // پاک کردن خطاهای قبلی
// fields.forEach(f => {
//     f.el.classList.remove('input-error');
//     f.el.nextElementSibling.innerHTML = ''; // div خطا را پاک کن
// });

// let hasError = false;

// // بررسی پر بودن فیلدها (به جز رمز جدید/قدیمی اختیاری)
// fields.forEach(f => {
//     if (!f.el.value.trim() && f.name !== 'رمز عبور قدیمی' && f.name !== 'رمز عبور جدید') {
//         f.el.classList.add('input-error');
//         f.el.nextElementSibling.innerHTML = `لطفاً ${f.name} را وارد کنید.`;
//         hasError = true;
//     }
// });

// // pattern ها
// const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
// const usernamePattern = /^[A-Za-z][A-Za-z0-9]{3,19}$/;
// const phonePattern = /^09\d{9}$/;
// const passPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

// if (!hasError) {
//     // ایمیل
//     const email = document.getElementById('email');
//     if (!emailPattern.test(email.value)) {
//         email.classList.add('input-error');
//         email.nextElementSibling.innerHTML = 'ایمیل نامعتبر است.';
//         hasError = true;
//     }

//     // نام کاربری
//     const username = document.getElementById('username');
//     if (!usernamePattern.test(username.value)) {
//         username.classList.add('input-error');
//         username.nextElementSibling.innerHTML = 'نام کاربری باید با حرف شروع شود و شامل 4 تا 20 حرف یا عدد باشد.';
//         hasError = true;
//     }

//     // شماره همراه (اختیاری)
//     const phone = document.getElementById('phone');
//     if (phone.value.trim() && !phonePattern.test(phone.value)) {
//         phone.classList.add('input-error');
//         phone.nextElementSibling.innerHTML = 'شماره همراه نامعتبر است. مثال: 09123456789';
//         hasError = true;
//     }

//     // بررسی رمز فقط اگر کاربر چیزی وارد کرده باشد
//     const oldPass = document.getElementById('old-pass');
//     const newPass = document.getElementById('password');

//     if (oldPass.value.trim() || newPass.value.trim()) {
//         // رمز قدیمی الزامی
//         if (!oldPass.value.trim() || !newPass.value.trim()) {
//             oldPass.classList.add('input-error');
//             oldPass.nextElementSibling.innerHTML = 'لطفاً رمز عبور قدیمی را وارد کنید.';
//             hasError = true;
//         } else if (oldPass.value !== correctOldPassword) {
//             oldPass.classList.add('input-error');
//             oldPass.nextElementSibling.innerHTML = 'رمز عبور قدیمی اشتباه است.';
//             hasError = true;
//         }

//         // رمز جدید اگر پر بود بررسی شود
//         if (newPass.value.trim() && !passPattern.test(newPass.value)) {
//             newPass.classList.add('input-error');
//             newPass.nextElementSibling.innerHTML = 'رمز جدید باید حداقل 8 کاراکتر، شامل حروف بزرگ و کوچک، عدد و کاراکتر ویژه باشد.';
//             hasError = true;
//         }
//     }
// }

// if (!hasError) {
//     // همه چیز درست است → ذخیره‌سازی نمونه
//     fields.forEach(f => f.el.classList.remove('input-error'));
//     fields.forEach(f => f.el.nextElementSibling.innerHTML = '');
//    window.alert('تغییرات ذخیره شد');
// }

// });


