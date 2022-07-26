import React from 'react';
import ReactDOM from 'react-dom/client';
import { Modal } from "bootstrap";
import FilaCarrito from './components/FilaCarrito';

const modal = document.getElementById('modal-carrito');
const modalBootstrap = modal ? new Modal(modal) : null;
const btnCarrito = document.querySelector('.btn-carrito');
const root = modal ? ReactDOM.createRoot(document.querySelector('#modal-carrito .modal-body'))  : null;
const csrf_token = document.querySelector('meta[name="csrf-token"]')?.content;

if (btnCarrito){
    btnCarrito.addEventListener('click', btnCarritoClick);
}

function btnCarritoClick(event){
    modalBootstrap.show();
    UpdateCart();
}

function UpdateCart(){
    fetch('/carrito/obtener', {
        method: 'POST',
        headers:{
            'X-CSRF-TOKEN' : csrf_token,
            'content-type' : 'application/json'
        }
    })
    .then((data)=>{return data.json()})
    .then((res)=>{
        renderInCart(res);
    })
    .catch((err)=>{console.log(err)});

}

function renderInCart(content){
    console.log('renderizando...');
    let result = [];
    Object.entries(content).forEach(entry => {
        const [key, item] = entry;
        result.push(<FilaCarrito key={key} item={item}/>);
    });

    if(Object.entries(content).length == 0){
        result.push(
            // <h1 key={0}>No hay productos</h1>
            <div
                style={{opacity: '20%'}} 
                className="row">
                <div className="col-12 text-center">
                    <img
                    className="w-100" 
                    style={{maxWidth: '15rem'}}
                    src="/img/Sushito-bn.png" />
                </div>
                <div className="col-12 text-center">
                    Tu carrito está vacío
                </div>
            </div>
        );
    }

    root.render(
        <div className="container">
            {result}
        </div>
    );
    console.log('renderizado!');
}

export function addToCart(event){
    let target = event.currentTarget;
    let id = target.getAttribute('producto-id');
    let action = target.getAttribute('action');
    fetch('/carrito/agregar', {
        method: 'POST',
        headers:{
            'X-CSRF-TOKEN' : csrf_token,
            'content-type' : 'application/json'
        },
        body: JSON.stringify({id, action}),
    })
    .then(()=>{UpdateCart()})
    .catch((err)=>{console.log(err)});
}
export function removeFromCart(event){
    let target = event.currentTarget;
    let id = target.getAttribute('producto-id');
    fetch('/carrito/eliminar', {
        method: 'POST',
        headers:{
            'X-CSRF-TOKEN' : csrf_token,
            'content-type' : 'application/json'
        },
        body: JSON.stringify({id}),
    })
    .then(()=>{UpdateCart()})
    .catch((err)=>{console.log(err)});
}