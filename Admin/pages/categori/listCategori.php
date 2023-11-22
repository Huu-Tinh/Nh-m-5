<div class="card w-100 pt-5">
    <div class="card-body p-4">
        <h5 class="card-title fw-semibold mb-4">Quản lí loại sản phẩm</h5>
        <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle">
                <thead class="text-dark fs-4">
                    <tr class="">
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Id</h6>
                        </th>

                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Tên</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">note</h6>
                        </th>

                        <th>
                            <a href="index.php?act=categori&get=add" class="btn btn-success m-1">Thêm</a>
                        </th>
                    </tr>
                </thead>
                <tbody>

                    <?
                    $categori = new categori();
                    $select = $categori->getcategori();
                    foreach ($select as $data) {
                        echo '   
                    <tr>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">' . $data['id_categori'] . '</h6>
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">' . $data['name_ct'] . '</h6>
                          
                        </td>
                      
                        <td class="border-bottom-0">
                            <p class="mb-0 fw-normal">' . $data['note'] . '</p>
                        </td>


                    
                        <td>
                            <button type="button" class="btn btn-danger m-1" data-bs-toggle="modal" data-bs-target="#exampleModal' . $data['id_categori'] . '" > Xóa </button>
                            <a href="index.php?act=categori&get=update&id=' . $data['id_categori'] . '" class="btn btn-warning m-1">Sửa</a>
                        </td>
                    </tr>
                    <div class="modal fade" id="exampleModal' . $data['id_categori'] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <form action="index.php?act=categori&get=delete&id=' . $data['id_categori'] . '" method="post">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                        <button type="submit" class="btn btn-primary" name="delete">Đồng ý</button>
                                    </form>
                                </div>
                            </div>  
                        </div>
                    </div>
                   ';
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>