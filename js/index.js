const formulario = document.querySelector('#form');
const url = 'includes/modelos/modelos-contacto.php';
// Iniciar los escuchadores de eventos
eventListeners();

function eventListeners(){
    formulario.addEventListener('submit', validarFormulario);
}
async function validarFormulario(e){
    e.preventDefault();
    const nombre = document.querySelector('#name').value;
    const empresa = document.querySelector('#organization').value;
    const telefono = document.querySelector('#telephone').value;
    if(nombre ==='' || empresa ==='' || telefono === '')
        mostrarNotificacion('Todos los campos son obligatorios','error');
    else{
        const accion = document.querySelector('#accion').value;
        const data = new FormData();
        data.append('nombre',nombre);
        data.append('empresa',empresa);
        data.append('telefono', telefono);
        data.append('accion',accion);
        if(accion === 'crear'){
            try {
                const response = await insertarBD(data,url);
                console.log(response);
            } catch (error) {
                console.error(error);
            }
        }
            
    }
}

function mostrarNotificacion(mensaje, clase){
    const div = document.createElement('div');
    div.textContent = mensaje;
    div.classList.add('notificacion','shadow',clase);
    formulario.insertBefore(div, document.querySelector('h2'));
    setTimeout(()=>{
        div.remove();
    }, 3000);
}
function insertarBD(data,url){
    return new Promise((resolve, reject)=>{
        const xhr = new XMLHttpRequest();
        xhr.open('POST', url, true);
    
        // onload: es la función que se llama cuando una transacción del XMLHttpRequest es ejecutada correctamente
        xhr.onload = function(){
            if(this.status === 200)
                resolve(JSON.parse(xhr.responseText));
            else
                reject(JSON.parse(xhr.responseText));
        }
        xhr.send(data);
    });

}