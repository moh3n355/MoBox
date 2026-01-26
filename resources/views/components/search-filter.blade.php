<div>
    @props(['filters'])


        <script src="//unpkg.com/alpinejs" defer></script>
        <style>

        </style>

        <section class="categories-slider">
            <button class="cat-nav left">❯</button>

            <div class="categories-track">

                <a href="{{ route('products' , ['category_filter' => 'MobileKeys']) }}" class="category-item">
                    <img src="/images/mobile.png" alt="">
                    <span>موبایل و تبلت</span>
                </a>
                <a href="{{ route('products' , ['category_filter' => 'LabtopKeys']) }}" class="category-item">
                    <img src="/images/laptop3.png" alt="">
                    <span>لپتاپ و اولترابوک</span>
                </a>
                <a href="{{ route('products' , ['category_filter' => 'WatchKeys']) }}" class="category-item">
                    <img src="/images/smartwatch.png" alt="">
                    <span>ساعت هوشمند</span>
                </a>
                <a href="{{ route('products' , ['category_filter' => 'AirPadKeys']) }}" class="category-item" value="airpods">
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
