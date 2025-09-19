import './bootstrap';

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
