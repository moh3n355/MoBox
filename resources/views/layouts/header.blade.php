<header class="main-header">
    <div class="logo">
        <img src="/images/logo-mobbox3.png" alt="">
        <div class="logo logo-text">
            <h1>موباکس</h1>
            <span>فروشگاه دیجیتال</span>

        </div>
    </div>

    <nav class="nav">
        <div class="search-box">
            <input type="text" name="" id="" placeholder="جست و جو">
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

    {{-- <div class="icons">
        <a href="{{ route('auth') }}" alt="" class="login-btn">ورود</a>
    </div> --}}

    {{-- if user login --}}

    <div class="user-icon" >
        <a href="#"  id="userMenuBtn">
            <i class="fas fa-user user-icon"></i>
        </a>
        <div class="dropdown-menu" id="dropdownMenu">
            <a href="#">پروفایل</a>
            <a href="#">تنظیمات</a>
            <a href="#">خروج</a>
        </div>
    </div>


</header>
