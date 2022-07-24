import React from "react";
// class MenuLink extends React.Component {

//     constructor(props){
//         super(props);
//         this.numberFormat = new Intl.NumberFormat('es-CL', {currency: 'CLP', style: 'currency'});
//       }

//     render() {
//         // return  <a className="col-md category-name py-2 mx-2" href={"#"+this.props.seccion.id}>
//         //             {this.props.seccion.nombre}
//         //         </a>;
//         return <div className="col">
//                     <div className="card h-100">
//                         <img className="estilo-img card-img-top" src={this.props.producto.imagen.ruta} alt={this.props.producto.imagen.descripcion}></img>
//                         <div className="card-body">
//                             <h5 className="card-title">{this.props.producto.nombre}</h5>
//                             <p className="card-text">{this.props.producto.descripcion}</p>
//                             <div className="product-price ff-kaushan">{this.numberFormat.format(this.props.producto.precio)}</div> 
//                             {/* cambiar a javascript */}
//                         </div>
//                     </div>
//                 </div>
//     }
// }

function Resultado(props){
    const numberFormat = new Intl.NumberFormat('es-CL', {currency: 'CLP', style: 'currency'});
    const producto = props.producto;
    return (
        <div className="col">
            <div className="card h-100 d-none d-md-block">
                <img className="estilo-img card-img-top" src={producto.imagen.ruta} alt={producto.imagen.descripcion}></img>
                <div className="card-body">
                    <h5 className="card-title">{producto.nombre}</h5>
                    <p className="card-text">
                        {producto.descripcion.substr(0, 40)}
                        {producto.descripcion.length > 40 ? '...' : ''}
                        </p>
                    <div className="product-price ff-kaushan">{numberFormat.format(producto.precio)}</div> 
                    {/* cambiar a javascript */}
                </div>
            </div>
            <div className="card d-md-none">
                <div className="row g-0">
                    <div className="col-6">
                        <img className="estilo-img w-100 h-100" src={producto.imagen.ruta} alt={producto.imagen.descripcion}/>
                    </div>
                    <div className="col">
                        <div className="card-body h-100">
                        <h5 className="card-title align-middle">{producto.nombre}</h5>
                        <p className="card-text">
                            {producto.descripcion.substr(0, 20)}
                            {producto.descripcion.length > 20 ? '...' : ''}
                        </p>
                        <div className="product-price ff-kaushan">{numberFormat.format(producto.precio)}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    );
}

export default Resultado;