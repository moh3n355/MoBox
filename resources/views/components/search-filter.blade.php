<div>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>فیلتر محصولات</title>
        <link rel="stylesheet" href="style.css">
        <style>
            /* استایل پایه */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f5f5f5;
        line-height: 1.6;
    }

    .container {
        display: flex;
        gap: 20px;
        max-width: 1400px;
        margin: 20px auto;
        padding: 0 20px;
    }

    /* استایل بخش فیلتر */
    .filters-sidebar {
        width: 300px;
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        height: fit-content;
        position: sticky;
        top: 20px;
    }

    .filters-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 1px solid #eee;
    }

    .filters-header h2 {
        color: #333;
        font-size: 1.3rem;
    }

    .clear-filters {
        background: #ff4757;
        color: white;
        border: none;
        padding: 8px 15px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 0.9rem;
    }

    .clear-filters:hover {
        background: #ff3742;
    }

    .filter-group {
        margin-bottom: 25px;
    }

    .filter-title {
        font-size: 1.1rem;
        color: #555;
        margin-bottom: 15px;
        font-weight: 600;
    }

    .filter-options {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .filter-option {
        display: flex;
        align-items: center;
        cursor: pointer;
        padding: 8px 0;
        position: relative;
    }

    .filter-option input {
        display: none;
    }

    .checkmark {
        width: 18px;
        height: 18px;
        border: 2px solid #ddd;
        border-radius: 3px;
        margin-left: 10px;
        position: relative;
        transition: all 0.3s ease;
    }

    .filter-option input:checked + .checkmark {
        background: #007bff;
        border-color: #007bff;
    }

    .filter-option input:checked + .checkmark::after {
        content: '✓';
        position: absolute;
        color: white;
        font-size: 12px;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .price-range {
        margin-top: 10px;
    }

    .price-inputs {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
    }

    .price-inputs input {
        width: 120px;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 0.9rem;
    }

    .price-inputs span {
        color: #666;
    }

    .apply-filters {
        width: 100%;
        background: #007bff;
        color: white;
        border: none;
        padding: 12px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 1rem;
        margin-top: 10px;
    }

    .apply-filters:hover {
        background: #0056b3;
    }

    /* استایل بخش محصولات */
    .products-section {
        flex: 1;
    }

    .products-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .products-header h1 {
        color: #333;
        font-size: 1.5rem;
    }

    .sort-options select {
        padding: 10px 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 0.9rem;
        background: white;
    }

    .products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
    }

    .product-card {
        background: white;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        text-align: center;
        transition: transform 0.3s ease;
    }

    .product-card:hover {
        transform: translateY(-5px);
    }

    .product-card img {
        width: 100%;
        height: 150px;
        object-fit: contain;
        margin-bottom: 15px;
    }

    .product-card h3 {
        color: #333;
        margin-bottom: 10px;
        font-size: 1.1rem;
    }

    .product-card p {
        color: #007bff;
        font-weight: bold;
        font-size: 1.1rem;
    }

    /* رسپانسیو */
    @media (max-width: 768px) {
        .container {
            flex-direction: column;
        }

        .filters-sidebar {
            width: 100%;
            position: static;
        }

        .products-header {
            flex-direction: column;
            gap: 15px;
            align-items: flex-start;
        }
    }
        </style>
    </head>

        <div class="container">
            <!-- بخش فیلترها -->
            <aside class="filters-sidebar">
                <div class="filters-header">
                    <h2>فیلتر محصولات</h2>
                    <button class="clear-filters">پاک کردن همه</button>
                </div>

                <!-- دسته‌بندی -->
                <div class="filter-group">
                    <h3 class="filter-title">دسته‌بندی</h3>
                    <div class="filter-options">
                        <label class="filter-option">
                            <input type="checkbox" value="laptop">
                            <span class="checkmark"></span>
                            لپ‌تاپ و الترابوک
                        </label>
                        <label class="filter-option">
                            <input type="checkbox" value="mobile">
                            <span class="checkmark"></span>
                            موبایل و تبلت
                        </label>
                        <label class="filter-option">
                            <input type="checkbox" value="computer">
                            <span class="checkmark"></span>
                            کامپیوتر و قطعات
                        </label>
                        <label class="filter-option">
                            <input type="checkbox" value="accessories">
                            <span class="checkmark"></span>
                            لوازم جانبی
                        </label>
                    </div>
                </div>

                <!-- برند -->
                <div class="filter-group">
                    <h3 class="filter-title">برند</h3>
                    <div class="filter-options">
                        <label class="filter-option">
                            <input type="checkbox" value="apple">
                            <span class="checkmark"></span>
                            اپل
                        </label>
                        <label class="filter-option">
                            <input type="checkbox" value="samsung">
                            <span class="checkmark"></span>
                            سامسونگ
                        </label>
                        <label class="filter-option">
                            <input type="checkbox" value="xiaomi">
                            <span class="checkmark"></span>
                            شیائومی
                        </label>
                        <label class="filter-option">
                            <input type="checkbox" value="huawei">
                            <span class="checkmark"></span>
                            هوآوی
                        </label>
                    </div>
                </div>

                <!-- محدوده قیمت -->
                <div class="filter-group">
                    <h3 class="filter-title">محدوده قیمت (تومان)</h3>
                    <div class="price-range">
                        <div class="price-inputs">
                            <input type="number" id="min-price" placeholder="حداقل قیمت">
                            <span>تا</span>
                            <input type="number" id="max-price" placeholder="حداکثر قیمت">
                        </div>
                    </div>
                </div>

                <!-- دکمه اعمال فیلتر -->
                <button class="apply-filters">اعمال فیلترها</button>
            </aside>

            <!-- بخش محصولات -->
            <main class="products-section">
                <div class="products-header">
                    <h1>محصولات</h1>
                    <div class="sort-options">
                        <select id="sort-select">
                            <option value="newest">جدیدترین</option>
                            <option value="cheapest">ارزان‌ترین</option>
                            <option value="expensive">گران‌ترین</option>
                        </select>
                    </div>
                </div>

                <div class="products-grid">
                    <!-- محصولات در اینجا نمایش داده می‌شوند -->
                    <div class="product-card" data-category="laptop" data-brand="apple" data-price="50000000">
                        <img src="product1.jpg" alt="لپ‌تاپ اپل">
                        <h3>لپ‌تاپ اپل مک‌بوک پرو</h3>
                        <p>۵۰,۰۰۰,۰۰۰ تومان</p>
                    </div>

                    <div class="product-card" data-category="mobile" data-brand="samsung" data-price="15000000">
                        <img src="product2.jpg" alt="گلکسی سامسونگ">
                        <h3>گلکسی S24 سامسونگ</h3>
                        <p>۱۵,۰۰۰,۰۰۰ تومان</p>
                    </div>

                {{ $slot }}

                </div>
            </main>
        </div>

        <script src="script.js"></script>
</div>
