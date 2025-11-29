document.addEventListener('DOMContentLoaded', function() {
    // گالری تصاویر
    const mainImage = document.getElementById('mainProductImage');
    const thumbs = document.querySelectorAll('.thumb');

    thumbs.forEach(thumb => {
        thumb.addEventListener('click', function() {
            // حذف کلاس active از همه تصاویر
            thumbs.forEach(t => t.classList.remove('active'));
            // اضافه کردن کلاس active به تصویر انتخاب شده
            this.classList.add('active');
            // تغییر تصویر اصلی
            mainImage.src = this.src;
            mainImage.alt = this.alt;
        });
    });

    // آکاردئون توضیحات
    const accBtn = document.querySelector('.acc-btn');
    const accPanel = document.querySelector('.acc-panel');

    accBtn.addEventListener('click', function() {
        this.classList.toggle('active');
        accPanel.classList.toggle('active');
    });

    // کنترل تعداد
    const qtyInput = document.getElementById('qty');
    const qtyInc = document.getElementById('qtyInc');
    const qtyDec = document.getElementById('qtyDec');

    qtyInc.addEventListener('click', function() {
        let currentValue = parseInt(qtyInput.value) || 1;
        if (currentValue < 99) {
            qtyInput.value = currentValue + 1;
        }
    });

    qtyDec.addEventListener('click', function() {
        let currentValue = parseInt(qtyInput.value) || 1;
        if (currentValue > 1) {
            qtyInput.value = currentValue - 1;
        }
    });

    // انتخاب رنگ
    const colorDots = document.querySelectorAll('.color-dot');
    colorDots.forEach(dot => {
        dot.addEventListener('click', function() {
            colorDots.forEach(d => d.classList.remove('active'));
            this.classList.add('active');
        });
    });

    // انتخاب مدل
    const variantBtns = document.querySelectorAll('.variant-btn');
    variantBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            variantBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
        });
    });

    // دکمه‌های اقدام
    const addToCartBtn = document.getElementById('addToCart');
    const buyNowBtn = document.getElementById('buyNow');

    addToCartBtn.addEventListener('click', function() {
        const selectedColor = document.querySelector('.color-dot.active').getAttribute('data-color');
        const selectedVariant = document.querySelector('.variant-btn.active').getAttribute('data-variant');
        const quantity = qtyInput.value;

        // در اینجا می‌توانید منطق افزودن به سبد خرید را پیاده‌سازی کنید
    // ===============================================================================
    // ===============================================================================
    // ===============================================================================
        addToCartBtn.addEventListener('click', async function() {
const selectedColor = document.querySelector('.color-dot.active').getAttribute('data-color');
const selectedVariant = document.querySelector('.variant-btn.active').getAttribute('data-variant');
const quantity = qtyInput.value;

const data = {
color: selectedColor,
variant: selectedVariant,
quantity: quantity,
product_id: 101 // اختیاری - مثلا ID محصول
};

// ارسال به بک‌اند با Fetch
const response = await fetch('/add-to-cart', {
method: 'POST',
headers: {
    'Content-Type': 'application/json',
    'X-CSRF-TOKEN': window.csrf ?? '' // اگر لاراول یا امنیت داری
},
body: JSON.stringify(data)
});

const result = await response.json();
console.log(result);

alert(result.message);
});

     // ===============================================================================
    // ===============================================================================
    // ===============================================================================

    });

    buyNowBtn.addEventListener('click', function() {
        // در اینجا می‌توانید کاربر را به صفحه پرداخت هدایت کنید
        alert('ادامه به صفحه پرداخت...');
    });
});