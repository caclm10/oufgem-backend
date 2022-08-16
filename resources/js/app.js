import axios from 'axios'
import './bootstrap'
import './datatables'
import './sweetalert'

const imageInputsWithPreview = document.querySelectorAll(`[data-preview-target]`)

for (const imageInput of imageInputsWithPreview) {
    const preview = document.querySelector(`[data-preview="${imageInput.dataset.previewTarget}"]`)

    imageInput.addEventListener('change', event => {
        const file = event.target.files[0]

        if (file) {
            const reader = new FileReader()

            reader.addEventListener('load', () => {
                preview.src = reader.result
            })

            reader.readAsDataURL(file)
        } else {
            preview.src = "/images/image-placeholder.png"
        }
    })
}

const imageUploads = document.querySelectorAll(`[data-image-upload]`)

for (const imageUpload of imageUploads) {
    imageUpload.addEventListener('change', event => {
        const image = event.target.files[0]

        if (image) {
            const formData = new FormData()

            formData.append('image', image)
            formData.append('_method', 'PUT')

            axios
                .post(imageUpload.dataset.action, formData)
                .then(resp => {
                    document.querySelector(`#${imageUpload.dataset.imageTarget}`).src = resp.data.url
                    const deleteButton = document.querySelector(`[data-delete-image="${imageUpload.dataset.imageTarget}"]`)
                    console.log(deleteButton)

                    if (deleteButton) deleteButton.classList.remove('d-none')
                })
        }
    })
}

