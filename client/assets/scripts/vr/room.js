const form = document.querySelector('.login-form');
form.addEventListener('submit', onSubmit);

function onSubmit(e){
    e.preventDefault();
    let isHost = document.querySelector('#host').checked;
    if(!isHost)
        form.setAttribute('action', 'collabvr.html');

    form.submit();
    return false;
}
