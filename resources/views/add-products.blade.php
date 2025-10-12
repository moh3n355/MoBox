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
        <form action="{{ route('test') }}" method="POST">
            @csrf
        <div class="form-control">

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
                <label for="">فیلد:</label>
                <input type="text" name="" id="">
            </div>

            <div class="field image-upload-multiple">
                <label>تصاویر کالا:</label>

                <div class="image-picker-multiple" id="image-picker-multiple">
                  <input type="file" id="product-images" accept="image/*">
                  <span class="placeholder"><i class="fas fa-image"></i></span>
                  <div class="preview-container" id="preview-container"></div>
                </div>
              </div>



            <!-- 🔹 HTML -->
            <div class="field">
                <label>مشخصات کالا:</label>


                <div class="specifications" id="specifications">
                    <table>
                        <tr>
                            <td>ویژگی:</td>
                            <td>مقدار:</td>
                        </tr>
                    </table>

                    <!-- ویژگی از پیش‌تعریف‌شده -->
                    <div class="spec-row">
                        <p>{{ "Ram" }}</p>
                        <input type="text" class="spec-value" placeholder="مقدار (مثلاً آبی)">
                    </div>

                    <!-- یکی دیگه -->
                    <div class="spec-row">
                        <p>{{ "Cpu" }}</p>
                        <input type="text" class="spec-value" placeholder="مقدار (مثلاً 200 گرم)">
                    </div>

                    <!-- یکی دیگه -->
                    <div class="spec-row">
                        <p>{{ "Gpu" }}</p>
                        <input type="text" class="spec-value" placeholder="مقدار (مثلاً 200 گرم)">
                    </div>

                </div>

                <!-- دکمه افزودن ویژگی جدید -->
                <button type="button" class="add-spec" id="add-spec">+ افزودن ویژگی</button>
            </div>

            <div class="field">
                <label for="">قیمت:</label>
                <input type="text" name="price" id="">
            </div>

            <div class="field">
                <label for="">موجودی:</label>
                <input type="text" name="stock" id="">
            </div>


        </div>

        <input type="submit" name="" id="">
    </form>
    </div>
</body>

</html>
