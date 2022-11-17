'use strict'

let top1 = document.querySelector(".navbar");
let back = document.querySelector(".back");
top1.style.opacity=1;
top1.classList.add("fadeInDown");

console.log(back);
setTimeout(()=>{
    back.style.opacity=1;
    back.classList.add("fadeInDown");
},300);