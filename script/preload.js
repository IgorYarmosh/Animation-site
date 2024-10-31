document.addEventListener('DOMContentLoaded', () => {
    const mediaFiles = document.querySelectorAll('img, video');
    let i = 0;
    Array.from(mediaFiles).forEach((file, index) => {
        file.onload = () => {
            i++
            if (i === mediaFiles.length) {
                $('.prepoader').classList.add('preloader--hide')
            }
        }
    })
})