$.fn.submitAjax = function(form, event){
    event.preventDefault()
    ajaxLoader.show();
    let reqData = new FormData($(form)[0]);
    let output = '';

    $.ajax({
        processData: false,
        contentType: false,
        method: 'POST',
        url: $(form).attr('action'),
        data: reqData,
        async: false,
        success: function(response){
            // console.log(response);
            // console.log(response.sucess);
            if(response.sucess == false){
                Swal.close();
                Swal.fire({
                    confirmButtonColor: '#D19200',
                    type: 'error',
                    title: response.title ?? 'Gagal',
                    text: response.error
                })
                setTimeout(function(){
                    Swal.close();
                }, 2000);
            }else{
                ajaxLoader.hide();
                Swal.fire({
                    confirmButtonColor: '#D19200',
                    type: 'success',
                    title: response.title ?? 'Berhasil',
                    text: response.msg
                })
                setTimeout(function(){
                    Swal.close;
                    if(response.returnurl != undefined){
                        window.location.href = response.returnurl;
                    }
                }, 2000)
            }
            output = response;
        },
        error: function(response){
            Swal.close();
            Swal.fire({
                confirmButtonColor: '#D19200',
                type: 'error',
                title: 'Internal Server Error!',
                text: 'Telah terjadi kesalahan, segera hubungi  developer aplikasi'
            })
        }
    })
    return output;
}

$.fn.submitAjaxRegister = function(form, event){
    event.preventDefault()
    // ajaxLoader.show();
    let reqData = new FormData($(form)[0]);
    let output = '';

    $.ajax({
        processData: false,
        contentType: false,
        method: 'POST',
        url: $(form).attr('action'),
        data: reqData,
        async: false,
        success: function(response){
            // console.log(response);
            // console.log(response.sucess);
            if(response.sucess == false){
                Swal.close();
                Swal.fire({
                    confirmButtonColor: '#D19200',
                    type: 'error',
                    title: response.title ?? 'Gagal',
                    text: response.error
                })
                setTimeout(function(){
                    Swal.close();
                }, 2000);
            }else{
                // ajaxLoader.hide();
                window.location.href = response.returnurl;
            }
            output = response;
        },
        error: function(response){
            Swal.close();
            Swal.fire({
                confirmButtonColor: '#D19200',
                type: 'error',
                title: 'Internal Server Error!',
                text: 'Telah terjadi kesalahan, segera hubungi  developer aplikasi'
            })
        }
    })
    return output;
}

$.fn.submitAjaxWithFile = function(){
}

$.fn.ajaxUploadFile = function(){
}

$.fn.ajaxPreviewUpload = function(){
}

$.fn.deleteAjax = function(form){
    let formData = new FormData($(form)[0]);
    // console.log(formData);

    Swal.fire({
        title: 'Anda yakin',
        text: 'ingin menghapus data ini?',
        type: 'question',
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal',
        showConfirmButton: true,
        showCancelButton: true,
        confirmButtonColor: '#D19200',
        cancelButtonColor: '#492E1F',
        closeOnCancel: true
    }).then(function(isConfirmed){
        isConfirmed.value ? runDelete(formData, form) : '';
    })
}

function runDelete(formData, form){
    ajaxLoader.show();
    $.ajax({
        method: 'POST',
        processData: false,
        contentType: false,
        data: formData,
        url: $(form).attr('action'),
        success: function(response){
            if(response.sucess){
                Swal.fire({
                    type: 'success',
                    confirmButtonColor: '#D19200',
                    cancelButtonColor: '#492E1F',
                    title: response.title ?? 'Berhasil',
                    text: response.msg
                })
                setTimeout(function(){
                    Swal.close;
                    if(response.returnurl != undefined){
                        window.location.href = response.returnurl;
                    }
                }, 1000)
                $('.ajaxTable').DataTable().ajax.reload(null, true);
            }else{
                Swal.fire({
                    type: 'error',
                    title: 'Gagal',
                    text: 'Terjadi Kesalahan saat menghapus data'
                })
                setTimeout(function(){
                    Swal.close();
                }, 2000);
                $('.ajaxTable').DataTable().ajax.reload(null, true);
                setTimeout(function(){
                }, 2000);
            }
        },
        error: function(response){
            Swal.fire({
                type: 'error',
                title: 'Gagal',
                text: 'Internal Server Error'
            })

            $('.ajaxTable').DataTable().ajax.reload(null, true);
        }
    })
}