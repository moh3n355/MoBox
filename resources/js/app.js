import './bootstrap';

function setupDropdown(buttonId, menuId, otherMenus = []) {
    const button = document.getElementById(buttonId);
    const menu = document.getElementById(menuId);

    // کلیک روی دکمه
    button.addEventListener('click', function (event) {
        event.preventDefault();
        event.stopPropagation();

        // بستن سایر منوها
        otherMenus.forEach(otherMenu => otherMenu.classList.remove('active'));

        // باز و بسته کردن این منو
        menu.classList.toggle('active');
    });

    // کلیک بیرون منو → بستن
    document.addEventListener('click', function(event) {
        if (!menu.contains(event.target) && event.target !== button) {
            menu.classList.remove('active');
        }
    });
}

// اجرای تابع برای دو منو
const dropdown_menu_categorie = document.getElementById('dropmenu-categories');
const dropdown_menu_content_us = document.getElementById('dropmenu-content-us');

setupDropdown('categories', 'dropmenu-categories', [dropdown_menu_content_us]);
setupDropdown('content-us', 'dropmenu-content-us', [dropdown_menu_categorie]);
