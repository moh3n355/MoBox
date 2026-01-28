{{-- <!DOCTYPE html>
<html lang="en"> --}}

{{-- <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">

    @vite(['resources/css/shopping-cart.css', 'resources/js/shopping-cart.js'])
</head> --}}


<x-layout>
    <main class="cart-page">

        <!-- 🛒 لیست محصولات -->
        <section class="cart-items">
            <header class="cart-header">
                <h2>سبد خرید شما</h2>
                <span class="cart-count">۲ کالا</span>
            </header>


            <article class="cart-item">
                <div class="item-image">
                    <img src="/images/hero.jpg" alt="محصول">
                </div>

                {{-- @foreach ( as ) --}}
                    <div class="item-details">
                        <h3 class="item-title">هدفون بی‌سیم مدل A1</h3>
                        <p class="item-desc">کیفیت صدای عالی • ضمانت ۱۲ ماهه</p>

                        <div class="item-footer">
                            <span class="item-price">$ 420.000</span>

                            <div class="item-actions">
                                <span class="item-qty">× 1</span>
                                <button class="btn-outline">حذف</button>
                                <button class="btn-primary">مشاهده</button>
                            </div>
                        </div>
                    </div>
            </article>
            {{-- @endforeach --}}
        </section>

        <!-- 💳 سایدبار پرداخت -->
        <aside class="checkout-panel">
            <div class="promo-box">محل نمایش تبلیغات</div>

            <div class="summary-card">
                <h3>خلاصه سفارش</h3>

                <div class="summary-row">
                    <span>جمع کل</span>
                    <strong>۲۰.۸۰۰ تومان</strong>
                </div>

                <div class="summary-row discount">
                    <span>سود شما</span>
                    <strong>۶.۰۰۰ تومان (۳٪)</strong>
                </div>

                <button class="checkout-btn">ادامه و پرداخت</button>
            </div>

            <div class="cart-alert">
                <p>
                    ⚠️ این سفارش هنوز پرداخت نشده است و در صورت اتمام موجودی،
                    کالاها از سبد حذف خواهند شد.
                </p>
            </div>
        </aside>

    </main>
</x-layout>
