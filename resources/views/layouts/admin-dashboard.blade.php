
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>داشبورد مدیریتی</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>

        .container {
            padding: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .header-dashboard {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            background: linear-gradient(135deg, #4b6cb7 0%, #182848 100%);
            color: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .header-title h1 {
            font-size: 1.8rem;
            margin-bottom: 5px;
        }

        .header-title p {
            color: #e0e0e0;
        }

        .dashboard {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
        }

        .card {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            padding: 25px;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-title {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            color: #2c3e50;
            font-size: 1.3rem;
        }

        .card-title i {
            margin-left: 10px;
            background: linear-gradient(135deg, #4b6cb7 0%, #182848 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;

        }

        .chart-container {
            position: relative;
            height: 300px;
            width: 100%;
        }

        .stats {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
            text-align: center;
        }

        .stat-item {
            padding: 15px;
        }

        .stat-value {
            font-size: 1.8rem;
            font-weight: bold;
            color: #4b6cb7;
            margin-bottom: 5px;
        }

        .stat-label {
            color: #7f8c8d;
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
            background: linear-gradient(135deg, #4b6cb7 0%, #182848 100%);
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
            color: #2c3e50;
        }

        .comment-date {
            color: #95a5a6;
            font-size: 0.9rem;
        }

        .comment-text {
            color: #34495e;
            line-height: 1.6;
        }

        .comment-rating {
            color: #f39c12;
            margin-top: 5px;
        }

        .loading {
            text-align: center;
            padding: 20px;
            color: #7f8c8d;
        }

        .error {
            text-align: center;
            padding: 20px;
            color: #e74c3c;
        }

        @media (max-width: 992px) {
            .dashboard {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
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
document.addEventListener('DOMContentLoaded', function() {
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
                            label: function(context) {
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
