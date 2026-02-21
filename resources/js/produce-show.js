document.addEventListener('DOMContentLoaded', function() {

    // گالری تصاویر
    const mainImage = document.getElementById('mainProductImage');
    const thumbs = document.querySelectorAll('.ps-thumb');

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

    // انتخاب رنگ
    const colorDots = document.querySelectorAll('.ps-color-dot');
    colorDots.forEach(dot => {
        dot.addEventListener('click', function() {
            colorDots.forEach(d => d.classList.remove('active'));
            this.classList.add('active');
        });
    });

    // انتخاب حافظه/مدل
    const variantBtns = document.querySelectorAll('.ps-variant-btn');
    variantBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            variantBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
        });
    });

    // تب‌ها
    const tabButtons = document.querySelectorAll('.ps-tab-horizontal');
    const tabPanels = document.querySelectorAll('.ps-tab-panel');

    tabButtons.forEach(button => {
        button.addEventListener('click', function() {
            const targetTab = this.dataset.tab;
            tabButtons.forEach(btn => btn.classList.remove('active'));
            tabPanels.forEach(panel => panel.classList.remove('active'));
            this.classList.add('active');
            document.getElementById(targetTab).classList.add('active');
        });
    });

    // افزودن به سبد خرید
    const addToCartBtn = document.getElementById('addToCart');

    addToCartBtn.addEventListener('click', function() {
        const selectedColor = document.querySelector('.ps-color-dot.active').getAttribute('data-color');
        const selectedVariant = document.querySelector('.ps-variant-btn.active').getAttribute('data-variant');
        const quantity = qtyInput.value;

        // مقداردهی فرم مخفی
        document.querySelector('input[name=color]').value = selectedColor;
        document.querySelector('input[name=variant]').value = selectedVariant;
        document.querySelector('input[name=quantity]').value = quantity;

        // ارسال فرم
        document.getElementById('cartForm').submit();
    });

});
