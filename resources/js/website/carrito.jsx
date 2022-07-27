import React from 'react';
import ReactDOM from 'react-dom/client';
import { Modal } from "bootstrap";
import FilaCarrito from './components/FilaCarrito';

const modal = document.getElementById('modal-carrito');
const modalBootstrap = modal ? new Modal(modal) : null;
const btnCarrito = document.querySelector('.btn-carrito');
const root = modal ? ReactDOM.createRoot(document.querySelector('#modal-carrito .modal-body'))  : null;
const csrf_token = document.querySelector('meta[name="csrf-token"]')?.content;
const numberFormat = new Intl.NumberFormat('es-CL', {currency: 'CLP', style: 'currency'});


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

function renderInCart(response){
    let contenido = response.contenido;
    let result = [];
    let items = [];
    
    Object.entries(contenido).forEach(entry => {
        const [key, item] = entry;
        items.push(<FilaCarrito key={key} item={item}/>);
    });

    if(items.length > 0){
        result.push(
            <div key={0} className="items-carrito">
                {items}
            </div>
        );
        result.push(
            <div key={1} className="row justify-items-between">
                <div className="col-12 text-end p-0 subtotal">
                    Total:
                    <span className="ms-3 ff-kaushan">
                        {numberFormat.format(response.subtotal)}
                    </span>
                </div>
                <a className="col-12 ff-kaushan text-center mt-2 py-1 btn-pagar" href='/resumen'>
                    Pagar
                </a>
            </div>
        );
    }else{
        result.push(
            <div
                key={0}
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
}

export function addToCart(event){
    let target = event.currentTarget;
    let id = target.getAttribute('producto-id');
    let action = target.getAttribute('action');
    let btnCarrito = document.getElementById('btn-carrito');
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
    btnCarrito.classList.add('jump');
    setTimeout(()=>{btnCarrito.classList.remove('jump')}, 750);
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