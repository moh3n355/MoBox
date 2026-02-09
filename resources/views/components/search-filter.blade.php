<div>
    @props(['filters'])


    {{-- <script src="//unpkg.com/alpinejs" defer></script> --}}

    <section class="categories-slider">
        <button class="cat-nav left">❯</button>

        <div class="categories-track">

            <a href="{{ route('products', ['type' => 'MobileKeys','category' => 'mobile']) }}" class="category-item">
                <img src="/images/mobile.png" alt="">
                <span>موبایل و تبلت</span>
            </a>
            <a href="{{ route('products', ['type' => 'LabtopKeys' , 'category' => 'laptop']) }}" class="category-item">
                <img src="/images/laptop3.png" alt="">
                <span>لپتاپ و اولترابوک</span>
            </a>
            <a href="{{ route('products', ['type' => 'WatchKeys' ,'category' => 'watch']) }}" class="category-item">
                <img src="/images/smartwatch.png" alt="">
                <span>ساعت هوشمند</span>
            </a>
            <a href="{{ route('products', ['type' => 'AirPadKeys' ,'category' => 'airPad']) }}" class="category-item" value="airpods">
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

            <form id="filterForm" action={{ route('mainfull_filters') }} method="get">
                {{-- @csrf --}}
                {{-- @php
                    dump($filters);
                @endphp --}}

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
                                            {{ in_array($item, request($group, [])) ? 'checked' : '' }}>
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
                                <input type="number" name="min_price" id="min-price" placeholder="حداقل قیمت">
                                <span>تا</span>
                                <input type="number" name="max_price" id="max-price" placeholder="حداکثر قیمت">
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
                            <input type="checkbox" name="discont" value="true">
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

        document.querySelectorAll('#filterForm input[type="checkbox"]').forEach(cb => {
            cb.addEventListener('change', () => {
                document.getElementById('filterForm').submit();
            });
        });


const form = document.getElementById('filterForm');
const productsGrid = document.querySelector('.products-grid');
const sortSelect = document.getElementById('sort-select');

// جمع‌آوری داده‌ها و ساخت payload
function buildPayload() {
    const filters = {}; // کل فیلترها داخل این شیء
    // چک‌باکس‌ها
    form.querySelectorAll('input[type="checkbox"]').forEach(cb => {
        if (!cb.checked) return;

        const name = cb.name.replace('[]','');

        // موجودی
        if (name === 'available') {
            filters.available = true;
            return;
        }

        // تخفیف
        if (name === 'discont') {
            filters.discont = true;
            return;
        }

        // فیلترهای داینامیک مثل RAM، حافظه، و غیره
        if (!filters[name]) filters[name] = [];
        filters[name].push(cb.value);
    });

    // محدوده قیمت
    const minPrice = form.querySelector('input[name="min_price"]')?.value;
    const maxPrice = form.querySelector('input[name="max_price"]')?.value;
    if (minPrice) filters.min_price = Number(minPrice);
    if (maxPrice) filters.max_price = Number(maxPrice);

    // مرتب‌سازی
    if (sortSelect && sortSelect.value) {
        filters.sort = sortSelect.value;
    }

    // تمام فیلترها داخل یک key به نام filters
    return { filters };
}

// ارسال فیلترها با fetch
function sendFilters() {
    const payload = buildPayload();

    fetch("{{ route('filter') }}", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        },
        body: JSON.stringify(payload)
    })
    .then(res => res.json())
    .then(products => renderProducts(products))
    .catch(err => console.error('Filter error:', err));
}

// رندر محصولات در صفحه
function renderProducts(products) {
    productsGrid.innerHTML = '';

    if (!products.length) {
        productsGrid.innerHTML = `<div class="empty"><p>محصولی با این فیلتر پیدا نشد</p></div>`;
        return;
    }

    products.forEach(p => {
        productsGrid.innerHTML += `
            <article class="product-card">
                <h3>${p.name}</h3>
                <p>${Number(p.price).toLocaleString()} تومان</p>
            </article>
        `;
    });
}

// debounce برای جلوگیری از ارسال request زیاد
function debounce(fn, delay) {
    let timeout;
    return function() {
        clearTimeout(timeout);
        timeout = setTimeout(fn, delay);
    };
}

// همه رویدادها
// چک‌باکس‌ها
form.querySelectorAll('input[type="checkbox"]').forEach(cb => {
    cb.addEventListener('change', debounce(sendFilters, 300));
});

// محدوده قیمت
form.querySelectorAll('input[type="number"]').forEach(input => {
    input.addEventListener('input', debounce(sendFilters, 500));
});

// مرتب‌سازی
if (sortSelect) {
    sortSelect.addEventListener('change', sendFilters);
}

// جلوگیری از submit فرم (کل فرم فقط JS)
form.addEventListener('submit', e => e.preventDefault());
</script>


</div>
