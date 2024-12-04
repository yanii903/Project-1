<?php
include "nav.php";
include 'slideshow.php';

// Kiểm tra nếu có từ khóa tìm kiếm
$searchKey = isset($_GET['search']) ? $_GET['search'] : '';
$sortOrder = isset($_GET['sort']) ? $_GET['sort'] : '';

// Mảng sản phẩm đã tìm kiếm
$productTM = [];
$listAll_product = load_all_product(); // Lấy toàn bộ sản phẩm từ cơ sở dữ liệu

// Lọc sản phẩm theo từ khóa tìm kiếm
if (!empty($searchKey)) {
    foreach ($listAll_product as $product) {
        if (stripos(strtolower($product['sp_name']), strtolower($searchKey)) !== false) {
            $productTM[] = $product;
        }
    }
}

// Sắp xếp sản phẩm nếu có yêu cầu
if ($sortOrder === 'asc') {
    usort($productTM, function ($a, $b) {
        return $a['sp_price'] <=> $b['sp_price']; // Sắp xếp tăng dần
    });
} elseif ($sortOrder === 'desc') {
    usort($productTM, function ($a, $b) {
        return $b['sp_price'] <=> $a['sp_price']; // Sắp xếp giảm dần
    });
}
?>
<style>
    .filter-buttons {
        margin: 20px 0;
        text-align: center;
    }

    .filter-buttons fieldset {
        border: 2px solid var(--primary-bg);
        border-radius: var(--border-radius);
        padding: 10px;
        background-color: var(--card-bg);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .filter-buttons legend {
        font-size: 1.2rem;
        font-weight: bold;
        color: var(--primary-bg);
        padding: 0 10px;
    }

    .filter-buttons button {
        background-color: var(--hover-bg);
        color: #fff;
        border: none;
        border-radius: var(--border-radius);
        padding: 10px 20px;
        margin: 5px;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.3s;
        font-size: 1rem;
        font-weight: bold;
        text-transform: uppercase;
    }

    .filter-buttons button:hover {
        background-color: var(--secondary-bg);
        transform: translateY(-2px);
    }

    .filter-buttons button:active {
        transform: translateY(0);
    }
</style>

<body>
    <div class="container">
        <main>
            <?php if (empty($productTM)) { ?>
                <div>Không có sản phẩm</div>
            <?php } else { ?>
                <div class="main-full">
                    <!-- Phần chọn sắp xếp -->
                    <div class="filter-buttons">
                        <fieldset>
                            <legend>Sắp Xếp Theo Giá Sản Phẩm</legend>
                            <button type="button" onclick="updateSort('asc')">Tăng dần</button>
                            <button type="button" onclick="updateSort('desc')">Giảm dần</button>
                        </fieldset>
                    </div>

                    <!-- Hiển thị sản phẩm -->
                    <div class="product">
                        <?php foreach ($productTM as $product): ?>
                            <div class="product-box">
                                <a href="?client=detail&id=<?= $product['sp_id'] ?>">
                                    <div class="product-box-tag">
                                        <p>Trả góp 0%</p>
                                    </div>
                                    <br />
                                    <div class="product-box-img">
                                        <img src="<?= $product['sp_image'] ?>" alt="" />
                                    </div>
                                    <div class="product-box-title">
                                        <h3><?= $product['sp_name'] ?></h3>
                                        <div class="product-price">
                                            <p><?= printPrice($product['sp_price']) ?></p>
                                            <del><?= printPrice($product['sp_pricedel']) ?></del>
                                        </div>
                                        <div class="product-describe">
                                            <p><?= $product['sp_title'] ?></p>
                                        </div>
                                        <div class="product-icon">
                                            <div class="icon-star">
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bxs-star"></i>
                                            </div>
                                            <div class="icon-cart-like">
                                                <i id="cart" onclick="changeClass()" class="bx bx-cart-alt"></i>
                                                <i id="heart" onclick="changeClass2()" class="bx bx-heart"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php } ?>
        </main>
    </div>
    <br><br>
    <?php include 'footer.php'; ?>
</body>

<!-- Script JS để cập nhật URL -->
<script>
    function updateSort(order) {
        const urlParams = new URLSearchParams(window.location.search);
        urlParams.set('sort', order); // Thêm tham số sắp xếp (asc/desc)
        window.location.search = urlParams.toString(); // Cập nhật URL
    }
</script>