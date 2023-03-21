function confirmDelete() {
    return confirm('Are you sure you want to delete this item?');
}

function showHide() {
    let pwInput = document.getElementById('password');
    let img = document.getElementById('imgShowHide');

    if (pwInput.type === 'password') {
        pwInput.type = 'text';
        img.src = 'media/hide.png';
    }
    else {
        pwInput.type = 'password';
        img.src = 'media/show.png';
    }
}

function comparePasswords() {
    let pw1 = document.getElementById('password').value;
    let pw2 = document.getElementById('confirm').value;
    let pwMsg = document.getElementById('pwMsg');

    if (pw1 != pw2) {
        pwMsg.innerText = 'Passwords do not match';
        return false;
    }
    else {
        pwMsg.innerHTML = '';
        return true;
    }
}