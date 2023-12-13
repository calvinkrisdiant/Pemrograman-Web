let display = document.getElementById('display');

function appendToDisplay(value) {
    if (display.value === 'Error') {
        display.value = '';
    }
    if (value === 'C') {
        clearInput();
    } else if (value === '=') {
        try {
            display.value = eval(display.value);
        } catch (error) {
            display.value = 'Error';
        }
    } else {
        display.value += value;
    }
}

function clearInput() {
    display.value = '';
}

// Add click event listeners for all buttons
const buttons = document.querySelectorAll('.buttons button');
buttons.forEach((button) => {
    button.addEventListener('click', () => {
        const buttonValue = button.innerText;
        appendToDisplay(buttonValue);
    });
});
