// User Registration
function user_registration() {
    const fname = document.getElementById("fname");
    const lname = document.getElementById("lname");
    const email = document.getElementById("email");
    const password = document.getElementById("pwd");
    const mobile = document.getElementById("mobile");
    const gender = document.getElementById("gender");

    const form = new FormData();
    form.append("fname", fname.value);
    form.append("lname", lname.value);
    form.append("email", email.value);
    form.append("pwd", password.value);
    form.append("mobile", mobile.value);
    form.append("gender", gender.value);

    const request = new XMLHttpRequest();
    request.onreadystatechange = () => {
        if (request.readyState == 4) {
            const txt = request.responseText;
            if (txt === "success") {
                window.location = "login.php";
            } else {
                document.getElementById('err-msg').innerHTML = txt;
            }
        }
    };

    request.open("POST", "./register_process.php", true);
    request.send(form);
}

// User Login
function user_login() {
    const email = document.getElementById("email");
    const password = document.getElementById("pwd");
    const rmb_me = document.getElementById("rmb_me");

    const form = new FormData();
    form.append("email", email.value);
    form.append("pwd", password.value);
    form.append("rmb_me", rmb_me.checked);

    const request = new XMLHttpRequest();
    request.onreadystatechange = () => {
        if (request.readyState == 4) {
            const txt = request.responseText;
            if (txt == "success") {
                window.location = "index.php";
            } else {
                document.getElementById('err-msg').innerHTML = txt;
            }
        }
    };
    request.open("POST", "./login_process.php", true);
    request.send(form);
}

function setActiveStatus() {
    const email = document.getElementById("email");
    const btn = document.getElementById("resetBtn");

    if (email.value == "") {
        btn.setAttribute("disabled", "");
    } else {
        btn.removeAttribute("disabled");
    }
}

// Reset Password
function reset_password() {
    const email = document.getElementById("email");

    const request = new XMLHttpRequest();

    request.onreadystatechange = () => {
        if (request.readyState == 4) {
            document.getElementById("resetBtnLoading").classList.add("d-none");
            document.getElementById("resetBtn").classList.remove("d-none");

            let txt = request.responseText;

            if (txt == "Message has been sent") {
                document.getElementById("resetBtn").innerHTML = "Email Sent";
                document.getElementById("resetBtn").setAttribute("disabled", "");
            } else {
                document.getElementById('err-msg').innerHTML = txt;
            }
        } else {
            document.getElementById("resetBtnLoading").classList.remove("d-none");
            document.getElementById("resetBtn").classList.add("d-none");
        }
    };
    request.open("GET", "send_reset_link.php?e=" + email.value, true);
    request.send();
}

// Update Password
function update_password(uid) {
    const new_pwd = document.getElementById("new_pwd");
    const r_pwd = document.getElementById("r_pwd");

    const form = new FormData();
    form.append("new_pwd", new_pwd.value);
    form.append("r_pwd", r_pwd.value);
    form.append("uid", uid);

    const request = new XMLHttpRequest();
    request.onreadystatechange = () => {
        if (request.readyState == 4) {
            const txt = request.responseText;
            if (txt == "success") {
                window.location = "login.php";
            } else {
                document.getElementById('err-msg').innerHTML = txt;
            }
        }
    };
    request.open("POST", "update_password_process.php", true);
    request.send(form);
}

// Log out

function logout() {
    const request = new XMLHttpRequest();
    request.onreadystatechange = () => {
        if (request.readyState == 4) {
            const txt = request.responseText;
            if (txt == "success") {
                window.location = "index.php";
            }
        }
    };
    request.open("GET", "sign_out_process.php", true);
    request.send();
}

// Load Main Image - Single Product View
function load_main_img(id) {
    const selected_image = document.getElementById("product_img" + id);
    const main_image_tag = document.getElementById("main_img_tag");

    main_image_tag.src = selected_image.src;
}

// Add to wishlist 
function add_to_wishlist(pid) {
    const req = new XMLHttpRequest();
    req.onreadystatechange = () => {
        if (req.readyState == 4) {
            const txt = req.responseText;
            if (txt == "1") {
                document.getElementById("toastBody").innerHTML = "You need to login first";
                window.location = "login.php";
            } else if (txt == "2") {
                document.getElementById("toastBody").innerHTML = "This product has been already added to the wishlist";
            } else if (txt == "0") {
                document.getElementById("toastBody").innerHTML = "The product added to the wishlist successfully";
                document.getElementById("wish_btn" + pid).classList.add("active");
            }
            new bootstrap.Toast(document.getElementById("myToast")).show();
        }
    }
    req.open("GET", "add_to_wishlist_process.php?pid=" + pid, true);
    req.send();
}

function add_review(id) {

    const review = document.getElementById("review");

    console.log(review.value)

    const radioButtons = document.querySelectorAll('input[name="rating"]');
    let rating;
    for (const radioButton of radioButtons) {
        if (radioButton.checked) {
            rating = radioButton.value;
            break;
        }
    }

    let form = new FormData();
    form.append("review", review.value);
    form.append("rating", rating);
    form.append("pid", id);

    const req = new XMLHttpRequest();
    req.onreadystatechange = () => {
        if (req.readyState == 4) {
            const txt = req.responseText;

            if (txt == "success") {
                document.getElementById("toastBody").innerHTML = "Your review added successfully";
                new bootstrap.Toast(document.getElementById("myToast")).show();
                window.location.reload();
            } else {
                document.getElementById("toastBody").innerHTML = txt;
                new bootstrap.Toast(document.getElementById("myToast")).show();
            }
        }
    }

    req.open("post", "add_review_process.php", true);
    req.send(form);
}


function decrement_qty() {
    let currentVal = parseInt(document.getElementById("qtyInput").value);
    let newVal = currentVal - 1;

    if (newVal > 0) {
        document.getElementById("qtyInput").value = newVal;
    }
}

function increment_qty() {
    let currentVal = parseInt(document.getElementById("qtyInput").value);
    let newVal = currentVal + 1;

    document.getElementById("qtyInput").value = newVal;
}

function check_qty() {
    let qty = document.getElementById('qtyInput').value;

    if (qty.match(/-[0-9]*/gm)) {
        document.getElementById('qtyInput').value = 1;
    }
}

function add_to_cart(id) {
    const qty = document.getElementById("qtyInput");

    let form = new FormData();
    form.append("pid", id);
    form.append("qty", qty.value);

    const req = new XMLHttpRequest();
    req.onreadystatechange = () => {
        if (req.readyState == 4) {
            let txt = req.responseText;

            if (txt == "redirect") {
                window.location = "login.php";
            } else {
                qty.value = "1";
                document.getElementById("toastBody").innerHTML = txt;
                new bootstrap.Toast(document.getElementById("myToast")).show();
                load_cart();
            }
        }
    }

    req.open("post", "add_to_cart_process.php", true);
    req.send(form);
}

function load_cart() {
    const req = new XMLHttpRequest();
    req.onreadystatechange = () => {
        if (req.readyState == 4) {
            let txt = req.responseText;
            document.getElementById("cart_sidebar").innerHTML = txt;
            let qty = document.getElementById("no_of_products_in_cart").innerHTML;
            let new_qty = parseInt(qty) + 1;
            document.getElementById("no_of_products_in_cart").innerHTML = new_qty.toString();
        }
    }

    req.open("get", 'load_cart_process.php', true);
    req.send();
}

function update_cart_qty(action, id) {
    let current_qty = document.getElementById("quantity" + id);

    let form = new FormData();
    form.append("action", action);
    form.append("c_qty", current_qty.value);
    form.append("id", id);

    const req = new XMLHttpRequest();
    req.onreadystatechange = () => {
        if (req.readyState == 4) {
            let txt = req.responseText;
            let result = JSON.parse(txt);
            if (result.status == "success") {
                current_qty.value = result.new_qty;
            }
        }
    };

    req.open('post', 'update_cart_quantity_process.php', true);
    req.send(form);
}

function delete_from_cart(pid) {
    let req = new XMLHttpRequest();
    req.onreadystatechange = () => {
        if (req.readyState == 4) {
            let txt = req.responseText;
            if (txt == "success") {
                window.location.reload();
            } else {
                alert(txt);
            }
        }
    };
    req.open('get', 'remove_product_from_cart_process.php?pid=' + pid, true);
    req.send();
}

//User Profile

function remove_mobile(id) {
    let req = new XMLHttpRequest();
    req.onreadystatechange = () => {
        if (req.readyState == 4) {
            let txt = req.responseText;
            if (txt == "success") {
                window.location.reload();
            } else {
                alert(txt);
            }
        }
    }

    req.open("get", 'remove_mobile_number_process.php?id=' + id, true);
    req.send();
}

function add_new_contact() {
    let new_mobile = document.getElementById("new_mobile");
    let contact_type = document.getElementById("contact_type");

    let form = new FormData();
    form.append("mobile", new_mobile.value);
    form.append("contact_type", contact_type.value);

    let req = new XMLHttpRequest();
    req.onreadystatechange = () => {
        if (req.readyState == 4) {
            let txt = req.responseText;
            if (txt == "success") {
                window.location.reload();
            } else {
                alert(txt);
            }
        }
    }

    req.open("post", "add_new_contact_process.php", true);
    req.send(form);
}

function edit_contact_details(id) {
    let req = new XMLHttpRequest();
    req.onreadystatechange = () => {
        if (req.readyState == 4) {
            let txt = req.responseText;
            let result = JSON.parse(txt);

            if (result.status == "success") {
                document.getElementById("c_id").value = result.c_id;
                document.getElementById("mobile2").value = result.mobile;
                document.getElementById("contact_type2").value = result.type_id;

                new bootstrap.Modal(document.getElementById("contact-edit")).show();
            } else if (result.status == "error") {
                alert("Something went wrong");
            }
        }
    }

    req.open("get", "get_contact_details.php?id=" + id, true);
    req.send();
}

function update_mobile_no() {
    let contact_type = document.getElementById("contact_type2");
    let mobile = document.getElementById("mobile2");
    let c_id = document.getElementById("c_id");

    let form = new FormData();
    form.append("contact_type", contact_type.value);
    form.append("mobile", mobile.value);
    form.append("c_id", c_id.value);

    let req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.readyState == 4) {
            let txt = req.responseText;

            if (txt == "success") {
                window.location.reload();
            } else {
                document.getElementById("error_msg").innerHTML = txt;
                document.getElementById("error_msg").classList.remove("d-none");
            }
        }
    }

    req.open("post", "update_mobile_no_process.php", true);
    req.send(form);
}

function update_user_details() {
    let first_name = document.getElementById("first_name");
    let last_name = document.getElementById("last_name");
    let profile_img = document.getElementById("profile_img");

    let form = new FormData();
    form.append("first_name", first_name.value);
    form.append("last_name", last_name.value);
    form.append("profile_img", profile_img.files[0]);

    let req = new XMLHttpRequest();
    req.onreadystatechange = () => {
        if (req.readyState == 4) {
            let txt = req.responseText;
            if (txt == 'success') {
                window.location.reload();
            } else {
                document.getElementById('err-msg').innerHTML = txt
            }
        }
    }

    req.open('post', 'update_user_profile_process.php', true);
    req.send(form)
}

function edit_user_address(id) {
    let req = new XMLHttpRequest();
    req.onreadystatechange = () => {
        if (req.readyState == 4) {
            let result = JSON.parse(req.responseText);

            document.getElementById('line1').value = result.line1;
            document.getElementById('line2').value = result.line2;
            document.getElementById('postal_code').value = result.postal_code;
            document.getElementById('city').value = result.city_id;
            document.getElementById('aid').value = result.aid;

            new bootstrap.Modal(document.getElementById("address-edit")).show();
        }
    }
    req.open('get', 'load_address_data_process.php?id=' + id, true);
    req.send();
}

function update_user_address(id) {
    let form = new FormData();
    form.append("aid", document.getElementById("aid").value);
    form.append("line1", document.getElementById("line1").value);
    form.append("line2", document.getElementById("line2").value);
    form.append("postal_code", document.getElementById("postal_code").value);
    form.append("city_id", document.getElementById("city").value);

    let req = new XMLHttpRequest();
    req.onreadystatechange = () => {
        if (req.readyState == 4) {
            if (req.responseText == "success") {
                window.location.reload();
            } else {
                alert(req.responseText);
            }
        }
    }
    req.open('post', 'update_user_address_process.php', true);
    req.send(form);
}

function delete_user_address(id) {
    let req = new XMLHttpRequest();
    req.onreadystatechange = () => {
        if (req.readyState == 4) {
            let txt = req.responseText;

            if (txt == "success") {
                window.location.reload();
            } else {
                alert(txt);
            }
        }
    }

    req.open('get', 'delete_user_address_process.php?id=' + id, true);
    req.send();
}

function set_province_of_address() {
    let province_id = document.getElementById("new_province");

    let req = new XMLHttpRequest();
    req.onreadystatechange = () => {
        if (req.readyState == 4) {
            let txt = req.responseText;
            document.getElementById("district_div").innerHTML = txt;
        }
    }
    req.open('get', 'get_districts_process.php?pid=' + province_id.value, true);
    req.send();
}

function set_district_of_address() {
    let district_id = document.getElementById("new_district");

    let req = new XMLHttpRequest();
    req.onreadystatechange = () => {
        if (req.readyState == 4) {
            let txt = req.responseText;
            document.getElementById("city_div").innerHTML = txt;
        }
    }
    req.open('get', 'get_cities_process.php?did=' + district_id.value, true);
    req.send();
}

function add_new_address() {
    let line1 = document.getElementById("new_line1");
    let line2 = document.getElementById("new_line2");
    let city_id = document.getElementById("new_city");
    let postal_code = document.getElementById("new_postal_code");

    let form = new FormData();
    form.append("line1", line1.value);
    form.append("line2", line2.value);
    form.append("city_id", city_id.value);
    form.append("postal_code", postal_code.value);

    let req = new XMLHttpRequest();
    req.onreadystatechange = () => {
        if (req.readyState == 4) {
            let txt = req.responseText;
            if (txt == "success") {
                window.location.reload();
            } else {
                document.getElementById("address_error_msg").classList.remove("d-none");
                document.getElementById("address_error_msg").innerHTML = txt;
            }
        }
    }
    req.open('post', 'add_new_user_address_process.php', true);
    req.send(form);
}

function paginate(page, search) {
    let form = new FormData();
    form.append("search", search);
    form.append("page", page);

    let req = new XMLHttpRequest();

    req.onreadystatechange = () => {
        if (req.readyState == 4) {
            let txt = req.responseText;
            document.getElementById("p_container").innerHTML = txt;
        }
    }

    req.open('post', 'filter_products_process.php', true);
    req.send(form);
}

function do_filter(categories, brands, search, page) {
    let c = JSON.parse(JSON.stringify(categories));
    let b = JSON.parse(JSON.stringify(brands));
    let min_price = document.querySelector("#min_price");
    let max_price = document.querySelector("#max_price");

    let selected_categories = new Array();
    let selected_brands = new Array();

    c.forEach((cat) => {
        if (document.getElementById(cat).checked == true) {
            selected_categories.push(cat);
        }
    });

    b.forEach((br) => {
        if (document.getElementById(br).checked == true) {
            selected_brands.push(br);
        }
    });

    let form = new FormData();
    form.append("categories", JSON.stringify(selected_categories));
    form.append("brands", JSON.stringify(selected_brands));
    form.append("min_price", min_price.value);
    form.append("max_price", max_price.value);
    form.append("search", search);
    form.append("page", page);

    let req = new XMLHttpRequest();
    req.onreadystatechange = () => {
        if (req.readyState == 4) {
            let txt = req.responseText;
            document.getElementById("p_container").innerHTML = txt;
            // console.log(txt);
        }
    }

    req.open('post', 'filter_products_process.php', true);
    req.send(form);
}

function load_delivery_fee(did) {
    const req = new XMLHttpRequest();

    req.onreadystatechange = () => {
        if (req.readyState == 4) {
            let txt = req.responseText;
            let formatter = new Intl.NumberFormat("si-LK", {
                style: "currency", currency: "LKR"
            })

            document.getElementById("delivery_fee").innerHTML = formatter.format(txt);
            calculate_total(txt);
        }
    }
    req.open("get", "load_delivery_fee_process.php?did=" + did, true);
    req.send();
}

function calculate_total(delivery) {
    let sub_total = document.getElementById("sub_total").innerHTML;
    let total = parseInt(sub_total) + parseInt(delivery);

    document.getElementById("total").innerHTML = total.toString();
}