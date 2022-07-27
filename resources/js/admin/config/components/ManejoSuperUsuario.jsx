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
    let collapseFormSuperUser;
    
    useEffect(() => {
        collapseFormSuperUser = new Collapse(document.getElementById("form-"+props.userType), {'toggle': false});
    });

    useEffect(() => {
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
        }else{
            setIcon(iconPlus);
        }
        setErrors([]);
        collapseFormSuperUser.toggle();
    }

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

