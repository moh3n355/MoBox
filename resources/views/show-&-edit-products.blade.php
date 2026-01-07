<x-layout>


    {{-- <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product Card</title>
        @vite(['resources/css/products.css', 'resources/js/products.js', 'resources/js/show-&-edit-products.js', 'resources/css/show-&-edit-products.css'])

        <style>

        </style>
    </head> --}}

    <div class="page-header">
        <div class="topic">
            <i class="fa-solid fa-box-open"></i>
            <h1>مدیریت کالاها</h1>
        </div>
        <div class="actions">
            <button class="btn btn-primary" id="btn-add"><i class="fa-solid fa-plus"></i> افزودن کالا</button>
        </div>
    </div>

    <div class="products-container">
        <div class="grid-box">

            @for ($i = 0; $i < 5; $i++)
                <div class="card">

                    <div class="card-buttons">
                        <a class="info-btn" href="#" data-product-id="{{ $i + 1 }}"><i
                                class="fas fa-info"></i></a>
                        <button class="edit-btn" data-product-id="{{ $i + 1 }}"><i
                                class="fas fa-edit"></i></button>
                        <button class="delete-btn" data-product-id="{{ $i + 1 }}"><i
                                class="fas fa-trash-alt"></i></button>
                    </div>

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
            @endfor

        </div>
    </div>

    <div class="toasts" id="toasts"></div>

    <!-- Modal: Add/Edit Product -->
    <div class="modal-backdrop" id="modal-backdrop">
        <form id="upload-form" action="{{ route('show-&-edit-products') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="modal" id="modal" role="dialog" aria-modal="true">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal-title">انتخاب دسته بندی:</h3>
                    <button type="button" class="btn-secondary" id="modal-close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-control">
                        <button type="submit" name="category" value="MobileKeys"
                            class="btn btn-primary">موبایل</button>
                        <button type="submit" name="category" value="LabtopKeys" class="btn btn-primary">لپتاپ</button>
                        <button type="submit" name="category" value="WatchKeys" class="btn btn-primary">ساعت
                            هوشمند</button>
                        <button type="submit" name="category" value="AirPadKeys"
                            class="btn btn-primary">ایرپاد</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-layout>
