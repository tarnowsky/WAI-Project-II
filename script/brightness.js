const brightness = document.getElementById('brightness')
const brightness2 = document.getElementById('burgerBrightness')
const root = document.querySelector(':root')
const fbLink = document.querySelectorAll('.fbLink')
const instaLink = document.querySelectorAll('.instaLink')

brightness.style.display = 'block'

const showDiffBrightnessLogo = () => {
    if (window.innerWidth > 800) {
        brightness.style.display = 'block'
        brightness2.style.display = 'none'
    } else {
        brightness.style.display = 'none'
        brightness2.style.display = 'block'
    }
}

const moreContrast  = () => {
    root.style.setProperty('--red', '#48a8a6')
    root.style.setProperty('--lightred', '#48a8a6')
    root.style.setProperty('--darkred', '#48a8a6')
    root.style.setProperty('--darkgrey', '#000')
    root.style.setProperty('--lightwhite', '#fffb54')
    root.style.setProperty('--lightgrey', '#48a8a6')
    root.style.setProperty('--footer', '#000')
    root.style.setProperty('--grey', '#fffb54')
    fbLink.forEach(logo => {
        logo.setAttribute('src', 'img/Nav/facebook-contrast.png')
    })
    instaLink.forEach(logo => {
        logo.setAttribute('src', 'img/Nav/instagram-contrast.png')
    })
}

const lessContrast  = () => {
    root.style.setProperty('--darkgrey', '#1A1A1D')
    root.style.setProperty('--lightwhite', 'whitesmoke')
    root.style.setProperty('--lightgrey', '#4e4e50')
    root.style.setProperty('--footer', '#121214')
    root.style.setProperty('--red', '#c4013d')
    root.style.setProperty('--lightred', '#c3073f')
    root.style.setProperty('--darkred', '#8b082f')
    root.style.setProperty('--grey', 'rgba(245, 245, 245, 0.51)')
    fbLink.forEach(logo => {
        logo.setAttribute('src', 'img/Nav/facebook.png')
    })
    instaLink.forEach(logo => {
        logo.setAttribute('src', 'img/Nav/instagram.png')
    })
}

let contrastOn = false

const changeContrast = () => {
    brightness.onclick = () => {
        if (!contrastOn) {
            moreContrast()
            contrastOn = true
            localStorage.setItem('contrast', 'on')
        } else {
            lessContrast()
            contrastOn = false
            localStorage.setItem('contrast', 'off')
        }
    }

    brightness2.onclick = () => {
        if (!contrastOn) {
            moreContrast()
            contrastOn = true
            localStorage.setItem('contrast', 'on')
        } else {
            lessContrast()
            contrastOn = false
            localStorage.setItem('contrast', 'off')
        }
    }
}

if (localStorage.getItem('contrast') == 'on') {
    contrastOn = true
    moreContrast()
}

changeContrast()
window.addEventListener("resize", showDiffBrightnessLogo);
