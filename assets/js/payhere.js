function checkout(contacts, addresses) {
    if (document.getElementById("checkout-check").checked) {

        const contact_list = JSON.parse(JSON.stringify(contacts));
        const address_list = JSON.parse(JSON.stringify(addresses));
        const total = document.getElementById("total").innerHTML;

        let selected_contact;
        let selected_address;

        contact_list.map((contact) => {
            let div = document.getElementById(contact);

            let classlist = div.classList;
            classlist.forEach(c => {
                if (c == "active") {
                    selected_contact = contact;
                }
            })
        });

        address_list.map((address) => {
            let div = document.getElementById(address);

            let classlist = div.classList;
            classlist.forEach(c => {
                if (c == "active") {
                    selected_address = address;
                }
            })
        })

        let contact_no = document.querySelector("#" + selected_contact + " p").innerHTML;
        let address_id = document.querySelector("#" + selected_address + " span").innerHTML;


        const form = new FormData();
        form.append("contact", contact_no);
        form.append("address-id", address_id);
        form.append("total", total);

        const req = new XMLHttpRequest();
        req.onreadystatechange = () => {
            if (req.readyState == 4) {
                let result = JSON.parse(req.responseText);

                // Payment completed. It can be a successful failure.
                payhere.onCompleted = function onCompleted(orderId) {
                    console.log("Payment completed. OrderID:" + orderId);

                    const form2 = new FormData();
                    form2.append("result", JSON.stringify(result));

                    const req2 = new XMLHttpRequest();
                    req2.onreadystatechange = () => {
                        if (req2.readyState == 4) {
                            if (req2.responseText == "Database record added.") {
                                window.location = ("invoice.php?invoice=" + orderId);
                            } else {
                                console.log(req2.responseText);
                            }
                        }
                    }

                    req2.open('post', 'checkout-process.php', true);
                    req2.send(form2);
                    // Note: validate the payment and show success or failure page to the customer
                };

                // Payment window closed
                payhere.onDismissed = function onDismissed() {
                    // Note: Prompt user to pay again or show an error page
                    console.log("Payment dismissed");
                };

                // Error occurred
                payhere.onError = function onError(error) {
                    // Note: show an error page
                    console.log("Error:" + error);
                };


                var payment = {
                    "sandbox": true,
                    "merchant_id": "1221764",    // Replace your Merchant ID
                    "return_url": "",     // Important
                    "cancel_url": "",     // Important
                    "notify_url": "",
                    "order_id": result['order_id'],
                    "items": result['order_id'],
                    "amount": result['amount'],
                    "currency": "LKR",
                    "first_name": result['first_name'],
                    "last_name": result['last_name'],
                    "email": result['email'],
                    "phone": result['mobile'],
                    "address": result['address'],
                    "city": result['city'],
                    "country": "Sri Lanka",
                };

                payhere.startPayment(payment);

            }
        }
        req.open('post', 'load-payment-details-process.php', true);
        req.send(form);

    }
};
