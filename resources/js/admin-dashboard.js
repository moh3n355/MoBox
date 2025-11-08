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