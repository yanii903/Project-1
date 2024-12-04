<?php

?>
<div class="all">
    <div class="address">
        <h4>Địa chỉ nhận hàng</h4>
        <div class="addres-input">
            <form action="">
                <div class="input-name">
                    <input
                        type="text"
                        id="name"
                        name="name"
                        placeholder="Ví dụ: Nguyễn Văn A"
                        required />
                </div>
                <div class="input-email-phone">
                    <div class="input-email">
                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="nguyenvana@gmail.com"
                            required />
                    </div>
                    <div class="input-phone">
                        <input
                            type="tel"
                            id="tel"
                            name="tel"
                            placeholder="Ví dụ: 0123456789"
                            required />
                    </div>
                </div>
                <div class="input-address">
                    <input
                        type="text"
                        id="address-detail"
                        name="address-detail"
                        placeholder="Ví dụ: Số 13 Trịnh Văn Bô"
                        required />
                </div>
                <div class="input-location">
                    <div class="location-detail">
                        <div class="location-detail-col">
                            <input
                                type="text"
                                id="location-col"
                                name="location-country"
                                placeholder="Quốc gia"
                                required />
                        </div>
                        <div class="location-detail-col">
                            <input
                                type="text"
                                id="location-city"
                                name="location-city"
                                placeholder="Tỉnh / TP"
                                required />
                        </div>
                    </div>
                    <div class="location-detail">
                        <div class="location-detail-col">
                            <input
                                type="text"
                                id="location-district"
                                name="location-district"
                                placeholder="Quận / Huyện"
                                required />
                        </div>
                        <div class="location-detail-col">
                            <input
                                type="text"
                                id="location-commune"
                                name="location-commune"
                                placeholder="Xã / Phường"
                                required />
                        </div>
                    </div>
                </div>
                <div class="input-message">
                    <textarea
                        id="message"
                        name="message"
                        placeholder="Ví dụ: Chuyển hàng hóa giờ hành chính"
                        required
                        rows="4"
                        maxlength="500"></textarea>
                </div>
                <div class="input-payment">
                    <select id="payment" name="payment" required>
                        <option value="" disabled selected>
                            Phương Thức Thanh Toán
                        </option>
                        <option value="momo">Momo</option>
                        <option value="vnpay">VNPay</option>
                        <option value="shopeepay">ShopeePay</option>
                        <option value="zalopay">ZaloPay</option>
                    </select>
                </div>
                <div class="chexbox-pay">
                    <label>
                        <input type="checkbox" name="checkbox" />
                        Yêu cầu xuất hóa đơn GTGT
                    </label>
                </div>

                <div class="pay-confirm">
                    <a href="#">Giỏ hàng</a>
                    <button type="submit" class="button-confirm">
                        Xác nhận thanh toán
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="product">
        <div class="product-img">
            <div class="product-img-col">
                <img
                    src="https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/i/p/iphone-15-pro-max_3.png" />
                <div class="product-img-col-title">
                    <h5>iPhone 15 Pro Max 256GB Chưa Active</h5>
                    <p>26.199.000<span>đ</span></p>
                </div>
            </div>
            <div class="product-img-col">
                <img
                    src="https://cdn.xtmobile.vn/vnt_upload/product/09_2023/thumbs/600_ip15_gr_5.jpg" />
                <div class="product-img-col-title">
                    <h5>iPhone 15 128GB Chưa Active</h5>
                    <p>15.899.000<span>đ</span></p>
                </div>
            </div>
        </div>
        <div class="product-money">
            <h5>Thành tiền:</h5>
            <p class="price">42.098.000 <span>đ</span></p>
        </div>
        <div class="product-total">
            <h5>Tổng số:</h5>
            <p class="price">42.098.000 <span>đ</span></p>
        </div>
    </div>
</div>