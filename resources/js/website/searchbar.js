import React from "react";
import ReactDOM from "react-dom/client";
import Resultado from "./components/Resultado";

let formularioBusqueda = document.getElementById("busq_form");

if(formularioBusqueda){
  formularioBusqueda.addEventListener("submit", Search);
  
  var root = ReactDOM.createRoot(document.getElementById("espacio"));
  let csrf_token = document.querySelector('meta[name="csrf-token"]').content;
  
  function Search(event) {
    event.preventDefault();
    var query = document.getElementById("query_search").value;
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
  
  function renderResultados(productos, root){
    let resultados = [];
    productos.forEach( (producto, key) => {
        resultados.push(<Resultado key={key} producto={producto}/>);
    });
    root.render(resultados);
  }
}