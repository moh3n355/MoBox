<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">

    @vite(['resources/css/shopping-cart.css', 'resources/js/shopping-cart.js'])
</head>



<x-layout>



    <main class="container">




        <section>
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px">
                <h2 style="margin:0">محصولات در سبد</h2>
            </div>
            <div class="products"> <!-- product 1 -->
                <article class="product fade-up">
                    <div class="thumb"><img src="/images/hero.jpg" alt="محصول"></div>
                    <div class="info">
                        <h3 class="title">هدفون بی‌سیم مدل A1</h3>
                        <div class="meta">کیفیت صدای عالی • ضمانت ۱۲ ماهه</div>
                        <div class="price">₼ 420.000</div>
                        <div class="controls">
                            <div class="qty">تعداد: 1</div> <button class="btn ghost">حذف</button> <button
                                class="btn">برو به محصول</button>
                        </div>
                    </div>
                </article>
                <article class="product fade-up">
                    <div class="thumb"><img src="/images/hero.jpg" alt="محصول"></div>
                    <div class="info">
                        <h3 class="title">هدفون بی‌سیم مدل A1</h3>
                        <div class="meta">کیفیت صدای عالی • ضمانت ۱۲ ماهه</div>
                        <div class="price">₼ 420.000</div>
                        <div class="controls">
                            <div class="qty">تعداد: 1</div> <button class="btn ghost">حذف</button> <button
                                class="btn">برو به محصول</button>
                        </div>
                    </div>
                </article>
            </div>
        </section>
    <div class="side-bar">
        <div class="AD">
            محل نمایش تبلیغات
         </div>
        <aside>
            <div class="text-pay">
                <h3>  جمع سبد خرید : ۲۰.۸۰۰۰ تومان</h3>
                <p> سود شما از خرید : ۶.۰۰۰(۳٪) تومان </p>
            </div>
           <div class="pay-btn">
            <button>پرداخت</button>
           </div>
        </aside>
        <div class="tip">
            <i class="fas fa-info-circle"></i> <!-- اطلاعات -->
            <p>هزینه این سفارش هنوز پرداخت نشده‌ و در صورت اتمام موجودی، کالاها از سبد حذف می‌شوند</p>
        </div>

    </div>

    </main>
</x-layout>
