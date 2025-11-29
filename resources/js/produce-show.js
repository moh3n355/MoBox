document.addEventListener('DOMContentLoaded', function() {

    // گالری
    const mainImage = document.getElementById('mainProductImage');
    const thumbs = document.querySelectorAll('.thumb');

    thumbs.forEach(thumb => {
        thumb.addEventListener('click', function() {
            thumbs.forEach(t => t.classList.remove('active'));
            this.classList.add('active');
            mainImage.src = this.src;
            mainImage.alt = this.alt;
        });
    });

    // تعداد
    const qtyInput = document.getElementById('qty');
    const qtyInc = document.getElementById('qtyInc');
    const qtyDec = document.getElementById('qtyDec');

    qtyInc.addEventListener('click', () => {
        let val = parseInt(qtyInput.value) || 1;
        if (val < 99) qtyInput.value = val + 1;
    });

    qtyDec.addEventListener('click', () => {
        let val = parseInt(qtyInput.value) || 1;
        if (val > 1) qtyInput.value = val - 1;
    });

    // رنگ
    const colorDots = document.querySelectorAll('.color-dot');
    colorDots.forEach(dot => {
        dot.addEventListener('click', function() {
            colorDots.forEach(d => d.classList.remove('active'));
            this.classList.add('active');
        });
    });

    // مدل
    const variantBtns = document.querySelectorAll('.variant-btn');
    variantBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            variantBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
        });
    });

    // تب‌ها
    const tabButtons = document.querySelectorAll('.tab-horizontal');
    const tabPanels = document.querySelectorAll('.tab-panel');

    tabButtons.forEach(button => {
        button.addEventListener('click', function() {
            const targetTab = this.dataset.tab;
            tabButtons.forEach(btn => btn.classList.remove('active'));
            tabPanels.forEach(panel => panel.classList.remove('active'));
            this.classList.add('active');
            document.getElementById(targetTab).classList.add('active');
        });
    });

    // فرم افزودن به سبد خرید
    const addToCartBtn = document.getElementById('addToCart');

    addToCartBtn.addEventListener('click', function() {
        const selectedColor = document.querySelector('.color-dot.active').getAttribute(
            'data-color');
        const selectedVariant = document.querySelector('.variant-btn.active').getAttribute(
            'data-variant');
        const quantity = qtyInput.value;

        // مقداردهی فرم
        document.querySelector('input[name=color]').value = selectedColor;
        document.querySelector('input[name=variant]').value = selectedVariant;
        document.querySelector('input[name=quantity]').value = quantity;

        // ارسال فرم
        document.getElementById('cartForm').submit();
    });

});
