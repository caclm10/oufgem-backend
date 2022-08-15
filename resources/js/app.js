import Swal from 'sweetalert2'
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

