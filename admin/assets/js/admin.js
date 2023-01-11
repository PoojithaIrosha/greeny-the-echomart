const adminLogin = (evt) => {
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

const reset_password = (evt) => {
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

const changeProductStatus = (pid) => {
    const check = document.getElementById("product-status-check" + pid);

    const request = new XMLHttpRequest();

    request.onreadystatechange = () => {
        if (request.readyState == 4) {
            let txt = request.responseText;
            setTimeout(() => {
                alert(txt);
            }, 300);
        }

    }

    request.open("GET", "change-product-status.php?pid=" + pid + "&checked=" + check.checked, true);
    request.send();
}

const deleteProductImage = (imagePath, productId) => {
    const request = new XMLHttpRequest();

    const form = new FormData();
    form.append('pId', productId);
    form.append('imagePath', imagePath);

    request.onreadystatechange = () => {
        if (request.readyState == 4) {
            let txt = request.responseText;
            if (txt == "success") {
                window.location.reload();
            } else {
                alert(txt);
            }
        }
        ;
    }

    request.open("post", "delete-product-image-process.php", true);
    request.send(form);
}

const uploadProductImage = (pid) => {
    const prodImg = document.getElementById("productImg");

    const form = new FormData();
    form.append("pid", pid);
    form.append("file", prodImg.files[0]);

    const request = new XMLHttpRequest();
    request.onreadystatechange = () => {
        if (request.readyState == 4) {
            let txt = request.responseText;
            if (txt == "success") {
                window.location.reload();
            } else {
                alert(txt);
            }
        }
        ;
    }

    request.open("post", "upload-product-image-process.php", true);
    request.send(form);
}

const updateProduct = (pid) => {

    const productName = document.getElementById("productname");
    const price = document.getElementById("price");
    const qty = document.getElementById("qty");
    const category = document.getElementById("category");
    const brand = document.getElementById("brand");
    const desc = document.getElementById("description");
    const unit = document.getElementById("unit");

    const form = new FormData();
    form.append('pid', pid);
    form.append("pname", productName.value);
    form.append("price", price.value);
    form.append("qty", qty.value);
    form.append("category", category.value);
    form.append("brand", brand.value);
    form.append("desc", desc.value);
    form.append("unit", unit.value);

    const request = new XMLHttpRequest();
    request.onreadystatechange = () => {
        if (request.readyState == 4) {
            let txt = request.responseText;
            if (txt == "success") {
                window.location = "products.php";
            } else {
                alert(txt);
            }
        }
        ;
    }

    request.open("post", "update-product-process.php", true);
    request.send(form);
}

const deleteProduct = (pid) => {
    const request = new XMLHttpRequest();
    request.onreadystatechange = () => {
        if (request.readyState == 4) {
            let txt = request.responseText;
            if (txt == "success") {
                alert("Product deleted successfully");
                window.location.reload();
            } else {
                alert("Product cannot be deleted");
            }
        }
    }

    request.open("get", "delete-product-process.php?pid=" + pid, true);
    request.send();
}

const addNewProductImage = () => {
    document.getElementById("images-container").innerHTML = null;
    const prodImg = document.getElementById("productImg");

    for (let i = 0; i < prodImg.files.length; i++) {
        let url = URL.createObjectURL(prodImg.files[i]);

        const div = document.createElement('div');
        const img = document.createElement('img');
        img.src = url;
        img.style.height = '150px';
        img.classList.add('border');
        img.alt = prodImg.files[i]["name"];
        div.appendChild(img);
        div.addEventListener("dblclick", () => {
            div.remove();
        })
        document.getElementById("images-container").appendChild(div);
    }
}

const addNewProduct = () => {
    const productName = document.getElementById("productname");
    const price = document.getElementById("price");
    const qty = document.getElementById("qty");
    const category = document.getElementById("category");
    const brand = document.getElementById("brand");
    const desc = document.getElementById("description");
    const unit = document.getElementById("unit");
    let arrayOfImageIds = [];

    const form = new FormData();
    form.append("pname", productName.value);
    form.append("price", price.value);
    form.append("qty", qty.value);
    form.append("category", category.value);
    form.append("brand", brand.value);
    form.append("desc", desc.value);
    form.append("unit", unit.value)

    document.querySelectorAll("#images-container div img").forEach(e => {
        const prodImg = document.getElementById("productImg");

        for (let i = 0; i < prodImg.files.length; i++) {
            if (prodImg.files[i]["name"] == e.alt) {
                arrayOfImageIds.push(i);
                form.append("file" + i, prodImg.files[i]);
            }
        }
    })

    form.append("imageIds", JSON.stringify(arrayOfImageIds));

    const req = new XMLHttpRequest();
    req.onreadystatechange = () => {
        if (req.readyState == 4) {
            let txt = req.responseText;
            if (txt == "success") {
                window.location = "products.php";
            } else {
                alert(txt);
            }
        }
    }
    req.open('post', 'add-new-product-process.php', true);
    req.send(form);

}

const changeUserStatus = (email) => {
    const check = document.getElementById("user-status-check" + email);

    const request = new XMLHttpRequest();

    request.onreadystatechange = () => {
        if (request.readyState == 4) {
            let txt = request.responseText;
            setTimeout(() => {
                alert(txt);
            }, 300)
        }
    }

    request.open("GET", "change-user-status.php?email=" + email + "&checked=" + check.checked, true);
    request.send();
}

const deleteUserAccount = (email) => {
    const request = new XMLHttpRequest();

    request.onreadystatechange = () => {
        if (request.readyState == 4) {
            let txt = request.responseText;
            if (txt == "success") {
                alert("User deleted successfully");
                window.location.reload();
            } else {
                alert(txt);
            }
        }
    }

    request.open("GET", "delete-user-account.php?email=" + email, true);
    request.send();
}

const changeOrderStatus = (invId) => {
    const request = new XMLHttpRequest();

    request.onreadystatechange = () => {
        if (request.readyState == 4) {
            let txt = request.responseText;
            if (txt == 'success') {
                alert("Order status updated successfully");
                window.location.reload();
            } else {
                alert(txt);
            }
        }
    }

    request.open("GET", "change-order-status-process.php?invId=" + invId, true);
    request.send();
}

const searchOrder = () => {
    const text = document.getElementById("inv-search-input");
    const dateFrom = document.getElementById("date-from");
    const dateTo = document.getElementById("date-to");

    const form = new FormData();
    form.append("text", text.value);
    form.append("from", dateFrom.value);
    form.append("to", dateTo.value);

    const request = new XMLHttpRequest();
    request.onreadystatechange = () => {
        if (request.readyState == 4) {
            let txt = request.responseText;
            document.getElementById("table-body").innerHTML = txt;
        }
    }

    request.open("POST", "search-order-process.php", true);
    request.send(form);
}

const addNewCategory = () => {
    const name = document.getElementById("categoryname");

    const form = new FormData();
    form.append("name", name.value);

    const request = new XMLHttpRequest();
    request.onreadystatechange = () => {
        if (request.readyState == 4) {
            let txt = request.responseText;
            if (txt == "success") {
                alert("New category addedd successfully");
                window.location = "categories.php";
            } else {
                alert(txt)
            }
        }
    }

    request.open("POST", "add-new-category.php", true);
    request.send(form);
}

const addNewBrand = () => {
    const name = document.getElementById("brandname");

    const form = new FormData();
    form.append("name", name.value);

    const request = new XMLHttpRequest();
    request.onreadystatechange = () => {
        if (request.readyState == 4) {
            let txt = request.responseText;
            if (txt == "success") {
                alert("New brand addedd successfully");
                window.location = "brands.php";
            } else {
                alert(txt)
            }
        }
    }

    request.open("POST", "add-new-brand.php", true);
    request.send(form);
}

const deleteBrand = (brandId) => {
    const request = new XMLHttpRequest();
    request.onreadystatechange = () => {
        if (request.readyState == 4) {
            let txt = request.responseText;
            if (txt == "success") {
                alert("Brand deleted successfully");
                window.location.reload();
            } else {
                alert(txt)
            }
        }
    }

    request.open("get", "delete-brand-process.php?bid=" + brandId, true);
    request.send();
}

const deleteCategory = (cId) => {
    const request = new XMLHttpRequest();
    request.onreadystatechange = () => {
        if (request.readyState == 4) {
            let txt = request.responseText;
            if (txt == "success") {
                alert("Category deleted successfully");
                window.location.reload();
            } else {
                alert(txt)
            }
        }
    }

    request.open("get", "delete-category-process.php?cid=" + cId, true);
    request.send();
}