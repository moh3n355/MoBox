{{-- <!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Card</title>
  @vite(['resources/css/products.css', 'resources/js/products.js'])

</head>

<body>
    <div class="grid-box">

        @for ($i = 0; $i < 5; $i++)
        <div class="card">
            <div class="product-image">
                <img src="/images/s26.webp" alt="">
            </div>
            <h3 class="title">Product Name</h3>
            <p class="desc">description</p>
            <p class="price">12,000,000$</p>
          </div>
        @endfor


</div>
</body>
</html> --}}




<x-layout>


    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product Card</title>
        @vite(['resources/css/products.css', 'resources/js/products.js'])

    </head>
    <div class="products-container">
        <div class="grid-box">

            @for ($i = 0; $i < 5; $i++)
            <a class="add-to-cart" href="#" data-product-id="{{ $i + 1 }}">
                <div class="card">
                    <div class="product-image">
                        <img src="/images/s26.webp" alt="Product {{ $i + 1 }}">
                    </div>
                    <h3 class="title">گوشی موبایل Galaxy s26 Ultra </h3>
                    <p class="desc"> رم 12GB حافظه TB 1</p>

                    <div class="cost">
                        <p class="discount">7%</p>
                        <p class="old-price">20,000,00</p>
                    </div>

                    <p class="price">12,000,000</p>




                </div>
            </a>
            @endfor

        </div>
    </div>


</x-layout>
