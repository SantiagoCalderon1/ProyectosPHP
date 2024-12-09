//Santiago Calderon Castaño

/** Terminos
 * T1 = Clientes
 * T2 = Pedidos
 * T3 = Productos
 *
 * A1 = Listar Datos
 * A2 = Insertar Datos
 * A3 = Actualizar Datos
 * A4 = Eliminar Datos
 */

const formConfiguracion = document.getElementById("formConfiguracion");
const formDatos = document.getElementById("formDatos");

const camposCliente = document.getElementById("camposCliente");
const camposPedido = document.getElementById("camposPedido");
const camposProducto = document.getElementById("camposProducto");
const campoEnviar = document.getElementById("campoEnviar");

const campoNotificaciones = document.getElementById("notificaciones");

const opcionTablaHidden = document.getElementById("opcionTablaHidden");
const opcionAccionHidden = document.getElementById("opcionAccionHidden");

//Eventos globales
formConfiguracion.addEventListener("submit", function (event) {
  event.preventDefault();
  console.log("Formulario prevenido");

  switch (event.submitter.value) {
    case "Aceptar":
      console.log("Formulario aceptado");
      let tabla = document.getElementById("opcionesTabla").value;
      let accion = document.getElementById("opcionesAccion").value;

      opcionTablaHidden.value = tabla;
      opcionAccionHidden.value = accion;

      campoNotificaciones.innerHTML = "";

      ocultarFormDatos();
      ocultarCamposFormulario(tabla);          
      console.log("accion=" + accion + " | tabla=" + tabla);

      break;
    case "Cancelar":
      console.log("Formulario Cancelado");
      formDatos.classList.add("ocultar");
      campoNotificaciones.innerHTML = "";
      break;
  }
});

function ocultarCamposFormulario(tabla) {
  ocultarFormDatos();
  formDatos.classList.remove("ocultar");
  campoEnviar.classList.remove("ocultar");

  switch (tabla) {
    case "T1":
      camposCliente.classList.remove("ocultar");
      break;
    case "T2":
      camposPedido.classList.remove("ocultar");
      break;
    case "T3":
      camposProducto.classList.remove("ocultar");
      break;
  }
}

function ocultarFormDatos() {
  camposCliente.classList.add("ocultar");
  camposPedido.classList.add("ocultar");
  camposProducto.classList.add("ocultar");
  campoEnviar.classList.add("ocultar");
}
