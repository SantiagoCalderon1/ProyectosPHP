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
      switch (tabla) {
        case "T1":
          //Cliente
          console.log("accion=" + accion + " | tabla=" + tabla);
          opciones(tabla, accion);
          opcionTablaHidden.value = tabla;
          opcionAccionHidden.value = accion;
          break;
        case "T2":
          //Pedido
          console.log("accion=" + accion + " | tabla=" + tabla);
          opciones(tabla, accion);
          opcionTablaHidden.value = tabla;
          opcionAccionHidden.value = accion;          break;
        case "T3":
          //Producto
          console.log("accion=" + accion + " |tabla=" + tabla);
          opciones(tabla, accion);
          opcionTablaHidden.value = tabla;
          opcionAccionHidden.value = accion;
          break;
      }
      break;
    case "Cancelar":
      console.log("Formulario Cancelado");
      ocultarFormDatos();
      break;
  }
});

function opciones(tabla, opcionesAccion) {
  switch (opcionesAccion) {
    case "A1":
      listarDatos(tabla);
      break;
    case "A2":
      insertarDatos(tabla);
      break;
    case "A3":
      actualizarDatos(tabla);
      break;
    case "A4":
      eliminarDatos(tabla);
      break;
  }
}

function listarDatos(tabla) {
  console.log("Listar datos de la tabla: " + tabla);
  ocultarCamposFormulario(tabla);
}

function insertarDatos(tabla) {
  console.log("Insertar datos en la tabla: " + tabla);
  ocultarCamposFormulario(tabla);
}

function actualizarDatos(tabla) {
  console.log("Actualizar datos en la tabla: " + tabla);
  ocultarCamposFormulario(tabla);
}

function eliminarDatos(tabla) {
  console.log("Eliminar datos de la tabla: " + tabla);
  ocultarCamposFormulario(tabla);
}

function ocultarCamposFormulario(tabla) {
  formDatos.classList.remove("ocultar");
  switch (tabla) {
    case "T1":
      console.log("modificando cliente");
      camposCliente.classList.remove("ocultar");
      break;
    case "T2":
      console.log("modificando pedidos");

      camposPedido.classList.remove("ocultar");
      break;
    case "T3":
      console.log("modificando productos");

      camposProducto.classList.remove("ocultar");
      break;
  }
}

function ocultarFormDatos() {
    formDatos.classList.add('ocultar');
    camposCliente.classList.add("ocultar");
    camposProducto.classList.add("ocultar");
    camposPedido.classList.add("ocultar");
}