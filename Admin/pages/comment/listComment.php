<div class="card w-100 pt-5">
    <div class="card-body p-4">
        <h5 class="card-title fw-semibold mb-4">Quản lí bình luận</h5>
        <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle">
                <thead class="text-dark fs-4">
                    <tr class="">
                        <!-- <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Id</h6>
                        </th>

                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Tên</h6>
                        </th> -->
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Sản phẩm</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Lượt bình luận</h6>
                        </th>



                        <!-- <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Thời gian</h6>
                        </th> -->

                        <!-- <th>
                            <a href="index.php?act=product&get=add" class="btn btn-success m-1">Thêm</a>
                        </th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $comment = new comment();
                    $db = new connect();
                    $select = "SELECT p.id_product, p.name_pr, COUNT(c.id_cmt) AS comment_count
                    FROM products AS p
                    JOIN (
                        SELECT DISTINCT product_id,id_cmt
                        FROM comments
                    ) AS c ON p.id_product = c.product_id
                    GROUP BY p.id_product, p.name_pr";



                    $result = $db->pdo_query($select);
                    // $select = $product->getproduct(); 
                    foreach ($result as $data) {
                        echo '
                    <tr>
                      
                           <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-0 fs-4">' . $data['name_pr'] . '</h6>

                        </td>
                       
                        <td class="border-bottom-0">
                            <p class="mb-0 fw-normal">' . $data['comment_count'] . '</p>
                        </td>
                    
                      
                        <td>
                            
                            <a href="index.php?act=comment&get=detail_comment&id_cmts=' . $data['id_product'] . '" class="btn btn-success m-1">Chi tiết</a>
                        </td>
                        
                    </tr>
                    ';
                    }
                    ?>
                    <!-- <a href="index.php?act=product&get=update" class="btn btn-warning m-1">Sửa</a> -->

                    <!-- <td class="border-bottom-0">
                        <h6 class="fw-semibold mb-0 fs-4">' . $data['id_cmt'] . '</h6>
                        </td>
                         <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">' . $data['username'] . '</h6>
                        
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-0 fs-4">' . $data['create_at'] . '</h6>
                        </td> -->
                </tbody>
            </table>
        </div>
    </div>
</div>