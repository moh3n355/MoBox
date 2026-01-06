<!DOCTYPE html>
<html lang="فا" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>مدیریت کالاها</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite(['resources/css/add-products.css', 'resources/js/add-products.js'])


</head>

<body>
    <div class="container">
        <form action="{{ route('test') }}" method="POST" enctype="multipart/form-data" id="product-form">
            @csrf
            <div class="form-control">


                <div class="field image-upload-multiple">
                    <label>تصاویر کالا:</label>

                    <div class="image-picker-multiple" id="image-picker-multiple">
                        <input type="file" id="product-images" name="images[]" accept="image/*" multiple>
                        <span class="placeholder"><i class="fas fa-image"></i></span>
                        <div class="preview-container" id="preview-container"></div>
                    </div>

                    <div class="container-field">

                        <div class="field">
                            <label for="">نام کالا :</label>
                            <input type="text" name="product_name" id="">
                        </div>

                        <div class="field">
                            <label for="">کد کالا:</label>
                            <input type="text" name="product_code" id="">
                        </div>

                        <div class="field">
                            <label for="">دسته بندی:</label>
                            <p>{{ session('category') }}</p>
                        </div>

                        <div class="field">
                            <label for="">قیمت:</label>
                            <input type="text" name="price" id="">
                        </div>

                        <div class="field">
                            <label for="">برند:</label>
                            <input type="text" name="" id="">
                        </div>
                        <div class="field">
                            <label for="">رنگ:</label>
                            <input type="text" name="" id="">
                        </div>

                        <div class="field">
                            <label for="">موجودی:</label>
                            <input type="text" name="stock" id="">
                        </div>

                        <div class="field">
                            <label for="">تخفیف:</label>
                            <input type="text" name="stock" id="">
                        </div>

                        <div class="field">
                            <label for="">توضیحات بیشتر:</label>
                            <textarea name="" id=""></textarea>
                        </div>

                    </div>
                </div>



                <!-- 🔹 HTML -->
                <div class="field">
                    <label>مشخصات کالا:</label>

                    {{-- <button type="button" class="toggle-specs" id="toggle-specs">
                        نمایش مشخصات
                        <i class="fa-solid fa-chevron-down"></i>
                    </button> --}}


                    <div class="specifications" id="specifications">


                        <!-- ویژگی از پیش‌تعریف‌شده -->

                        @foreach ($keys as $key => $value)
                            <div class="spec-row">
                                <p>{{ is_int($key) ? $value : $key }}:</p>
                                <input type="text" class="spec-value" placeholder="">
                            </div>
                            <hr>
                        @endforeach



                    </div>

                    <!-- دکمه افزودن ویژگی جدید -->
                    <button type="button" class="add-spec" id="add-spec">+ افزودن ویژگی</button>
                </div>




            </div>
            <div class="submit">
            <button type="submit" name="" class="submit-btn">افزودن محصول</button>
        </div>
        </form>
    </div>
</body>

</html>
