import React from "react";
import ReactDOM from "react-dom/client";
import MenuLink from "./MenuLink";

// var MenuBarHTML = document.querySelector('body#carta .container #menu');

// if(MenuBarHTML){
//   const MenuBar = ReactDOM.createRoot(MenuBarHTML);

// }

document.getElementById("search_button").addEventListener("click", Search);
var root = ReactDOM.createRoot(document.getElementById("espacio"));
let csrf_token = document.querySelector('meta[name="csrf-token"]').content;

function Search() {
  var query = document.getElementById("query_search").value;
  console.log(query);
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
      console.log(res);
      renderMenuLinks(res, root);
  })
  .catch((err)=>{console.log(err)});
}

function renderMenuLinks(secciones, root){
  let links = [];
  secciones.forEach( (seccion, key) => {
      links.push(<MenuLink key={key} seccion={seccion}/>);
  });
  root.render(links);
}