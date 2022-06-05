import React from "react";
class MenuLink extends React.Component {

    constructor(props){
        super(props);
        this.numberFormat = new Intl.NumberFormat('es-CL', {currency: 'CLP', style: 'currency'});
      }

    render() {
        // return  <a className="col-md category-name py-2 mx-2" href={"#"+this.props.seccion.id}>
        //             {this.props.seccion.nombre}
        //         </a>;
        return <div className="col">
                    <div className="card h-100">
                        <img className="estilo-img card-img-top" src={this.props.producto.imagen.ruta} alt={this.props.producto.imagen.descripcion}></img>
                        <div className="card-body">
                            <h5 className="card-title">{this.props.producto.nombre}</h5>
                            <p className="card-text">{this.props.producto.descripcion}</p>
                            <div className="product-price ff-kaushan">{this.numberFormat.format(this.props.producto.precio)}</div> 
                            {/* cambiar a javascript */}
                        </div>
                    </div>
                </div>
    }
}

export default MenuLink;