<?= view('admin/templates/header'); ?>
<?= view('admin/templates/navbar'); ?>
<div class="row">
    <div class="col-12">

        <div class="card-box">
            <h4 class="header-title">Quản lí Thành viên</h4>
            <div class="text-left">
                <button type="button" class="btn btn-primary my-3" data-toggle="modal"
                    data-target=".bd-example-modal-lg">Thêm mơí thành viên</button>


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
                                        <?= $value['fullname']; ?></td>
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

                                        <a class="btn-danger btn" href="/userdelete/<?= $value['id'];?>">Xóa</a>
                                        <a class=" btn-primary btn" href="/useredit/<?= $value['id']; ?>">Sửa</a>
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



<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-lg">
        <div class="modal-content py-3 px-3">
            <h4>Thêm Mới thành viên</h4>

            <form action="" method="post" name=""  id="adduser">
                <div class="form-row my-2">
                    <div class="col">
                        <label for="">Họ Tên</label>
                        <input type="text" class="form-control" placeholder="Nguyễn Quang Bảo" name="fullname"
                            id="fullname" value="<?= set_value('fullname'); ?>">
                    </div>
                    <div class="col">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="nguyenquangbaoxtnd@gmail.com"
                            id="email" value="<?= set_value('email'); ?>">
                    </div>
                </div>
                <div class="form-row my-2">
                    <div class="col">
                        <label for="">Mật Khâủ</label>
                        <input type="password" class="form-control" placeholder="******" name="password" id="password"
                            value="<?= set_value('password'); ?>">
                    </div>
                    <div class="col">
                        <label for="">Chức vụ</label>
                        <select class="custom-select mr-sm-2" class="custom-select mr-sm-2" name="role" id="role">
                            <option value="member" <?= set_select('role' , 'member') ?>>Khách hàng</option>
                            <option value="admin" <?= set_select('role' , 'admin') ?>>Quản trị viên</option>
                            <option value="mod" <?= set_select('role' , 'mod') ?>>Kiểm duyệt viên</option>
                        </select>
                    </div>
                </div>
                <div class="my-2">
                    <div class="col">
                        <label for="">Nơi Sống</label>
                        <select name="calc_shipping_provinces" required="" class="custom-select mr-sm-2" id="add1">
                            <option value="" <?= set_select('addr2'); ?>>Tỉnh/ Thànhphố</option>
                        </select>

                    </div>
                    <div class="col">
                        <label for="">Quận Huyện</label>
                        <select name="calc_shipping_district" class="custom-select mr-sm-2" required="" name="addr2"
                            id="addr2">
                            <option value="" <?= set_select('addr2') ?>>Quận / Huyện</option>
                        </select>
                    </div>
                </div>
                <div class="form-row my-2">
                    <div class="col">
                        <label for="">Số chứng minh nhân dân</label>
                        <input type="number" class="form-control" placeholder="5465455445" name="cmnd" id="cmnd"
                            value="<?= set_value('cmnd'); ?>">
                    </div>
                    <div class="col">
                        <label for="">Số điện thoaị</label>
                        <input type="number" class="form-control" placeholder="Last name" name="number_phone" id="number_phone" value="<?= set_value('number_phone'); ?>">
                    </div>
                </div>
                <div class="form-row my-2">
                    <div class="col">
                        <label for="">Tuôỉ</label>
                        <input type="number" class="form-control" placeholder="First name" name="old" id="old"
                            value="<?= set_value('old'); ?>">
                    </div>
                    <div class="col">
                        <label for="">Giơí tính</label>
                        <select class="custom-select mr-sm-2" id="gender" class="custom-select mr-sm-2" name="gender">
                            <option value="1"> Nam</option>
                            <option value="2">Nữ</option>

                        </select>
                    </div>
                </div>
                <button class="form-control btn btn-primary" type="submit" id="btn-adduser"> Thêm mơí </button>
                <div class="col-md-10 ml-auto mr-auto my-2" role="alert" id='error'>
                </div>

        </div>
        </form>
    </div>
</div>
</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
<script src='https://cdn.jsdelivr.net/gh/vietblogdao/js/districts.min.js'></script>
<script>
//<![CDATA[
if (address_2 = localStorage.getItem('address_2_saved')) {
    $('select[name="calc_shipping_district"] option').each(function() {
        if ($(this).text() == address_2) {
            $(this).attr('selected', '')
        }
    })
    $('input.billing_address_2').attr('value', address_2)
}
if (district = localStorage.getItem('district')) {
    $('select[name="calc_shipping_district"]').html(district)
    $('select[name="calc_shipping_district"]').on('change', function() {
        var target = $(this).children('option:selected')
        target.attr('selected', '')
        $('select[name="calc_shipping_district"] option').not(target).removeAttr('selected')
        address_2 = target.text()
        $('input.billing_address_2').attr('value', address_2)
        district = $('select[name="calc_shipping_district"]').html()
        localStorage.setItem('district', district)
        localStorage.setItem('address_2_saved', address_2)
    })
}
$('select[name="calc_shipping_provinces"]').each(function() {
    var $this = $(this),
        stc = ''
    c.forEach(function(i, e) {
        e += +1
        stc += `<option value='${i}'>${i}</option>`
        $this.html('<option value="">Tỉnh / Thành phố</option>' + stc)
        if (address_1 = localStorage.getItem('address_1_saved')) {
            $('select[name="calc_shipping_provinces"] option').each(function() {
                if ($(this).text() == address_1) {
                    $(this).attr('selected', '')
                }
            })
            $('input.billing_address_1').attr('value', address_1)
        }
        $this.on('change', function(i) {
            i = $this.children('option:selected').index() - 1
            var str = '',
                r = $this.val()
            if (r != '') {
                arr[i].forEach(function(el) {
                    str += '<option value="' + el + '">' + el + '</option>'
                    $('select[name="calc_shipping_district"]').html(
                        '<option value="">Quận / Huyện</option>' + str)
                })
                var address_1 = $this.children('option:selected').text()
                var district = $('select[name="calc_shipping_district"]').html()
                localStorage.setItem('address_1_saved', address_1)
                localStorage.setItem('district', district)
                $('select[name="calc_shipping_district"]').on('change', function() {
                    var target = $(this).children('option:selected')
                    target.attr('selected', '')
                    $('select[name="calc_shipping_district"] option').not(target)
                        .removeAttr('selected')
                    var address_2 = target.text()
                    $('input.billing_address_2').attr('value', address_2)
                    district = $('select[name="calc_shipping_district"]').html()
                    localStorage.setItem('district', district)
                    localStorage.setItem('address_2_saved', address_2)
                })
            } else {
                $('select[name="calc_shipping_district"]').html(
                    '<option value="">Quận / Huyện</option>')
                district = $('select[name="calc_shipping_district"]').html()
                localStorage.setItem('district', district)
                localStorage.removeItem('address_1_saved', address_1)
            }
        })
    })
})
//]]>
</script>

<?= view('admin/templates/footer'); ?>