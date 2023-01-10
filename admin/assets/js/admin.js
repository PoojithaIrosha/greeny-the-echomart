function adminLogin(evt) {
    const req = new XMLHttpRequest();
    req.onreadystatechange = () => {
        if (req.readyState == 4) {
            let txt = req.responseText;

            if (txt == "success") {
                document.querySelector("#error-msg").classList.add("d-none");
                window.location = "index.php";
            } else {
                document.querySelector("#error-msg").classList.remove("d-none");
                document.querySelector("#error-msg span").innerHTML = txt;
            }
        }
    }
    req.open('post', 'login-process.php', true);
    req.send(new FormData(document.getElementById("admin-login-form")));

    evt.preventDefault();
}

function reset_password(evt) {
    document.getElementById("send-btn").disabled = true;
    const email = document.getElementById("email-address");

    const request = new XMLHttpRequest();

    request.onreadystatechange = () => {
        if (request.readyState == 4) {

            let txt = request.responseText;

            if (txt == "Message has been sent") {
                window.location = "login.php";
            } else {
                document.getElementById("fp-err").innerHTML = txt;
                document.getElementById("send-btn").disabled = false;
            }
            console.log(txt);
        }
    };
    request.open("GET", "send_reset_link.php?e=" + email.value, true);
    request.send();

    evt.preventDefault();
}

function changeProductStatus(pid) {

    const check = document.getElementById("product-status-check").value;

    const request = new XMLHttpRequest();

    request.onreadystatechange = () => {
        if (request.readyState == 4) {
            let txt = request.responseText;
            alert(txt);
        }
    };

    request.open("GET", "change-product-status.php?pid=" + pid, true);
    request.send();

}