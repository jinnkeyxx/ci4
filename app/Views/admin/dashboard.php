<?= view('admin/templates/header'); ?>
<?= view('admin/templates/navbar'); ?>
<div class="row">
    <?php if (session()->get('success')): ?>
    <div class="alert alert-success" role="alert">
        <?= session()->get('success') ?>
    </div>
    <?php endif; ?>
    <div class="col-md-6 col-xl-3">
        <div class="card-box tilebox-one">
            <i class="icon-layers float-right m-0 h2 text-muted"></i>
            <h6 class="text-muted text-uppercase mt-0">Tổng số thành viên</h6>
            <h3 class="my-3" data-plugin="counterup"><?= count($users); ?></h3>
            <span class="badge badge-success mr-1"> +11% </span> <span class="text-muted">From previous period</span>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card-box tilebox-one">
            <i class="icon-paypal float-right m-0 h2 text-muted"></i>
            <h6 class="text-muted text-uppercase mt-0">Tổng số bài viết</h6>
            <h3 class="my-3"><span data-plugin="counterup"><?= count($posts); ?></span></h3>
            <span class="badge badge-danger mr-1"> -29% </span> <span class="text-muted">From previous period</span>
        </div>
    </div>



    <div class="col-md-6 col-xl-3">
        <div class="card-box tilebox-one">
            <i class="icon-rocket float-right m-0 h2 text-muted"></i>
            <h6 class="text-muted text-uppercase mt-0">Tổng liên hệ</h6>
            <h3 class="my-3" data-plugin="counterup"><?= count($contact); ?></h3>
            <span class="badge badge-warning mr-1"> +89% </span> <span class="text-muted">Last year</span>
        </div>
    </div>
</div>
<?= view('admin/templates/footer'); ?>