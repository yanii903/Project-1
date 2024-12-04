<?php
include 'view/admin/nav.php';
?>
<style>
    .container-update {
        max-width: 400px;
        margin: auto;
        padding: 20px;
    }

    .container-update h1 {
        text-align: center;
        font-size: 20px;
    }

    .container-update label {
        font-size: 14px;
        margin-top: 10px;
    }

    .container-update input,
    .container-update select,
    .container-update button {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        margin-bottom: 15px;
        border: 1px solid;
        border-radius: 5px;
    }

    .container-update button {
        background-color: black;
        color: white;
        border: none;
        cursor: pointer;
    }

    .error-message {
        color: red;
        font-size: 15px;
        font-weight: bold;
        margin-top: -10px;
        margin-bottom: 10px;
        font-style: italic;
    }

    .success-message {
        color: green;
        font-size: 20px;
        font-weight: bold;
        text-align: center;
        font-style: italic;
    }
</style>
<article>
    <div class="container-update">
        <h1>Cập Nhật Đơn Hàng</h1>

        <form action="" method="POST">
            <?php if ($load_one_order) {
                extract($load_one_order); ?>
                <div class="input-name">
                    <input
                        type="text"
                        id="name"
                        name="namePay"
                        placeholder="<?= $dh_nameUser; ?>"
                        value="<?php if (isset($namePay) && !empty($namePay)) echo $namePay; ?>" disabled />
                </div>

                <div class="input-email-phone">
                    <div class="input-email">
                        <input
                            type="text"
                            id="email"
                            name="emailPay"
                            placeholder="<?= $dh_emailUser; ?>"
                            value="<?php if (isset($emailPay) && !empty($emailPay)) echo $emailPay; ?>" disabled />
                    </div>

                    <div class="input-phone">
                        <input
                            type="tel"
                            id="tel"
                            name="phonePay"
                            placeholder="<?= $dh_phoneUser; ?>"
                            value="<?php if (isset($phonePay) && !empty($phonePay)) echo $phonePay; ?>" disabled />
                    </div>
                </div>

                <div class="input-address">
                    <input
                        type="text"
                        id="address-detail"
                        name="addressPay"
                        placeholder="<?= $dh_addressUser; ?>"
                        value="<?php if (isset($addressPay) && !empty($addressPay)) echo $addressPay; ?>" disabled />
                </div>

                <div class="input-location">
                    <div class="location-detail">
                        <div class="location-detail-col">
                            <input
                                type="text"
                                id="location-col"
                                name="countryPay"
                                placeholder="<?= $dh_countryPay; ?>"
                                value="<?php if (isset($countryPay) && !empty($countryPay)) echo $countryPay; ?>" disabled />
                        </div>

                        <div class="location-detail-col">
                            <input
                                type="text"
                                id="location-city"
                                name="cityPay"
                                placeholder="<?= $dh_cityPay; ?>"
                                value="<?php if (isset($cityPay) && !empty($cityPay)) echo $cityPay; ?>" disabled />
                        </div>
                    </div>

                    <div class="location-detail">
                        <div class="location-detail-col">
                            <input
                                type="text"
                                id="location-district"
                                name="districtPay"
                                placeholder="<?= $dh_districtPay; ?>"
                                value="<?php if (isset($districtPay) && !empty($districtPay)) echo $districtPay; ?>" disabled />
                        </div>

                        <div class="location-detail-col">
                            <input
                                type="text"
                                id="location-commune"
                                name="communePay"
                                placeholder="<?= $dh_communePay; ?>"
                                value="<?php if (isset($communePay) && !empty($communePay)) echo $communePay; ?>" disabled />
                        </div>
                    </div>
                </div>

                <div class="input-message">
                    <input
                        type="text"
                        id="message"
                        name="messagePay"
                        placeholder="<?= $dh_messagePay; ?>"
                        value="<?php if (isset($messagePay) && !empty($messagePay)) echo $messagePay; ?>" disabled />
                </div>

                <div class="input-status">
                    <select name="statusPay">
                        <option value="Chờ Xác Nhận">Chờ Xác Nhận</option>
                        <option value="Đã Xác Nhận">Đã Xác Nhận</option>
                        <option value="Chờ Giao Hàng">Chờ Giao Hàng</option>
                        <option value="Đang Giao Hàng">Đang Giao Hàng</option>
                        <option value="Giao Hàng Thành Công">Giao Hàng Thành Công</option>
                        <option value="Giao Hàng Thành Công">Đã nhận hàng</option>
                    </select>
                </div>

                <button type="submit" name="btnPayUpdate" class="button-confirm">
                    Cập Nhật
                </button>

            <?php } ?>
        </form>
        <?php if (!empty($mess)): ?>
            <p style="color: red; align-center; margin-left: 100px;"><?php echo $mess; ?></p>
        <?php endif; ?>
    </div>
</article>