require('../themes/argon/js/argon.min')
require('bootstrap-colorpicker')

import swal from 'sweetalert2'

$(document).ready( function () {

    $('[data-toggle=tooltip]').tooltip()

    $('.btn-delete').click( function (e) {
        e.preventDefault()

        let target = $(this).attr('data-target')

        swal.fire({
            title: window.confirm_delete_title,
            text: window.confirm_delete_body,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: window.confirm_delete_btn
        }).then((result) => {
            if (result.value) {

                $(target).submit()
            }
        })
    })

    $('.color-picker').colorpicker()

})
