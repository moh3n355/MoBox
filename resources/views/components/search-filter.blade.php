<div>
    @props(['filters'])


    {{-- <script src="//unpkg.com/alpinejs" defer></script> --}}

    <section class="categories-slider">
        <button class="cat-nav left">❯</button>

♦        <form id="categoryform" action="{{ route('set_filters') }}" method="GET">
            <div class="categories-track">

                <input type="hidden" name="type" id="typeInput">
                <input type="hidden" name="category" id="categoryInput">

                <button type="button" class="category-item" data-type="MobileKeys" data-category="mobile">
                    <img src="/images/mobile.png" alt="">
                    <span>موبایل و تبلت</span>
                </button>

                <button type="button" class="category-item" data-type="LabtopKeys" data-category="laptop">
                    <img src="/images/laptop3.png" alt="">
                    <span>لپتاپ و اولترابوک</span>
                </button>

                <button type="button" class="category-item" data-type="WatchKeys" data-category="watch">
                    <img src="/images/smartwatch.png" alt="">
                    <span>ساعت هوشمند</span>
                </button>

                <button type="button" class="category-item" data-type="AirPadKeys" data-category="airPad">
                    <img src="/images/airpod.png" alt="">
                    <span>ایرپاد و هندزفری</span>
                </button>


            </div>
        </form>

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

            <form id="filterForm" action={{ route('set_filters') }} method="get">
                {{-- @csrf --}}

                <input type="hidden" name="type" value="{{ session('set_filters.params.type') }}">
                <input type="hidden" name="category" value="{{ session('set_filters.params.category') }}">

                @foreach ($filters as $group => $items)
                    @if (!empty($items) && $group != 'category')
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
                                            {{ in_array($item, session('set_filters.filters.' . $group, [])) ? 'checked' : '' }}>
                                        {{ $item }}
                                        <span class="checkmark"></span>
                                    </label>
                                @endforeach
                            </div>

                        </div>
                    @endif
                @endforeach

                <!-- محدوده قیمت -->
                <div class="filter-group" x-data="{ open: false }">
                    <h3 class="filter-title" @click="open = !open">محدوده قیمت (تومان)
                        <span class="toggle-icon">
                            <span x-show="!open">+</span>
                            <span x-show="open">−</span>
                        </span>
                    </h3>


                    <div class="filter-options" x-show="open" x-transition x-cloak>
                        <div class="price-range">
                            <div class="price-inputs">
                                <input type="number" name="min_price" id="min-price"
                                    value="{{ session('set_filters.filters.min_price') }}"  placeholder="حداقل قیمت">
                                <span>تا</span>
                                <input type="number" name="max_price" id="max-price"
                                    value="{{ session('set_filters.filters.max_price') }}" placeholder="حداکثر قیمت">
                            </div>
                        </div>
                    </div>

                </div>

                {{-- -- تخفیف --  --}}
                <div class="filter-group" x-data="{ open: false }">

                    <h3 class="filter-title" @click="open = !open">تخفیف
                        <span class="toggle-icon">
                            <span x-show="!open">+</span>
                            <span x-show="open">−</span>
                        </span>
                    </h3>

                    <div class="filter-options" x-show="open" x-transition x-cloak>
                        <label class="filter-option">
                            <input type="checkbox" name="discount" value="true">
                            <span class="checkmark"></span>
                        </label>
                    </div>

                </div>

                <!-- دکمه اعمال فیلتر -->
                <button type="submit" class="apply-filters">اعمال فیلترها</button>
        </aside>

        </form>






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

            {{-- <div class="products-grid"> --}}

            {{ $slot }}

            {{-- </div> --}}

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

        function mergeCategoryIntoFilterAndSubmit(clickedCategoryBtn = null) {
            const filterForm = document.getElementById('filterForm');

            // حذف hidden های قبلی merge شده
            filterForm.querySelectorAll('.merged-from-category').forEach(e => e.remove());

            let type = '';
            let category = '';

            if (clickedCategoryBtn) {
                // مستقیم از dataset دکمه می‌گیریم
                type = clickedCategoryBtn.dataset.type || '';
                category = clickedCategoryBtn.dataset.category || '';
            } else {
                // اگر تغییر checkbox است، مقدار session blade استفاده شود
                type = '{{ session("set_filters.params.type") }}';
                category = '{{ session("set_filters.params.category") }}';
            }

            // اضافه کردن hidden ها به filterForm
            const hiddenType = document.createElement('input');
            hiddenType.type = 'hidden';
            hiddenType.name = 'type';
            hiddenType.value = type;
            hiddenType.classList.add('merged-from-category');
            filterForm.appendChild(hiddenType);

            const hiddenCategory = document.createElement('input');
            hiddenCategory.type = 'hidden';
            hiddenCategory.name = 'category';
            hiddenCategory.value = category;
            hiddenCategory.classList.add('merged-from-category');
            filterForm.appendChild(hiddenCategory);

            filterForm.submit();
        }

        // event listener برای کلیک روی category
        document.querySelectorAll('#categoryform .category-item').forEach(btn => {
            btn.addEventListener('click', function() {
                mergeCategoryIntoFilterAndSubmit(this);
            });
        });

        // event listener برای تغییر checkbox ها
        document.querySelectorAll('#filterForm input[type="checkbox"]').forEach(cb => {
            cb.addEventListener('change', () => mergeCategoryIntoFilterAndSubmit());
        });
    </script>


</div>
