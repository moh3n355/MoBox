<header class="main-header">
    {{-- <div class="logo">
        <img src="/images/logo-mobbox3.png" alt="">
        <div class="logo logo-text">
            <h1>موباکس</h1>
            <span>فروشگاه دیجیتال</span>

        </div>
    </div> --}}

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

    @if(auth()->check())
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
            <a href="{{ route('auth') }}" alt="" class="login-btn">ورود</a>
        </div>
    @endif

    </div>
</header>
