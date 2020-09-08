<?= view('admin/templates/header'); ?>
<?= view('admin/templates/navbar'); ?>
<?php if (isset($validation)): ?>
<div class="col-12">
    <div class="alert alert-danger" role="alert">
        <?= $validation->listErrors() ?>
    </div>
</div>
<?php endif; ?>
<form class="form-group" action="/postedit/<?=$postedit['id'] ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <div class="form-group">
        <label>Tiêu để bài viết</label>
        <input class="form-control " type="text" placeholder="Tiêu đề bài viết" name="title"
            value="<?= $postedit['title']; ?>">
    </div>
    <div class="form-group">
        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="header-title mb-4">Ảnh đại diện cho bài viết</h4>
                <div class="dropify-wrapper">
                    <div class="dropify-loader"></div>
                    <div class="dropify-errors-container">
                        <ul></ul>
                    </div>
                    <input type="file" class="dropify  data-max-file-size=" 1M" name="images"
                        data-default-file="<?= $postedit['images']; ?>" value='<?= $postedit['images']; ?>'>
                    <button type="button" class="dropify-clear">Remove</button>
                    <div class="dropify-preview"><span class="dropify-render"></span>
                        <div class="dropify-infos">
                            <div class="dropify-infos-inner">
                                <p class="dropify-filename"><span class="file-icon"></span> <span
                                        class="dropify-filename-inner"></span></p>
                                <p class="dropify-infos-message">Kéo và Thả hoặc Chọn ảnh của bạn</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">

        <textarea rows="24" class="tinymce" name="content"><?= $postedit['content']; ?>
        </textarea>
    </div>
    <div class="form-group text-center">
        <button type="submit" class="btn btn-danger form-control">Thêm bài viết</button>
    </div>


</form>

<script type="text/javascript">
var span = document.querySelector("span");
span.addEventListener("input", function() {
    var text = this.innerText;
    this.setAttribute("data-heading", text);
    this.parentElement.setAttribute("data-heading", text);
});
</script>
<script type="text/javascript">
tinymce.init({
    selector: '.tinymce',
    plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap emoticons colorpicker textcolor responsivefilemanager',
    imagetools_cors_hosts: ['picsum.photos'],
    menubar: 'file edit view insert format tools table help',
    toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist | forecolor | backcolor | removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl | ',
    toolbar_sticky: true,
    autosave_ask_before_unload: true,
    autosave_interval: "30s",
    autosave_prefix: "{path}{query}-{id}-",
    autosave_restore_when_empty: false,
    autosave_retention: "2m",
    image_advtab: true,
    /*content_css: '//www.tiny.cloud/css/codepen.min.css',*/
    link_list: [{
            title: 'My page 1',
            value: 'https://www.codexworld.com'
        },
        {
            title: 'My page 2',
            value: 'https://www.xwebtools.com'
        }
    ],
    image_list: [{
            title: 'My page 1',
            value: 'https://www.codexworld.com'
        },
        {
            title: 'My page 2',
            value: 'https://www.xwebtools.com'
        }
    ],
    image_class_list: [{
            title: 'None',
            value: ''
        },
        {
            title: 'Some class',
            value: 'class-name'
        }
    ],
    importcss_append: true,
    file_picker_callback: function(callback, value, meta) {
        /* Provide file and text for the link dialog */
        if (meta.filetype === 'file') {
            callback('https://www.google.com/logos/google.jpg', {
                text: 'My text'
            });
        }

        /* Provide image and alt text for the image dialog */
        if (meta.filetype === 'image') {
            callback('https://www.google.com/logos/google.jpg', {
                alt: 'My alt text'
            });
        }

        /* Provide alternative source and posted for the media dialog */
        if (meta.filetype === 'media') {
            callback('movie.mp4', {
                source2: 'alt.ogg',
                poster: 'https://www.google.com/logos/google.jpg'
            });
        }
    },
    templates: [{
            title: 'New Table',
            description: 'creates a new table',
            content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>'
        },
        {
            title: 'Starting my story',
            description: 'A cure for writers block',
            content: 'Once upon a time...'
        },
        {
            title: 'New list with dates',
            description: 'New List with dates',
            content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>'
        }
    ],
    template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
    template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
    image_caption: true,
    quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
    noneditable_noneditable_class: "mceNonEditable",
    toolbar_mode: 'sliding',
    contextmenu: "link image imagetools table",
});
</script>
</div>
</div>
<div class="row">
    <div class="col-12">
    </div>
</div>
</div>

</div>
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                2016 - 2019 &copy; Uplon theme by <a href="">Coderthemes</a>
            </div>
        </div>
    </div>
</footer>
</div>
</div>

<div class="right-bar">
    <div class="rightbar-title">
        <a href="javascript:void(0);" class="right-bar-toggle float-right">
            <i class="mdi mdi-close"></i>
        </a>
        <h4 class="font-18 m-0 text-white">Theme Customizer</h4>
    </div>
    <div class="slimscroll-menu">

        <div class="p-4">
            <div class="alert alert-warning" role="alert">
                <strong>Customize </strong> the overall color scheme, layout, etc.
            </div>
            <div class="mb-2">
                <img src="assets\images\layouts\light.png" class="img-fluid img-thumbnail" alt="">
            </div>
            <div class="custom-control custom-switch mb-3">
                <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked="">
                <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
            </div>

            <div class="mb-2">
                <img src="assets\images\layouts\dark.png" class="img-fluid img-thumbnail" alt="">
            </div>
            <div class="custom-control custom-switch mb-3">
                <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch"
                    data-bsstyle="assets/css/bootstrap-dark.min.css" data-appstyle="assets/css/app-dark.min.css">
                <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
            </div>

            <div class="mb-2">
                <img src="assets\images\layouts\rtl.png" class="img-fluid img-thumbnail" alt="">
            </div>
            <div class="custom-control custom-switch mb-5">
                <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch"
                    data-appstyle="assets/css/app-rtl.min.css">
                <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
            </div>

            <a href="https://1.envato.market/XY7j5" class="btn btn-danger btn-block mt-3" target="_blank"><i
                    class="mdi mdi-download mr-1"></i> Download Now</a>
        </div>
    </div> <!-- end slimscroll-menu-->
</div>
<div class="rightbar-overlay"></div>

<a href="javascript:void(0);" class="right-bar-toggle demos-show-btn">
    <i class="mdi mdi-settings-outline mdi-spin"></i> &nbsp;Choose Demos
</a>
<?= view('admin/templates/footer'); ?>