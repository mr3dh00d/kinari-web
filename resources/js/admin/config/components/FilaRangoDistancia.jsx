import React from 'react';
import {Collapse} from 'bootstrap';

function FilaRangoDistancia(props){
    let rango = props.rango
    function setValues(){
        let collapse = new Collapse(document.getElementById("form-rango"), {'toggle': false});
        props.setIcon(<i className="fa-solid fa-minus"></i>);
        props.setValuesForm({
            'distancia': rango.distancia,
            'costo': rango.costo
        });
        props.setSuccess(false);
        collapse.show();
    }
    function deleteRango(){
        let option = confirm("¿Estás seguro que deseas eliminar este rango de distancia?");
        props.setSuccess(false);
        // props.setErrors({});
        if(option){
            fetch('/configuracion/eliminarRangos', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': props.csrf_token,
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({
                    'id': rango.id
                })
            })
            .then(result => { return result.json() })
            .then(response => {
                // console.log(response)
                props.setSuccess(response.message);
            })
            .catch(err => {console.log(err)});
        }
    }
    return (
        <li className="row d-flex list-group-item">
            <div className="col-12 col-sm-4">
                {rango.distancia} metros
            </div>
            <div className="col-12 col-sm">
                {new Intl.NumberFormat('es-CL', {currency: 'CLP', style: 'currency'}).format(rango.costo)}
            </div>
            <div className="col-auto">
                <button
                    type="button"
                    className="btn btn-green btn-circle btn-sm"
                    onClick={setValues}>
                    <i className="fa-solid fa-pencil"></i>
                </button>
            </div>
            <div className="col-auto">
                <button
                    type="submit"
                    className="btn btn-danger btn-circle btn-sm"
                    onClick={deleteRango}>
                    <i className="fa-solid fa-trash"></i>
                </button>
            </div>
        </li>
    );
}

export default FilaRangoDistancia;