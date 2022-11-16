'use strict'

let top1 = document.querySelector(".navbar");
let back = document.querySelector(".back");
top1.style.opacity=1;
back.style.opacity=0;
top1.classList.add("fadeInDown");


setTimeout(()=>{
    back.style.opacity=1;
    back.classList.add("fadeInDown");
},300);