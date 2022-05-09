import Sortable from 'sortablejs';

// if(document.getElementById("lista_prod")){
//     let list = document.querySelectorAll('.list-group-item');
//     list.forEach(element => {
//         element.addEventListener("mouseenter", event => {
//             event.target.classList.add('active');
//         });
//         element.addEventListener("mouseout", event => {
//             event.target.classList.remove('active');
//         });
//     });
// }

if(document.querySelector('.secciones') || document.querySelector('.productos')){
  let lista = document.getElementById('lista_secciones') || document.getElementById('lista_productos');
  let url = (document.getElementById('lista_secciones')) ? '/secciones/cambiar-orden' : '/productos/cambiar-orden';
  if(lista){
    Sortable.create(lista, {
      store: {
        set: (sortable) => {
          const orden = sortable.toArray();
          // console.log(orden);
          fetch(url, {
            headers:{
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            method:'POST',
            body: JSON.stringify({'orden': orden})
          })
          .then(response => response.json())
          .then(function(result){
            console.log(result.respuesta);
          })
          .catch(function (error) {
            console.log(error);
          });
        }
      }
    });
  }
}




window.confirmarDelete = function(event){
    var opcion = confirm("Desea eliminar este elemento?");
    if(!opcion) {
      event.preventDefault();
    }
}


