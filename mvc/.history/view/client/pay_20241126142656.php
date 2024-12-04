<?php
include 'nav.php';
?>
<link rel="stylesheet" href="view/assets/pay.css">

<div class="all">
    <div class="address">
        <h4>Địa chỉ nhận hàng</h4>
        <div class="addres-input">
            <form action="" method="POST">
                <div class="input-name">
                    <input
                        type="text"
                        id="name"
                        name="namePay"
                        placeholder="Ví dụ: Nguyễn Văn A"
                        value="<?php if (isset($namePay) && !empty($namePay)) echo $namePay; ?>" />

                    <?php if (!empty($messNamePay)): ?>
                        <i style="color: red;"><?php echo $messNamePay; ?></i>
                    <?php endif; ?>
                </div>

                <div class="input-email-phone">
                    <div class="input-email">
                        <input
                            type="text"
                            id="email"
                            name="emailPay"
                            placeholder="nguyenvana@gmail.com"
                            value="<?php if (isset($emailPay) && !empty($emailPay)) echo $emailPay; ?>" />

                        <?php if (!empty($messEmailPay)): ?>
                            <i style="color: red;"><?php echo $messEmailPay; ?></i>
                        <?php endif; ?>
                    </div>

                    <div class="input-phone">
                        <input
                            type="tel"
                            id="tel"
                            name="phonePay"
                            placeholder="Ví dụ: 0123456789"
                            value="<?php if (isset($phonePay) && !empty($phonePay)) echo $phonePay; ?>" />

                        <?php if (!empty($messPhonePay)): ?>
                            <i style="color: red;"><?php echo $messPhonePay; ?></i>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="input-address">
                    <input
                        type="text"
                        id="address-detail"
                        name="addressPay"
                        placeholder="Ví dụ: Số 13 Trịnh Văn Bô, Nam Từ Liêm, Hà Nội"
                        value="<?php if (isset($addressPay) && !empty($addressPay)) echo $addressPay; ?>" />

                    <?php if (!empty($messAddressPay)): ?>
                        <i style="color: red;"><?php echo $messAddressPay; ?></i>
                    <?php endif; ?>
                </div>

                <div class="input-location">
                    <div class="location-detail">
                        <div class="location-detail-col">
                            <input
                                type="text"
                                id="location-col"
                                name="countryPay"
                                placeholder="Quốc gia"
                                value="<?php if (isset($countryPay) && !empty($countryPay)) echo $countryPay; ?>" />

                            <?php if (!empty($messCountryPay)): ?>
                                <i style="color: red;"><?php echo $messCountryPay; ?></i>
                            <?php endif; ?>
                        </div>

                        <div class="location-detail-col">
                            <input
                                type="text"
                                id="location-city"
                                name="cityPay"
                                placeholder="Tỉnh / TP"
                                value="<?php if (isset($cityPay) && !empty($cityPay)) echo $cityPay; ?>" />

                            <?php if (!empty($messCityPay)): ?>
                                <i style="color: red;"><?php echo $messCityPay; ?></i>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="location-detail">
                        <div class="location-detail-col">
                            <input
                                type="text"
                                id="location-district"
                                name="districtPay"
                                placeholder="Quận / Huyện"
                                value="<?php if (isset($districtPay) && !empty($districtPay)) echo $districtPay; ?>" />

                            <?php if (!empty($messDistrictPay)): ?>
                                <i style="color: red;"><?php echo $messDistrictPay; ?></i>
                            <?php endif; ?>
                        </div>

                        <div class="location-detail-col">
                            <input
                                type="text"
                                id="location-commune"
                                name="communePay"
                                placeholder="Xã / Phường"
                                value="<?php if (isset($communePay) && !empty($communePay)) echo $communePay; ?>" />

                            <?php if (!empty($messCommunePay)): ?>
                                <i style="color: red;"><?php echo $messCommunePay; ?></i>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="input-message">
                    <textarea
                        id="message"
                        name="messagePay"
                        placeholder="Ví dụ: Chuyển hàng hóa giờ hành chính"
                        rows="4"
                        maxlength="500">
                    </textarea>
                </div>
                <div class="chexbox-pay">
                    <label>
                        <input type="checkbox" name="checkbox" />
                        Yêu cầu xuất hóa đơn GTGT
                    </label>
                </div>
                <br>
                <?php if (!empty($mess)): ?>
                    <i style="color: red; align-center; margin-left: 200px;"><?php echo $mess; ?></i>
                <?php endif; ?>

                <div style="margin-top: 20px;" class="pay-confirm">
                    <a href="#">Giỏ hàng</a>
                    <button type="submit" name="btnPay" class="button-confirm">
                        Xác nhận thanh toán
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="productPay">
        <h4>Sản phẩm trong giỏ hàng</h4>
        <?php
        // Giả sử list_products là mảng chứa các sản phẩm trong giỏ hàng
        if (!empty($list_products)) {
            // Lấy số lượng sản phẩm từ URL hoặc từ mảng
            $quantities = isset($_GET['quantity']) ? explode(',', $_GET['quantity']) : [];

            foreach ($list_products as $index => $product) {
                extract($product); // Lấy các thông tin sản phẩm từ mảng
                $quantity = isset($quantities[$index]) ? $quantities[$index] : 0; // Số lượng của sản phẩm
        ?>
                <div class="productPay-item">
                    <div class="productPay-img-col">
                        <img src="<?= $sp_image ?>" alt="<?= $sp_name ?>" />
                        <div class="productPay-img-col-title">
                            <h5><?= $sp_name ?></h5>
                            <p style="color: red;"><?= number_format($sp_price, 0, ',', '.') ?><span>đ</span></p>
                            <p><span>x <?= $quantity; ?></span></p> <!-- Hiển thị số lượng sản phẩm -->
                        </div>
                    </div>
                    <br>
                </div>
                <hr><br>
            <?php } ?>

            <div class="productPay-summary">
                <h4>Tổng Số Lượng: <?= $_GET['totalquantity'] ?></h4>
            </div>
            <br>
            <hr><br>
            <div class="productPay-summary">
                <h3>Thành Tiền:</h3>
                <p style="color: red; font-size: 20px; margin-top: 10px;"><?= number_format($_GET['totalamount'], 0, ',', '.') ?> <span>đ</span></p>
            </div>
        <?php } else { ?>
            <p>Giỏ hàng của bạn hiện đang trống!</p>
        <?php } ?>
    </div>
</div>