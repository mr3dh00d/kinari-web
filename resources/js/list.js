if(document.getElementById("lista_prod")){
    let list = document.querySelectorAll('.list-group-item');
    list.forEach(element => {
        element.addEventListener("mouseenter", event => {
            event.target.classList.add('active');
        });
        element.addEventListener("mouseout", event => {
            event.target.classList.remove('active');
        });
    });
}


