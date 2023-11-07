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
                    <tr>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">1</h6>
                        </td>
                        <td class="border-bottom-0">
                            <img style="max-width: 35%;" src="./admin/products/img/<?= $data['img'] ?>" alt="">
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">Sunil Joshi</h6>
                            <!-- <span class="fw-normal">Web Designer</span> -->
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-0 fs-4">$3.9</h6>
                        </td>
                        <td class="border-bottom-0">
                            <p class="mb-0 fw-normal"></p>
                        </td>
                        <td class="border-bottom-0">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-primary rounded-3 fw-semibold">
                                </span>
                            </div>
                        </td>
                       
                        <td>
                            <a href="#" class="btn btn-danger m-1">Xoá</a>
                            <a href="index.php?act=product&get=update" class="btn btn-warning m-1">Sửa</a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>