<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

 
    {{-- <script>
        // متغیر برای ذخیره نتایج
        let products = [];

        // تابع ساده برای fetch کردن JSON
        async function getProducts() {
            try {
                const response = await fetch(`/products/search?search=${@php $test @endphp}&category=labtop`, {
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
    </script> --}}


</body>
</html>