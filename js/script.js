



/*show password functionality */
function showHidePassword() {
    let show=document.querySelectorAll('showPass');
    if (show.type=='password') {
        show.type='text';
    } else {
        show.type='password';
    }
}