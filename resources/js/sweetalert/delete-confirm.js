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

function handleSubmit(event) {
    event.preventDefault()

    deleteSwal.fire({
        title: this.dataset.message,
    })
        .then(result => {
            if (result.isConfirmed) {
                if (this.dataset.deleteImage) {
                    axios
                        .post(this.action, {
                            _method: 'DELETE'
                        })
                        .then(resp => {
                            document.getElementById(this.dataset.deleteImage).src = "/images/image-placeholder.png"
                            this.classList.add('d-none')
                        })
                }
                else if (this.dataset.deleteMultiImage) {
                    axios
                        .post(this.action, {
                            _method: 'DELETE'
                        })
                        .then(resp => {
                            document.getElementById(this.dataset.deleteMultiImage).remove();
                        })
                }
                else {
                    this.submit()
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