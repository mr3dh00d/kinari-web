import React from "react";

function Resultado(props){
    const numberFormat = new Intl.NumberFormat('es-CL', {currency: 'CLP', style: 'currency'});
    const producto = props.producto;
    return (
        <div className="col">
            <div className="card">
                <div className="row g-0">
                    <div className="col-6 col-md-12">
                        <img className="estilo-img w-100 h-100" src={producto.imagen.ruta} alt={producto.imagen.descripcion}/>
                    </div>
                    <div className="col-6 col-md-12">
                        <div className="card-body h-100">
                        <h5 className="card-title align-middle">{producto.nombre}</h5>
                        <div className={["d-flex", (producto.descripcion.length > 30 ? 'descripcion': '')].join(" ")}>
                            <p className="card-text mb-2">
                                {producto.descripcion.substr(0, 30)}
                            </p>
                        </div>
                        <div className="product-price ff-kaushan">{numberFormat.format(producto.precio)}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    );
}

export default Resultado;