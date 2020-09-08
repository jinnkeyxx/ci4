<?= view('admin/templates/header'); ?>
<?= view('admin/templates/navbar'); ?>
<div class="row">
    <div class="col-12">

        <div class="card-box">
            <h4 class="header-title">Quản lí bài viết</h4>
            <div class="text-left">
                <a href="vietbai" class="btn btn-primary my-2">Thêm mới
                    bài viết</a>
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
            <div id=" datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="datatable"
                            class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline collapsed order-column"
                            style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
                            aria-describedby="datatable_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1"
                                        colspan="1" style="" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending">Tiêu đề
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                        style="" aria-label="Position: activate to sort column ascending">
                                        Người viết
                                    </th>

                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                        style="" aria-label="Office: activate to sort column ascending">
                                        Ảnh bài viết
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                        style="" aria-label="Age: activate to sort column ascending">Trạng
                                        thái
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                        style="" aria-label="Start date: activate to sort column ascending">đường dẫn
                                        bài viết
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                        style="" aria-label="Start date: activate to sort column ascending">Ngày viết
                                        bài
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                        style="" aria-label="Start date: activate to sort column ascending">
                                        Chỉnh sửa ngày
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                        style="" aria-label="Start date: activate to sort column ascending">
                                        Người sửa
                                    </th>
                                    <?php if($user['role'] == 0): ?>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                        style=" " aria-label="Salary: activate to sort column ascending">
                                        Hành động</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $sorting = -1; foreach($post as $key => $value): $sorting++ ?>
                                <tr role="row" class="even text-center">
                                    <td class="sorting_<?= $sorting; ?>" tabindex="0">
                                        <?= $value['title'] ?>
                                    </td>
                                    <td class="">
                                        <?= $value['user_post']  ?>

                                    </td>
                                    <td>
                                        <img class="img-fluid" src="<?= $value['images']; ?>">
                                    </td>
                                    <td style="">
                                        <?= 
                                       $status = ($value['status'] == 0) ? 'Hiển thị' : 'Đang ẩn'; 
                                         ?>
                                    </td>

                                    <td style="">
                                        <?= $value['slug'] ?>
                                    </td>
                                    <td style="">
                                        <?= $value['created_at'] ?>
                                    </td>
                                    <td style="">
                                        <?= $value['updated_at'] ?>
                                    </td>
                                    <td style="">
                                        <?= $value['user_update'] ?>
                                    </td>

                                    <?php if($user['role'] == 0): ?>
                                    <td style="">

                                        <a class="btn-danger btn" href="/postdelete/<?= $value['id']; ?>">Xóa
                                        </a>
                                        <a class="btn-primary btn" href="/postedit/<?= $value['id']; ?>">Sửa</a>
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
<?= view('admin/templates/footer'); ?>