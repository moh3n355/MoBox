<!doctype html>
<html lang="fa">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>افزودن محصول جدید</title>
  <style>
    body {
      font-family: "Vazirmatn", Tahoma, Arial, sans-serif;
      direction: rtl;
      background: linear-gradient(135deg, #6366f1, #a855f7);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0;
      padding: 20px;
    }
    .card {
      background: #fff;
      border-radius: 16px;
      box-shadow: 0 8px 24px rgba(0,0,0,0.15);
      width: 100%;
      max-width: 850px;
      padding: 30px 40px;
      animation: fadeIn 0.6s ease;
    }
    @keyframes fadeIn {
      from {opacity:0; transform: translateY(20px);}
      to {opacity:1; transform: translateY(0);}
    }
    h2 {
      margin: 0 0 25px;
      text-align: center;
      font-size: 26px;
      color: #4f46e5;
    }
    label {
      display: block;
      font-weight: 600;
      margin-bottom: 6px;
      color: #374151;
    }
    input[type="text"], input[type="number"], input[type="file"] {
      width: 100%;
      padding: 10px 12px;
      border: 2px solid #e5e7eb;
      border-radius: 10px;
      font-size: 15px;
      transition: all 0.25s;
    }
    input:focus {
      border-color: #6366f1;
      outline: none;
      box-shadow: 0 0 6px rgba(99,102,241,0.4);
    }
    .row {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px,1fr));
      gap: 15px;
      margin-bottom: 16px;
    }
    .btn {
      padding: 10px 18px;
      border: none;
      border-radius: 10px;
      font-weight: 600;
      cursor: pointer;
      transition: transform 0.2s, box-shadow 0.2s;
    }
    .btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }
    .btn-primary {
      background: linear-gradient(135deg, #6366f1, #4f46e5);
      color: white;
    }
    .btn-danger {
      background: #ef4444;
      color: white;
    }
    #preview {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
      margin-top: 10px;
    }
    #preview img {
      width: 100px;
      height: 100px;
      object-fit: cover;
      border-radius: 8px;
      border: 2px solid #e5e7eb;
    }
  </style>
</head>
<body>
  <div class="card">
    <h2>افزودن محصول جدید</h2>

    <form id="productForm" method="POST" action="{{ route('ResumeAddProudact') }}" enctype="multipart/form-data">
      @csrf

      {{-- فیلدهای ثابت --}}
      <div style="margin-bottom:16px">
        <label for="name">نام محصول</label>
        <input type="text" id="name" name="name" required />
      </div>

      <div style="margin-bottom:16px">
        <label for="brand">برند</label>
        <input type="text" id="brand" name="brand" required />
      </div>

      <div style="margin-bottom:16px">
        <label for="color">رنگ</label>
        <input type="text" id="color" name="color" placeholder="مثلاً مشکی" />
      </div>

      <div style="margin-bottom:16px">
        <label for="categoery">دسته‌بندی</label>
        <input type="text" id="categoery" name="categoery" required />
      </div>

      <div class="row">
        <div>
          <label for="quantity">موجودی</label>
          <input type="number" id="quantity" name="quantity" min="0" value="0" required />
        </div>
        <div>
          <label for="price">قیمت</label>
          <input type="number" id="price" name="price" min="0" value="0" required />
        </div>
        <div>
          <label for="discount">تخفیف (%)</label>
          <input type="number" id="discount" name="discount" min="0" max="100" placeholder="مثلاً 10" />
        </div>
      </div>

      {{-- کلیدهای داینامیک از config --}}
      <h3 style="margin:20px 0 10px">مشخصات فنی</h3>
      @php
        $extraKeys = config('LaptopInformationKeys');
      @endphp
      <div id="extraInfos">
        @foreach($extraKeys as $key)
          <div style="margin-bottom:12px">
            <label>{{ $key }}</label>
            <input type="text" name="extra[{{ $key }}]" placeholder="مقدار {{ $key }}" />
          </div>
        @endforeach
      </div>

      <div style="margin-bottom:16px">
        <label for="images">آپلود تصاویر محصول (حداکثر ۵ عدد، هر کدام ≤ 1MB)</label>
        <input type="file" name="images" id="images" accept="image/*"/>
        <div id="preview"></div>
      </div>

      <div style="margin-top:20px; text-align:center">
        <button type="submit" class="btn btn-primary">💾 ذخیره محصول</button>
        <button type="reset" class="btn btn-danger" style="margin-right:10px">↺ ریست</button>
      </div>
    </form>
  </div>

  <script>
    (function(){
      const imagesInput = document.getElementById('images');
      const preview = document.getElementById('preview');

      // پیش‌نمایش تصویر
      imagesInput.addEventListener('change', ()=>{
        preview.innerHTML = '';
        const files = Array.from(imagesInput.files);
        if(files.length > 5){
          alert("حداکثر ۵ تصویر مجاز است.");
          imagesInput.value = '';
          return;
        }
        files.forEach(file=>{
          if(file.size > 1024*1024){
            alert(`حجم فایل "${file.name}" بیشتر از ۱ مگابایت است.`);
            imagesInput.value = '';
            preview.innerHTML = '';
            return;
          }
          const reader = new FileReader();
          reader.onload = e=>{
            const img = document.createElement('img');
            img.src = e.target.result;
            preview.appendChild(img);
          }
          reader.readAsDataURL(file);
        });
      });
    })();
  </script>
</body>
</html>
