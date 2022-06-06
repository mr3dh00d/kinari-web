import React from 'react';
import {Collapse} from 'bootstrap';

function FilaSuperUsuario (props){
    let superUser = props.superUser;
    let collapse = new Collapse(document.getElementById("form-"+props.userType), {'toggle': false});
    return(
        <li className="row d-flex list-group-item">
            <div className="col-12 col-sm-4">
                {superUser.name}
            </div>
            <div className="col-12 col-sm">
                {superUser.email}
            </div>
            <div className="col-auto">
                <button type="button" className="btn btn-green btn-circle btn-sm" onClick={setValuesSuperUser}>
                    <i className="fa-solid fa-pencil"></i>
                </button>
            </div>
            <div className="col-auto">
                <button type="submit" className="btn btn-danger btn-circle btn-sm" onClick={deleteSuperUser}>
                    <i className="fa-solid fa-trash"></i>
                </button>
            </div>
        </li>
    );
    function setValuesSuperUser(){
        props.setIcon(<i className="fa-solid fa-minus"></i>);
        props.setValuesForm({
            [props.userType+"-id"]: superUser.id,
            [props.userType+"-nombre"]: superUser.name,
            [props.userType+"-correo"]: superUser.email,
            [props.userType+"-password"]: '',
            [props.userType+"-repeat-password"]: '',
            correoDisabled: true,
        });
        props.setSuccess(false);
        collapse.show();
    }
    function deleteSuperUser(event){
        let option = confirm("Estas seguro de que quieres el usuario "+props.superUser.name+"?");
        props.setSuccess(false);
        props.setErrors([]);
        // if(props.qtyOfSuperUsers == 1){
        //     props.setErrors({
        //         'errors': true,
        //         'message': 'Debe haber almenos 1 usuario del tipo '+props.userType
        //     });
        // }
        if(option){
            fetch('/configuracion/eliminarSuperUsuario',{
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': props.csrf_token,
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({
                    'user-type': props.userType,
                    'id': superUser.id
                })
            })
            .then(data => {return data.json();})
            .then(result => {
                // console.log(result);
                if(result.errors){
                    props.setErrors(result);
                }else{
                    props.setSuccess(result.message);
                }
                // props.setIcon(<i className="fa-solid fa-plus"></i>);
                // collapse.hide();  
            })
            .catch(err => {console.log(err)});
        }
    }
}


export default FilaSuperUsuario;