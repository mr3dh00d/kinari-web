import React, { useState, useEffect } from 'react';
import ListaRangoDistancia from './ListaRangoDistancia';
import FormularioRangoDistancia from './FormularioRangoDistancia';
import { Collapse } from 'bootstrap';


function ManejoRangosDistancias(props){
    let defaultValuesForm = {
        'distancia': '',
        'costo': ''
    };
    let iconPlus = <i className="fa-solid fa-plus"></i>;
    let iconMinus = <i className="fa-solid fa-minus"></i>;
    const [icon, setIcon] = useState(iconPlus);
    const [errors, setErrors] = useState({})
    const [rangos, setRangos] = useState([]);
    const [success, setSuccess] = useState(false);
    const [valuesForm, setValuesForm] = useState(defaultValuesForm);
    let collapseForm

    useEffect(() => {
        collapseForm = new Collapse(document.getElementById("form-rango"), {'toggle': false});
    });

    useEffect(() => {
        fetch('/configuracion/obtenerRangos', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': props.csrf_token,
                'Content-Type': 'application/json'
            }
        }).then(response => {return response.json()})
        .then(result => {setRangos(result)})
        .catch(err => {console.log(err)});
    }, [success]);

    function clickButton(e){
        if(icon.props.className == iconPlus.props.className){
            setIcon(iconMinus);
            setValuesForm(defaultValuesForm);
            setSuccess(false);
        }else{
            setIcon(iconPlus);
        }
        setErrors([]);
        collapseForm.toggle();
    }

    return (
        <div className="row mb-3" id="ManagementRangosDistancias">
        <div className="card rounded-0 container">
            <div className="card-header row">
                <h4 className="m-auto col"><i className="fa-solid fa-motorcycle"></i> Rangos de Distancias</h4>
                <button className="btn btn-primary btn-circle col-auto" type="button" onClick={clickButton}>
                    {icon}
                </button>
            </div>
            <div className="card-body row">
                <div className={"alert alert-success align-items-center"+(success ? " d-flex" : " d-none")} role="alert">
                    <i className="fa-solid fa-circle-check me-2"></i>{success}
                </div>
                <div className={"alert alert-danger align-items-center"+(errors.message ? " d-flex" : " d-none")} role="alert">
                    <i className="fa-solid fa-circle-xmark me-2"></i>{errors.message}
                </div>
                <FormularioRangoDistancia
                    csrf_token={props.csrf_token}
                    valuesForm={valuesForm} 
                    setValuesForm={setValuesForm}
                    errors={errors}
                    setErrors={setErrors}
                    setSuccess={setSuccess}
                    setIcon={setIcon}/>
                <ListaRangoDistancia
                    csrf_token={props.csrf_token}
                    rangos={rangos}
                    setValuesForm={setValuesForm}
                    setIcon={setIcon}
                    setSuccess={setSuccess}/>
            </div>
        </div>
    </div>
    );

}

export default ManejoRangosDistancias;