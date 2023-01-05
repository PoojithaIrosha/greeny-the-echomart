document.querySelector("#admin_login_form").addEventListener("submit", (e) => {
    let req = new XMLHttpRequest();
    req.onreadystatechange = () => {
        if (req.readyState == 4) {
            let txt = req.responseText;
            alert(txt);
        }
    }
    req.open('post', 'admin_login_process.php', true);
    req.send(new FormData(document.querySelector("#admin_login_form")));

    e.preventDefault()
});