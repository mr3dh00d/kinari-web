import React, { useEffect } from 'react';
import {Collapse} from 'bootstrap';
import { lowerCase } from 'lodash';


function FormularioSuperUsuario(props) {
    let values = props.valuesForm;
    let errors = props.errors.errors ?? [];
    let collapse;

    useEffect(()=>{
        collapse = new Collapse(document.getElementById("form-"+props.userType), {'toggle': false});
    });

    function storage(event){
        event.preventDefault();
        fetch('/configuracion/guardarSuperUsuario',{
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': props.csrf_token,
                'Content-Type': 'application/json',
                'X-Requested-With': "XMLHttpRequest"
            },
            body: JSON.stringify({
                'user-type': props.userType,
                'id': values[props.userType+"-id"],
                'nombre': values[props.userType+"-nombre"],
                'correo': values[props.userType+"-correo"],
                'password': values[props.userType+"-password"],
                'password_confirmation': values[props.userType+"-repeat-password"],
            })
        })
        .then(data => {return data.json();})
        .then(result => {
            // console.log(result);
            if(result.errors){
                // console.log('tenemos errores');
                // console.log(result);
                props.setErrors(result);
            }else{
                // console.log('Pos no tenemos errores');
                props.setErrors([]);
                props.setSuperUsers();
                props.setSuccess(result.message);
                props.setIcon(<i className="fa-solid fa-plus"></i>);
                collapse.hide();
            }
        })
        .catch(err => {console.log(err)});
    }

    function handleChange(event){
        const target = event.target;
        const value = target.value;
        const name = target.name;
        let newValues = {...values};
        newValues[name] = value;
        if(name.split('-')[1] == 'nombre' && !newValues.correoDisabled){
            newValues[props.userType+'-correo'] = lowerCase(value.split(' ')[0])+"@kinari.lan";
        }
        props.setValuesForm(newValues);
    }

    return (
        <div className="collapse" id={"form-"+props.userType}>
            <form className="my-1 px-0 row g-2 form-super-user" onSubmit={storage}>
                <input type="text" id={props.userType+"-id"} name={props.userType+"-id"} value={values[props.userType+"-id"]} onChange={handleChange} hidden/>
                <div className="col-12 form-floating">
                    <input 
                        type="text" 
                        className={"form-control"+(errors.nombre ? " is-invalid" : "")}
                        id={props.userType+"-nombre"}
                        name={props.userType+"-nombre"}
                        placeholder="Juan Marchant"
                        value={values[props.userType+"-nombre"]}
                        onChange={handleChange}
                        autoComplete="off"/>
                    <label htmlFor={props.userType+"-nombre"}>Nombre</label>
                    <div className={"invalid-feedback"+(errors.nombre ? " d-block" : "")}>{errors.nombre}</div>
                </div>
                <div className="col-12 form-floating">
                    <input
                        type="email"
                        className={"form-control"+(errors.correo ? " is-invalid" : "")}
                        id={props.userType+"-correo"}
                        name={props.userType+"-correo"}
                        placeholder="name@example.com"
                        value={values[props.userType+"-correo"]}
                        onChange={handleChange}
                        autoComplete="off"
                        disabled={props.valuesForm.correoDisabled} />
                    <label htmlFor={props.userType+"-correo"}>Correo</label>
                    <div className={"invalid-feedback"+(errors.correo ? " d-block" : "")}>{errors.correo}</div>
                </div>
                <div className="col-12 col-md-6">
                    <div className="form-floating">
                        <input
                            type="password"
                            className={"form-control"+(errors.password ? " is-invalid" : "")}
                            id={props.userType+"-password"}
                            name={props.userType+"-password"}
                            value={values[props.userType+"-password"]}
                            onChange={handleChange}
                            placeholder="Password"
                            autoComplete="new-password"/>
                        <label htmlFor={props.userType+"-password"}>Contraseña</label>
                        <div className={"invalid-feedback"+(errors.password ? " d-block" : "")}>{errors.password ? errors.password[0] : "" }</div>
                    </div>
                </div>
                <div className="col-12 col-md-6">
                    <div className="form-floating">
                        <input
                            type="password"
                            className={"form-control"+(errors.password ? " is-invalid" : "")}
                            id={props.userType+"-repeat-password"}
                            name={props.userType+"-repeat-password"}
                            value={values[props.userType+"-repeat-password"]}
                            onChange={handleChange}
                            placeholder="Password"
                            autoComplete="new-password"/>
                        <label htmlFor={props.userType+"-repeat-password"}>Repetir contraseña</label>
                    </div>
                </div>
                <div className="col-12 col-md-6 col-lg-3 mx-auto d-grid">
                    <button className="btn btn-primary" type="submit">Guardar</button>
                </div>
            </form>
        </div>
    );
}


export default FormularioSuperUsuario;