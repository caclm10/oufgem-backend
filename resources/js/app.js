import Swal from 'sweetalert2'
import './bootstrap'
import './datatables'

const deleteForms = document.querySelectorAll(`[data-delete-form]`)

const deleteSwal = Swal.mixin({
    customClass: {
        confirmButton: 'btn btn-danger ms-3',
        cancelButton: 'btn btn-secondary',
    },
    buttonsStyling: false,
    showCancelButton: true,
    confirmButtonText: 'Simpan',
    cancelButtonText: 'Batal',
    icon: 'warning',
    reverseButtons: true
})

for (const deleteForm of deleteForms) {
    deleteForm.addEventListener('submit', event => {
        event.preventDefault()

        deleteSwal.fire({
            title: deleteForm.dataset.message,
        })
            .then(result => {
                if (result.isConfirmed) {
                    deleteForm.submit()
                }
            })
    })
}