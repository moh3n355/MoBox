<x-layout>

    <div class="product-page container" style="padding: 2rem 1.25rem; max-width: 1200px; margin: 0 auto; color: var(--text);">
        <div class="product-content" style="display: grid; grid-template-columns: 1.1fr 1fr; gap: 24px; align-items: start;">
            <div class="product-gallery" style="background: var(--card); border: 1px solid var(--stroke); border-radius: 16px; padding: 16px; box-shadow: 0 12px 40px rgba(0,0,0,.25);">
                <div class="main-image" style="width: 100%; aspect-ratio: 1/1; background: #0e1224; border-radius: 12px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                    <img id="mainProductImage" src="/images/mobile-phone.png" alt="محصول" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                </div>
                <div class="thumbs" style="display: grid; grid-template-columns: repeat(5, 1fr); gap: 10px; margin-top: 12px;">
                    <img class="thumb" src="/images/mobile-phone.png" alt="" style="width: 100%; height: 80px; object-fit: contain; background: rgba(255,255,255,.04); border: 1px solid var(--stroke); border-radius: 10px; cursor: pointer;">
                    <img class="thumb" src="/images/airpods.png" alt="" style="width: 100%; height: 80px; object-fit: contain; background: rgba(255,255,255,.04); border: 1px solid var(--stroke); border-radius: 10px; cursor: pointer;">
                    <img class="thumb" src="/images/laptop.png" alt="" style="width: 100%; height: 80px; object-fit: contain; background: rgba(255,255,255,.04); border: 1px solid var(--stroke); border-radius: 10px; cursor: pointer;">
                    <img class="thumb" src="/images/speaker.png" alt="" style="width: 100%; height: 80px; object-fit: contain; background: rgba(255,255,255,.04); border: 1px solid var(--stroke); border-radius: 10px; cursor: pointer;">
                    <img class="thumb" src="/images/S26.webp" alt="" style="width: 100%; height: 80px; object-fit: contain; background: rgba(255,255,255,.04); border: 1px solid var(--stroke); border-radius: 10px; cursor: pointer;">
                </div>
            </div>

            <div class="product-info" style="background: var(--card); border: 1px solid var(--stroke); border-radius: 16px; padding: 20px; box-shadow: 0 12px 40px rgba(0,0,0,.25);">
                <h1 style="margin-bottom: 8px;">گوشی موبایل مدل X100</h1>
                <div style="color: var(--muted); margin-bottom: 16px;">برند: موباکس | کد محصول: MBX-X100</div>

                <div class="price-section" style="display: flex; align-items: baseline; gap: 12px; margin-bottom: 18px;">
                    <div style="font-size: 2rem; font-weight: 800; color: #8bd9ff;">۲۳,۹۰۰,۰۰۰ تومان</div>
                    <div style="color: var(--muted); text-decoration: line-through;">۲۶,۵۰۰,۰۰۰</div>
                    <span style="color: #2ecc71; font-weight: 700;">-۱۰٪</span>
                </div>

                <div class="color-picker" style="display: flex; gap: 10px; margin-bottom: 14px;">
                    <span>رنگ:</span>
                    <button class="color-dot" style="width: 26px; height: 26px; border-radius: 50%; border: 2px solid var(--stroke); background: #000;"></button>
                    <button class="color-dot" style="width: 26px; height: 26px; border-radius: 50%; border: 2px solid var(--stroke); background: #1e40af;"></button>
                    <button class="color-dot" style="width: 26px; height: 26px; border-radius: 50%; border: 2px solid var(--stroke); background: #9f1239;"></button>
                </div>

                <div class="variants" style="display: flex; gap: 10px; margin-bottom: 16px; flex-wrap: wrap;">
                    <button style="padding: 10px 12px; border-radius: 10px; border: 1px solid var(--stroke); background: rgba(255,255,255,.04); color: var(--text); cursor: pointer;">128GB</button>
                    <button style="padding: 10px 12px; border-radius: 10px; border: 1px solid var(--stroke); background: rgba(255,255,255,.04); color: var(--text); cursor: pointer;">256GB</button>
                    <button style="padding: 10px 12px; border-radius: 10px; border: 1px solid var(--stroke); background: rgba(255,255,255,.04); color: var(--text); cursor: pointer;">512GB</button>
                </div>

                <div class="actions" style="display: flex; gap: 10px; margin-bottom: 18px; flex-wrap: wrap;">
                    <div style="display: flex; align-items: center; border: 1px solid var(--stroke); border-radius: 12px; overflow: hidden;">
                        <button id="qtyDec" style="background: transparent; color: var(--text); border: none; width: 40px; height: 40px; cursor: pointer;">-</button>
                        <input id="qty" value="1" style="width: 60px; text-align: center; background: rgba(255,255,255,.04); border: none; color: var(--text); height: 40px;" />
                        <button id="qtyInc" style="background: transparent; color: var(--text); border: none; width: 40px; height: 40px; cursor: pointer;">+</button>
                    </div>
                    <button id="addToCart" style="flex: 1; min-width: 200px; background: linear-gradient(135deg, var(--primary), var(--primary-2)); color: #fff; border: 1px solid var(--stroke); border-radius: 12px; padding: 12px; font-weight: 700; cursor: pointer;">افزودن به سبد خرید</button>
                    <button id="buyNow" style="min-width: 160px; background: rgba(255,255,255,.06); color: var(--text); border: 1px solid var(--stroke); border-radius: 12px; padding: 12px; font-weight: 700; cursor: pointer;">خرید فوری</button>
                </div>

                <ul style="margin: 0 0 16px 0; padding: 0 18px; line-height: 1.9; color: var(--muted);">
                    <li>نمایشگر 6.7 اینچی AMOLED با نرخ نوسازی 120Hz</li>
                    <li>پردازنده 8 هسته‌ای نسل جدید با عملکرد بالا</li>
                    <li>باتری 5000 میلی‌آمپر با شارژ سریع 65 واتی</li>
                    <li>دوربین سه‌گانه 108MP با لرزش‌گیر اپتیکال</li>
                    <li>گارانتی 18 ماهه موباکس</li>
                </ul>

                <div class="accordion" style="border-top: 1px solid var(--stroke); padding-top: 14px;">
                    <button class="acc-btn" style="width: 100%; text-align: right; padding: 12px 0; background: none; border: none; color: var(--text); font-weight: 700; cursor: pointer;">توضیحات کامل</button>
                    <div class="acc-panel" style="display: none; color: var(--muted); line-height: 1.9;">
                        این محصول با جدیدترین فناوری‌ها طراحی شده و تعادل عالی بین عملکرد، دوام و زیبایی را ارائه می‌دهد. بدنه مقاوم، نمایشگر روشن و شارژدهی طولانی از ویژگی‌های کلیدی آن است.
                    </div>
                </div>
            </div>
        </div>

        <div style="margin-top: 24px; background: var(--card); border: 1px solid var(--stroke); border-radius: 16px; padding: 16px; box-shadow: 0 12px 40px rgba(0,0,0,.25);">
            <h2 style="margin-bottom: 12px;">نظرات کاربران</h2>
            <div id="reviews" style="display: grid; gap: 14px;">
                <div style="border: 1px solid var(--stroke); border-radius: 12px; padding: 12px;">
                    <div style="display: flex; justify-content: space-between; color: var(--muted);">
                        <span>کاربر مهمان</span>
                        <span>۱۴۰۴/۰۷/۱۴</span>
                    </div>
                    <div style="margin-top: 8px; color: var(--text);">خیلی خوب و سریع بدستم رسید. راضی‌ام.</div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @media (max-width: 992px) {
            .product-content { grid-template-columns: 1fr; }
            .thumbs { grid-template-columns: repeat(4, 1fr) !important; }
        }
        @media (max-width: 560px) {
            .thumbs { grid-template-columns: repeat(3, 1fr) !important; }
        }
    </style>

    <script>
        (function(){
            const main = document.getElementById('mainProductImage');
            document.querySelectorAll('.thumb').forEach(t => {
                t.addEventListener('click', () => { main.src = t.src; });
            });
            const accBtn = document.querySelector('.acc-btn');
            const accPanel = document.querySelector('.acc-panel');
            accBtn && accBtn.addEventListener('click', () => {
                const open = accPanel.style.display === 'block';
                accPanel.style.display = open ? 'none' : 'block';
            });
            const qty = document.getElementById('qty');
            document.getElementById('qtyInc').addEventListener('click', () => qty.value = Math.min(99, (+qty.value||1)+1));
            document.getElementById('qtyDec').addEventListener('click', () => qty.value = Math.max(1, (+qty.value||1)-1));
            document.getElementById('addToCart').addEventListener('click', () => alert('به سبد اضافه شد')); // wire to real route later
            document.getElementById('buyNow').addEventListener('click', () => alert('ادامه به پرداخت'));
        })();
    </script>

</x-layout>

