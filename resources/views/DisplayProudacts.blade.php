<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>فروشگاه</title>
<style>
  body {
    font-family: Vazirmatn, Tahoma, sans-serif;
    margin: 0;
    background: #f5f6fa;
    color: #333;
  }

  .container {
    max-width: 1200px;
    margin: 20px auto;
    display: grid;
    grid-template-columns: 280px 1fr;
    gap: 20px;
  }

  aside {
    background: #fff;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 4px 10px rgba(0,0,0,.05);
  }

  aside h3 {
    margin-top: 0;
    font-size: 18px;
    border-bottom: 2px solid #eee;
    padding-bottom: 8px;
  }

  .filter-form .group {
    margin-bottom: 15px;
    display: flex;
    flex-direction: column;
  }

  .filter-form label {
    margin-bottom: 6px;
    font-weight: 600;
    font-size: 14px;
    color: #444;
  }

  .filter-form input[type="checkbox"] {
    margin-left: 8px;
  }

  .filter-form .option {
    display: flex;
    align-items: center;
    margin-bottom: 5px;
    font-size: 14px;
  }

  .filter-form .controls {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
  }

  .filter-form button,
  .filter-form a {
    padding: 10px 16px;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    text-decoration: none;
    text-align: center;
    transition: all .2s;
  }

  .filter-form button {
    background: #6366f1;
    border: none;
    color: #fff;
  }

  .filter-form button:hover { background: #4f46e5; }
  .filter-form a { background: #f3f4f6; color: #444; }
  .filter-form a:hover { background: #e5e7eb; }

  main {
    display: flex;
    flex-direction: column;
  }

  .products-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
  }

  .products-header span {
    background: #eef2ff;
    color: #4338ca;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 13px;
  }

  .products-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
    gap: 16px;
  }

  .card {
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,.06);
    overflow: hidden;
    display: flex;
    flex-direction: column;
    transition: transform .2s;
  }

  .card:hover { transform: translateY(-4px); }
  .card img { width: 100%; height: 160px; object-fit: cover; }
  .card .info { padding: 12px; display: flex; flex-direction: column; gap: 6px; }
  .card .title { font-weight: 700; font-size: 15px; color: #222; }
  .card .meta { font-size: 13px; color: #666; }
  .card .price { font-weight: 800; color: #16a34a; }

  @media (max-width: 900px) {
    .container { grid-template-columns: 1fr; }
  }
</style>
</head>
<body>

<div class="container">
  {{-- فیلترها --}}
  <aside>
    <h3>فیلترها</h3>
    <form action="{{ route('ResumeDisplayProudacts') }}" method="POST" class="filter-form">
      @csrf

      {{-- برند --}}
      <div class="group">
        <label>🏷️ برند</label>
        @php $brands = ['Dell','HP','Asus','Lenovo']; @endphp
        @foreach($brands as $brand)
        <div class="option">
          <input type="checkbox" name="brand[]" value="{{ $brand }}" @if(in_array($brand, request('brand', []))) checked @endif>
          <span>{{ $brand }}</span>
        </div>
        @endforeach
      </div>

      {{-- رنگ --}}
      <div class="group">
        <label>🎨 رنگ</label>
        @php $colors = ['سفید','مشکی','نقره‌ای','خاکستری','آبی','قرمز']; @endphp
        @foreach($colors as $color)
        <div class="option">
          <input type="checkbox" name="color[]" value="{{ $color }}" @if(in_array($color, request('color', []))) checked @endif>
          <span>{{ $color }}</span>
        </div>
        @endforeach
      </div>

      {{-- CPU --}}
      <div class="group">
        <label>🖥️ پردازنده</label>
        @php $cpus = ['Intel i5','Intel i7','AMD Ryzen 5','AMD Ryzen 7']; @endphp
        @foreach($cpus as $cpu)
        <div class="option">
          <input type="checkbox" name="cpu[]" value="{{ $cpu }}" @if(in_array($cpu, request('cpu', []))) checked @endif>
          <span>{{ $cpu }}</span>
        </div>
        @endforeach
      </div>

      {{-- GPU --}}
      <div class="group">
        <label>💻 پردازنده گرافیکی</label>
        @php $gpus = ['NVIDIA GTX 1650','NVIDIA RTX 3060','Intel Iris','AMD Radeon']; @endphp
        @foreach($gpus as $gpu)
        <div class="option">
          <input type="checkbox" name="gpu[]" value="{{ $gpu }}" @if(in_array($gpu, request('gpu', []))) checked @endif>
          <span>{{ $gpu }}</span>
        </div>
        @endforeach
      </div>

      {{-- حافظه --}}
      <div class="group">
        <label>💾 حافظه</label>
        @php $storages = ['256GB SSD','512GB SSD','1TB HDD','1TB SSD']; @endphp
        @foreach($storages as $storage)
        <div class="option">
          <input type="checkbox" name="storage[]" value="{{ $storage }}" @if(in_array($storage, request('storage', []))) checked @endif>
          <span>{{ $storage }}</span>
        </div>
        @endforeach
      </div>

      {{-- رم --}}
      <div class="group">
        <label>⚡ RAM</label>
        @php $rams = ['8GB','16GB','32GB']; @endphp
        @foreach($rams as $ram)
        <div class="option">
          <input type="checkbox" name="ram[]" value="{{ $ram }}" @if(in_array($ram, request('ram', []))) checked @endif>
          <span>{{ $ram }}</span>
        </div>
        @endforeach
      </div>

      {{-- نمایشگر --}}
      <div class="group">
        <label>📺 نمایشگر</label>
        @php $displays = ['15.6 inch','14 inch','13.3 inch','17 inch']; @endphp
        @foreach($displays as $display)
        <div class="option">
          <input type="checkbox" name="display[]" value="{{ $display }}" @if(in_array($display, request('display', []))) checked @endif>
          <span>{{ $display }}</span>
        </div>
        @endforeach
      </div>

      {{-- باتری --}}
      <div class="group">
        <label>🔋 باتری (mAh)</label>
        @php $batteries = ['3000','4000','5000','6000']; @endphp
        @foreach($batteries as $battery)
        <div class="option">
          <input type="checkbox" name="battery[]" value="{{ $battery }}" @if(in_array($battery, request('battery', []))) checked @endif>
          <span>{{ $battery }}</span>
        </div>
        @endforeach
      </div>

      {{-- توان شارژ --}}
      <div class="group">
        <label>⚡ توان شارژ (W)</label>
        @php $chargings = ['45','65','90','120']; @endphp
        @foreach($chargings as $charging)
        <div class="option">
          <input type="checkbox" name="charging[]" value="{{ $charging }}" @if(in_array($charging, request('charging', []))) checked @endif>
          <span>{{ $charging }}</span>
        </div>
        @endforeach
      </div>

      {{-- فقط کالاهای موجود --}}
      <div class="group">
        <div class="option">
          <input type="checkbox" name="available" value="1" {{ request('available')?'checked':'' }}>
          <span>✅ فقط کالاهای موجود</span>
        </div>
      </div>

      {{-- فقط تخفیف دار --}}
      <div class="group">
        <div class="option">
          <input type="checkbox" name="discount" value="1" {{ request('discount')?'checked':'' }}>
          <span>🎁 فقط تخفیف‌دارها</span>
        </div>
      </div>

      {{-- مرتب سازی --}}
      <div class="group">
        <label>↕️ مرتب‌سازی</label>
        <select name="sort">
          <option value="">پیش‌فرض</option>
          <option value="most_discount" @if(request('sort')=='most_discount') selected @endif>بیشترین تخفیف</option>
          <option value="price_desc" @if(request('sort')=='price_desc') selected @endif>گران‌ترین</option>
          <option value="price_asc" @if(request('sort')=='price_asc') selected @endif>ارزان‌ترین</option>
          <option value="newest" @if(request('sort')=='newest') selected @endif>جدیدترین</option>
        </select>
      </div>

      {{-- جستجو بر اساس نام --}}
      <div class="group">
        <label>🔎 جستجو بر اساس نام</label>
        <input type="text" name="search" value="{{ request('search') }}" placeholder="نام محصول..." style="padding:8px; border:1px solid #ddd; border-radius:6px;">
      </div>

      <div class="controls">
        <button type="submit">اعمال فیلتر</button>
        <a href="">بازنشانی</a>
      </div>
    </form>
  </aside>

  {{-- نمایش محصولات --}}
  <main>
    <div class="products-header">
      {{-- این قسمت برای نمایش محصولات --}}
    </div>
  </main>
</div>

</body>
</html>
