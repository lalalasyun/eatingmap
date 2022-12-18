let nav = document.querySelector("#navArea");
let btn = document.querySelector(".toggle-btn");
let mask = document.querySelector("#mask");

btn.onclick = () => {
  nav.classList.toggle("open");
  console.log('btn')
};

mask.onclick = () => {
  console.log('mask')
  nav.classList.toggle("open");
};
