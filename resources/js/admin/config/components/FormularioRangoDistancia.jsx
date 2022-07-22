import React, { useEffect } from 'react';
import { Collapse } from 'bootstrap';

function FormularioRangoDistancia(props){
    let valores = props.valuesForm;
    let errors = props.errors.errors ?? [];
    let collapse;

    useEffect(() => {
        collapse = new Collapse(document.getElementById("form-rango"), {'toggle': false});
    });

    function storage(event){
        event.preventDefault();
        fetch('/configuracion/guardarRangos', {
            method: 'POST',
            headers:{
                'X-CSRF-TOKEN': props.csrf_token,
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify({
                'distancia': valores['distancia'],
                'costo': valores['costo'],
            })
        })
        .then(result => { return result.json() })
        .then(response => {
            console.log(response);
            if(response.errors){
                console.log(response);
                props.setErrors(response);
            }else{
                props.setErrors([]);
                props.setSuccess(response.message);
                props.setIcon(<i className="fa-solid fa-plus"></i>);
                collapse.hide();
            }
            
        })
        .catch(err => { console.log(err) });
    }

    function handleChange(event){
        const target = event.target;
        let nuevosValores = {...valores};
        nuevosValores[target.id] = target.value;
        props.setValuesForm(nuevosValores);
    }


    return (
        <div className="collapse" id="form-rango">
            <form className="my-1 w-100 px-0 row g-2 form-rango" onSubmit={storage}>
                <div className="col-md-6">
                    <div className="input-group flex-nowrap">
                        <div className="form-floating w-100">
                            <input
                                type="number"
                                id="distancia"
                                className={["form-control", (errors.distancia ? 'is-invalid' : '')].join(' ')}
                                onChange={handleChange}
                                value={valores.distancia}
                                placeholder="1000 metros"
                            />
                            <label htmlFor="distancia">Distancia</label>
                        </div>
                        <span className="input-group-text">metros</span>
                    </div>
                </div>
                <div className="col-md-6">
                    <div className="input-group flex-nowrap">
                        <span className="input-group-text">$(CLP)</span>
                        <div className="form-floating w-100">
                            <input
                                type="number"
                                id="costo"
                                className={["form-control", (errors.costo ? 'is-invalid' : '')].join(' ')}
                                onChange={handleChange}
                                value={valores.costo}
                                placeholder="1990"
                            />
                            <label htmlFor="costo">Costo</label>
                        </div>
                    </div>
                </div>
                <div className="col-12 col-md-6 col-lg-3 mx-auto d-grid">
                    <button className="btn btn-primary" type="submit" style={{"height": "3rem"}}>Guardar</button>
                </div>
            </form>
        </div>
    );
}
 export default FormularioRangoDistancia;