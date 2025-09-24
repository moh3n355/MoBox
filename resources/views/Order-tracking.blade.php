<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/order-tracking.css', 'resources/js/order-tracksing.js'])

</head>
<body>


<x-layout >

    <div class="order-track">
        <div class="order-card">
            <h1>پیگیری سفارش</h1>

            <div class="steps-labels">
                <span>پرداخت</span>
                <span>ثبت سفارش</span>
                <span>آماده‌سازی</span>
                <span>ارسال</span>
                <span>تحویل</span>
            </div>


            <!-- progress bar -->
            <div class="progress-container">
                <div class="progress" id="progress" style="width:50"></div>
                <div class="circle done" id="step1">1</div>
                <div class="circle done" id="step1">2</div>
                <div class="circle active" id="step2">3</div>
                <div class="circle" id="step3">4</div>
                <div class="circle" id="step4">5</div>
              </div>



            <div class="container-detail">
                <table class="order-info">
                    <thead>
                        <tr>
                            <th>محصول</th>
                            <th>قیمت</th>
                            <th>تعداد</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>هدفون انکر ۲۰۲۰</td>
                            <td>1,000,000</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>گوشی گلگسی S24 Ultra</td>
                            <td>90,000,000</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>گارد موبایل</td>
                            <td>1000</td>
                            <td>1</td>
                        </tr>
                    </tbody>
                </table>
            </div>




        </div>
    </div>



</x-layout>