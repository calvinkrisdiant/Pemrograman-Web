let equal_pressed = 0;
let button_input = document.querySelectorAll(".input-button");
let input = document.getElementById("input");
let equal = document.getElementById("equal");
let clear = document.getElementById("clear");
let erase = document.getElementById("erase");

window.onload = () => {
  input.value = "";
};

button_input.forEach((button_class) => {
  button_class.addEventListener("click", () => {
    if (equal_pressed == 1) {
      input.value = "";
      equal_pressed = 0;
    }
    // Menampilkan nilai tombol
    input.value += button_class.value;
  });
});

equal.addEventListener("click", () => {
  equal_pressed = 1;
  let inp_val = input.value;

  // Menangani operasi pangkat (^)
  if (inp_val.includes('^')) {
    let operands = inp_val.split('^');
    if (operands.length === 2) {
      inp_val = `${Math.pow(parseFloat(operands[0]), parseFloat(operands[1]))}`;
    }
  }

  // Menangani operasi persen (%)
  if (inp_val.includes('%')) {
    let operands = inp_val.split('%');
    if (operands.length === 2) {
      inp_val = `${(parseFloat(operands[0]) / 100) * parseFloat(operands[1])}`;
    }
  }

  try {
    // Evaluate user's input
    let solution = eval(inp_val);
    if (Number.isInteger(solution)) {
      input.value = solution;
    } else {
      input.value = solution.toFixed(2);
    }
  } catch (err) {
    // Apabila inputan salah
    alert("Invalid Input");
  }
});

clear.addEventListener("click", () => {
  input.value = "";
});

erase.addEventListener("click", () => {
  input.value = input.value.substr(0, input.value.length - 1);
});
