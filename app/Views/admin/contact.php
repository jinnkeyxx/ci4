<?= view('admin/templates/header'); ?>
<?= view('admin/templates/navbar'); ?>
<div class="row">
    <div class="col-12">

        <div class="card-box">
            <h4 class="header-title">Quản lí liên hệ khách hàng</h4>
            <div class="text-left">
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
                                    
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                        style="" aria-label="Position: activate to sort column ascending">
                                        Người viết
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                        style="" aria-label="Position: activate to sort column ascending">
                                       Email
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                        style="" aria-label="Age: activate to sort column ascending">Nội Dung
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                        style="" aria-label="Age: activate to sort column ascending">Trạng thais
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                        style="" aria-label="Start date: activate to sort column ascending">Ngày viết
                                        bài
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                        style="" aria-label="Start date: activate to sort column ascending">Chỉnh Sửa ngày
                                    </th>
                                    <?php if($user['role'] == 0): ?>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                        style=" " aria-label="Salary: activate to sort column ascending">
                                        Hành động</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $sorting = -1; foreach($contact as $key => $value): $sorting++ ?>
                                <tr role="row" class="even text-center">
                                    <td class="sorting_<?= $sorting; ?>" tabindex="0">
                                        <?= $value['user_contact'] ?>
                                    </td>
                                    <td class="">
                                        <?= $value['email_contact']  ?>
                                    </td>
                                    <td class="">
                                        <?= $value['content_contact']  ?>

                                    </td>
                                    <td style="">
                                        <?= 
                                       $status = ($value['status'] == 0) ? 'Hiển thị' : 'Đang ẩn'; 
                                         ?>
                                    </td>
                                    <td style="">
                                        <?= $value['created_at'] ?>
                                    </td>
                                    <td style="">
                                        <?= $value['updated_at'] ?>
                                    </td>
                                    <?php if($user['role'] == 0): ?>
                                    <td style="">
                                        <a class="btn-danger btn" href="/contactdelete/<?= $value['id']; ?>">Xóa
                                        </a>
                                        <a class="btn-primary btn" href="/contact/<?= $value['id']; ?>">Sửa</a>
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