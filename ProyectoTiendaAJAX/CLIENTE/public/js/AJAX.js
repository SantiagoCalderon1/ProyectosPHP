// document.addEventListener('DOMContentLoaded', () => {
//     const selectClient = document.getElementById('selectClient');

//     // Hacer la solicitud AJAX
//     fetch('../controllers/controllerClient.php', {
//         method: 'POST',
//         headers: {
//             'Content-Type': 'application/x-www-form-urlencoded',
//         },
//         body: new URLSearchParams({ action: 'getClients' }).toString(), // Agregar un action en el POST
//     })
//         .then(response => {
//             if (!response.ok) {
//                 throw new Error('Error en la red. Código: ' + response.status);
//             }
//             return response.json();
//         })
//         .then(data => {
//             data.forEach(client => {
//                 let option = document.createElement('option');
//                 option.value = client.clienteId;
//                 option.textContent = `${client.nombre} ${client.apellidos}`;
//                 selectClient.appendChild(option);
//             });
//         })
//         .catch(error => console.error('Error en la solicitud:', error));
// });

document.addEventListener("DOMContentLoaded", () => {
    const selectClient = document.getElementById("selectClient");
    getClients();
    // Hacer la solicitud AJAX
    // fetch('../controllers/controllerClient.php?action=getClients', {
    //     method: 'GET'
    // })
    //     .then(response => {
    //         if (!response.ok) {
    //             throw new Error('Error en la red. Código: ' + response.status);
    //         }
    //         return response.json();
    //     })
    //     .then(data => {
    //         data.forEach(client => {
    //             let option = document.createElement('option');
    //             option.value = client.clienteId;
    //             option.textContent = `${client.nombre} ${client.apellidos}`;
    //             selectClient.appendChild(option);
    //         });
    //     })
    //     .catch(error => console.error('Error en la solicitud:', error));
});

// function showInfoClient() {
//     const selectClientId = document.getElementById('selectClient').value;
//
//     if (!selectClientId) {
//         alert('Por favor, selecciona un cliente.');
//         return;
//     }
//     // Hacer la solicitud AJAX
//     fetch(`../controllers/controllerClient.php?action=getClient&id=${selectClientId}`, {
//         method: 'GET'
//     })
//         .then(response => {
//             if (!response.ok) {
//                 throw new Error('Error en la red. Código: ' + response.status);
//             }
//             return response.json();
//         })
//         .then(client => {
//             createTableInfoClient(client);
//         })
//         .catch(error => {
//             document.getElementById('clientInfo').innerHTML =
//                 '<p style="color: red;">Hubo un error al cargar los datos del cliente. Inténtalo nuevamente.</p>';
//             console.error('Error en la solicitud:', error);
//         });
// }

function createTableInfoClient(client) {
    document.getElementById(
        "clientInfo"
    ).innerHTML = `<h2>Información del cliente</h2>
              <table>
                  <tr>
                      <th>Id</th>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Opciones</th>
                  </tr>
                  <tr>
                      <td>${client.clienteId}</td>
                      <td>${client.nombre}</td>
                      <td>${client.apellidos}</td>
                      <td>
                          <button onclick="updateClient(${client.clienteId})">Editar</button>
                          <button onclick="deleteClient(${client.clienteId})">Eliminar</button>
                      </td>
                  </tr>
              </table>`;
}

function getClients() {
    let peticion = new XMLHttpRequest();
    peticion.open(
        "GET",
        "../controllers/controllerClient.php?action=getClients",
        true
    );
    peticion.onreadystatechange = function () {
        if (peticion.readyState == 4 && peticion.status == 200) {
            console.log("Peticion enviada");
            let clients = JSON.parse(peticion.responseText);
            clients.forEach((client) => {
                let option = document.createElement("option");
                option.value = client.clienteId;
                option.textContent = `${client.nombre} ${client.apellidos}`;
                selectClient.appendChild(option);
            });
        }
    };
    peticion.send();
}

function getClientInfo() {
    let peticion = new XMLHttpRequest();
    let id = document.getElementById("selectClient").value;
    peticion.open(
        "GET",
        "../controllers/controllerClient.php?action=getClient&id=" + id,
        true
    );
    peticion.onreadystatechange = function () {
        if (peticion.readyState == 4 && peticion.status == 200) {
            createTableInfoClient(JSON.parse(peticion.responseText));
        }
    };
    peticion.send();
    document.getElementById("formUpdate").innerHTML = "";
}

function updateClient(clienteId) {
    let peticion = new XMLHttpRequest();
    peticion.open(
        "GET",
        "../controllers/controllerClient.php?action=getClient&id=" +
        clienteId,
        true
    );
    peticion.onreadystatechange = function () {
        if (peticion.readyState == 4 && peticion.status == 200) {
            createFormUpdate(JSON.parse(peticion.responseText));
        }
    };
    peticion.send();
}

function createFormUpdate(client) {
    document.getElementById(
        "formUpdate"
    ).innerHTML = `<form method="" id="formUpdateClient" onsubmit="updateFormClient()">
                  <label for="id">Id: </label>
                  <input type="text" id="id" name="id" value="${client.clienteId}" readonly>
                  <br>
                  <label for="nombre">Nombre: </label>
                  <input type="text" id="nombre" name="nombre" value="${client.nombre}" required>
                  <br>
                  <label for="apellidos">Apellidos</label>
                  <input type="text" id="apellidos" name="apellidos" value="${client.apellidos}" required>
                  <br>
                  <input type="submit" value="Aceptar">
                  <button onclick="cleanView()">Cancelar</button>
              </form>`;
}

function updateFormClient() {
    document.getElementById("formUpdateClient").preventDefault();
    let peticion = new XMLHttpRequest();

    peticion.open(
        "POST",
        "../controllers/controllerClient.php?action=updateClient",
        true
    );

    xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

    let object = {
        id: document.getElementById("id"),
        nombre: document.getElementById("nombre"),
        apellidos: document.getElementById("apellidos"),
    };

    if (peticion.readyState == 4 && peticion.status == 200) {
        alert('cliente enviado.');
    }

    peticion.send(JSON.stringify(object));
}

function cleanView() {
    document.getElementById("formUpdate").innerHTML = "";
    document.getElementById("formUpdate").innerHTML = "";
}