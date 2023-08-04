
$(document).ready(function () {
        $('form.form').submit(function (e) {
                e.preventDefault();
                var form = $(this).attr('id');
                let info = $(this).serializeArray();
                let page = window.location.pathname;

                $.ajax({
                        url: $(this).attr('action'),
                        type: $(this).attr('method'),
                        data: info,
                        success: function (res) {                                
                                if (form == 'forgot_password') {
                                        $('div#email_passwordSuccess').slideDown(300);
                                } else {
                                        if (form == 'update_password') {
                                                window.location.href = "/";
                                        } else {
                                                window.location.href = page;
                                        }
                                }

                        },
                        error: function (res) {
                                $('form#' + form + ' input').removeClass('is-invalid');
                                $('textarea').removeClass('is-invalid');
                                $.each(res.responseJSON['errors'], function (index, value) {
                                        $('form#' + form + ' input[name="' + index + '"]').addClass('is-invalid');
                                        $('textarea#' + index + 'Input').addClass('is-invalid');
                                        $('div#' + index + 'Error').text(value);
                                        switch (form) {
                                                case 'auth':
                                                        if (index == 'auth') {
                                                                $('div#' + index + 'Error').slideDown(300);
                                                        }
                                                        break
                                                case 'forgot_password':
                                                        if (index == 'forgot') {
                                                                $('div#' + index + 'Error').slideDown(300);
                                                        }
                                                        break
                                        }


                                })

                        }
                })
        })
})




