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
        <div class="page-header">
            <div class="title">
                <i class="fa-solid fa-box-open"></i>
                <h1>مدیریت کالاها</h1>
            </div>
            <div class="actions">
                <button class="btn btn-secondary" id="btn-refresh"><i class="fa-solid fa-rotate"></i></button>
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
                            <th>کد کالا</th>
                            <th>دسته‌بندی</th>
                            <th>قیمت</th>
                            <th>موجودی</th>
                            <th>وضعیت</th>
                            <th style="width:160px">عملیات</th>
                        </tr>
                    </thead>
                    <tbody id="products-tbody">
                        <tr data-id="${p.id}">
                            <td>{{ 'test' }}</td>
                            <td><span class="tag">{{ 'test' }}</span></td>
                            <td>{{ 'test' }}</td>
                            <td class="price">{{ 'test' }}</td>
                            <td class="qty">{{ 'test' }}</td>
                            <td>
                                <span class="status-badge ${p.status==='فعال'?'status-active':'status-out'}">
                                    <i class="fa-solid ${p.status==='فعال'?'fa-circle':'fa-circle-xmark'}"></i>
                                  {{ 'test' }}
                                </span>
                            </td>
                            <td>
                                <div class="table-actions">
                                    <button class="btn btn-secondary" data-action="edit"><i class="fa-solid fa-pen"></i> ویرایش</button>
                                    <button class="btn btn-danger" data-action="delete"><i class="fa-solid fa-trash"></i> حذف</button>
                                </div>
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
<form id="upload-form" action="{{ route('test') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal" role="dialog" aria-modal="true">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal-title">افزودن کالا</h3>
                    <button type="button" class="btn btn-secondary" id="modal-close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-row">
                        <div class="form-control" style="grid-column: 1 / -1;">
                            <label for="f-images">تصاویر کالا (حداکثر 10 عدد)</label>
                            <input type="file" name="images[]" id="images" multiple accept="image/*">
                            <small class="error-text" id="e-images">حداکثر 10 تصویر انتخاب کنید</small>
                            <div id="images-preview" style="display:flex;flex-wrap:wrap;gap:8px;margin-top:8px;"></div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-control">
                            <label for="f-title">نام کالا</label>
                            <input type="text" id="f-title" name="title" placeholder="مثلاً: لپ‌تاپ 14 اینچ">
                            <small class="error-text" id="e-title">نام کالا الزامی است</small>
                        </div>
                        <div class="form-control">
                            <label for="f-sku">کد (SKU)</label>
                            <input type="text" id="f-sku" name="sku" placeholder="مثلاً: LP-2030">
                            <small class="error-text" id="e-sku">کد کالا الزامی است</small>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-control">
                            <label for="f-category">دسته‌بندی</label>
                            <input type="text" id="f-category" name="category" placeholder="مثلاً: لپ‌تاپ">
                        </div>
                        <div class="form-control">
                            <label for="f-status">وضعیت</label>
                            <select id="f-status" name="status">
                                <option value="فعال">فعال</option>
                                <option value="ناموجود">ناموجود</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-control">
                            <label for="f-price">قیمت (تومان)</label>
                            <input type="number" id="f-price" name="price" min="0" step="1" placeholder="مثلاً: 12500000">
                            <small class="error-text" id="e-price">قیمت معتبر وارد کنید</small>
                        </div>
                        <div class="form-control">
                            <label for="f-quantity">موجودی</label>
                            <input type="number" id="f-quantity" name="quantity" min="0" step="1" placeholder="مثلاً: 10">
                            <small class="error-text" id="e-quantity">موجودی معتبر وارد کنید</small>
                        </div>
                    </div>

                    <input type="hidden" id="f-id" name="id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="btn-cancel">انصراف</button>
                    <button type="submit" class="btn btn-primary" id="btn-save">ذخیره</button>
                </div>
            </div>
        </form>

    </div>

</body>

</html>
