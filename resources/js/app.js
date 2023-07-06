import "./bootstrap";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**"]);

// Save button
const btnCreate = document.getElementById("btn-create");

// Name
const nameInput = document.getElementById("name");
// const nameValue = document.getElementById("name").value;
const nameError = document.getElementById("name-error");

if (btnCreate) {
    btnCreate.addEventListener("click", function (event) {
        console.log("ciao");
        console.log(nameInput.value);
        if (nameInput.value === "") {
            event.preventDefault();
            nameInput.classList.add("is-invalid");
            nameError.classList.remove("d-none");
            nameError.classList.add("d-block");
        } else {
            console.log("ciao else");
            nameInput.classList.remove("is-invalid");
            nameError.classList.add("d-none");
        }
    });
}
