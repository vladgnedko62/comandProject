'use strict'

class ProfileAlerts {

     init() {
        let tasks = document.querySelectorAll(".checkboxDiv>div>label").forEach(function (el) {
            el.classList.contains
            el.addEventListener('click',new ProfileAlerts().clickLS(el));
            let e=el.parentNode.parentNode.parentNode;
            let complete = e.dataset.complate;
            let id = e.dataset.id; 
            const response =  fetch("/completeAlert/" + id, {
                method: "GET",
                headers: { "Accept": "application/json" }
            });

        });
    }

   clickLS(el){
    console.dir(el);
    let e=null;
    if(el.classList.contains("tick_mark")){
        e=el.parentNode.parentNode.parentNode.parentNode;
    }else{
        e=el.parentNode.parentNode.parentNode;
    }
   
    let complete = e.dataset.complate;
    console.log(complete);
    let id = e.dataset.id;
    const response =  fetch("/completeAlert/" + id, {
        method: "GET",
        headers: { "Accept": "application/json" }
    });
    
    let activeBlock = document.querySelector(".fut");
    let readyBlock = document.querySelector(".ready");
        if (complete == 0) {
            e.dataset.complate=1;
           
            if (readyBlock.querySelector("h2")!=null) {
                readyBlock.innerHTML = "";
            }
            let buffer =e.cloneNode(true);
            buffer.querySelector("label").addEventListener('click',function(e){new ProfileAlerts().clickLS(e.target)});
           buffer.classList.add("fadeInUp");
            readyBlock.appendChild(buffer);
            e.remove();
            if(activeBlock.querySelector("div")==null){
                activeBlock.insertAdjacentHTML('beforeend',`
                <h2 style="color: black">No tasks</h2>
                `)
            }
           
        } else {
            e.dataset.complate=0;
        
            if (activeBlock.querySelector("h2")!=null) {
                activeBlock.innerHTML = "";
            }
            let buffer =e.cloneNode(true);
            buffer.querySelector("label").addEventListener('click',function(e){new ProfileAlerts().clickLS(e.target)});
            buffer.classList.add("fadeInUp");
            activeBlock.appendChild(buffer);
           e.remove();
           if(readyBlock.querySelector("div")==null){
            readyBlock.insertAdjacentHTML('beforeend',`
            <h2 style="color: black">No tasks</h2>
            `)
        }
        
        }
        
       
   }
}
new ProfileAlerts().init();