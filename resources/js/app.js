import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

const btnRegister = document.getElementById('btn-register');
let checkboxes = document.querySelectorAll('input[type="checkbox"].create');
const errorCategory = document.querySelector('.error-category');
let numChecked = 0;
if (btnRegister && checkboxes.length > 0) {
    btnRegister.addEventListener('click', function (event) {
        console.log('ciao');
        for (let i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) { 
                numChecked++; 
            }
        }
        if (numChecked === 0) {
            event.preventDefault();
            errorCategory.classList.remove('d-none');
            errorCategory.classList.add('d-block');
        } else {
            errorCategory.classList.add('d-none');
        }
    });

}

