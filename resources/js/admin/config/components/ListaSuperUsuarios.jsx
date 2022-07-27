import React from 'react';
import FilaSuperUsuario from './FilaSuperUsuario';

function ListaSuperUsuarios (props) {

    let superUsers = props.superUsers;

    if(superUsers){
        let result = [
            <li key={0} className="row d-flex list-group-item list-group-item-secondary">
                <div className="col-12 col-sm-4 fw-bold">
                    Nombre
                    </div>
                <div className="col-12 col-sm fw-bold">
                    Correo
                </div>
            </li>
        ];

        if(!(superUsers.length > 0)){
            result.push(
                <li key={1} className="row d-flex list-group-item">
                    <div className="col-12 text-center">
                        No hay usuarios del tipo {props.userType} :(
                    </div>
                </li>
            );
        }
    
        superUsers.forEach((superUser, key) => {
            result.push(
                <FilaSuperUsuario
                    key={key+1}
                    csrf_token={props.csrf_token}
                    userType={props.userType}
                    superUser={superUser}
                    qtyOfSuperUsers={superUsers.length}
                    setIcon={props.setIcon}
                    setErrors={props.setErrors}
                    setValuesForm={props.setValuesForm}
                    setSuccess={props.setSuccess}/>
            );
        });
    
        return(
            <div className="col">
                {result}
            </div>
        );
    }

    return (
        <div className="col-auto mx-auto">
            <div className="fs-3">
                <i className="fa-solid fa-spinner animated-loading"></i> Cargando...
            </div>
        </div>
    );

}

export default ListaSuperUsuarios;