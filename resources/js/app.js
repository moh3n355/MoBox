

import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

import './bootstrap';
import './admin-dashboard';
import './show-&-edit-products';


function setupDropdown(buttonId, menuId, otherMenus = []) {
    const button = document.getElementById(buttonId);
    const menu = document.getElementById(menuId);

    if (!button || !menu) return; // اگر المنت نبود، نادیده بگیر

    // کلیک روی دکمه
    button.addEventListener('click', function (event) {
        // فقط برای دکمه‌ی اصلی preventDefault اجرا میشه
        if (button.tagName.toLowerCase() === 'a') {
            event.preventDefault();
        }
        event.stopPropagation();

        // بستن سایر منوها
        otherMenus.forEach(otherMenu => otherMenu.classList.remove('active'));

        // باز و بسته کردن این منو
        menu.classList.toggle('active');
    });

    // کلیک بیرون منو → بستن
    document.addEventListener('click', function (event) {
        if (!menu.contains(event.target) && !button.contains(event.target)) {
            menu.classList.remove('active');
        }
    });
}

// اجرای تابع برای منوی دسته‌بندی و تماس با ما
const dropdown_menu_categorie = document.getElementById('dropmenu-categories');
const dropdown_menu_content_us = document.getElementById('dropmenu-content-us');

setupDropdown('categories', 'dropmenu-categories', [dropdown_menu_content_us]);
setupDropdown('content-us', 'dropmenu-content-us', [dropdown_menu_categorie]);

// اجرای تابع برای منوی کاربر
const dropdown_menu_user = document.getElementById('user-profile');

setupDropdown('userMenuBtn', 'user-profile', [
    dropdown_menu_categorie,
    dropdown_menu_content_us
]);




// ============================ search section ==========================================


    // const input = document.getElementById('searchInput');
    // const dropdown = document.getElementById('categoryDropdown');
    // const categoryInput = document.getElementById('categoryInput');
    // const search_form = document.getElementById('search_form');

    // input.addEventListener('focus', () => {
    //     dropdown.style.display = 'block';
    // });

    // document.addEventListener('click', (e) => {
    //     if (!e.target.closest('.search-box')) {
    //         dropdown.style.display = 'none';
    //     }
    // });

    // dropdown.querySelectorAll('div').forEach(item => {
    //     item.addEventListener('click', () => {
    //         categoryInput.value = item.dataset.value;
    //         input.placeholder = item.textContent.trim();
    //         dropdown.style.display = 'none';
    //         search_form.submit();
    //     });
    // });

    document.addEventListener('DOMContentLoaded', () => {
        const input = document.getElementById('searchInput');
        const dropdown = document.getElementById('categoryDropdown');
        const categoryInput = document.getElementById('categoryInput');
        const searchForm = document.getElementById('search_form');

        const liveInputs = dropdown.querySelectorAll('.liveInputDisplay');

        // ابتدا مخفی
        dropdown.style.display = 'none';

        // وقتی کاربر تایپ می‌کنه → متن رو در همه liveInputDisplay ها نمایش بده
        input.addEventListener('input', () => {
            const value = input.value.trim();
            if (value.length > 0) {
                liveInputs.forEach(div => div.textContent = value);
                dropdown.style.display = 'block';
            } else {
                dropdown.style.display = 'none';
            }
        });

        // کلیک بیرون → بستن
        document.addEventListener('click', (e) => {
            if (!e.target.closest('.search-box')) dropdown.style.display = 'none';
        });

        // انتخاب دسته → ارسال فرم
        dropdown.querySelectorAll('div[data-value]').forEach(item => {
            item.addEventListener('click', (e) => {
                e.preventDefault();
                categoryInput.value = item.dataset.value;
                dropdown.style.display = 'none';
                searchForm.submit();
            });
        });
    });
