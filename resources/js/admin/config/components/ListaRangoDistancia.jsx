import React from 'react';
import FilaRangoDistancia from './FilaRangoDistancia';

function ListaRangoDistancia(props){

    if(props.rangos){
        let rangos = props.rangos;

        let result = [(
            <li key={0} className="row d-flex list-group-item list-group-item-secondary">
                <div className="col-12 col-sm-4 fw-bold">
                    Distancia (metros)
                </div>
                <div className="col-12 col-sm fw-bold">
                    Costo
                </div>
            </li>
        )];
        if(!(rangos.length > 0)){
            result.push(
                <li key={1} className="row d-flex list-group-item">
                    <div className="col-12 text-center">
                        {"No hay rangos de distancia :("}
                    </div>
                </li>
            );   
        }

        rangos.forEach((rango, key) => {
            result.push(
                <FilaRangoDistancia
                    key={key+1}
                    csrf_token={props.csrf_token}
                    rango={rango}
                    setValuesForm={props.setValuesForm}
                    setIcon={props.setIcon}
                    setSuccess={props.setSuccess}
                />
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

export default ListaRangoDistancia;