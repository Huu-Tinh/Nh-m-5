<!-- comment -->
<div class="more-info">

    <div class="d-flex justify-content-center p-2">
        <div class="col-md-12 col-lg-10 col-xl-8">
            <div class="card">
                <?php
                $comment = new comment();
                $db = new connect();
                $select = "SELECT *
        FROM comments
        JOIN users ON users.id_user = comments.user_id
        JOIN products ON comments.product_id = products.id_product ";
                $result = $db->pdo_query($select);
                // $select = $product->getproduct(); 
                foreach ($result as $data) {
                    echo '
                <div class="card-body">
             
                    <div class="mb-4 pb-6 d-flex flex-start align-items-center">
                 
                        <div>
                            <h6 class="fw-bold text-primary mb-1"></h6>
                        </div>
                    </div>
                    <div class="mt-3 mb-4 pb-2">
                        <div class="row">
                            <!-- <img class="col-lg-3" style="width: 100px; height: 80px; border-radius: 100%;" src="../Admin/assets/images/profile/user-1.jpg" alt=""> -->
                            <div class="col-lg-9 text-primary">
                                <p class="fw-bold text-primary">' . $data['username'] . '</p>
                                <p class=" ">
                                ' . $data['cmt'] . '
                                </p>
                                <p class="text-black-50">' . $data['create_at'] . '</p>
                                <div class="float-end">
                                    <a href="index.php?" class="btn  btn-sm">Sửa</a>
                                    <a href="index.php?" class="btn  btn-sm">Xóa</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                     ';
                }
                ?>
                 <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                    <form method="post">
                        <div class="d-flex flex-start w-100">
                            <div class="rounded-circle shadow-1-strong me-3 alert-dark" style="width: 40px; height: 40px;">

                            </div>
                            <div class="form-outline w-100">
                                <label class="form-label" for="textAreaExample">Bình luận</label>
                                <textarea class="form-control" name="cmts" id="textAreaExample" rows="4" style="background: #fff;"></textarea>
                            </div>
                        </div>
                        <div class="float-end mt-2 pt-1">
                            <button type="submit" name="add" class="btn btn-primary btn-sm">Gửi</button>
                            <button type="button" class="btn btn-outline-primary btn-sm">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- close comment -->