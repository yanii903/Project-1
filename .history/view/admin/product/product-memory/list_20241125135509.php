<?php
include 'view/admin/nav.php';
?>
<style>
    img{
        max-width: 100px;
    }
</style>
<article>
    <h1>Danh Sách Bộ Nhớ Sản Phẩm</h1>
    <div class="form">
        <form action="" enctype="multipart/form-data">
            <table>
                <thead>
                    <th>Select</th>
                    <th>STT</th>
                    <th>Bộ Nhớ</th>
                
                    <th>Sản Phẩm</th>
                    <th>Ảnh</th>
                

                    <th>Hiển Thị</th>
                    <th>Tác Vụ</th>
                </thead>

                <tbody>
                    <?php foreach ($list_product_memory as $productmemory):  extract($productmemory); ?>
                     
                    
                    
                        <tr>
                            <td><input type="checkbox" name="checkbox" id="" /></td>
                             <td><?= $pm_id ?></td>
                            <td><?= $pm_name ?></td>
                            
                              
                            <td>
                                    <?php foreach ($list_product as $product):  extract($product); ?>
                                <?php if($id_sp==$sp_id){ ?>
                                    <?= $sp_name ?>
                                   
                                      <?php } endforeach ?>
                                    
                            </td>
                            <td>
                                     <?php foreach ($list_product as $product):  extract($product); ?>
                                <?php if($id_sp==$sp_id){ ?>
                                    <img src="<?= $sp_image ?>" alt="">
                                   
                                      <?php } endforeach ?>

                            </td>
                      
                             
                            
                      
                            <td><input type="checkbox" name="" id="" /></td>
                            <td class="action">
                                <a href="?act=admin&admin=productMemory-Update&id=<?= $pm_id ?>" class="update"><i class="fa-regular fa-pen-to-square" style="color: #ff0000"></i></a>
                                <a href="?act=admin&admin=productMemory-Delete&id=<?= $pm_id ?>" class="delete"><i class="fa-solid fa-trash-can" style="color: #ff0000"></i></a>
                            </td>
                        </tr>
                         
                           <?php endforeach ?>
                 
                </tbody>
            </table>
        </form>
    </div>
</article>