<div class="row">
    <div class="col-12">

        <div class="card-box">
            <h4 class="header-title">Quản lí Thành viên</h4>
            <div class="text-left">
                <a href="adduser" class="btn btn-primary my-2" data-toggle="modal" data-target="#themuser">Thêm mới
                    Thành viên</a>
                <?php if (isset($validation)): ?>
                <div class="col-12">
                    <div class="alert alert-danger" role="alert">
                        <?= $validation->listErrors() ?>
                    </div>
                </div>
                <?php endif; ?>
                <?php if (session()->get('success')): ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->get('success') ?>
                </div>
                <?php endif; ?>
            </div>
            <div id=" datatable_wrapper" class="dataTables_wrapper  dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="datatable"
                            class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline collapsed order-column"
                            style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
                            aria-describedby="datatable_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1"
                                        colspan="1" style="width: 104px;" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending">Họ tên</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                        style="width: 163px;" aria-label="Position: activate to sort column ascending">
                                        chức vụ</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                        style="width: 73px;" aria-label="Office: activate to sort column ascending">
                                        Email</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                        style="width: 26px;" aria-label="Age: activate to sort column ascending">Đăng
                                        Kí
                                        ngày
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                        style="width: 65px; display: none;"
                                        aria-label="Start date: activate to sort column ascending">Chỉnh sửa ngày
                                    </th>
                                    <?php if($user['role'] == 0): ?>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                        style="width: 54px; display: none;"
                                        aria-label="Salary: activate to sort column ascending">Hành động</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $sorting = -1; foreach($users as $key => $value): $sorting++ ?>
                                <tr role="row" class="even text-center">
                                    <td class="sorting_<?= $sorting; ?>" tabindex="0">
                                        <?= $value['firstname'] . " " .$value['lastname']; ?></td>
                                    <td class="
                                     <?php if($value['role'] == 0)
                                            {
                                                echo "text-danger";
                                            }
                                            elseif($value['role'] == 1) 
                                            {
                                                echo "text-success";
                                            }
                                            else 
                                            {
                                                echo "text-warning";
                                            }
                                    ?> font-weight-bold">
                                        <?php if($value['role'] == 0)
                                                {
                                                    echo "Admin";
                                                }
                                                elseif($value['role'] == 1) 
                                                {
                                                    echo "MOD";
                                                }
                                                else 
                                                {
                                                    echo "Thành viên";
                                                }
                                        ?>
                                    </td>
                                    <td><?= $value['email']; ?></td>
                                    <td><?= $value['created_at']; ?></td>
                                    <td style=""><?= $value['updated_at'] ?></td>
                                    <?php if($user['role'] == 0): ?>
                                    <td style="">

                                        <a class="btn-danger btn" href="/userdelete/<?= $value['id']; ?>">Xóa</a>
                                        <a class="btn-primary btn" href="/useredit/<?= $value['id']; ?>">Sửa</a>
                                    </td>
                                    <?php endif; ?>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>
<div class="modal fade" id="themuser" tabindex="-1" role="dialog" aria-labelledby="themuserTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Thêm mới Thành viên</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <?php if (isset($validation)): ?>
                <div class="col-12">
                    <div class="alert alert-danger" role="alert">
                        <?= $validation->listErrors() ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <div class="modal-body">
                <form action="/user" method="post">
                    <div class="form-group">
                        <label>Họ</label>
                        <input class="form-control" type="text" required="" placeholder="" name=" firstname"
                            value="<?= set_value('firstname') ?>">

                    </div>
                    <div class="form-group">
                        <label>Tên</label>
                        <input class="form-control" type="text" required="" placeholder="" name="lastname"
                            value="<?= set_value('lastname') ?>">

                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type="email" required="" name="email" placeholder=""
                            value="<?= set_value('email') ?>">

                    </div>
                    <div class="form-group">
                        <label>Chức vụ</label>
                        <select class="form-control" name='role'>
                            <option value="0" <?= set_select('role', '0'); ?>> Admin </option>
                            <option value="1" <?= set_select('role', '1'); ?>> Mod </option>
                            <option value="2" <?= set_select('role', '2'); ?>> Nguời dùng </option>
                        </select>

                    </div>
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input class="form-control" type="password" required="" id="password" placeholder=""
                            name="password" value="<?= set_value('password') ?>">

                    </div>
                    <div class="form-group">
                        <label>Nhập lại mật khẩu</label>
                        <input class="form-control" type="password" required="" id="password_confirm" placeholder=""
                            name="password_confirm" value="">

                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary form-control" type="submit">Thêm mới</button>

                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Quay về</button>

            </div>
        </div>
    </div>
</div>