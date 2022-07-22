import React from 'react';
import ReactDOM from 'react-dom/client';
import ManejoSuperUsuario from './components/ManejoSuperUsuario';
import ManejoRangosDistancias from './components/ManejoRangosDistancias';

//Se comprueba si existe el aparatado para el manejo de administradores
let root = document.getElementById('setting-app');
if(root) {
    //Se crea el root con el div de administradoresManagement
    root = ReactDOM.createRoot(root);
    //Se guarda el token de csrf
    let csrf_token = document.querySelector('meta[name="csrf-token"]').content;
    //Se renderiza el ManejoSuperUsuario para administradores
    root.render(
        <>
            <ManejoSuperUsuario title="Administradores" userType="administrador" csrf_token={csrf_token}/>
            <ManejoSuperUsuario title="Cajeros" userType="cajero" csrf_token={csrf_token}/>
            <ManejoRangosDistancias csrf_token={csrf_token}/>
        </>
    );


    // //Se toma el formulario
    // let formAdmin = document.getElementById('form-admin');
    // //Se crea un collapse de bootstrap para poder mostrar o colutar el formulario
    // let toggleFormAdmin = new Collapse(formAdmin, {'toggle': false});
    // //Se obtiene el div donde se mostraran los administradores
    // let colAdministradores = document.getElementById('col-administradores');
    // updateSuperUsuarios('/configuracion/obtenerAdministradores', colAdministradores);
    
    // function updateSuperUsuarios (endpoint, documentElement) {
    //     //Se realiza una peticion de los superUsuarios de tipo post con el csrf token
    //     fetch(endpoint,{
    //         method: 'POST',
    //         headers: {
    //             'X-CSRF-TOKEN': csrf_token
    //         }
    //     })
    //     .then(data => {return data.json();})
    //     .then(result => {
    //         //Se crea el root para la visualizacion de los super usuarios
    //         let root = ReactDOM.createRoot(documentElement);
    //         //Se rederiza el resultado de la peticion
    //         root.render(<ListaSuperUsuarios superUsers={result}/>);
    //     })
    //     .catch(err => {console.log(err)});

    // }
}