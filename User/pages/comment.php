<!-- comment -->
<div class="more-info">

    <div class="d-flex justify-content-center p-2">
        <div class="col-md-12 col-lg-10 col-xl-8">
            <div class="card">

                <div class="card-body">

                    <div class="mb-4 pb-6 d-flex flex-start align-items-center">
                        <div class="rounded-circle shadow-1-strong me-3 alert-dark" style="width: 60px; height: 60px;">
                            <img class="rounded-circle shadow-1-strong me-3" src="../Admin/assets/images/profile/<? if (isset($_SESSION[" username"])) {
                                                                                                                        $user['avatar'];
                                                                                                                    } else {
                                                                                                                        echo "user-1.jpg";
                                                                                                                    } ?>" alt="avatar" width="60" height="60" />
                        </div>
                        <div>

                            <h6 class="fw-bold text-primary mb-1"><?
                                                                    if (isset($_SESSION["username"]))
                                                                        echo $user['username'];
                                                                    else {
                                                                        echo 'Người dùng';
                                                                    } ?></h6>
                        </div>
                    </div>

                    <?php
                    $comment = new comment();
                    $db = new connect();

                    $cm = $comment->getComment($id);
                    // $select = $product->getproduct(); 
                    foreach ($cm as $data) {
                        echo '
                    <div class="mt-3 mb-4 pb-2">
                        <div class="row">
                            <!-- <img class="col-lg-3" style="width: 100px; height: 80px; border-radius: 100%;" src="../Admin/assets/images /' . $data['avatar'] . '" alt=""> -->
                            <div class="col-lg-9 text-primary">
                                <p class="fw-bold text-primary">' . $data['username'] . '</p>
                                <p class=" ">
                                ' . $data['cmt'] . '
                                </p>
                                <p class="text-black-50">' . $data['create_at'] . '</p>
                                <div class="float-end">                                                                                                                                                         
                                    <a href="index.php?" class="btn  btn-sm">Sửa</a>
                                    <a href="index.php?act=delete-comment&id_cmt='.$data['id_cmt'].'&id_pr='.$id.'" class="btn  btn-sm">Xóa</a>
                                </div>
                            </div>
                        </div>
                        </div>';
                    }
                   
                    $comment = new comment();
                    if (isset($_SESSION["username"])){
                        $id_us = $user['id_user'];
                        }
                    if (isset($_POST['add'])) {
                        $cmt = $_POST['cmts'];
                        $comment->add($cmt, $id_us, $id);
                    }
                    if (isset($_SESSION["username"])) {
                        
                        echo '<div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                        <form method="post">
                          <div class="d-flex flex-start w-100">
                           
                            <div class="form-outline w-100">
                              <div class="rounded-circle shadow-1-strong me-3 alert-dark" style="width: 40px; height: 40px;">
                
                              </div>
                              <div class="form-outline w-100">
                              <label class="form-label" for="textAreaExample">Bình luận</label>
                              <textarea class="form-control" name="cmts" id="textAreaExample" rows="4" style="background: #fff;"></textarea>
                            </div>
                          </div>
                          <div class="float-end mt-2 pt-1">
                            <button type="submit" name="add" class="btn btn-primary btn-sm">Gửi</button>  
                          </div>
                        </form>
                      </div>';
                    } else {
                        echo '<div></div>';
                    }
                    ?>
                </div>



             
                <!-- 
                    
                 <div class="rounded-circle shadow-1-strong me-3 alert-dark" style="width: 40px; height: 40px;">
                
                            </div>
                
                
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
                    </div> -->
            </div>
        </div>
    </div>

</div>
<!-- close comment -->