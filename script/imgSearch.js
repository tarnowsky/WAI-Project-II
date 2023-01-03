const searchBar = document.getElementById('searchBar')
const boxForPhotos = document.querySelector('.gallery-conatainer')

searchBar.onkeyup = () => {
    let title_chunk = searchBar.value
    $.ajax({
        method: 'POST',
        url: '../searchImage.php',
        data: {
            title_chunk: title_chunk
        }
    }).done((msg) => {
        $('.gallery-container').html(msg)
    })
}