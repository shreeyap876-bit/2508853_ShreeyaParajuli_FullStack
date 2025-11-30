const form = document.getElementById('contact_form');


        form.addEventListener("submit", function (e) {
            e.preventDefault();

            const input = document.getElementsByClassName('input');
            const message = document.getElementsByClassName('message');
            const msg_sent = document.getElementById('msg_sent');

            for (let i = 0; i < message.length; i++) {
                message[i].innerText = "";
            }
            msg_sent.innerText = "";

            if (input[0].value === "") {
                message[0].innerText = "Name cannot be empty";
                message[0].style.color = "red";
            }
            else if (input[1].value === "") {
                message[1].innerText = "Email cannot be empty";
                message[1].style.color = "red";
            }
            else if (input[2].value === "") {
                message[2].innerText = "Message cannot be empty";
                message[2].style.color = "red";
            }
            else {
                msg_sent.innerText = "Form submitted successfully!";
                msg_sent.style.color = "green";
                form.reset();
            }
        });

function toggleNavBar () {
    document.querySelector(".navSection").classList.toggle("open");
    document.querySelector("body").classList.toggle("no-scroll");
}
