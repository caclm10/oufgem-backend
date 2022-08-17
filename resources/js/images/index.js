import axios from 'axios'
import { removeDeleteConfirmHandler, runDeleteConfirm } from '../sweetalert/delete-confirm'

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

const productImage = document.getElementById(`product-image`)

if (productImage) {
    productImage.addEventListener('change', async event => {
        const image = event.target.files[0]

        if (image) {
            const formData = new FormData()

            formData.append('image', image)

            let resp = await axios.post(productImage.dataset.route, formData)

            resp = await axios.get(resp.headers.location, {
                params: {
                    template: '1'
                }
            })

            const productImageList = document.getElementById(`product-image-list`)
            const children = productImageList.children
            children[children.length - 1].insertAdjacentHTML('beforebegin', resp.data.template)

            removeDeleteConfirmHandler()
            runDeleteConfirm()
        }
    })
}