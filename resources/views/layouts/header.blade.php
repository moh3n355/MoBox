<header class="main-header">

    <nav class="nav">
        <div class="search-box">
            <button><i class="fas fa-search"></i></button>
            <input type="text" name="" id="">
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

    </nav>
    {{-- if have not been user login --}}

    @if (auth()->check())
        <div class="contain-cart-profile">
            <button class="shopping-cart">
                <i class="fas fa-shopping-cart"></i>
                <span class="cart-badge">3</span>
            </button>

            <div class="user-icon" id="userMenuBtn">
                <i class="fas fa-user"></i>
                <div class="dropdown-menu" id="user-profile">
                    <a href="{{ route('edit-profile') }}">پروفایل</a>
                    <a href="#">تنظیمات</a>
                    <a href="#">خروج</a>
                </div>
            </div>

        </div>
    @else
        <div class="icons">
            <a href="{{ route('auth') }}" alt="" class="login-btn">ورود | ثبت نام</a>

            <button class="sidebar-toggle" id="sidebarToggle" aria-label="باز کردن منو">
                <i class="fas fa-bars"></i>
            </button>

        </div>
    @endif

    </div>
</header>
