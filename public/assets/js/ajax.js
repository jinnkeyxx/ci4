$(document).ready(() => {

    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }


    function sleep(time) {
        setTimeout(() => {
            window.location.reload();
        }, time)
    }
    $('#login').submit((e) => {
        e.preventDefault();
        let url = $(this).attr('action')
            // var form = $(this).serialize()
            // form = JSON.stringify(form);
        data = { "sum": "2.250", "info": [{ "id": "6", "name": "bla", "price": "1.000" }] }

        // alert(form)
        // alert($('input[name=email')).val()

        let email = $('#email').val()
        let password = $('#password').val()
        $.ajax({
            url: url,
            type: 'post',
            // contentType: 'application/json',
            data: { 'email': email, 'password': password },
            dataType: 'json',
            // processData: false,
            // contentType: false,
            beforeSend: () => {

            },
            success: (data) => {
                // alert(data.messages)
                if (data.status == true) {
                    sleep(2000)
                    toastr["success"]("Đăng nhập thành công xin chờ chuyển hướng ")
                } else {
                    $('#error').html(data.messages)
                    $('#error').addClass('alert alert-danger')
                }
            }
        })
    })
    $(document).on('click', '#adduser', () => {

        // e.preventDefault();
        let url = 'http://localhost:8080/user'
        let role = $("#role option:selected").text();
        let gender = $("#gender option:selected").text();
        let fullname = $('#fullname').val()
        let email = $('#email').val()
        let addr1 = $('#addr1 option:selected').text()
        let addr2 = $('#addr2 option:selected').text()
        let cmnd = $('#cmnd').val()
        let number_phone = $('#numbe_phone').val()
        let old = $('#old').val()
        $.ajax({
            url: url,
            type: 'post',
            data: {
                'fullname': fullname,
                'email': email,
                'password': password,
                'role': role,
                'addr1': addr1,
                'addr2': addr2,
                'cmnd': cmnd,
                'number_phone': number_phone,
                'old': old,
                'gender': gender
            },
            dataType: 'json',
            // processData: false,
            // contentType: false,
            beforeSend: () => {

            },
            success: (data) => {
                // alert(data.messages)
                if (data.status == true) {
                    sleep(2000)
                    toastr["success"]("Thêm mới user thành công xin chờ tải lại trang")
                } else {
                    alert('abc')
                        // $('#error').html(data.messages)
                        // $('#error').addClass('alert alert-danger')
                }
            }
        })
    })
})