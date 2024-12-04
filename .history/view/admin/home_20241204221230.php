<?php
include 'nav.php';
?>
<article>
    <div class="statistics-container">
        <!-- Doanh Thu -->
        <div style="border: none;" class="stat-box green">
            <div class="stat-header">
                <div class="stat-icon">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="stat-info">
                    <span class="stat-number"><?php if (isset($count_profit)) echo number_format($count_profit[0]['tong_gia'], 0, ',', '.'); ?>đ</span>
                    <h3 class="stat-number">Doanh Thu</h3>
                </div>
            </div>
            <div class="stat-chart">
                <svg height="50" width="100%">
                    <polyline
                        points="0,40 20,30 40,35 60,20 80,25 100,15 120,30 140,40 160,25 180,35 200,25 220,30 240,40 260,35 280,20 300,25 320,30"
                        fill="none" stroke="#ffffff" stroke-width="2" />
                </svg>
            </div>
        </div>

        <!-- Tổng Đơn Hàng -->
        <div style="border: none;" class="stat-box orange">
            <div class="stat-header">
                <div class="stat-icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="stat-info">
                    <span class="stat-number"><?php if (isset($count_order)) echo $count_order[0]['COUNT(*)']; ?></span>
                    <h3 class="stat-number">Đơn Hàng</h3>
                </div>
            </div>
            <div class="stat-chart">
                <svg height="50" width="100%">
                    <polyline
                        points="0,40 20,45 40,35 60,30 80,40 100,30 120,15 140,10 160,25 180,30 200,15 220,20 240,30 260,20 280,40 300,35"
                        fill="none" stroke="#ffffff" stroke-width="2" />
                </svg>
            </div>
        </div>

        <!-- Tổng Tài Khoản -->
        <div style="border: none;" class="stat-box purple">
            <div class="stat-header">
                <div class="stat-icon">
                    <i class="fas fa-user-friends"></i>
                </div>
                <div class="stat-info">
                    <span class="stat-number"><?php if (isset($count_account)) echo $count_account[0]['COUNT(*)']; ?></span>
                    <h3 class="stat-number">Tài Khoản</h3>
                </div>
            </div>
            <div class="stat-chart">
                <svg height="50" width="100%">
                    <polyline
                        points="0,35 20,40 40,45 60,35 80,40 100,30 120,25 140,30 160,20 180,25 200,30 220,40 240,35 260,30 280,25 300,20"
                        fill="none" stroke="#ffffff" stroke-width="2" />
                </svg>
            </div>
        </div>

        <!-- Danh Mục -->
        <a href="" style="text-decoration: none;" class="stat-box blue">
            <div class="stat-header">
                <div class="stat-icon">
                    <i class="fas fa-list"></i>
                </div>
                <div class="stat-info">
                    <span class="stat-number"><?php if (isset($count_category)) echo $count_category[0]['COUNT(*)']; ?></span>
                    <h3 class="stat-number">Danh Mục</h3>
                </div>
            </div>
            <div class="stat-chart">
                <svg height="50" width="100%">
                    <polyline
                        points="0,30 20,35 40,40 60,30 80,25 100,35 120,40 140,30 160,20 180,25 200,30 220,35 240,40 260,30 280,20 300,25"
                        fill="none" stroke="#ffffff" stroke-width="2" />
                </svg>
            </div>
        </a>

        <!----------------------------------------------------------------------------->

        <!-- Sản Phẩm -->
        <div style="border: none;" class="stat-box red">
            <div class="stat-header">
                <div class="stat-icon">
                    <i class="fas fa-box"></i>
                </div>
                <div class="stat-info">
                    <span class="stat-number"><?php if (isset($count_product)) echo $count_product[0]['COUNT(*)']; ?></span>
                    <h3 class="stat-number">Sản Phẩm</h3>
                </div>
            </div>
            <div class="stat-chart">
                <svg height="50" width="100%">
                    <polyline
                        points="0,20 20,30 40,35 60,40 80,30 100,25 120,35 140,30 160,40 180,25 200,30 220,20 240,35 260,30 280,40 300,35"
                        fill="none" stroke="#ffffff" stroke-width="2" />
                </svg>
            </div>
        </div>
    </div>
    <br>

    <!-- -------------------------------------------------------------------------------------->
    <div class="main">
        <h1>Biểu đồ doanh thu theo tháng</h1>
        <div class="chart">
            <div class="y-axis">
                <div class="tick">0</div>
                <div class="tick">100Tr</div>
                <div class="tick">200Tr</div>
                <div class="tick">300Tr</div>
                <div class="tick">400Tr</div>
                <div class="tick">500Tr</div>
                <div class="tick">600Tr</div>
                <div class="tick">700Tr</div>
                <div class="tick">800Tr</div>
                <div class="tick">900Tr</div>
                <div class="tick">1T</div>
            </div>
            <div class="bars" id="bars"></div>
        </div>
    </div>

    <script>
        window.onload = function() {
            const barsContainer = document.getElementById('bars');
            const fixedData = [{
                    month: "Tháng 1",
                    revenue: <?php echo isset($doanh_thu_thang_1) ? $doanh_thu_thang_1 : 0; ?>
                },
                {
                    month: "Tháng 2",
                    revenue: <?php echo isset($doanh_thu_thang_2) ? $doanh_thu_thang_2 : 0; ?>
                },
                {
                    month: "Tháng 3",
                    revenue: <?php echo isset($doanh_thu_thang_3) ? $doanh_thu_thang_3 : 0; ?>
                },
                {
                    month: "Tháng 4",
                    revenue: <?php echo isset($doanh_thu_thang_4) ? $doanh_thu_thang_4 : 0; ?>
                },
                {
                    month: "Tháng 5",
                    revenue: <?php echo isset($doanh_thu_thang_5) ? $doanh_thu_thang_5 : 0; ?>
                },
                {
                    month: "Tháng 6",
                    revenue: <?php echo isset($doanh_thu_thang_6) ? $doanh_thu_thang_6 : 0; ?>
                },
                {
                    month: "Tháng 7",
                    revenue: <?php echo isset($doanh_thu_thang_7) ? $doanh_thu_thang_7 : 0; ?>
                },
                {
                    month: "Tháng 8",
                    revenue: <?php echo isset($doanh_thu_thang_8) ? $doanh_thu_thang_8 : 0; ?>
                },
                {
                    month: "Tháng 9",
                    revenue: <?php echo isset($doanh_thu_thang_9) ? $doanh_thu_thang_9 : 0; ?>
                },
                {
                    month: "Tháng 10",
                    revenue: <?php echo isset($doanh_thu_thang_10) ? $doanh_thu_thang_10 : 0; ?>
                },
                {
                    month: "Tháng 11",
                    revenue: <?php echo isset($doanh_thu_thang_11) ? $doanh_thu_thang_11 : 0; ?>
                },
                {
                    month: "Tháng 12",
                    revenue: <?php echo isset($doanh_thu_thang_12) ? $doanh_thu_thang_12 : 0; ?>
                },
            ];
            const maxRevenue = 1000000000; // 1 tỷ
            const minRevenue = 0; // Bắt đầu từ 0

            fixedData.forEach(data => {
                const heightPercentage = (data.revenue / maxRevenue) * 100;

                const bar = document.createElement('div');
                bar.className = 'bar';
                bar.style.height = `${heightPercentage}%`;

                const label = document.createElement('span');
                label.textContent = `${(data.revenue / 1000000).toFixed(0)}M`; // Hiển thị triệu đồng
                bar.appendChild(label);

                const monthLabel = document.createElement('label');
                monthLabel.textContent = data.month;
                bar.appendChild(monthLabel);

                barsContainer.appendChild(bar);
            });
        };
    </script>
    <!-- -------------------------------------------------------------------------------------->

    <br>
    <div class="container-add">
        <br>
        <!-- Bảng thống kê sản phẩm bán chạy -->
        <div class="table-container">
            <h2>Sản Phẩm Bán Chạy</h2>
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>ID Sản Phẩm</th>
                        <th>Mã Sản Phẩm</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Số lượng bán</th>
                        <th>Doanh thu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($top_selling as $index =>  $value) {
                        extract($value); ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= $sp_ma ?></td>
                            <td><?= $ten_sp ?></td>
                            <td><?= $so_luong_ban ?></td>
                            <td><?= number_format($doanh_thu, 0, ',', '.') ?> VNĐ</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <br>
        <!-- Bảng thống kê doanh thu theo tháng -->
        <!-- <div class="table-container">
            <h2>Doanh Thu Theo Tháng</h2>
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>Tháng</th>
                        <th>Năm</th>
                        <th>Tổng Doanh thu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($report_totalamount as $value) {
                        extract($value); ?>
                        <tr>
                            <td><?= $thang; ?></td>
                            <td><?= $nam; ?></td>
                            <td><?= number_format($tong_doanh_thu, 0, ',', '.') ?> VNĐ</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div> -->
    </div>
</article>