<?php
include 'view/admin/nav.php';
?>

<article>
    <div class="container-add">
        <h1>Cập Nhật Đơn Hàng</h1>
        <form action="" method="POST">
            <?php if ($load_one_order) {
                extract($load_one_order); ?>
                <label for="name">Tên người nhận:</label>
                <input type="text" id="name" name="namePay" placeholder="<?= $dh_nameUser; ?>" value="<?php if (isset($namePay) && !empty($namePay)) echo $namePay; ?>" disabled />

                <label for="email">Email:</label>
                <input type="text" id="email" name="emailPay" placeholder="<?= $dh_emailUser; ?>" value="<?php if (isset($emailPay) && !empty($emailPay)) echo $emailPay; ?>" disabled />

                <label for="tel">Số điện thoại:</label>
                <input type="tel" id="tel" name="phonePay" placeholder="<?= $dh_phoneUser; ?>" value="<?php if (isset($phonePay) && !empty($phonePay)) echo $phonePay; ?>" disabled />

                <label for="address-detail">Địa chỉ:</label>
                <input type="text" id="address-detail" name="addressPay" placeholder="<?= $dh_addressUser; ?>" value="<?php if (isset($addressPay) && !empty($addressPay)) echo $addressPay; ?>" disabled />

                <label for="location-col">Quốc gia:</label>
                <input type="text" id="location-col" name="countryPay" placeholder="<?= $dh_countryPay; ?>" value="<?php if (isset($countryPay) && !empty($countryPay)) echo $countryPay; ?>" disabled />

                <label for="location-city">Thành phố:</label>
                <input type="text" id="location-city" name="cityPay" placeholder="<?= $dh_cityPay; ?>" value="<?php if (isset($cityPay) && !empty($cityPay)) echo $cityPay; ?>" disabled />

                <label for="location-district">Quận/Huyện:</label>
                <input type="text" id="location-district" name="districtPay" placeholder="<?= $dh_districtPay; ?>" value="<?php if (isset($districtPay) && !empty($districtPay)) echo $districtPay; ?>" disabled />

                <label for="location-commune">Xã/Phường:</label>
                <input type="text" id="location-commune" name="communePay" placeholder="<?= $dh_communePay; ?>" value="<?php if (isset($communePay) && !empty($communePay)) echo $communePay; ?>" disabled />

                <label for="message">Ghi chú:</label>
                <input type="text" id="message" name="messagePay" placeholder="<?= $dh_messagePay; ?>" value="<?php if (isset($messagePay) && !empty($messagePay)) echo $messagePay; ?>" disabled />

                <label for="statusPay">Trạng thái:</label>
                <select name="statusPay" id="statusPay_<?= $dh_id ?>" onchange="checkStatus(<?= $dh_id ?>)">
                    <option value="Chờ Xác Nhận" <?= ($dh_status == "Chờ Xác Nhận") ? 'selected' : ''; ?>>Chờ Xác Nhận</option>
                    <option value="Đã Xác Nhận" <?= ($dh_status == "Đã Xác Nhận") ? 'selected' : ''; ?>>Đã Xác Nhận</option>
                    <option value="Chờ Giao Hàng" <?= ($dh_status == "Chờ Giao Hàng") ? 'selected' : ''; ?>>Chờ Giao Hàng</option>
                    <option value="Đang Giao Hàng" <?= ($dh_status == "Đang Giao Hàng") ? 'selected' : ''; ?>>Đang Giao Hàng</option>
                    <option value="Giao Hàng Thành Công" <?= ($dh_status == "Giao Hàng Thành Công") ? 'selected' : ''; ?>>Giao Hàng Thành Công</option>
                    <option value="Đã nhận hàng" <?= ($dh_status == "Đã nhận hàng") ? 'selected' : ''; ?>>Đã nhận hàng</option>
                </select>

                <button type="submit" name="btnPayUpdate" class="button-confirm">Cập Nhật</button>

            <?php } ?>
        </form>

        <?php if (!empty($mess)): ?>
            <p class="error-message" style="align-center; margin-left: 100px;"><?php echo $mess; ?></p>
        <?php endif; ?>
    </div>
</article>

<script>
    // Hàm kiểm tra trạng thái và ẩn/hiện các tùy chọn tương ứng cho mỗi đơn hàng
    function checkStatus(orderId) {
        var statusSelect = document.getElementById("statusPay_" + orderId); // Lấy select tương ứng với đơn hàng
        var selectedStatus = statusSelect.value;

        // Lấy tất cả các option trong select
        var options = statusSelect.getElementsByTagName("option");

        // Tùy theo trạng thái được chọn, ẩn các option không phù hợp
        for (var i = 0; i < options.length; i++) {
            var option = options[i];
            // Kiểm tra trạng thái được chọn và ẩn các option phù hợp
            if (selectedStatus == "Đã Xác Nhận" && i == 0) { // "Chờ Xác Nhận" không thể chọn khi "Đã Xác Nhận"
                option.disabled = true;
            } else if (selectedStatus == "Chờ Giao Hàng" && i < 2) { // Ẩn các trạng thái trước khi "Chờ Giao Hàng"
                option.disabled = true;
            } else if (selectedStatus == "Đang Giao Hàng" && i < 3) { // Ẩn các trạng thái trước khi "Đang Giao Hàng"
                option.disabled = true;
            } else if (selectedStatus == "Giao Hàng Thành Công" && i < 4) { // Ẩn các trạng thái trước khi "Giao Hàng Thành Công"
                option.disabled = true;
            } else if (selectedStatus == "Đã nhận hàng" && i < 5) { // Ẩn các trạng thái trước khi "Đã nhận hàng"
                option.disabled = true;
            } else {
                option.disabled = false; // Kích hoạt lại các option còn lại
            }
        }
    }

    // Khi trang web được tải, gọi hàm checkStatus để kiểm tra trạng thái hiện tại cho từng đơn hàng
    window.onload = function() {
        var allStatusSelects = document.querySelectorAll('[id^="statusPay_"]'); // Lấy tất cả các select theo ID động
        allStatusSelects.forEach(function(statusSelect) {
            var orderId = statusSelect.id.split('_')[1]; // Lấy id đơn hàng từ ID động
            checkStatus(orderId); // Kiểm tra trạng thái của mỗi đơn hàng
        });
    };
</script>