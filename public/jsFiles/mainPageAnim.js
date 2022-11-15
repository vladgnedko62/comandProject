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
            let categoryPosition=parseInt(ev.offsetTop)-parseInt(window.innerHeight)+50;
            if(pos>=categoryPosition){
              
                if(!ev.classList.contains("fadeInLeft")
                    ||!ev.classList.contains("fadeInUp")
                    ||!ev.classList.contains("fadeInRight")){
                    ev.style.opacity=1;
                    // console.log("qe");
                    if(lefOrRi==0){
                        ev.classList.add("fadeInLeft");
                    }else if(lefOrRi==1){
                        ev.classList.add("fadeInUp");
                    }else if(lefOrRi==2){
                        ev.classList.add("fadeInRight");
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
                    if(!ev.classList.contains("fadeInLeft")
                    &&!ev.classList.contains("fadeInUp")
                    &&!ev.classList.contains("fadeInRight")){
                        ev.style.opacity=1;
                        console.log(1);
                        if(lefOrRiQ==0){
                            ev.classList.add("fadeInLeft");
                        }else if(lefOrRiQ==1){
                            ev.classList.add("fadeInUp");
                        }else if(lefOrRiQ==2){
                            ev.classList.add("fadeInRight");
                        }
                        lefOrRiQ++;
                    }
                  
                }
            });
           

        }
    }
}
     new AnimationForMovies().init()

  