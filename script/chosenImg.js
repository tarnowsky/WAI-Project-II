const deleteImgBtn = document.getElementById("delete-img")
const galleryCheckBox = document.querySelectorAll('.gallery-checkbox')
const galTitle = document.getElementById('gal-title')
const galleryContainer = document.querySelector('.gallery-container')

let chosenImages = [];

galleryCheckBox.forEach(box => {
    box.onchange = () => {
        if (chosenImages.includes(box.name)) {
            const index = chosenImages.indexOf(box.name)
            chosenImages.splice(index, 1)
        }
        else chosenImages.push(box.name)
    }
})

if (deleteImgBtn != null)
    deleteImgBtn.onclick = () => {
            $.ajax({
                method: 'POST',
                url: 'chosenImg.php',
                data: {delImg: chosenImages}
            }).done(() => {
                $("#result").html('Zdjęcia usunięte')
                const checkbox = document.querySelectorAll(".gallery-checkbox")
                checkbox.forEach(box => {
                    if (chosenImages.includes(box.name)) {
                        box.parentElement.parentElement.remove()
                    }
                })
                if (!galleryContainer.children.length) {
                    galleryContainer.remove()
                    deleteImgBtn.remove()
                    galTitle.innerHTML = "Jeśli wybierzesz zdjęcia w Galerii, pojawią się tutaj."
                }
            })
        }