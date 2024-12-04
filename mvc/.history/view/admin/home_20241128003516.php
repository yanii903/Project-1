<?php
include 'nav.php';
?>
<?php
include 'view/admin/nav.php';
?>
<article>
    <h1>Thống Kê</h1>
    <div class="container-add">
        <!-- Biểu đồ doanh thu theo tháng -->
        <div class="chart-container">
            <canvas id="revenueChart"></canvas>
        </div>

        <!-- Bảng thống kê sản phẩm bán chạy -->
        <div class="table-container">
            <h2>Sản Phẩm Bán Chạy</h2>
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>Mã SP</th>
                        <th>Tên SP</th>
                        <th>Số lượng bán</th>
                        <th>Doanh thu</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Dữ liệu mẫu -->
                    <tr>
                        <td>SP001</td>
                        <td>Sản phẩm 1</td>
                        <td>120</td>
                        <td>24,000,000 VND</td>
                    </tr>
                    <tr>
                        <td>SP002</td>
                        <td>Sản phẩm 2</td>
                        <td>150</td>
                        <td>30,000,000 VND</td>
                    </tr>
                    <!-- Kết thúc dữ liệu mẫu -->
                </tbody>
            </table>
        </div>

        <!-- Bảng thống kê doanh thu theo tháng -->
        <div class="table-container">
            <h2>Doanh Thu Theo Tháng</h2>
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>Tháng</th>
                        <th>Doanh thu</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Dữ liệu mẫu -->
                    <tr>
                        <td>1</td>
                        <td>10,000,000 VND</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>15,000,000 VND</td>
                    </tr>
                    <!-- Kết thúc dữ liệu mẫu -->
                </tbody>
            </table>
        </div>
    </div>
</article>

<!-- Thêm Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('revenueChart').getContext('2d');
    const revenueChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
            datasets: [{
                label: 'Doanh thu',
                data: [10000000, 15000000, 20000000, 25000000, 30000000, 35000000, 40000000, 45000000, 50000000, 55000000, 60000000, 65000000],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>