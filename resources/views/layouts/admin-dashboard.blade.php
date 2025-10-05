<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>داشبورد مدیریتی</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4b6cb7;
            --primary-2: #182848;
            --bg: #0f1324;
            --card: rgba(255, 255, 255, 0.08);
            --stroke: rgba(255, 255, 255, 0.12);
            --text: #e9eef7;
            --muted: #a9b4c7;
            --warning: #f39c12;
            --danger: #e74c3c;
        }

        body {
            margin: 0;
            background:
                radial-gradient(1200px 600px at 20% -20%, rgba(75, 108, 183, .22), transparent),
                radial-gradient(1000px 500px at 100% 0%, rgba(24, 40, 72, .30), transparent),
                var(--bg);
            color: var(--text);
            font-family: "Segoe UI", sans-serif;
        }

        .container {
            padding: 2rem 1.25rem;
            max-width: 1280px;
            margin: 0 auto;
        }

        .header-dashboard {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            margin-bottom: 30px;
            background: linear-gradient(180deg, rgba(255, 255, 255, .08), rgba(255, 255, 255, .04));
            color: var(--text);
            padding: 20px;
            border-radius: 16px;
            border: 1px solid var(--stroke);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, .25);
        }

        /* Sidebar */
        .sidebar-toggle {
            position: fixed;
            top: 16px;
            left: 16px;
            /* moved to left side */
            z-index: 1100;
            background: linear-gradient(135deg, var(--primary), var(--primary-2));
            color: #fff;
            border: 1px solid var(--stroke);
            border-radius: 10px;
            padding: 10px 12px;
            cursor: pointer;
            box-shadow: 0 12px 30px rgba(0, 0, 0, .35);
        }

        .sidebar-toggle i {
            font-size: 18px;
        }

        .sidebar {
            position: fixed;
            inset-block: 0;
            /* top/bottom */
            left: 0;
            /* move to left side */
            width: 260px;
            background: linear-gradient(180deg, rgba(255, 255, 255, .10), rgba(255, 255, 255, .05));
            border-right: 1px solid var(--stroke);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            box-shadow: 16px 0 40px rgba(0, 0, 0, .35);
            z-index: 1050;
            transform: translateX(-100%);
            transition: transform .3s ease;
        }

        .sidebar.open {
            transform: translateX(0);
        }

        .sidebar-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 18px;
            border-bottom: 1px solid var(--stroke);
        }

        .sidebar-title {
            font-weight: 700;
            color: var(--text);
        }

        .sidebar-close {
            background: transparent;
            color: var(--text);
            border: none;
            cursor: pointer;
        }

        .sidebar-nav {
            padding: 12px;
        }

        .sidebar-nav a {
            display: block;
            color: var(--text);
            text-decoration: none;
            padding: 12px 14px;
            margin: 6px 0;
            border: 1px solid var(--stroke);
            border-radius: 10px;
            position: relative;
            overflow: hidden;
            transition: background .2s ease, border-color .2s ease, transform .15s ease;
        }

        .sidebar-nav a i {
            margin-left: 10px;
        }

        .sidebar-nav a:hover {
            background: rgba(255, 255, 255, .08);
            border-color: rgba(255, 255, 255, .25);
            transform: translateX(4px);
        }
        .sidebar-nav a::before {
            content: "";
            position: absolute;
            inset: -2px;
            background: linear-gradient(135deg, rgba(75,108,183,.35), rgba(24,40,72,.35));
            filter: blur(14px);
            opacity: 0;
            transition: opacity .2s ease;
            z-index: -1;
        }
        .sidebar-nav a:hover::before { opacity: 1; }
        .sidebar-nav a.active { background: linear-gradient(180deg, rgba(255,255,255,.12), rgba(255,255,255,.06)); border-color: rgba(255,255,255,.35); }

        /* Push content on desktop when sidebar pinned */
        @media (min-width: 1024px) {
            body.sidebar-pinned .container {
                margin-left: 260px;
            }

            body.sidebar-pinned .sidebar {
                transform: translateX(0);
            }

            .sidebar-toggle {
                left: 280px;
            }
        }

        .header-title h1 {
            font-size: 1.8rem;
            margin-bottom: 5px;
        }

        .header-title p {
            color: var(--muted);
        }

        .dashboard {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
        }

        .card {
            background: var(--card);
            border: 1px solid var(--stroke);
            border-radius: 16px;
            box-shadow: 0 12px 40px rgba(0, 0, 0, .25);
            padding: 24px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 18px 50px rgba(0, 0, 0, .35);
        }

        .card-title {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            color: var(--text);
            font-size: 1.3rem;
        }

        .card-title i {
            margin-left: 10px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-2) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;

        }

        .chart-container {
            position: relative;
            height: 320px;
            width: 100%;
        }

        .stats {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            margin-top: 20px;
            text-align: center;
            flex-wrap: wrap;
        }

        .stat-item {
            padding: 12px 16px;
            background: linear-gradient(180deg, rgba(255, 255, 255, .06), rgba(255, 255, 255, .03));
            border: 1px solid var(--stroke);
            border-radius: 12px;
            min-width: 140px;
        }

        .stat-value {
            font-size: 1.8rem;
            font-weight: bold;
            color: var(--text);
            margin-bottom: 5px;
        }

        .stat-label {
            color: var(--muted);
            font-size: 0.9rem;
        }

        .comments-section {
            max-height: 500px;
            overflow-y: auto;
        }

        .comment {
            display: flex;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }

        .comment-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--primary-2));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 1.2rem;
            margin-left: 15px;
        }

        .comment-content {
            flex: 1;
        }

        .comment-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
        }

        .comment-author {
            font-weight: bold;
            color: var(--text);
        }

        .comment-date {
            color: var(--muted);
            font-size: 0.9rem;
        }

        .comment-text {
            color: var(--text);
            line-height: 1.6;
        }

        .comment-rating {
            color: var(--warning);
            margin-top: 5px;
        }

        .loading {
            text-align: center;
            padding: 20px;
            color: var(--muted);
        }

        .error {
            text-align: center;
            padding: 20px;
            color: var(--danger);
        }

        @media (max-width: 992px) {
            .header-title h1 {
                font-size: 1.5rem;
            }

            .chart-container {
                height: 300px;
            }
        }

        @media (max-width: 640px) {
            .container {
                padding: 1.25rem 1rem;
            }

            .header-dashboard {
                flex-direction: column;
                align-items: flex-start;
            }

            .chart-container {
                height: 260px;
            }

            .stat-item {
                flex: 1 1 calc(50% - 12px);
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header-dashboard">
            <div class="header-title">
                <h1>داشبورد مدیریتی</h1>
                <p>نمای کلی از وضعیت سفارشات و نظرات کاربران</p>
            </div>
            <div class="header-actions">

            </div>
        </div>
        <div class="dashboard">
            <div class="card">
                <div class="card-title">
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

            <div class="card">
                <div class="card-title">
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ordersChartCanvas = document.getElementById('ordersChart');
            const ctx = ordersChartCanvas.getContext('2d');
            const commentsContainer = document.getElementById('commentsContainer');
            const totalOrdersEl = document.getElementById('totalOrders');
            const completedOrdersEl = document.getElementById('completedOrders');

            let ordersChart;

            // رنگ‌های نمودار
            const chartColors = [
                'rgba(75, 108, 183, 0.8)',
                'rgba(240, 98, 146, 0.8)',
                'rgba(123, 237, 159, 0.8)',
                'rgba(247, 183, 51, 0.8)',
                'rgba(142, 68, 173, 0.8)',
                'rgba(87, 185, 227, 0.8)',
                'rgba(241, 148, 138, 0.8)',
                'rgba(127, 140, 141, 0.8)'
            ];

            // دریافت سفارشات از سرور
            function fetchOrdersData() {
                commentsContainer.innerHTML = `
            <div class="loading">
                <i class="fas fa-spinner fa-spin"></i>
                <p>در حال دریافت داده‌ها...</p>
            </div>
        `;

                fetch("/admin/orders-data")
                    .then(res => res.json())
                    .then(ordersData => {
                        // به روزرسانی آمار
                        totalOrdersEl.textContent = ordersData.total.toLocaleString();
                        completedOrdersEl.textContent = `${ordersData.completed}%`;

                        // رسم نمودار
                        renderOrdersChart(ordersData);
                    })
                    .catch(err => {
                        commentsContainer.innerHTML = `
                    <div class="error">خطا در دریافت سفارشات!</div>
                `;
                        console.error(err);
                    });
            }

            // دریافت نظرات از سرور
            function fetchCommentsData() {
                commentsContainer.innerHTML = `
            <div class="loading">
                <i class="fas fa-spinner fa-spin"></i>
                <p>در حال دریافت نظرات...</p>
            </div>
        `;

                fetch("/admin/comments-data")
                    .then(res => res.json())
                    .then(commentsData => {
                        renderComments(commentsData);
                    })
                    .catch(err => {
                        commentsContainer.innerHTML = `
                    <div class="error">خطا در دریافت نظرات!</div>
                `;
                        console.error(err);
                    });
            }

            // رسم نمودار دایره‌ای
            function renderOrdersChart(data) {
                if (ordersChart) {
                    ordersChart.destroy();
                }

                ordersChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: data.types.map(item => item.type),
                        datasets: [{
                            data: data.types.map(item => item.percent),
                            backgroundColor: chartColors,
                            borderColor: 'white',
                            borderWidth: 2
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'left',
                                rtl: true,
                                labels: {
                                    font: {
                                        family: 'Segoe UI'
                                    }
                                }
                            },
                            tooltip: {
                                callbacks: {
                                    label: function (context) {
                                        const label = context.label || '';
                                        const value = context.raw || 0;
                                        const count = data.types.find(item => item.type === label).count;
                                        return `${label}: ${value}% (${count} سفارش)`;
                                    }
                                }
                            }
                        }
                    }
                });
            }

            // نمایش نظرات
            function renderComments(comments) {
                if (comments.length === 0) {
                    commentsContainer.innerHTML = `
                <div class="loading">
                    <p>هنوز نظری ثبت نشده است.</p>
                </div>
            `;
                    return;
                }

                let commentsHTML = '';

                comments.forEach(comment => {
                    // ایجاد ستاره‌های امتیاز
                    let starsHTML = '';
                    for (let i = 1; i <= 5; i++) {
                        if (i <= comment.rating) {
                            starsHTML += '<i class="fas fa-star"></i>';
                        } else {
                            starsHTML += '<i class="far fa-star"></i>';
                        }
                    }

                    // ایجاد حرف اول برای آواتار
                    const firstLetter = comment.author.charAt(0);

                    commentsHTML += `
                <div class="comment">
                    <div class="comment-avatar">${firstLetter}</div>
                    <div class="comment-content">
                        <div class="comment-header">
                            <div class="comment-author">${comment.author}</div>
                            <div class="comment-date">${comment.date}</div>
                        </div>
                        <div class="comment-text">${comment.text}</div>
                        <div class="comment-rating">${starsHTML}</div>
                    </div>
                </div>
            `;
                });

                commentsContainer.innerHTML = commentsHTML;
            }

            // بارگذاری اولیه داده‌ها
            fetchOrdersData();
            fetchCommentsData();


        });
    </script>

</body>

</html>