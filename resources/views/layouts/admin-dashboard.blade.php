
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>داشبورد مدیریتی</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/css/admin-dashboard.css', 'resources/js/admin-dashboard.js'])

</head>


    <div class="container-dashboard">
        <div class="header-dashboard">
            <div class="header-title">
                <h1>پنل ادمین</h1>
                <p>نمای کلی از وضعیت سفارشات و نظرات کاربران</p>
            </div>
            <div class="header-actions">

            </div>
        </div>
        <div class="dashboard">
            <div class="card-dashboard" id="orders">
                <div class="card-dashboard-title">
                    <i class="fas fa-chart-pie"></i>
                    <h2>انواع سفارشات</h2>
                </div>
                <div class="chart-container">
                    <canvas id="ordersChart"></canvas>
                </div>

                <div class="stats">
                    <div class="stat-item">
                        <div class="stat-value" id="totalOrders">0</div>
                        <div class="stat-label">تعداد کل سفارشات</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value" id="completedOrders">0%</div>
                        <div class="stat-label">تکمیل شده</div>
                    </div>
                </div>
            </div>

            <div class="card-dashboard" id="comments">
                <div class="card-dashboard-title">
                    <i class="fas fa-comments"></i>
                    <h2>نظرات کاربران</h2>
                </div>
                <div class="comments-section" id="commentsContainer">
                    <div class="loading">
                        <i class="fas fa-spinner fa-spin"></i>
                        <p>در حال دریافت نظرات...</p>
                    </div>
                </div>
            </div>


        </div>
    </div>


