<?php
$comment = new comment();
$id = $_GET['id_cmts'];
$select = $comment->checkId($id);
?>

<div class="card w-100 pt-5">
    <div class="card-body p-4">
        <h5 class="card-title fw-semibold mb-4">Quản lí bình luận</h5>
        <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle">
                <thead class="text-dark fs-4">
                    <tr class="">


                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Tên</h6>
                        </th>

                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Nội dung</h6>
                        </th>

                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Sản phẩm</h6>
                        </th>

                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Thời gian</h6>
                        </th>

                        <!-- <th>
                            <a href="index.php?act=product&get=add" class="btn btn-success m-1">Thêm</a>
                        </th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $comment = new comment();
                    $db = new connect();
                    $select = "SELECT c.`cmt`, u.username, p.name_pr, c.`create_at`
                    FROM comments AS c
                    JOIN users AS u ON c.`user_id` = u.id_user
                    JOIN products AS p ON  c.product_id = p.id_product
                    where id_product = " . $id;
                    $result = $db->pdo_query($select);
                    foreach ($result as $data) {
                        echo '
                    <tr>
                      
                        ';
                        echo '  <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">' . $data['username'] . '</h6>
                        
                        </td>';
                        echo '
                        <td class="border-bottom-0">
                            <p class="mb-0 fw-normal">' . $data['cmt'] . '</p>
                        </td>
                        ';
                        echo '
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-0 fs-4">' . $data['name_pr'] . '</h6>

                        </td>
                        ';
                        echo '
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-0 fs-4">' . $data['create_at'] . '</h6>
                        </td>
                        ';
                        echo '
                        <td>
                        <button type="button" class="btn btn-danger m-1" data-bs-toggle="modal" data-bs-target="#exampleModal"> Xóa  </button>
                        
                        </td>
                        
                    </tr>
                  
                   
                    
                    
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                            <button type="button" class="btn btn-primary">Đồng ý</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    ';
                    }
                    ?>
                    <!-- <a href="index.php?act=product&get=update" class="btn btn-warning m-1">Sửa</a> -->
                    <!-- <button type="button" class="btn btn-danger m-1" data-bs-toggle="modal" data-bs-target="#exampleModal#" > Xóa </button> -->
                </tbody>
            </table>
        </div>
    </div>
</div>