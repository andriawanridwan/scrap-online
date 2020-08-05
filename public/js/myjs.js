$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $body = $("body");

    /*    $(document).on({
           ajaxStart: function() { $body.addClass("loading");    },
           ajaxStop: function() { $body.removeClass("loading"); }    
       });
    */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }



    $('body').on('click', '.modal-show', function (evt) {

        evt.preventDefault();


        var me = $(this);
        var url = me.attr('href');
        var title = me.attr('title');

        $('#modal-title').text(title);
        $('#modal-btn-save').text(me.hasClass('edit') ? 'Update' : 'Simpan');

        $.ajax({
            url: url,
            dataType: 'html',
            success: function (response) {
                $('#modal-body').html(response);
                $('select').select2();
                $('form input').keydown(function (event) {
                    if (event.keyCode == 13) {
                        event.preventDefault();
                        return false;
                    }
                    $('#harga').keyup(function () {
                        $(this).val(formatRupiah($(this).val(), 'Rp. '));
                    });
                    $('#caribarang').DataTable();
                });
            }
        });
        if (me.hasClass('big-modal')) {
            $('.modal-dialog').addClass('modal-lg');
        }
        if (me.hasClass('caribarang')) {
            $('#modal-btn-save').hide();
        }

        $('#myModal').modal('show');

        return false;
    })


    $('body').on('click', '.btn-delete', function (evt) {
        evt.preventDefault();
        var me = $(this),
            url = me.attr('href');

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Swal.fire({
            title: 'Apakah Yakin Ingin Menghapus?',
            text: 'Data tidak bisa dikembalikan',
            icon: 'warning',
            showConfirmButton: true,
            showCancelButton: true,
            confirmButtonText: 'Ya, Hapus Saja!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: url,
                    type: 'post',
                    data: {
                        "_method": 'DELETE'
                    },
                    success: function (response) {
                        table.ajax.reload();
                        Toast.fire({
                            icon: 'success',
                            title: 'Berhasil Memperbaharui'
                        })
                    }
                })
            }
        })
    })


})
/* $('.modal-content').keypress(function(e){
    if(e.which == 13) {
      //dosomething
      alert('Enter pressed');
    }
  })
 */
$('#modal-btn-save').click(function (event) {
    event.preventDefault();

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        onOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    var form = $('#modal-body form'),
        url = form.attr('action'),
        method = $('input[name=mtd]').val() == 'post' ? 'post' : 'put';

    form.find('.help-block').remove();
    form.find('.form-group').removeClass('has-error');
    $.ajax({
        url: url,
        method: method,
        data: form.serialize(),
        success: function (response) {
            Toast.fire({
                icon: 'success',
                title: 'Berhasil Memperbaharui'
            })
            form.trigger('reset');
            $('#myModal').modal('hide');
            table.ajax.reload();
        },
        error: function (xhr) {
            var res = xhr.responseJSON;
            if ($.isEmptyObject(res) == false) {
                $.each(res.errors, function (key, value) {
                    $('#' + key)
                        .closest('.form-group')
                        .addClass('has-error')
                        .append('<span class="help-block"><strong>' + value + '</strong></span>');
                })
            }
        }
    });
})

