import React from "react";
import { addToCart } from '../carrito';

function ModalProductoContent(props){
    let producto = props.producto;
    const numberFormat = new Intl.NumberFormat('es-CL', {currency: 'CLP', style: 'currency'});
    return(
        <>
            <div className="modal-header pb-0">
                <h5 className="modal-title" id="modal-producto-label">{producto.nombre}</h5>
                <i className="p-2 pointer fa-solid fa-xmark" data-bs-dismiss="modal" aria-label="Close"></i>
            </div>
            <div className="modal-body">
                    <img className="w-100" src={producto.imagen.ruta} alt={producto.imagen.descripcion}/>
                    <p  className="py-2" style={{'whiteSpace': 'pre-line'}}>{producto.descripcion}</p>
                    <div className="d-flex justify-content-between">
                        <p className="price mb-0 ff-kaushan">{numberFormat.format(producto.precio)}</p>
                        <button className="btn" action="add" producto-id={producto.id} onClick={addToCart} data-bs-dismiss="modal"><i className="fa fa-plus"></i></button>
                    </div>
            </div>
        </>
    );
}
export default ModalProductoContent;