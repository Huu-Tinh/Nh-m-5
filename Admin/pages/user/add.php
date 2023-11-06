<div class="container-fluid">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Thêm mới người dùng</h5>
        <div class="card">
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nhập lại mật khẩu </label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <!-- <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div> -->

                    <a href="index.php?act=listUser" type="button" class="btn btn-secondary">Hủy</a>
                    <button type="submit" class="btn btn-primary" name="addUser">Thêm</button>
                </form>
            </div>
        </div>
    </div>
</div>