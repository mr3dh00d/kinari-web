document.addEventListener("DOMContentLoaded", function(event) {

    if(document.getElementById('body-pd')){
        const showNavbar = (toggleId, navId, bodyId, headerId, navlogoQS) =>{
            const toggle = document.getElementById(toggleId),
            nav = document.getElementById(navId),
            bodypd = document.getElementById(bodyId),
            headerpd = document.getElementById(headerId),
            navlogo = document.querySelector(navlogoQS),
            navlogoImg = navlogo.firstElementChild;
            navlogo.style.transition = '.5s';
            navlogoImg.style.transition = '.5s';
        
            // Validate that all variables exist
            if(toggle && nav && bodypd && headerpd && navlogo && navlogoImg){
                toggle.addEventListener('click', ()=>{
                    // show navbar
                    nav.classList.toggle('show');
                    // change icon
                    toggle.classList.toggle('bx-x');
                    // add padding to body
                    bodypd.classList.toggle('body-pd');
                    // add padding to header
                    headerpd.classList.toggle('body-pd');
                    // justify content logo
                    var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
                    if (width >= 768) {
                        // navlogo.style.marginBottom = (['1.5rem', ''].includes(navlogo.style.marginBottom)) ? '0' : '1.5rem';
                        navlogoImg.style.maxWidth = (['2.8rem', ''].includes(navlogoImg.style.maxWidth)) ? '7rem' : '2.8rem';
                        navlogoImg.style.marginRight = (['0px', ''].includes(navlogoImg.style.marginRight)) ? '3rem' : '0';
                        navlogoImg.style.marginLeft = (['0px', ''].includes(navlogoImg.style.marginLeft)) ? '3rem' : '0';
                    }
                });
            }
        }
        
        showNavbar('header-toggle','nav-bar','body-pd','header', '.nav_logo');
        
        /*===== LINK ACTIVE =====*/
        const linkColor = document.querySelectorAll('.nav_link');
        
        function colorLink(){
            if(linkColor){
                linkColor.forEach(l=> l.classList.remove('active'));
                this.classList.add('active');
            }
        }
        linkColor.forEach(l=> l.addEventListener('click', colorLink))    
        // Your code to run since DOM is loaded and ready 


    }
});