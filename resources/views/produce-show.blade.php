<x-layout>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>گوشی موبایل مدل X100 - فروشگاه آنلاین</title>
    @vite(['resources/css/produce-show.css', 'resources/js/produce-show.js'])
</head>
<body>
    <div class="container">
        <div class="product-content">
            <div class="product-gallery card">
                <div class="main-image">
                    <img id="mainProductImage" src="/images/mobile-phone.png" alt="گوشی موبایل مدل X100">
                </div>
                <div class="thumbs">
                    {{-- <img class="thumb active" src="/images/mobile-phone.png" >
                    <img class="thumb" src="/images/airpods.png">
                    <img class="thumb" src="/images/laptop.png">
                    <img class="thumb" src="/images/speaker.png"> --}}
                    <img class="thumb" src="/images/S26.webp">
                </div>
            </div>

            <div class="product-info card">
                <h1>گوشی موبایل مدل X100</h1>
                <div class="product-meta">برند: موباکس | کد محصول: MBX-X100</div>

                <div class="stock-status">موجود در انبار</div>

                <div class="price-section">
                    <div class="current-price">۲۳,۹۰۰,۰۰۰ تومان</div>
                    <div class="original-price">۲۶,۵۰۰,۰۰۰</div>
                    <div class="discount-badge">-۱۰٪</div>
                </div>

                <div class="option-section">
                    <div class="option-title">رنگ:</div>
                    <div class="color-picker">
                        <button class="color-dot active" style="background: #000;" data-color="مشکی"></button>
                        <button class="color-dot" style="background: #1e40af;" data-color="آبی"></button>
                        <button class="color-dot" style="background: #9f1239;" data-color="قرمز"></button>
                    </div>
                </div>

                <div class="option-section">
                    <div class="option-title">حافظه داخلی:</div>
                    <div class="variants">
                        <h4 class="variant-btn active" data-variant="128GB">128GB</h4>
                    </div>
                </div>

                <div class="actions">
                    <div class="quantity-selector">
                        <button id="qtyDec" class="qty-btn">-</button>
                        <input id="qty" class="qty-input" value="1" min="1" max="99">
                        <button id="qtyInc" class="qty-btn">+</button>
                    </div>
                    <button id="addToCart" class="btn btn-primary">
                        <span>افزودن به سبد خرید</span>
                    </button>
                </div>

                <ul class="features">
                    <li>نمایشگر 6.7 اینچی AMOLED با نرخ نوسازی 120Hz</li>
                    <li>پردازنده 8 هسته‌ای نسل جدید با عملکرد بالا</li>
                    <li>باتری 5000 میلی‌آمپر با شارژ سریع 65 واتی</li>
                    <li>دوربین سه‌گانه 108MP با لرزش‌گیر اپتیکال</li>
                    <li>گارانتی 18 ماهه موباکس</li>
                </ul>

                <div class="accordion">
                    <button class="acc-btn">مشخصات فنی</button>
                    <div class="acc-panel">
                        این محصول با جدیدترین فناوری‌ها طراحی شده و تعادل عالی بین عملکرد، دوام و زیبایی را ارائه می‌دهد. بدنه مقاوم، نمایشگر روشن و شارژدهی طولانی از ویژگی‌های کلیدی آن است. صفحه نمایش Super AMOLED با وضوح Full HD+ تجربه بصری بی‌نظیری ارائه می‌دهد و پردازنده قدرتمند آن امکان اجرای روان تمامی برنامه‌ها و بازی‌ها را فراهم می‌کند.
                    </div>
                </div>
            </div>
        </div>

        <div class="reviews-section card">
            <h2>نظرات کاربران</h2>
            <div id="reviews">
                <div class="review-item">
                    <div class="review-header">
                        <span>کاربر مهمان</span>
                        <span>۱۴۰۴/۰۷/۱۴</span>
                    </div>
                    <div>خیلی خوب و سریع بدستم رسید. راضی‌ام.</div>
                </div>
                <div class="review-item">
                    <div class="review-header">
                        <span>محمد رضایی</span>
                        <span>۱۴۰۴/۰۷/۱۰</span>
                    </div>
                    <div>باتری فوق‌العاده‌ای داره، کل روز رو بدون نیاز به شارژ همراهیم. پیشنهاد می‌کنم.</div>
                </div>
            </div>
        </div>
    </div>


</body>
</html>

</x-layout>