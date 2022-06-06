import React, {useState, useEffect} from 'react';
import ListaSuperUsuarios from './ListaSuperUsuarios';
import FormularioSuperUsuario from './FormularioSuperUsuario';
import { Collapse } from 'bootstrap';


function ManejoSuperUsuario (props) {
    let iconPlus = <i className="fa-solid fa-plus"></i>;
    let iconMinus = <i className="fa-solid fa-minus"></i>;
    let defaultValuesForm = {
        [props.userType+"-id"]: '',
        [props.userType+"-nombre"]: '',
        [props.userType+"-correo"]: '',
        [props.userType+"-password"]: '',
        [props.userType+"-repeat-password"]: '',
        correoDisabled: false,
    };
    
    const [icon, setIcon] = useState(iconPlus);
    const [errors, setErrors] = useState({})
    const [superUsers, setSuperUsers] = useState();
    const [success, setSuccess] = useState(false);
    const [valuesForm, setValuesForm] = useState(defaultValuesForm);
    // const [collapseFormSuperUser, setCollapseFormSuperUser] = useState();
    let collapseFormSuperUser;
    // const [superUsers, setSuperUsers] = useState();
    useEffect(() => {
        collapseFormSuperUser = new Collapse(document.getElementById("form-"+props.userType), {'toggle': false});
    });

    useEffect(() => {
        // console.log('estoy en un super loop?');
        fetch('/configuracion/obtenerSuperUsuario',{
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': props.csrf_token,
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                'user-type': props.userType
            })
        })
        .then(data => {return data.json();})
        .then(result => {setSuperUsers(result)})
        .catch(err => {console.log(err)});
    }, [success]);
    
    function clickButton(e){
        if(icon.props.className == iconPlus.props.className){
            setIcon(iconMinus);
            setValuesForm(defaultValuesForm);
            setSuccess(false);
            // let inputId = document.getElementById(props.userType+"-id");
            // let inputNombre = document.getElementById(props.userType+"-nombre");
            // let inputCorreo = document.getElementById(props.userType+"-correo");

            // inputId.value = '';
            // inputNombre.value = '';
            // inputCorreo.value = '';

            // inputCorreo.disabled = false;

        }else{
            setIcon(iconPlus);
        }
        setErrors([]);
        collapseFormSuperUser.toggle();
    }


    // if(valuesFrom.correoDisabled){
    //     return <h1>caca</h1>;
    // }

    return (
        <div className="row mb-3" id={props.userType+"Management"}>
            <div className="card rounded-0 container">
                <div className="card-header row">
                    <h4 className="m-auto col"><i className="fa-solid fa-user-tie"></i> {props.title}</h4>
                    <button className="btn btn-primary btn-circle col-auto" type="button" onClick={clickButton} id={"btn-add-"+props.userType}>
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
                    <FormularioSuperUsuario
                        userType={props.userType}
                        csrf_token={props.csrf_token} 
                        valuesForm={valuesForm} 
                        setValuesForm={setValuesForm} 
                        errors={errors} 
                        setIcon={setIcon}
                        setErrors={setErrors}
                        setSuperUsers={setSuperUsers}
                        setSuccess={setSuccess}/>
                    <ListaSuperUsuarios 
                        userType={props.userType}
                        csrf_token={props.csrf_token}
                        superUsers={superUsers}
                        success={success}
                        setIcon={setIcon}
                        setErrors={setErrors}
                        setValuesForm={setValuesForm}
                        setSuperUsers={setSuperUsers}
                        setSuccess={setSuccess}/>
                </div>
            </div>
        </div>
    );

}

export default ManejoSuperUsuario;

