import React from "react";
import { addToCart, removeFromCart } from "../carrito";

export default function FilaCarrito(props) {
    const item = props.item;
    const numberFormat = new Intl.NumberFormat('es-CL', {currency: 'CLP', style: 'currency'});
    // console.log(item);
    return (
        <div className="row row-cols-2 justify-items-between py-2">
            <div className="col mb-2 px-0">
                {item.name}
            </div>
            <div className="col mb-2 text-end px-0">
                {numberFormat.format(item.price*item.quantity)}
            </div>
            <div className="col">
                <div className="row row-cols-3 text-center">
                    <div className="col update-cart" action="delete" producto-id={item.id} onClick={addToCart}><i className="fa-solid fa-minus"></i></div>
                    <div className="col">{item.quantity}</div>
                <div className="col update-cart" action="add" producto-id={item.id} onClick={addToCart}><i className="fa-solid fa-plus"></i></div>
            </div>
            </div>
            <div className="col">
                <div className="row d-flex justify-content-end">
                    <div className="col-auto px-3 delete-cart" producto-id={item.id} onClick={removeFromCart}>
                        <i className="fa-solid fa-trash"></i>
                    </div>
                </div>
            </div>
        </div>
    );
}