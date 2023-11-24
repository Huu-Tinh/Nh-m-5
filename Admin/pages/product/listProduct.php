<div class="card w-100 pt-5">
    <div class="card-body p-4">
        <h5 class="card-title fw-semibold mb-4">Quản lí sản phẩm</h5>
        <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle">
                <thead class="text-dark fs-4">
                    <tr class="">
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Id</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Img</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Name</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Price</h6>
                        </th>



                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Loại</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Quantity</h6>
                        </th>

                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Mô tả</h6>
                        </th>
                        <th>
                            <a href="index.php?act=product&get=add" class="btn btn-success m-1">Thêm</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $product = new product();
                    $db = new connect();
                    $select = "SELECT * from products as p,categories as c where p.categori_id = c.id_categori";
                    $result = $db->pdo_query($select);
                    // $select = $product->getproduct(); 
                    foreach ($result as $data) {
                        echo '
                    <tr>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">' . $data['id_product'] . '</h6>
                        </td>
                        </td>
                        <td class="border-bottom-0">
                        <img style="max-width: 35%;" src="./assets/images/products/' . $data['img'] . '" alt="">
                        </td>
                       <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-0 fs-4">' . $data['name_pr'] . '</h6>
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">' . $data['price'] . '</h6>
                            <!-- <span class="fw-normal">Web Designer</span> -->
                       
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">' . $data['name_ct'] . '</h6>
                        </th>
                        <td class="border-bottom-0">
                        <p class="mb-0 fw-normal">' . $data['quantity'] . '</p>
                    </td>
                        <td class="border-bottom-0">
                            <p class="mb-0 fw-normal">' . $data['describe'] . '</p>
                        </td>
                       
                        <td>
                          

                        <button type="button" class="btn btn-danger m-1" data-bs-toggle="modal" data-bs-target="#exampleModal' . $data['id_product'] . '" > Xóa </button>
                          
                            <a href="index.php?act=product&get=update&id=' . $data['id_product'] . '" class="btn btn-warning m-1">Sửa</a>
                        </td>
                    </tr>
                    <div class="modal fade" id="exampleModal' . $data['id_product'] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 text-danger" id="exampleModalLabel">LƯU Ý!</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    bạn có chắc chắn xóa !
                                </div>
                                <div class="modal-footer">
                                    <form action="index.php?act=product&get=delete&id=' . $data['id_product'] . '" method="post">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                        <button type="submit" class="btn btn-primary" name="delete">Đồng ý</button>
                                    </form>
                                </div>
                            </div>  
                        </div>
                    </div>
                    ';
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <!-- // <a href="#" class="btn btn-danger m-1">Xoá</a> -->
    </div>
</div>
<?php
