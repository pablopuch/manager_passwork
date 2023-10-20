import './bootstrap';

// Import our custom CSS
import '../sass/app.scss'

// Import all of Bootstrap's JS
import * as bootstrap from 'bootstrap'

// Obtén referencias a los elementos de entrada
const inputNumber = document.getElementById('length');
const inputRange = document.getElementById('passwordLength');

// Agrega un evento de escucha para cuando cambie el valor del campo de número
inputNumber.addEventListener('input', () => {
    // Actualiza el valor del campo de rango
    inputRange.value = inputNumber.value;
});

// Agrega un evento de escucha para cuando cambie el valor del campo de rango
inputRange.addEventListener('input', () => {
    // Actualiza el valor del campo de número
    inputNumber.value = inputRange.value;
});