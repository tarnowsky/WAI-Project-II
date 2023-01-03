const galleryPhotos = document.querySelectorAll('.gallery-photo')
const galleryPhotoContainers = document.querySelectorAll('.gallery-photo-container')
const bigGallery = document.getElementById('big-photo-box')
const bigGalleryPhotoContainer = document.getElementById('big-photo-content')
const closeBtn = document.getElementById('close')

const putNameInArray = (photo) => {
    let imgSource = photo.src;
    let imgType = imgSource.substring(imgSource.length-3);
    imgSource = imgSource.substring(0, imgSource.length-8);
    let imgName = imgSource;
    imgSource = imgSource.split("/")
    imgSource[4]="wm";
    imgSource = (imgSource.join("/") + "-wm." + imgType);
    photoUrls[imgName] = imgSource;
}

const showBigGallery = (photoName) => {
    bigGallery.style.display = 'flex'
    bigGalleryPhotoContainer.style.backgroundImage = `url('${photoUrls[photoName]}')`
    bigGalleryMenager()
}

const closeBigGallery = () => {
    bigGallery.style.display = 'none'
}

const bigGalleryMenager = () => {
    closeBtn.onclick = () => closeBigGallery()
}

const enlargePhoto = (photoBox) => {
    let photoName = photoBox.src.substring(0, photoBox.src.length-8);
    putNameInArray(photoBox);
    showBigGallery(photoName);
}

let photoUrls = {}
galleryPhotos.forEach(photo => {
    photo.onclick = () => {
        putNameInArray(photo)
        enlargePhoto(photo)
    }
})