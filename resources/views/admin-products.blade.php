<!DOCTYPE html>
<html lang="فا" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>مدیریت کالاها</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --primary: #4b6cb7;
            --primary-2: #182848;
            --danger: #e74c3c;
            --bg: #0f1324;
            --card: rgba(255, 255, 255, 0.08);
            --stroke: rgba(255, 255, 255, 0.12);
            --text: #e9eef7;
            --muted: #a9b4c7;
            --success: #2ecc71;
        }

        body {
            font-family: IRANSans, 'Segoe UI', Tahoma, sans-serif;
            background: radial-gradient(1200px 600px at 20% -20%, rgba(75, 108, 183, .35), transparent),
                radial-gradient(1000px 500px at 100% 0%, rgba(24, 40, 72, .45), transparent), var(--bg);
            margin: 0;
            color: var(--text);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 28px;
        }

        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 22px;
        }

        .title {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .title h1 {
            font-size: 22px;
            margin: 0;
            letter-spacing: -.2px;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: 1px solid var(--stroke);
            background: linear-gradient(180deg, rgba(255, 255, 255, .06), rgba(255, 255, 255, .02));
            cursor: pointer;
            border-radius: 12px;
            padding: 10px 14px;
            font-size: 14px;
            color: var(--text);
            transition: .2s ease;
            backdrop-filter: blur(6px);
        }

        .btn:hover {
            transform: translateY(-1px);
            border-color: rgba(255, 255, 255, .2);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-2));
            border: none;
        }

        .btn-secondary {}

        .btn-danger {
            background: linear-gradient(135deg, #ff6b6b, var(--danger));
            border: none;
        }

        .pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 10px;
            border-radius: 999px;
            background: rgba(255, 255, 255, .06);
            border: 1px solid var(--stroke);
            color: var(--muted);
            font-size: 12px;
        }

        .card {
            background: var(--card);
            border: 1px solid var(--stroke);
            border-radius: 16px;
            box-shadow: 0 12px 40px rgba(0, 0, 0, .25);
            padding: 16px;
        }

        .toolbar {
            display: grid;
            grid-template-columns: 1fr auto;
            gap: 12px;
            margin-bottom: 12px;
        }

        .search {
            position: relative;
        }

        .search input {
            width: 100%;
            padding: 12px 40px 12px 12px;
            border-radius: 12px;
            border: 1px solid var(--stroke);
            outline: none;
            background: rgba(255, 255, 255, .06);
            color: var(--text);
        }

        .search i {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--muted);
        }

        .table-wrapper {
            overflow: auto;
            border: 1px solid var(--stroke);
            border-radius: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 900px;
        }

        thead th {
            background: rgba(255, 255, 255, .04);
            color: var(--muted);
            font-weight: 600;
            text-align: right;
            padding: 12px;
            font-size: 13px;
            position: sticky;
            top: 0;
            backdrop-filter: blur(6px);
        }

        tbody td {
            border-top: 1px solid var(--stroke);
            padding: 12px;
            font-size: 13px;
            vertical-align: middle;
        }

        .tag {
            display: inline-block;
            background: rgba(75, 108, 183, .12);
            color: #cfe0ff;
            padding: 5px 10px;
            border-radius: 999px;
            font-size: 12px;
            border: 1px solid rgba(75, 108, 183, .3);
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 10px;
            border-radius: 999px;
            font-size: 12px;
            border: 1px solid var(--stroke);
        }

        .status-active {
            background: rgba(46, 204, 113, .12);
            color: #caffdf;
            border-color: rgba(46, 204, 113, .28);
        }

        .status-out {
            background: rgba(231, 76, 60, .12);
            color: #ffd6d1;
            border-color: rgba(231, 76, 60, .28);
        }

        .price {
            font-weight: 700;
            color: #e6eeff;
        }

        .qty {
            color: #9cc2ff;
            font-weight: 600;
        }

        .table-actions {
            display: flex;
            gap: 8px;
        }

        .table-actions .btn {
            padding: 8px 12px;
            font-size: 12px;
            border-radius: 10px;
        }

        .empty {
            text-align: center;
            color: var(--muted);
            padding: 28px;
        }

        .skeleton {
            position: relative;
            overflow: hidden;
            background: rgba(255, 255, 255, .06);
            height: 14px;
            border-radius: 8px;
        }

        .skeleton::after {
            content: "";
            position: absolute;
            inset: 0;
            transform: translateX(-100%);
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, .15), transparent);
            animation: shimmer 1.2s infinite;
        }

        @keyframes shimmer {
            100% {
                transform: translateX(100%);
            }
        }

        /* Modal */
        .modal-backdrop {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .5);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 50;
            backdrop-filter: blur(3px);
        }

        .modal {
            width: 96%;
            max-width: 560px;
            background: var(--card);
            border: 1px solid var(--stroke);
            border-radius: 16px;
            box-shadow: 0 12px 40px rgba(0, 0, 0, .4);
            overflow: hidden;
        }

        .modal-header {
            padding: 14px 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(255, 255, 255, .04);
            border-bottom: 1px solid var(--stroke);
        }

        .modal-title {
            font-size: 16px;
            margin: 0;
        }

        .modal-body {
            padding: 16px;
            display: grid;
            gap: 12px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        .form-control {
            display: grid;
            gap: 6px;
        }

        .form-control label {
            font-size: 12px;
            color: var(--muted);
        }

        .form-control input,
        .form-control textarea,
        .form-control select {
            padding: 10px;
            border: 1px solid var(--stroke);
            border-radius: 10px;
            outline: none;
            font-size: 13px;
            background: rgba(255, 255, 255, .06);
            color: var(--text);
        }

        .modal-footer {
            padding: 12px 16px;
            display: flex;
            justify-content: flex-end;
            gap: 8px;
            border-top: 1px solid var(--stroke);
            background: rgba(255, 255, 255, .03);
        }

        .error-text {
            color: #ffb4ac;
            font-size: 12px;
            display: none;
        }

        /* Toasts */
        .toasts {
            position: fixed;
            bottom: 16px;
            right: 16px;
            display: grid;
            gap: 8px;
            z-index: 60;
        }

        .toast {
            display: flex;
            align-items: center;
            gap: 8px;
            background: rgba(0, 0, 0, .6);
            color: #fff;
            padding: 10px 12px;
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, .15);
            box-shadow: 0 8px 24px rgba(0, 0, 0, .3);
            font-size: 13px;
        }

        .toast-success {
            background: linear-gradient(135deg, rgba(46, 204, 113, .8), rgba(39, 174, 96, .7));
        }

        .toast-error {
            background: linear-gradient(135deg, rgba(231, 76, 60, .85), rgba(192, 57, 43, .8));
        }

        .toast-info {
            background: linear-gradient(135deg, rgba(75, 108, 183, .85), rgba(24, 40, 72, .8));
        }

        @media (max-width: 680px) {
            .form-row {
                grid-template-columns: 1fr;
            }

            .toolbar {
                grid-template-columns: 1fr;
            }
        }
    </style>
    <script>
        // Config
        const API_BASE = '/admin/api/products'; // backend should implement these endpoints
        const CSRF = () => document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // In-memory fallback store
        window.productsStore = {
            items: []
        };

        function cryptoRandomId() {
            if (window.crypto && crypto.getRandomValues) {
                const a = new Uint32Array(2);
                crypto.getRandomValues(a);
                return 'p-' + a[0].toString(36) + a[1].toString(36);
            }
            return 'p-' + Math.random().toString(36).slice(2) + Date.now().toString(36);
        }
    </script>
</head>

<body>
    <div class="container">
        <div class="page-header">
            <div class="title">
                <i class="fa-solid fa-box-open"></i>
                <h1>مدیریت کالاها</h1>
            </div>
            <div class="actions">
                <button class="btn btn-secondary" id="btn-refresh"><i class="fa-solid fa-rotate"></i> بروزرسانی</button>
                <button class="btn btn-primary" id="btn-add"><i class="fa-solid fa-plus"></i> افزودن کالا</button>
            </div>
        </div>

        <div class="card">
            <div class="toolbar">
                <div class="search">
                    <input type="text" id="search" placeholder="جستجوی نام، کد یا دسته‌بندی...">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <div class="actions">
                    <select id="filter-status" class="btn btn-secondary" style="padding:10px 12px">
                        <option value="">همه وضعیت‌ها</option>
                        <option value="فعال">فعال</option>
                        <option value="ناموجود">ناموجود</option>
                    </select>
                </div>
            </div>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>نام کالا</th>
                            <th>کد (SKU)</th>
                            <th>دسته‌بندی</th>
                            <th>قیمت</th>
                            <th>موجودی</th>
                            <th>وضعیت</th>
                            <th style="width:160px">عملیات</th>
                        </tr>
                    </thead>
                    <tbody id="products-tbody">
                        <tr>
                            <td colspan="7">
                                <div class="skeleton" style="height:16px; width: 30%"></div>
                                <div class="skeleton" style="height:16px; width: 50%; margin-top:10px"></div>
                                <div class="skeleton" style="height:16px; width: 40%; margin-top:10px"></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="toasts" id="toasts"></div>

    <!-- Modal: Add/Edit Product -->
    <div class="modal-backdrop" id="modal-backdrop">
        <form action="">
        <div class="modal" role="dialog" aria-modal="true">
            <div class="modal-header">
                <h3 class="modal-title" id="modal-title">افزودن کالا</h3>
                <button class="btn btn-secondary" id="modal-close"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-control">
                        <label for="f-title">نام کالا</label>
                        <input type="text" id="f-title" placeholder="مثلاً: لپ‌تاپ 14 اینچ">
                        <small class="error-text" id="e-title">نام کالا الزامی است</small>
                    </div>
                    <div class="form-control">
                        <label for="f-sku">کد (SKU)</label>
                        <input type="text" id="f-sku" placeholder="مثلاً: LP-2030">
                        <small class="error-text" id="e-sku">کد کالا الزامی است</small>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-control">
                        <label for="f-category">دسته‌بندی</label>
                        <input type="text" id="f-category" placeholder="مثلاً: لپ‌تاپ">
                    </div>
                    <div class="form-control">
                        <label for="f-status">وضعیت</label>
                        <select id="f-status">
                            <option value="فعال">فعال</option>
                            <option value="ناموجود">ناموجود</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-control">
                        <label for="f-price">قیمت (تومان)</label>
                        <input type="number" id="f-price" min="0" step="1"
                            placeholder="مثلاً: 12500000">
                        <small class="error-text" id="e-price">قیمت معتبر وارد کنید</small>
                    </div>
                    <div class="form-control">
                        <label for="f-quantity">موجودی</label>
                        <input type="number" id="f-quantity" min="0" step="1" placeholder="مثلاً: 10">
                        <small class="error-text" id="e-quantity">موجودی معتبر وارد کنید</small>
                    </div>
                </div>
                <input type="hidden" id="f-id">
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" id="btn-cancel">انصراف</button>
                <button class="btn btn-primary" id="btn-save">ذخیره</button>
            </div>
        </div>
    </form>
    </div>

    <script>
        const tbody = document.getElementById('products-tbody');
        const searchInput = document.getElementById('search');
        const filterStatus = document.getElementById('filter-status');
        const btnAdd = document.getElementById('btn-add');
        const btnRefresh = document.getElementById('btn-refresh');

        const backdrop = document.getElementById('modal-backdrop');
        const modalTitle = document.getElementById('modal-title');
        const modalClose = document.getElementById('modal-close');
        const btnCancel = document.getElementById('btn-cancel');
        const btnSave = document.getElementById('btn-save');

        const fId = document.getElementById('f-id');
        const fTitle = document.getElementById('f-title');
        const fSku = document.getElementById('f-sku');
        const fCategory = document.getElementById('f-category');
        const fStatus = document.getElementById('f-status');
        const fPrice = document.getElementById('f-price');
        const fQuantity = document.getElementById('f-quantity');
        const eTitle = document.getElementById('e-title');
        const eSku = document.getElementById('e-sku');
        const ePrice = document.getElementById('e-price');
        const eQuantity = document.getElementById('e-quantity');

        function formatPrice(n) {
            return new Intl.NumberFormat('fa-IR').format(n);
        }

        function showToast(message, type = 'info') {
            const toasts = document.getElementById('toasts');
            const el = document.createElement('div');
            el.className = `toast toast-${type}`;
            el.innerHTML =
                `<i class="fa-solid ${type==='success'?'fa-circle-check': type==='error'?'fa-triangle-exclamation':'fa-circle-info'}"></i><span>${message}</span>`;
            toasts.appendChild(el);
            setTimeout(() => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(6px)';
            }, 2500);
            setTimeout(() => el.remove(), 3100);
        }

        function renderRows() {
            const q = (searchInput.value || '').toLowerCase().trim();
            const st = filterStatus.value;
            let list = window.productsStore.items.slice();
            if (q) {
                list = list.filter(p =>
                    p.title.toLowerCase().includes(q) ||
                    p.sku.toLowerCase().includes(q) ||
                    (p.category || '').toLowerCase().includes(q)
                );
            }
            if (st) list = list.filter(p => p.status === st);

            if (list.length === 0) {
                tbody.innerHTML = '<tr><td colspan="7" class="empty">موردی یافت نشد</td></tr>';
                return;
            }

            tbody.innerHTML = list.map(p => `
                <tr data-id="${p.id}">
                    <td>${p.title}</td>
                    <td><span class="tag">${p.sku}</span></td>
                    <td>${p.category || '-'}</td>
                    <td class="price">${formatPrice(p.price)}</td>
                    <td class="qty">${p.quantity}</td>
                    <td>
                        <span class="status-badge ${p.status === 'فعال' ? 'status-active' : 'status-out'}">
                            <i class="fa-solid ${p.status === 'فعال' ? 'fa-circle' : 'fa-circle-xmark'}"></i>
                            ${p.status}
                        </span>
                    </td>
                    <td>
                        <div class="table-actions">
                            <button class="btn btn-secondary" data-action="edit"><i class="fa-solid fa-pen"></i> ویرایش</button>
                            <button class="btn btn-danger" data-action="delete"><i class="fa-solid fa-trash"></i> حذف</button>
                        </div>
                    </td>
                </tr>
            `).join('');
        }

        function openModal(mode, product) {
            modalTitle.textContent = mode === 'add' ? 'افزودن کالا' : 'ویرایش کالا';
            if (mode === 'add') {
                fId.value = '';
                fTitle.value = '';
                fSku.value = '';
                fCategory.value = '';
                fStatus.value = 'فعال';
                fPrice.value = '';
                fQuantity.value = '';
            } else if (product) {
                fId.value = product.id;
                fTitle.value = product.title;
                fSku.value = product.sku;
                fCategory.value = product.category || '';
                fStatus.value = product.status;
                fPrice.value = product.price;
                fQuantity.value = product.quantity;
            }
            hideErrors();
            backdrop.style.display = 'flex';
        }

        function closeModal() {
            backdrop.style.display = 'none';
        }

        function hideErrors() {
            [eTitle, eSku, ePrice, eQuantity].forEach(el => el.style.display = 'none');
        }

        function validateForm() {
            let ok = true;
            hideErrors();
            if (!fTitle.value.trim()) {
                eTitle.style.display = 'block';
                ok = false;
            }
            if (!fSku.value.trim()) {
                eSku.style.display = 'block';
                ok = false;
            }
            if (!fPrice.value || Number(fPrice.value) < 0) {
                ePrice.style.display = 'block';
                ok = false;
            }
            if (!fQuantity.value || Number(fQuantity.value) < 0) {
                eQuantity.style.display = 'block';
                ok = false;
            }
            return ok;
        }

        async function fetchProducts() {
            try {
                const res = await fetch(API_BASE, {
                    headers: {
                        'Accept': 'application/json'
                    }
                });
                if (!res.ok) throw new Error('bad_status');
                const data = await res.json();
                window.productsStore.items = Array.isArray(data) ? data : (data.data || []);
                renderRows();
            } catch (e) {
                if (window.productsStore.items.length === 0) {
                    // seed with demo data if backend not ready
                    window.productsStore.items = [{
                            id: cryptoRandomId(),
                            title: 'هدفون بی‌سیم',
                            sku: 'HB-1001',
                            price: 1890000,
                            quantity: 23,
                            status: 'فعال',
                            category: 'لوازم جانبی'
                        },
                        {
                            id: cryptoRandomId(),
                            title: 'گوشی موبایل',
                            sku: 'MB-2045',
                            price: 14990000,
                            quantity: 7,
                            status: 'ناموجود',
                            category: 'موبایل'
                        },
                    ];
                }
                renderRows();
                showToast('اتصال به سرور برقرار نشد. حالت آفلاین فعال شد.', 'error');
            }
        }

        async function upsertProduct() {
            if (!validateForm()) return;
            const payload = {
                id: fId.value || undefined,
                title: fTitle.value.trim(),
                sku: fSku.value.trim(),
                category: fCategory.value.trim(),
                status: fStatus.value,
                price: Number(fPrice.value),
                quantity: Number(fQuantity.value)
            };
            const hasId = Boolean(fId.value);
            try {
                const res = await fetch(hasId ? `${API_BASE}/${fId.value}` : API_BASE, {
                    method: hasId ? 'PUT' : 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': CSRF()
                    },
                    body: JSON.stringify(payload)
                });
                if (!res.ok) throw new Error('bad_status');
                const saved = await res.json().catch(() => payload);
                const id = saved.id || fId.value || cryptoRandomId();
                const record = {
                    ...payload,
                    id
                };
                const idx = window.productsStore.items.findIndex(x => x.id === id);
                if (idx === -1) window.productsStore.items.unshift(record);
                else window.productsStore.items[idx] = record;
                closeModal();
                renderRows();
                showToast('آیتم با موفقیت ذخیره شد', 'success');
            } catch (e) {
                // Fallback local update
                const id = fId.value || cryptoRandomId();
                const record = {
                    ...payload,
                    id
                };
                const idx = window.productsStore.items.findIndex(x => x.id === id);
                if (idx === -1) window.productsStore.items.unshift(record);
                else window.productsStore.items[idx] = record;
                closeModal();
                renderRows();
                showToast('ذخیره محلی انجام شد (سرور در دسترس نیست)', 'info');
            }
        }

        async function deleteProduct(id) {
            try {
                const res = await fetch(`${API_BASE}/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': CSRF()
                    }
                });
                if (!res.ok) throw new Error('bad_status');
                window.productsStore.items = window.productsStore.items.filter(p => p.id !== id);
                renderRows();
                showToast('آیتم حذف شد', 'success');
            } catch (e) {
                // Local fallback
                window.productsStore.items = window.productsStore.items.filter(p => p.id !== id);
                renderRows();
                showToast('حذف محلی انجام شد (سرور در دسترس نیست)', 'info');
            }
        }

        // Event bindings
        btnAdd.addEventListener('click', () => openModal('add'));
        btnRefresh.addEventListener('click', () => renderRows());
        modalClose.addEventListener('click', closeModal);
        btnCancel.addEventListener('click', closeModal);
        btnSave.addEventListener('click', upsertProduct);
        searchInput.addEventListener('input', renderRows);
        filterStatus.addEventListener('change', renderRows);
        tbody.addEventListener('click', (e) => {
            const actionBtn = e.target.closest('button');
            if (!actionBtn) return;
            const tr = e.target.closest('tr');
            const id = tr?.dataset.id;
            const action = actionBtn.dataset.action;
            const item = window.productsStore.items.find(x => x.id === id);
            if (action === 'edit') openModal('edit', item);
            if (action === 'delete' && id) {
                if (confirm('آیا از حذف این کالا مطمئن هستید؟')) deleteProduct(id);
            }
        });

        // Init
        fetchProducts();
    </script>
</body>

</html>
