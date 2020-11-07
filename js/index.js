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
                renderContacto(response.datos);
                formulario.reset();
                mostrarNotificacion('Contacto agregado con éxito', 'success');
            } catch (error) {
                console.error(error);
            }
        }
    }
}

function renderContacto(data){
    const tableRow = document.createElement('tr');
    const tableBody = document.getElementById('table-body');
    tableRow.classList.add('table-row');
    tableRow.innerHTML = `
        <td class="cell" data-label="Name">${data.nombre}</td>
        <td class="cell" data-label="Organization">${data.empresa}</td>
        <td class="cell" data-label="Telephone">${data.telefono}</td>
        <td class="cell options" data-label="Options">
            <a href="edit.php?id=${data.id}"><i class="fas fa-user-edit"></i></a>
            <button data-id=${data.id}><i class="fas fa-trash-alt"></i></button>
        </td>`;
    tableBody.appendChild(tableRow);
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
            else{
                reject(JSON.parse(xhr.responseText));
            }
        }
        xhr.send(data);
    });

}