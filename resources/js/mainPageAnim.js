'use strict';

class AnimationForMovies{

    init(){
        let categoryes=document.querySelectorAll(".columns")
        let lefOrRi=0;
        categoryes.forEach(function(ev){
            ev.style.opacity=0;
        })
        categoryes.forEach(function(ev){
            let pos=document.documentElement.scrollTop;
            var h = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
            let categoryPosition=parseInt(ev.offsetTop)-parseInt(window.innerHeight)+50;
            if(pos>=categoryPosition){
              
                if(!ev.classList.contains("fadeInRight")&&!ev.classList.contains("fadeInLeft")){
                    ev.style.opacity=1;
                    if(lefOrRi==0){
                        ev.classList.add("fadeInLeftBig");
                    }else if(lefOrRi==1){
                        ev.classList.add("fadeInUpBig");
                    }else if(lefOrRi==2){
                        ev.classList.add("fadeInRightBig");
                    }
                    lefOrRi++;
                }
              
            }
        });
        let lefOrRiQ=0;
        window.onscroll=function(e){
            categoryes.forEach(function(ev){
                let pos=document.documentElement.scrollTop;
                let categoryPosition=parseInt(ev.offsetTop)-parseInt(window.innerHeight)+50;
                if(pos>=categoryPosition){
                    if(!ev.classList.contains("fadeInRight")&&!ev.classList.contains("fadeInLeft")){
                        ev.style.opacity=1;
                        console.log(1);
                        if(lefOrRi==0){
                            ev.classList.add("fadeInLeftBig");
                        }else if(lefOrRi==1){
                            ev.classList.add("fadeInUpBig");
                        }else if(lefOrRi==2){
                            ev.classList.add("fadeInRightBig");
                        }
                        lefOrRiQ++;
                    }
                  
                }
            });
           

        }
    }
}
    new AnimationForMovies().init()

