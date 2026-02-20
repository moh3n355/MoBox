<x-layout>


    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <div class="ps-container">
        <div class="ps-product-content">
            <!-- گالری تصاویر -->
            <div class="ps-product-gallery ps-card">
                <div class="ps-main-image">
                    <img id="mainProductImage" src="/images/mobile-phone.png" alt="گوشی موبایل مدل X100">
                </div>
                <div class="ps-thumbs">
                    <img class="ps-thumb active" src="/images/mobile-phone.png" alt="نمای جلوی محصول">
                    <img class="ps-thumb" src="/images/S26.webp" alt="نمای جانبی محصول">
                </div>
            </div>

            <!-- اطلاعات محصول -->
            <div class="ps-product-info ps-card">
                <h1></h1>
                <div class="ps-product-meta"></div>

                {{-- <div class="ps-stock-status">موجود در انبار</div> --}}

                <div class="ps-price-section">
                    <div class="ps-current-price"></div>
                    <div class="ps-original-price"></div>
                    <div class="ps-discount-badge"></div>
                </div>

                <!-- گزینه‌ها -->
                <div class="ps-option-section">
                    <div class="ps-option-title">رنگ:</div>
                    <div class="ps-color-picker">
                        {{-- <button class="ps-color-dot active" style="background: #000;" data-color="مشکی"></button>
                        <button class="ps-color-dot" style="background: #1e40af;" data-color="آبی"></button>
                        <button class="ps-color-dot" style="background: #9f1239;" data-color="قرمز"></button> --}}
                    </div>
                </div>

                <div class="ps-option-section">
                    <div class="ps-option-title">حافظه داخلی:</div>
                    <div class="ps-variants">
                        {{-- <button class="ps-variant-btn active" data-variant="128GB">128GB</button>
                        <button class="ps-variant-btn" data-variant="256GB">256GB</button>
                        <button class="ps-variant-btn" data-variant="512GB">512GB</button> --}}
                    </div>
                </div>

                <!-- دکمه‌های اقدام -->
                <div class="ps-actions">
                    {{-- <div class="ps-quantity-selector">
                        <button id="qtyDec" class="ps-qty-btn">-</button>
                        <input id="qty" class="ps-qty-input" value="1" min="1" max="2">
                        <button id="qtyInc" class="ps-qty-btn">+</button>
                    </div> --}}
                    <button type="button" id="addToCart" class="ps-btn ps-btn-primary">
                        <span>افزودن به سبد خرید</span>
                    </button>
                </div>

                <!-- ویژگی‌ها -->
                {{-- <ul class="ps-features">
                    <li>نمایشگر 6.7 اینچی AMOLED با نرخ نوسازی 120Hz</li>
                    <li>پردازنده 8 هسته‌ای نسل جدید با عملکرد بالا</li>
                    <li>باتری 5000 میلی‌آمپر با شارژ سریع 65 واتی</li>
                    <li>دوربین سه‌گانه 108MP با لرزش‌گیر اپتیکال</li>
                    <li>گارانتی 18 ماهه موباکس</li>
                </ul> --}}

                <!-- تب‌های افقی -->
                <div class="ps-tabs-horizontal">
                    <div class="ps-tabs-header">
                        <button class="ps-tab-horizontal active" data-tab="description">توضیحات کامل</button>
                        <button class="ps-tab-horizontal" data-tab="specs">مشخصات فنی</button>
                        <button class="ps-tab-horizontal" data-tab="reviews">نظرات کاربران</button>
                    </div>
                    <div class="ps-tabs-content">
                        <!-- تب توضیحات -->
                        <div id="description" class="ps-tab-panel active">
                        </div>

                        <!-- تب مشخصات فنی -->
                        <div id="specs" class="ps-tab-panel">
                            <table class="ps-specs-table">
                            </table>
                        </div>

                        <!-- تب نظرات -->
                        <div id="reviews" class="ps-tab-panel">
                            <div class="ps-review-item">
                                <div class="ps-review-header">
                                    <span>کاربر مهمان</span>
                                    <span>۱۴۰۴/۰۷/۱۴</span>
                                </div>
                                <div>خیلی خوب و سریع بدستم رسید. راضی‌ام.</div>
                            </div>
                            <div class="ps-review-item">
                                <div class="ps-review-header">
                                    <span>محمد رضایی</span>
                                    <span>۱۴۰۴/۰۷/۱۰</span>
                                </div>
                                <div>باتری فوق‌العاده‌ای داره، کل روز رو بدون نیاز به شارژ همراهیم. پیشنهاد می‌کنم.
                                </div>
                            </div>
                            <div class="ps-review-item">
                                <div class="ps-review-header">
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

    <!-- فرم افزودن به سبد خرید (مخفی) -->
    {{-- <form id="cartForm" action="{{ route('AddToShopingCart') }}" method="POST" style="display:none;">
        @csrf
        <input type="hidden" name="product_id" value="101">
        <input type="hidden" name="color">
        <input type="hidden" name="variant">
        <input type="hidden" name="quantity">
    </form> --}}

    <script>
        // ===================== tab manage ================
        document.addEventListener('DOMContentLoaded', () => {
            const tabs = document.querySelectorAll('.ps-tab-horizontal');
            const panels = document.querySelectorAll('.ps-tab-panel');

            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    // حذف active از همه تب‌ها
                    tabs.forEach(t => t.classList.remove('active'));
                    // اضافه کردن active به تب کلیک شده
                    tab.classList.add('active');

                    // مخفی کردن همه پنل‌ها
                    panels.forEach(p => p.classList.remove('active'));
                    // نمایش پنل مرتبط
                    const target = document.getElementById(tab.dataset.tab);
                    if (target) target.classList.add('active');
                });
            });
        });

        // ============== loading info =================

        async function loadProduct(id) {
            try {
                const response = await axios.get(`/products/getById/${id}`);
                const product = response.data[0];
                console.log('product =>  ', product);

                // عنوان و برند
                document.querySelector('.ps-product-info h1').textContent = product.name;
                document.querySelector('.ps-product-meta').textContent =
                    `برند: ${product.data.brand} | کد محصول: ${product.id}`;

                // موجودی
                const add_cart_btn = document.getElementById('addToCart');
                if (product.amount > 0) {
                    add_cart_btn.textContent = 'افزودن به سبد خرید';
                    add_cart_btn.disabled = false;
                    add_cart_btn.style.backgroundColor = '';
                    add_cart_btn.enabled;
                } else {
                    add_cart_btn.textContent = 'ناموجود';
                    add_cart_btn.disabled = true;
                    add_cart_btn.style = 'background-color: gray ; cursor: default;';
                    add_cart_btn.disabled;
                }

                // قیمت و تخفیف
                const currentPriceElem = document.querySelector('.ps-current-price');
                const originalPriceElem = document.querySelector('.ps-original-price');
                const discountElem = document.querySelector('.ps-discount-badge');

                let basePrice = Number(product.price);
                let discount = product.off || 0;
                let finalPrice = basePrice * (1 - discount / 100);

                currentPriceElem.textContent = finalPrice.toLocaleString() + ' تومان';

                if (discount > 0) {
                    originalPriceElem.textContent = basePrice.toLocaleString() + ' تومان';
                    discountElem.textContent = `-${discount}%`;
                    originalPriceElem.style.display = 'inline-block';
                    discountElem.style.display = 'inline-block';
                } else {
                    originalPriceElem.style.display = 'none';
                    discountElem.style.display = 'none';
                }

                // رنگ‌ها
                const colorContainer = document.querySelector('.ps-color-picker');
                colorContainer.innerHTML = '';
                const colors = product.data.colors || [product.color];
                colors.forEach((c, idx) => {
                    const btn = document.createElement('button');
                    btn.className = 'ps-color-dot' + (idx === 0 ? ' active' : '');
                    btn.style.background = c.hex || '#000';
                    btn.dataset.color = c.name || c;
                    btn.addEventListener('click', () => {
                        document.querySelectorAll('.ps-color-dot').forEach(b => b.classList.remove(
                            'active'));
                        btn.classList.add('active');
                    });
                    colorContainer.appendChild(btn);
                });

                // RAM و حافظه داخلی
                const variantContainer = document.querySelector('.ps-variants');
                variantContainer.innerHTML = '';
                const variants = product.data.variants || [{
                    ram: product.data.ram,
                    storage: product.data.storage
                }];
                variants.forEach((v, idx) => {
                    const btn = document.createElement('button');
                    btn.className = 'ps-variant-btn' + (idx === 0 ? ' active' : '');
                    const variantText = (typeof v === 'object') ? `${v.ram} / ${v.storage}` : v;
                    btn.dataset.variant = variantText;
                    btn.textContent = variantText;

                    btn.addEventListener('click', () => {
                        document.querySelectorAll('.ps-variant-btn').forEach(b => b.classList.remove(
                            'active'));
                        btn.classList.add('active');
                    });

                    variantContainer.appendChild(btn);
                });

                // توضیحات
                const descriptionElem = document.getElementById('description');
                descriptionElem.innerHTML = `
                    <h3>${product.name} - توضیحات کامل</h3>
                    <p>${product.description}</p>
                `;

                // مشخصات فنی
                const specsTable = document.querySelector('.ps-specs-table');
                specsTable.innerHTML = '';
                let data = product.data;
                if (typeof data === 'string') data = JSON.parse(data);

                function formatValue(val) {
                    if (typeof val !== 'object' || val === null) return val;
                    if (Array.isArray(val)) return val.map(v => formatValue(v)).join(' , ');
                    return Object.entries(val)
                        .filter(([k]) => k !== 'hex')
                        .map(([, v]) => formatValue(v))
                        .join(' / ');
                }

                for (const key in data) {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td class="spec-key">${key}</td>
                        <td class="spec-val">${formatValue(data[key])}</td>
                    `;
                    specsTable.appendChild(row);
                }

            } catch (error) {
                console.error('خطا در دریافت محصول:', error);
            }
        }


        // ================= add cart function ==============

        async function addCart(produce_id) {
                const btn = document.getElementById('addToCart');

                const color = document.querySelector('.ps-color-dot.active')?.dataset.color || '';
                const variant = document.querySelector('.ps-variant-btn.active')?.dataset.variant || '';

                const payload = {
                    product_id: produce_id,
                    color,
                    variant,
                };

                try {
                    const res = await axios.post('/profile/shoping-cart/add', payload);
                    const response = res.data;

                    console.log(response);

                    if (response.success === true) {

                        // updateCartCounter(response.);
                        // حالت موفق
                        btn.disabled = true;
                        btn.classList.remove('ps-btn-primary');
                        btn.classList.add('ps-btn-success');
                        btn.innerHTML = '✔ اضافه شد';

                        // بازگشت به حالت عادی بعد 2 ثانیه
                        setTimeout(() => {
                            btn.disabled = false;
                            btn.classList.remove('ps-btn-success');
                            btn.classList.add('ps-btn-primary');
                            btn.innerHTML = '<span>افزودن به سبد خرید</span>';
                        }, 2000);
                    }

                } catch (err) {

                    console.error(err);

                }

            }

                // ===================== lisener for actions =========================

                document.addEventListener('DOMContentLoaded', () => {
                    const path = window.location.pathname;
                    const produce_id = path.split('/').pop();

                    // بارگذاری محصول
                    loadProduct(produce_id);

                    // مدیریت افزودن به سبد خرید
                    document.getElementById('addToCart').addEventListener('click', () => {
                        addCart(produce_id);
                    });

                });
    </script>



</x-layout>
