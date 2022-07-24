import { isFunction } from "lodash";
import React from "react";
import ReactDOM from "react-dom/client";
import Resultado from "./components/Resultado";

let formularioBusqueda = document.getElementById("busq_form");

if(formularioBusqueda){
  formularioBusqueda.addEventListener("submit", Search);
  const input = document.getElementById("query_search");
  
  var root = ReactDOM.createRoot(document.getElementById("espacio"));
  let csrf_token = document.querySelector('meta[name="csrf-token"]').content;

  function Search(event) {
    event.preventDefault();
    var query = input.value.toLowerCase();
    if (query.length > 2){
      fetch('/obtenerSecciones', {
          method: 'POST',
          headers:{
              'X-CSRF-TOKEN' : csrf_token,
              'content-type' : 'application/json'
          },
          body: JSON.stringify({query})
      })
      .then((data)=>{return data.json()})
      .then((res)=>{
          renderResultados(res, root);
      })
      .catch((err)=>{console.log(err)});
    }
  }
  
  function renderResultados(productos, root){
    let resultados = [];
    productos.forEach( (producto, key) => {
        resultados.push(<Resultado key={key} producto={producto}/>);
    });
    if(productos.length < 1){
      resultados.push(
        <p key={0} className="text-center w-100">{"No hay resultados :("}</p>
      );
    }
    root.render(resultados);
  }

  const clear_search = document.getElementById('clear-search');
  input.oninput = (event) => {
    if (input.value.length > 2) {
      clear_search.classList.remove('d-none');
    }else{
      clear_search.classList.add('d-none');
    }
  }
  clear_search.onclick = (event) => {
    clear_search.classList.add('d-none');
    input.value = '';
    root.render();
    input.focus();
  }

}