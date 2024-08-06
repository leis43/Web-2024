const TITLE_ARRAY = [document.querySelector('.article-preview__title'), document.querySelector('.card-preview__title')];
const SUBTITLE_ARRAY = [document.querySelector('.article-preview__subtitle'), document.querySelector('.card-preview__subtitle')];
const AVATAR_ARRAY = [document.querySelector('.form-row__avatar-placeholder'), document.querySelector('.card-preview__author-image')];
const MAIN_IMAGE_ARRAY = [document.querySelector('.upload__main-image'), document.querySelector('.article-preview__image')];
const PREVIEW_IMAGE_ARRAY = [document.querySelector('.upload__preview-image'), document.querySelector('.card-preview__image')];
const textInputElements = document.querySelectorAll('.form-row__input');
const form = document.forms[0];
const alertMessage = document.querySelector('#alertMessage');
const successMessage = document.querySelector('#successMessage');
const formProps = {};
const titleEl = document.querySelector('#inputTitle');
const subtitleEl = document.querySelector('#inputSub');
const dateEl = document.querySelector('#inputDate');
const authorNameEl = document.querySelector('#inputAuthorName');
const uploadAvatarButtonText = document.querySelector('#uploadAvatarText');
const avatarCameraImg = document.querySelector('#avatarCamera');
const removeAvatarButton = document.querySelector('#removeAvatarButton');
const authorImageEl = document.querySelector('#inputAuthorImage');
const mainImageEl = document.querySelector('#inputMainImage');
const mainImageController = document.querySelector('#mainImageController');
const removeMainImageButton = document.querySelector('#removeMainImageButton');
const mainImageRemark = document.querySelector('#mainImageRemark');
const previewImageController = document.querySelector('#previewImageController');
const removePreviewImageButton = document.querySelector('#removePreviewImageButton');
const previewImageEl = document.querySelector('#inputPreviewImage');
const previewImageRemark = document.querySelector('#previewImageRemark');
const logoutButton = document.querySelector('#logOutButton');
const userInitials = document.querySelector('#userInitials');
const userIcon = document.querySelector('#userIcon');

initListeners();
previewUserIcon();

console.log("ура выходные");
function getRandomColor() {
    const letters = '0123456789ABCDEF';
    let color = '#';
    for (let i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

async function getUserMail() {
    const responsePromise = await fetch('/getUserMail');
    const data = await responsePromise.text();
    return data[0];
}

async function previewUserIcon() {
    try {
        let userMail = await getUserMail();
        userInitials.innerHTML = userMail;
        userIcon.style.backgroundColor = getRandomColor();
    } catch (error) {
        console.error('Ошибка при получении данных пользователя:', error);
    }

}

function initListeners() {
    for (let el of textInputElements) {
        el.addEventListener('input', changeStyle);
    }
    for (let el of form.elements) {
        if (el.type !== 'submit') {
            el.addEventListener('click', removeError);
        }
    }
    titleEl.addEventListener('input', previewTitle);
    subtitleEl.addEventListener('input', previewSubtitle);
    authorNameEl.addEventListener('change', previewAuthorName);
    dateEl.addEventListener('input', previewDate);
    authorImageEl.addEventListener('change', previewAuthorImage);
    removeAvatarButton.addEventListener('click', deleteAvatar);
    mainImageEl.addEventListener('change', previewMainImage);
    removeMainImageButton.addEventListener('click', deleteMainImage);
    previewImageEl.addEventListener('change', previewPreviewImage);
    removePreviewImageButton.addEventListener('click', deletePreviewImage);
    logoutButton.addEventListener('click', logout);
}

async function logout() {
    let response = await fetch("/api-logout", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json;charset=utf-8'
        }
    });
    if (response.ok) {
        console.log('Ok');
        window.location = '../home';
    }
}

form.onsubmit = async e => {
    e.preventDefault();

    let formProps = {};
    let errors = validateQueryParams(form.elements);

    if (errors) {
        if (!alertMessage.classList.contains('appearance')) {
            alertMessage.classList.add('appearance');
        }
        if (successMessage.classList.contains('appearance')) {
            successMessage.classList.remove('appearance');
        }
        return;
    }

    for (let element of form.elements) {
        if (element.type === 'submit') {
            continue;
        }
        if (element.type !== 'file') {
            formProps[element.name] = element.value;
        } else {
            if (element.name === 'authorAvatar' || element.name === 'mainImage' || element.name === 'previewImage') {
                formProps[element.name] = await convertFileToBase64(element.files[0]);
            } else {
                formProps[element.name + 'Name'] = element.value.replace('C:\\fakepath\\', '');
            }
        }
    }

    async function convertFileToBase64(file) {
        return new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.onload = () => {
                resolve(reader.result);
            };
            reader.onerror = () => {
                reject('Error reading file');
            };
            reader.readAsDataURL(file);
        });
    }

    const json = JSON.stringify(formProps);

    let response = await fetch("/api", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json;charset=utf-8'
        },
        body: json
    });

    console.log(response);

    if (response.ok) {
        let responseBody = await response.json();
        console.log(responseBody);
        if (!successMessage.classList.contains('appearance')) {
            successMessage.classList.add('appearance');
        }
    } else {
        let responseBody = await response.text();
        console.log(responseBody);
        if (!alertMessage.classList.contains('appearance')) {
            alertMessage.classList.add('appearance');
        }
    }
}
function validateQueryParams(query) {
    let errors = false;
    for (let element of query) {
        if (element.value === '' && element.type !== 'submit') {
            errors = true;
            const lastChild = element.parentNode.lastChild;
            if (lastChild.nodeName === 'SPAN' && lastChild.classList.contains('form-row__error-message')) {
                continue;
            }
            let errorMessage = document.createElement('span');
            errorMessage.classList.add('form-row__error-message');
            let textEl = element.parentNode.childNodes[1];
            let text = textEl.innerHTML;
            errorMessage.innerHTML = text + ' is required.';
            element.classList.add('form-row__input_error');
            element.parentNode.appendChild(errorMessage);
        }
    }
    return errors;
}


function changeStyle(event) {
    const el = event.target;
    if (el.value !== '') {
        el.classList.add('form-row__input_filled');
    } else {
        el.classList.remove('form-row__input_filled');
    }
}

function removeError(event) {
    const el = event.target;
    if (el.classList.contains('form-row__input_error')) {
        el.classList.remove('form-row__input_error');
        const errorMessage = el.parentNode.lastChild;
        el.parentNode.removeChild(errorMessage);
    }
    if (alertMessage.classList.contains('appearance')) {
        alertMessage.classList.remove('appearance');
    }
}

function previewTitle(event) {
    for (let element of TITLE_ARRAY) {
        element.innerHTML = event.target.value;
    }
}

function previewSubtitle(event) {
    for (let element of SUBTITLE_ARRAY) {
        element.innerHTML = event.target.value;
    }
}

function previewDate(event) {
    let element = document.querySelector('.card-preview__date');
    element.innerHTML = event.target.value;
}

function previewAuthorName(event) {
    let element = document.querySelector('.card-preview__author-name');
    if (event.target.value) {
        element.innerHTML = event.target.value;
    } else {
        element.innerHTML = 'Enter author name';
    }
}

function previewAuthorImage(event) {
    const readerPreviewImage = new FileReader();
    readerPreviewImage.onloadend = function () {
        if (readerPreviewImage.result === '') {
            return;
        }
        formProps['authorAvatar'] = readerPreviewImage.result.slice(readerPreviewImage.result.lastIndexOf(',') + 1);
        avatarCameraImg.classList.remove('hidden');
        uploadAvatarButtonText.innerHTML = 'Upload New';
        removeAvatarButton.classList.remove('hidden');
        for (let image of AVATAR_ARRAY) {
            image.style.background = "url(" + readerPreviewImage.result + ") no-repeat";
            image.style.backgroundSize = "cover";
        }
    }
    if (event.target.files[0]) {
        readerPreviewImage.readAsDataURL(event.target.files[0]);
    } else {
        deleteAvatar();
    }
}

function deleteAvatar() {
    removeAvatarButton.classList.add('hidden');
    avatarCameraImg.classList.add('hidden');
    authorImageEl.value = '';
    uploadAvatarButtonText.innerHTML = 'Upload';
    AVATAR_ARRAY[0].style.backgroundImage = '';
    AVATAR_ARRAY[1].style.background = "#F7F7F7";
}

function previewMainImage(event) {
    const readerPreviewImage = new FileReader();
    readerPreviewImage.onloadend = function () {
        if (readerPreviewImage.result === '') {
            return;
        }

        formProps['mainImage'] = readerPreviewImage.result.slice(readerPreviewImage.result.lastIndexOf(',') + 1);

        if (mainImageController.classList.contains('hidden')) {
            mainImageRemark.classList.add('hidden');
            mainImageController.classList.remove('hidden');
        }
        for (let image of MAIN_IMAGE_ARRAY) {
            image.style.background = "url(" + readerPreviewImage.result + ") no-repeat";
            image.style.backgroundSize = "cover";
            image.classList.add('upload__main-image_uploaded');
        }
    }

    if (event.target.files[0]) {
        readerPreviewImage.readAsDataURL(event.target.files[0]);
    } else {
        deleteMainImage();
    }
}

function deleteMainImage() {
    mainImageController.classList.add('hidden');
    mainImageRemark.classList.remove('hidden');
    mainImageEl.value = '';
    MAIN_IMAGE_ARRAY[0].style.backgroundImage = '';
    MAIN_IMAGE_ARRAY[0].classList.remove('upload__main-image_uploaded');
    MAIN_IMAGE_ARRAY[1].style.background = "#F7F7F7";
    MAIN_IMAGE_ARRAY[1].classList.remove('upload__main-image_uploaded');
}

function previewPreviewImage(event) {
    const readerPreviewImage = new FileReader();
    readerPreviewImage.onloadend = function () {
        if (readerPreviewImage.result === '') {
            return;
        }

        formProps['previewImage'] = readerPreviewImage.result.slice(readerPreviewImage.result.lastIndexOf(',') + 1);

        if (previewImageController.classList.contains('hidden')) {
            previewImageRemark.classList.add('hidden');
            previewImageController.classList.remove('hidden');
        }
        for (let image of PREVIEW_IMAGE_ARRAY) {
            image.style.background = "url(" + readerPreviewImage.result + ") no-repeat";
            image.style.backgroundSize = "cover";
            image.classList.add('upload__preview-image_uploaded');
        }
    }

    if (event.target.files[0]) {
        readerPreviewImage.readAsDataURL(event.target.files[0]);
    } else {
        deletePreviewImage();
    }
}

function deletePreviewImage() {
    previewImageController.classList.add('hidden');
    previewImageRemark.classList.remove('hidden');
    previewImageEl.value = '';
    PREVIEW_IMAGE_ARRAY[0].style.backgroundImage = '';
    PREVIEW_IMAGE_ARRAY[0].classList.remove('upload__preview-image_uploaded');
    PREVIEW_IMAGE_ARRAY[1].style.background = "#F7F7F7";
    PREVIEW_IMAGE_ARRAY[1].classList.remove('upload__preview-image_uploaded');
}