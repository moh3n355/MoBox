<div>
    @props(['filters'])

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>فیلتر محصولات</title>
        <link rel="stylesheet" href="style.css">
        <script src="//unpkg.com/alpinejs" defer></script>
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
                margin: 20px auto 20px auto;
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
                font-size: 16px;
                font-weight: bold;
                cursor: pointer;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .toggle-icon {
                font-size: 20px;
                font-weight: bold;
            }

            .filter-options {
                display: flex;
                flex-direction: column;
                gap: 12px;
                margin-top: 10px;
            }

            .filter-option {
                display: flex;
                align-items: center;
                cursor: pointer;
                padding: 8px 0;
                position: relative;
                gap: 10px
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

            .clear-filters {
                display: inline-block;
                padding: 6px 12px;
                background-color: #ff4757;
                color: white;
                border-radius: 5px;
                text-decoration: none;
                font-size: 14px;
                cursor: pointer;
            }

            .clear-filters:hover {
                background-color: #ff3742;
            }


            .filter-option input:checked+.checkmark {
                background: #007bff;
                border-color: #007bff;
            }

            .filter-option input:checked+.checkmark::after {
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
                .categories-track {
                    gap: 40px;
                }

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

            @media (max-width: 1200px) {
                .categories-track {
                    gap: clamp(1.5rem, 4vw, 6rem);
                }
            }

            @media (max-width: 768px) {
                .categories-track {
                    gap: clamp(1rem, 5vw, 4rem);
                }
            }

            @media (max-width: 480px) {
                .categories-track {
                    gap: clamp(0.5rem, 4vw, 2rem);
                }
            }


            .categories-slider {
                position: relative;
                /* background: #1b1b1b; */
                background: #336CB1;
                padding: 20px 40px;
                display: flex;
                align-items: center;
                overflow: hidden;
                justify-content: space-around;
            }


            .categories-track {
                display: flex;
                gap: clamp(2rem, 5vw, 8rem);
                /* فاصله ریسپانسیو بین آیتم‌ها */
                overflow-x: auto;
                scroll-behavior: smooth;
                padding: 0;
            }


            .categories-track::-webkit-scrollbar {
                display: none;
            }

            .category-item {
                display: flex;
                flex-direction: column;
                align-items: center;
                text-decoration: none;
                color: #fff;
                min-width: 100px;
                transition: 0.3s;
            }

            .category-item:hover {
                transform: translateY(-3px);
                filter: invert(100%);
            }

            .category-item img {
                width: 40px;
                height: 40px;
                margin-bottom: 10px;

                /* filter: invert(1); */
                filter: brightness(0) saturate(100%) invert(100%) sepia(10%) hue-rotate(220deg);
            }

            .cat-nav {
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                background: none;
                color: #ccc;
                border: none;
                font-size: 28px;
                cursor: pointer;
                padding: 10px;
                z-index: 10;
            }

            .cat-nav.left {
                left: 10px;
            }

            .cat-nav.right {
                right: 10px;
            }

            .cat-nav:hover {
                color: white;
            }

            [x-cloak] {
                display: none !important;
            }
        </style>

        <section class="categories-slider">
            <button class="cat-nav left">❯</button>

            <div class="categories-track">

                <a href="#" class="category-item">
                    <img src="/images/mobile.png" alt="">
                    <span>موبایل و تبلت</span>
                </a>
                <a href="#" class="category-item">
                    <img src="/images/laptop3.png" alt="">
                    <span>لپتاپ و اولترابوک</span>
                </a>
                <a href="#" class="category-item">
                    <img src="/images/smartwatch.png" alt="">
                    <span>ساعت هوشمند</span>
                </a>
                <a href="#" class="category-item">
                    <img src="/images/airpod.png" alt="">
                    <span>ایرپاد و هندزفری</span>
                </a>
            </div>

            <button class="cat-nav right">❮</button>
        </section>

    </head>

    <div class="container">
        <!-- بخش فیلترها -->
        <aside class="filters-sidebar">
            <div class="filters-header">
                <h2>فیلتر محصولات</h2>
                <div x-data>
                    <a href="#" class="clear-filters"
                        @click.prevent="
                    document.querySelectorAll('#filterForm input[type=checkbox]').forEach(cb => cb.checked = false);
                    document.getElementById('filterForm').submit();
                 ">
                        پاک کردن همه
                    </a>

                </div>
            </div>



            {{-- filter ha --}}

            <form id="filterForm" action=# method="GET">

                @foreach ($filters as $group => $items)
                    @if (!empty($items))
                        <div class="filter-group" x-data="{ open: false }">

                            <h3 class="filter-title" @click="open = !open">
                                <span>{{ $group }}</span>
                                <span class="toggle-icon">
                                    <span x-show="!open">+</span>
                                    <span x-show="open">−</span>
                                </span>
                            </h3>

                            <div class="filter-options" x-show="open" x-transition x-cloak>
                                @foreach ($items as $item)
                                    <label class="filter-option">
                                        <input type="checkbox" name="{{ $group }}[]" value="{{ $item }}"
                                            {{ in_array($item, request($group, [])) ? 'checked' : '' }}>
                                        {{ $item }}
                                        <span class="checkmark"></span>
                                    </label>
                                @endforeach
                            </div>

                        </div>
                    @endif
                @endforeach

            </form>




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

                {{ $slot }}

            </div>

        </main>
    </div>

    <script>
        const track = document.querySelector(".categories-track");
        const leftBtn = document.querySelector(".cat-nav.left");
        const rightBtn = document.querySelector(".cat-nav.right");

        rightBtn.addEventListener("click", () => {
            track.scrollBy({
                left: 300,
                behavior: "smooth"
            });
        });

        leftBtn.addEventListener("click", () => {
            track.scrollBy({
                left: -300,
                behavior: "smooth"
            });
        });

        document.querySelectorAll('#filterForm input[type="checkbox"]').forEach(cb => {
            cb.addEventListener('change', () => {
                document.getElementById('filterForm').submit();
            });
        });
    </script>

</div>
