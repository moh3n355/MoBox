<x-layout>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>گوشی موبایل مدل X100 - فروشگاه آنلاین</title>
        @vite(['resources/css/produce-show.css', 'resources/js/produce-show.js'])
    </head>

    <div class="container">
        <div class="product-content">
            <div class="product-gallery card">
                <div class="main-image">
                    <img id="mainProductImage" src="/images/mobile-phone.png" alt="گوشی موبایل مدل X100">
                </div>
                <div class="thumbs">
                    <img class="thumb active" src="/images/mobile-phone.png" alt="نمای جلوی محصول">
                    <img class="thumb" src="/images/S26.webp" alt="نمای جانبی محصول">
                </div>
            </div>

            <div class="product-info card">
                <h1>گوشی موبایل مدل X100</h1>
                <div class="product-meta">برند: موباکس | کد محصول: MBX-X100</div>

                <div class="stock-status">موجود در انبار</div>

                <div class="price-section">
                    <div class="current-price">۲۳,۹۰۰,۰۰۰ تومان</div>
                    <div class="original-price">۲۶,۵۰۰,۰۰۰ تومان</div>
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
                        <button class="variant-btn active" data-variant="128GB">128GB</button>
                        <button class="variant-btn" data-variant="256GB">256GB</button>
                        <button class="variant-btn" data-variant="512GB">512GB</button>
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

                <!-- تب‌های افقی -->
                <div class="tabs-horizontal">
                    <div class="tabs-header">
                        <button class="tab-horizontal active" data-tab="description">توضیحات کامل</button>
                        <button class="tab-horizontal" data-tab="specs">مشخصات فنی</button>
                        <button class="tab-horizontal" data-tab="reviews">نظرات کاربران</button>
                    </div>
                    <div class="tabs-content">
                        <!-- تب توضیحات -->
                        <div id="description" class="tab-panel active">
                            <h3>گوشی موبایل مدل X100 - تجربه‌ای بی‌نظیر</h3>
                            <p>این محصول با جدیدترین فناوری‌ها طراحی شده و تعادل عالی بین عملکرد، دوام و زیبایی را
                                ارائه می‌دهد. بدنه مقاوم، نمایشگر روشن و شارژدهی طولانی از ویژگی‌های کلیدی آن است.
                            </p>
                            <p>صفحه نمایش Super AMOLED با وضوح Full HD+ تجربه بصری بی‌نظیری ارائه می‌دهد و پردازنده
                                قدرتمند آن امکان اجرای روان تمامی برنامه‌ها و بازی‌ها را فراهم می‌کند.</p>
                            <ul>
                                <li>طراحی ارگونومیک و مقاوم در برابر ضربه و آب</li>
                                <li>سیستم صوتی استریو با کیفیت بالا</li>
                                <li>حسگر اثر انگشت زیر نمایشگر با سرعت بالا</li>
                                <li>پشتیبانی از شبکه 5G با سرعت دانلود فوق‌العاده</li>
                            </ul>
                        </div>

                        <!-- تب مشخصات فنی -->
                        <div id="specs" class="tab-panel">
                            <table class="specs-table">
                                <tr>
                                    <td>صفحه نمایش</td>
                                    <td>6.7 اینچ - Super AMOLED - وضوح Full HD+</td>
                                </tr>
                                <tr>
                                    <td>پردازنده</td>
                                    <td>Octa-core 3.2 GHz - نسل جدید</td>
                                </tr>
                                <tr>
                                    <td>حافظه RAM</td>
                                    <td>12GB</td>
                                </tr>
                                <tr>
                                    <td>حافظه داخلی</td>
                                    <td>128GB / 256GB / 512GB</td>
                                </tr>
                                <tr>
                                    <td>دوربین اصلی</td>
                                    <td>108MP + 8MP + 5MP با لرزش‌گیر اپتیکال</td>
                                </tr>
                                <tr>
                                    <td>دوربین سلفی</td>
                                    <td>32MP</td>
                                </tr>
                                <tr>
                                    <td>باتری</td>
                                    <td>5000mAh با شارژ سریع 65W</td>
                                </tr>
                                <tr>
                                    <td>سیستم عامل</td>
                                    <td>Android 14 با رابط کاربری اختصاصی</td>
                                </tr>
                                <tr>
                                    <td>ابعاد و وزن</td>
                                    <td>163.7 × 76.2 × 8.9 mm - 205 گرم</td>
                                </tr>
                            </table>
                        </div>

                        <!-- تب نظرات -->
                        <div id="reviews" class="tab-panel">
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
                                <div>باتری فوق‌العاده‌ای داره، کل روز رو بدون نیاز به شارژ همراهیم. پیشنهاد می‌کنم.
                                </div>
                            </div>
                            <div class="review-item">
                                <div class="review-header">
                                    <span>فاطمه محمدی</span>
                                    <span>۱۴۰۴/۰۷/۰۸</span>
                                </div>
                                <div>دوربین عالی داره، مخصوصاً در شرایط کم نور. کیفیت ساخت هم بسیار خوبه.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form id="cartForm" action="/cart/add" method="POST" style="display:none;">
        @csrf
        <input type="hidden" name="product_id" value="101">
        <input type="hidden" name="color">
        <input type="hidden" name="variant">
        <input type="hidden" name="quantity">
    </form>

</x-layout>
