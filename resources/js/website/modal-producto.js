import React from 'react';
import ReactDOM from 'react-dom/client';
import { Modal } from "bootstrap";
import ModalProductoContent from './components/ModalProductoContent';

const modal = document.getElementById('modal-producto')
const modalBootstrap  = modal ? new Modal(modal) : null;
const botones_productos = document.querySelectorAll('.product-price');
const csrf_token = document.querySelector('meta[name="csrf-token"]')?.content;
const modal_content = document.querySelector('#modal-producto .modal-content');
const root = modal_content ? ReactDOM.createRoot(modal_content) : null;


if (botones_productos){
    botones_productos.forEach(element => {
        element.addEventListener('click', abrirModal);
    });
}

function abrirModal(event){
    let id = event.target.getAttribute('producto-id');
    fetch('/obtenerProducto', {
        method: 'POST',
        headers:{
            'X-CSRF-TOKEN' : csrf_token,
            'content-type' : 'application/json'
        },
        body: JSON.stringify({'id': id})
    })
    .then((data)=>{return data.json()})
    .then((res)=>{
        root?.render(
            <ModalProductoContent producto={res}/>
        )
        modalBootstrap.show();
    })
    .catch((err)=>{console.log(err)});
}

export default abrirModal;