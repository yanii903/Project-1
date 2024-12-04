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
                <select name="statusPay" id="statusPay">
                    <option value="Chờ Xác Nhận">Chờ Xác Nhận</option>
                    <option value="Đã Xác Nhận">Đã Xác Nhận</option>
                    <option value="Chờ Giao Hàng">Chờ Giao Hàng</option>
                    <option value="Đang Giao Hàng">Đang Giao Hàng</option>
                    <option value="Giao Hàng Thành Công">Giao Hàng Thành Công</option>
                    <option value="Đã nhận hàng">Đã nhận hàng</option>
                </select>

                <button type="submit" name="btnPayUpdate" class="button-confirm">Cập Nhật</button>

            <?php } ?>
        </form>

        <?php if (!empty($mess)): ?>
            <p class="error-message" style="align-center; margin-left: 100px;"><?php echo $mess; ?></p>
        <?php endif; ?>
    </div>
</article>