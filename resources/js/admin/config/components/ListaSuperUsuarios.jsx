import React, {useState, useEffect} from 'react';
import FilaSuperUsuario from './FilaSuperUsuario';

function ListaSuperUsuarios (props) {

    let superUsers = props.superUsers;

    // const [superUsers, setSuperUsers] = useState();

    // useEffect(() => {
    //     console.log('estoy en un super loop?');
    //     fetch('/configuracion/obtenerSuperUsuario',{
    //         method: 'POST',
    //         headers: {
    //             'X-CSRF-TOKEN': props.csrf_token,
    //             'Content-Type': 'application/json'
    //         },
    //         body: JSON.stringify({
    //             'user-type': props.userType
    //         })
    //     })
    //     .then(data => {return data.json();})
    //     .then(result => {props.setSuperUsers(result)})
    //     .catch(err => {console.log(err)});
    // }, [props.success]);

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