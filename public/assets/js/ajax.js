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
    // $(document).on('click', '#btn-adduser', (e) => {
        $('#adduser').submit((e) => {
        e.preventDefault();
        let url = $('#adduser').attr('action')
        
     
        let role = $("#role option:selected");
        let gender = $("#gender option:selected").text();
        let fullname = $('#fullname')
        let email = $('#email')
        let addr1 = $('#addr1 option:selected')
        let addr2 = $('#addr2 option:selected')
        let cmnd = $('#cmnd')
        let number_phone = $('#number_phone')
        let old = $('#old')
       let password = $('#password')
        let formdata = new FormData();
        formdata.append('role' , role)
        formdata.append('gender' , gender)
        formdata.append('email' , email)
        formdata.append('addr1 ' , addr1 )
        formdata.append('addr2' , addr2)
        formdata.append('cmnd' , cmnd)
        formdata.append('number_phone' , number_phone)
        formdata.append('old' , old)
       
        $.ajax({
            url: url,
            type: 'post',
            data: {'role' : role.text() , 'fullname' : fullname.val() , "gender" : gender ,  "email"  : email.val()  , "addr1" : addr1.text() , "addr2" : addr2.text() , "cmnd" : cmnd.val(), "number_phone" : number_phone.val() , "old" :old.val() , "password" : password.val()},
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
                   
                        $('#error').html(data.messages)
                        $('#error').addClass('alert alert-danger')
                }
            },
            'error': function () { console.log('error'); },
        })
    })
})