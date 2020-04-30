function checkSession() {
    if (!localStorage.getItem('token')) {
        window.setTimeout(function(){
            window.location.href = "http://127.0.0.1/dashboard/login";
        },100);
    }
}
checkSession();