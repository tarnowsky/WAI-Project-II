const moreContactBtn = document.getElementById('moreContactBtn')
const moreContact = document.getElementById('moreContact')
const selectBtn = document.querySelector('#bday')
const optionsNoSee = document.querySelectorAll('.value_no_js')

const option = ""

moreContact.innerHTML = ''
moreContactBtn.style.display = 'block'
optionsNoSee.forEach(option => {
    option.remove()
});

const moreContactContent = {
    header: "<h4>Kontakt bezpośredni</h4>",
    phrase: "<p>Michał Tarnowski 🎙: mtarnowski@redlust.com<br>Szymon Szymański 🎸: sszymanski@redlust.com<br>Szymon Bruski 🎸: sbruski@redlust.com<br>Wiktor Czapiewski 🥁: wczapiewski@redlust.com</p>"
}

let clicked = false

const showMoreContact = () => {
    moreContact.innerHTML = `${moreContactContent.header}${moreContactContent.phrase}`
    moreContactBtn.innerText = "Mniej"
    clicked = true
}

const showLessContact = () => {
    moreContact.innerHTML = ''
    moreContactBtn.innerText = "Kontakt bezpośredni"
    clicked = false
}

moreContactBtn.onclick = () => {
    if (!clicked) {
        showMoreContact()
        sessionStorage.setItem('showMoreContact', `${clicked}`)
    }
    else {
        showLessContact()
        sessionStorage.setItem('showMoreContact', `${clicked}`)
    }
}

const createOptions = () => {
    for (let i = 1; i <= 31; i++) {
        const option = document.createElement(
            'option')
        option.value = i;
        option.innerText = i
        selectBtn.appendChild(option)
    }
}

if (sessionStorage.getItem('showMoreContact') == 'true') {
    showMoreContact()
}

$( function() {
    $( document ).tooltip();
    $('#birthdate').datepicker();
  } );



createOptions()