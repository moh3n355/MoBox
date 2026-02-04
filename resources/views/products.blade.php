

<x-layout>

    <x-search-filter :filters="$filters">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product Card</title>
        @vite(['resources/css/products.css', 'resources/js/products.js'])

    </head>

    @php
        dump($filters);
    @endphp

    {{-- <div id="productsContainer">
        @foreach($products as $product)
        <a class="add-to-cart" href="/" data-product-id="{{ $product['id'] }}">
            <div class="card">
                <div class="product-image">
                    <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}">
                </div>
                <h3 class="title">{{ $product['name'] }}</h3>
                <p class="desc">{{ $product['desc'] }}</p>

                <div class="cost">
                    @if(!empty($product['discount']))
                        <p class="discount">{{ $product['discount'] }}%</p>
                    @endif

                    @if(!empty($product['old_price']))
                        <p class="old-price">{{ $product['old_price'] }}</p>
                    @endif
                </div>

                <p class="price">{{ $product['price'] }}</p>
            </div>
        </a>
        @endforeach
    </div> --}}

   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

        // متغیر برای ذخیره نتایج
        let products = [];

        // تابع ساده برای fetch کردن JSON
        async function getProducts() {
            try {
                const response = await fetch(`/products/search?search=${}&category=labtop`, {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json' // مهم برای دریافت JSON
                    }
                });

                // بررسی وضعیت پاسخ
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                // دریافت JSON
                products = await response.json();

                // نمایش در کنسول
                console.log('نتایج JSON:', products);

            } catch (error) {
                console.error('خطا در دریافت اطلاعات:', error);
            }
        }

        // صدا زدن تابع
        getProducts();
</script>


</x-search-filter>
</x-layout>
