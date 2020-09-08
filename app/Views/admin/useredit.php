<?= view('admin/templates/header'); ?>
<?= view('admin/templates/navbar'); ?>
<div class="card-box">
    <div>
        <div class="row">
            <div class="col-sm-12 col-md-6 offset-md-3 offset-sm-3 text-center">
                <h4 class="header-title text-primary">Sửa người dùng</h4>
                <?php if (isset($validation)): ?>
                <div class="col-12">
                    <div class="alert alert-danger" role="alert">
                        <?= $validation->listErrors() ?>
                    </div>
                </div>
                <?php endif; ?>
                <div class="mt-4">
                    <form action="/useredit/<?=$useredit['id'] ?>" method="post">
                        <div class="form-group">
                            <label>Họ</label>
                            <input class="form-control" type="text" placeholder="<?= $useredit['fullname']; ?>"
                                name=" firstname" value="<?=  $useredit['fullname'];  ?>">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="email" name="email"
                                placeholder="<?= $useredit['email'];?>" value="<?= $useredit['email']; ?>">

                        </div>
                        <div class="form-group">
                            <label>Chức vụ</label>
                            <select class="form-control" name='role'>
                                <option value="0" <?= set_select('role', '0'); ?>> Quản trị viên </option>
                                <option value="1" <?= set_select('role', '1'); ?>> Kiểm duyệt viên </option>
                                <option value="2" <?= set_select('role', '2'); ?>> Khách Hàng </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary form-control" type="submit">Lưu lại</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<?= view('admin/templates/footer'); ?>