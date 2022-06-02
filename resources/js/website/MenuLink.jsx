import React from "react";
class MenuLink extends React.Component {

    render() {
        return  <a className="col-md category-name py-2 mx-2" href={"#"+this.props.seccion.id}>
                    {this.props.seccion.nombre}
                </a>;
    }
}

export default MenuLink;