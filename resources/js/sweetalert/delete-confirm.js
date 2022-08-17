import axios from 'axios'

const deleteSwal = Swal.mixin({
    customClass: {
        confirmButton: 'btn btn-danger ms-3',
        cancelButton: 'btn btn-secondary',
    },
    buttonsStyling: false,
    showCancelButton: true,
    confirmButtonText: 'Delete',
    cancelButtonText: 'Cancel',
    icon: 'warning',
    reverseButtons: true
})

const handleSubmit = event => {
    event.preventDefault()

    deleteSwal.fire({
        title: deleteForm.dataset.message,
    })
        .then(result => {
            if (result.isConfirmed) {
                if (deleteForm.dataset.deleteImage) {
                    axios
                        .post(deleteForm.action, {
                            _method: 'DELETE'
                        })
                        .then(resp => {
                            document.getElementById(deleteForm.dataset.deleteImage).src = "/images/image-placeholder.png"
                            deleteForm.classList.add('d-none')
                        })
                } else {
                    deleteForm.submit()
                }
            }
        })
}

export const runDeleteConfirm = () => {
    const deleteForms = document.querySelectorAll(`[data-delete-form]`)

    for (const deleteForm of deleteForms) {
        deleteForm.addEventListener('submit', handleSubmit)
    }
}

export const removeDeleteConfirmHandler = () => {
    const deleteForms = document.querySelectorAll(`[data-delete-form]`)

    for (const deleteForm of deleteForms) {
        deleteForm.removeEventListener('submit', handleSubmit)
    }
}