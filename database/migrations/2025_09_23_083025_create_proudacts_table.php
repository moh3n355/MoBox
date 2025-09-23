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
    .info-row {
      display: grid;
      grid-template-columns: 1fr 1fr auto;
      gap: 10px;
      margin-bottom: 8px;
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
    .btn-outline {
      background: transparent;
      border: 2px dashed #6366f1;
      color: #6366f1;
    }
    .error {
      border-color: #ef4444 !important;
    }
    .small {
      font-size: 13px;
      color: #6b7280;
    }
    #preview {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
      margin-top: 10px;
    }
    .preview-item {
      position: relative;
      width: 100px;
      height: 100px;
    }
    .preview-item img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-radius: 8px;
      border: 2px solid #e5e7eb;
    }
    .remove-btn {
      position: absolute;
      top: -6px;
      right: -6px;
      background: #ef4444;
      color: white;
      border: none;
      border-radius: 50%;
      width: 22px;
      height: 22px;
      font-size: 14px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="card">
    <h2>افزودن محصول جدید</h2>

    <form id="productForm" method="POST" action="" enctype="multipart/form-data">
      @csrf

      <div style="margin-bottom:16px">
        <label for="name">نام محصول</label>
        <input type="text" name="name" id="name" required maxlength="255" />
      </div>

      <div style="margin-bottom:16px">
        <label>اطلاعات محصول (کلید / مقدار)</label>
        <div id="infosContainer"></div>
        <div style="margin-top:10px">
          <button type="button" id="addInfoBtn" class="btn btn-outline">+ افزودن مشخصه</button>
          <span class="small">مثال: {"رنگ":"قرمز","وزن":"200g"}</span>
        </div>
        <input type="hidden" name="informations" id="informations" />
      </div>

      <div class="row">
        <div>
          <label for="quantity">موجودی</label>
          <input type="number" name="quantity" id="quantity" min="0" value="0" required />
        </div>
        <div>
          <label for="price">قیمت</label>
          <input type="number" name="price" id="price" min="0" value="0" required />
        </div>
        <div>
          <label for="discount">تخفیف (%)</label>
          <input type="number" name="discount" id="discount" min="0" max="100" placeholder="مثلاً 10" />
        </div>
      </div>

      <div style="margin-bottom:16px">
        <label for="images">آپلود تصاویر محصول (حداکثر ۵ عدد، هر کدام ≤ 1MB)</label>
        <input type="file" name="images[]" id="images" accept="image/*" multiple />
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
      const infosContainer = document.getElementById('infosContainer');
      const addBtn = document.getElementById('addInfoBtn');
      const infosHidden = document.getElementById('informations');
      const form = document.getElementById('productForm');
      const imagesInput = document.getElementById('images');
      const preview = document.getElementById('preview');

      let selectedFiles = [];

      function createInfoRow(key='', value=''){
        const wrapper = document.createElement('div');
        wrapper.className = 'info-row';

        const keyInput = document.createElement('input');
        keyInput.type = 'text';
        keyInput.placeholder = 'کلید (مثلاً رنگ)';
        keyInput.value = key;

        const valInput = document.createElement('input');
        valInput.type = 'text';
        valInput.placeholder = 'مقدار (مثلاً قرمز)';
        valInput.value = value;

        const delBtn = document.createElement('button');
        delBtn.type = 'button';
        delBtn.textContent = '🗑 حذف';
        delBtn.className = 'btn btn-danger';
        delBtn.onclick = () => wrapper.remove();

        wrapper.appendChild(keyInput);
        wrapper.appendChild(valInput);
        wrapper.appendChild(delBtn);
        return wrapper;
      }

      // یک سطر پیش‌فرض
      infosContainer.appendChild(createInfoRow('',''));

      addBtn.addEventListener('click', ()=>{
        infosContainer.appendChild(createInfoRow('',''));
      });

      form.addEventListener('submit', (e)=>{
        const rows = infosContainer.querySelectorAll('.info-row');
        const obj = {};
        let hasError = false;

        rows.forEach(r=>{
          const k = (r.children[0].value || '').trim();
          const v = (r.children[1].value || '').trim();

          if(k === '' || v === ''){
            hasError = true;
            r.children[0].classList.add('error');
            r.children[1].classList.add('error');
          } else {
            r.children[0].classList.remove('error');
            r.children[1].classList.remove('error');
            obj[k] = v;
          }
        });

        if(hasError){
          e.preventDefault();
          alert('لطفاً همه کلید/مقدار‌ها را کامل پر کنید.');
          return;
        }

        infosHidden.value = JSON.stringify(obj);

        if(selectedFiles.length > 5){
          e.preventDefault();
          alert("حداکثر ۵ تصویر مجاز است.");
          return;
        }
      });

      // نمایش و مدیریت پیش‌نمایش
      imagesInput.addEventListener('change', ()=>{
        preview.innerHTML = '';
        selectedFiles = Array.from(imagesInput.files);

        if(selectedFiles.length > 5){
          alert("حداکثر ۵ تصویر مجاز است.");
          imagesInput.value = '';
          selectedFiles = [];
          return;
        }

        selectedFiles.forEach((file, index)=>{
          if(file.size > 1024*1024){
            alert(`حجم فایل "${file.name}" بیشتر از ۱ مگابایت است.`);
            imagesInput.value = '';
            preview.innerHTML = '';
            selectedFiles = [];
            return;
          }

          const reader = new FileReader();
          reader.onload = e=>{
            const wrapper = document.createElement('div');
            wrapper.className = 'preview-item';

            const img = document.createElement('img');
            img.src = e.target.result;

            const removeBtn = document.createElement('button');
            removeBtn.textContent = '×';
            removeBtn.className = 'remove-btn';
            removeBtn.onclick = ()=>{
              selectedFiles.splice(index, 1);
              updateInputFiles();
              wrapper.remove();
            };

            wrapper.appendChild(img);
            wrapper.appendChild(removeBtn);
            preview.appendChild(wrapper);
          }
          reader.readAsDataURL(file);
        });
      });

      function updateInputFiles(){
        const dataTransfer = new DataTransfer();
        selectedFiles.forEach(f => dataTransfer.items.add(f));
        imagesInput.files = dataTransfer.files;
      }
    })();
  </script>
</body>
</html>
