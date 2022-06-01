let regex = "(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|\"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\\\[\x01-\x09\x0b\x0c\x0e-\x7f])*\")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\\])"
let emailInput = document.getElementById('contact_form_email')
let subjectInput = document.getElementById('contact_form_subject')
let messageInput = document.getElementById('contact_form_message')
let form = document.getElementById('formContact')
let checkEmail = false
let checkSubject = false
let checkMessage = false

emailInput.addEventListener('keyup', () => {
    if (!(emailInput.value).match(regex)) {
        emailInput.style.borderColor = 'red'
        checkEmail = false
    } else {
        emailInput.style.borderColor = '#ced4da'
        checkEmail = true
    }
})

subjectInput.addEventListener('keyup', () => {
    if ((subjectInput.value).length < 2) {
        subjectInput.style.borderColor = 'red'
        checkSubject = false
    } else {
        subjectInput.style.borderColor = '#ced4da'
        checkSubject = true
    }
})

messageInput.addEventListener('keyup', () => {
    if ((messageInput.value).length < 10) {
        messageInput.style.borderColor = 'red'
        checkMessage = false
    } else if (!(messageInput.value).includes(" ")) {
        messageInput.style.borderColor = 'red'
        checkMessage = false
    } else {
        messageInput.style.borderColor = '#ced4da'
        checkMessage = true
    }
})

form.addEventListener('submit', (e) => {
    if (!checkEmail && !checkMessage && !checkSubject) {
        e.preventDefault()
    }
})

