<div class="container-fluid">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Sửa người dùng</h5>
        <div class="card">
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="col-md-12">
                        <label for="role_id" class="form-label">Phân quyền</label>
                        <select class="form-select" name="role_id" required aria-label=".form-select-sm example">
                            <!-- <option>Vui lòng chọn loại người dùng</option> -->
                            <option value="1" <?php if ($query['role_id'] == 1) {
                                                    echo 'selected';
                                                } ?>>Admin</option>
                            <option value="2" <?php if ($query['role_id'] == 2) {
                                                    echo 'selected';
                                                } ?>>User</option>
                        </select>
                    </div>
                    <div class="mb-3 form-check">
                        <!-- <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label> -->
                    </div>
                    <button type="submit" class="btn btn-primary" name="updateUser">Thêm</button>
                </form>
            </div>
        </div>
    </div>
</div>