<header class="main-header">

    <nav class="nav">

        <div class="search-box">
            <form action="{{ route('set_filters') }}" method="GET" id="search_form">
                <button type="submit"><i class="fas fa-search"></i></button>

                <input type="text" name="search" placeholder="جستجو..." autocomplete="off" id="searchInput">
                <input type="hidden" name="category" id="categoryInput">
                <input type="hidden" name="type" id="typeInput">

                <div class="dropdown" id="categoryDropdown">
                    <!-- دسته‌بندی‌ها -->
                    <div class="search-cat">
                        <div class="liveInputDisplay" style="font-weight:bold;"></div>
                        <div data-value="laptop" data-type="LabtopKeys">در دسته لپتاپ و اولترابوک</div>
                    </div>
                    <div class="search-cat">
                        <div class="liveInputDisplay" style="font-weight:bold;"></div>
                        <div data-value="mobile" data-type="MobileKeys">در دسته موبایل و تبلت</div>
                    </div>
                    <div class="search-cat">
                        <div class="liveInputDisplay" style="font-weight:bold;"></div>
                        <div data-value="watch" data-type="WatchKeys">در دسته ساعت هوشمند</div>
                    </div>
                    <div class="search-cat">
                        <div class="liveInputDisplay" style="font-weight:bold;"></div>
                        <div data-value="airpod" data-type="AirpadKeys" >در دسته ایرپاد و هندزفری</div>
                    </div>
                </div>
            </form>
        </div>





        <div class="nav-item">
            <a href="#" class="nav-link" id="home">خانه</a>
        </div>


        <div class="nav-item">
            <a href="#" class="nav-link" id="categories">دسته‌بندی</a>
            <div class="dropdown-menu" id="dropmenu-categories">
                <a href="#">موبایل</a>
                <a href="#">لپتاپ</a>
                <a href="#">لوازم جانبی</a>
                <a href="#">....</a>
                <a href="#">....</a>
                <a href="#">....</a>
                <a href="#">....</a>
                <a href="#">....</a>
            </div>
        </div>

        <div class="nav-item">
            <a href="#" class="nav-link" id="content-us">تماس با ما</a>
            <div class="dropdown-menu" id="dropmenu-content-us">
                <a href="#">شماره تماس</a>
                <a href="#">ایمیل</a>
            </div>
        </div>


        <button class="theme-toggle" id="themeToggle">
            <span class="sun-icon"><i class="fas fa-sun"></i></span>
            <span class="moon-icon"><i class="fas fa-moon"></i></span>
        </button>


    </nav>


    {{-- if have not been user login --}}

    @if (auth()->check())
        <div class="contain-cart-profile">
            <a href="{{ route('shopping-cart') }}" class="shopping-cart">
                <i class="fas fa-shopping-cart"></i>
                <span class="cart-badge" id="cart-count"></span>
            </a>

            <div class="user-icon" id="userMenuBtn">
                <i class="fas fa-user"></i>
                <div class="dropdown-menu" id="user-profile">
                    <a href="{{ route('edit-profile') }}">پروفایل</a>
                    <a href="#">تنظیمات</a>
                    <a href="{{ route('exit') }}">خروج</a>
                </div>
            </div>

        </div>
    @else
        <div class="icons">
            <a href="{{ route('login') }}" alt="" class="login-btn">ورود | ثبت نام</a>
            <button class="sidebar-toggle" id="sidebarToggle" aria-label="باز کردن منو">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    @endif




</header>

<script>
    document.addEventListener('DOMContentLoaded', () => {

        const toggle = document.getElementById('themeToggle');
        if (!toggle) return;

        const saved = localStorage.getItem('theme');

        if (saved === 'dark') {
            document.documentElement.setAttribute('data-theme', 'dark');
        }

        toggle.addEventListener('click', () => {
            const isDark = document.documentElement.getAttribute('data-theme') === 'dark';

            if (isDark) {
                document.documentElement.removeAttribute('data-theme');
                localStorage.setItem('theme', 'light');
            } else {
                document.documentElement.setAttribute('data-theme', 'dark');
                localStorage.setItem('theme', 'dark');
            }
        });



        // ============================ search section ==========================================

        const input = document.getElementById('searchInput');
        const dropdown = document.getElementById('categoryDropdown');
        const categoryInput = document.getElementById('categoryInput');
        const typeInput = document.getElementById('typeInput');

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
                typeInput.value = item.dataset.type;
                dropdown.style.display = 'none';
                searchForm.submit();
            });
        });
    });


    // ============================ cart section ==========================================
//     document.addEventListener('DOMContentLoaded', () => {

//     const cart_counter = document.getElementById('cart-count');

// // تابع بروزرسانی شمارنده
// function updateCartCounter(count) {
//     if (cart_counter) {
//         cart_counter.textContent = count;
//     }
// }

//     });
</script>
