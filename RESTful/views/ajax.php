<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous">
</script>

<body>

    <script>
        // Mostrar todos los productos (GET)
        function obtenerProductos() {
            $.ajax({
                url: '../controller/api.php',
                type: 'GET',
                contentType: 'application/json',
                dataType: '',
                success: function(data) {
                    console.log("Productos obtenidos:", data);

                    let productosHTML = '<table border="1">';
                    productosHTML += '<tr><th>ID</th><th>Nombre</th><th>Descripción</th><th>Precio</th></tr>';

                    data.forEach(function(producto) {
                        productosHTML += `<tr>
                                    <td>${producto.idPed}</td>
                                    <td>${producto.nombre}</td>
                                    <td>${producto.descripcion}</td>
                                    <td>${producto.precio}</td>
                                  </tr>`;
                    });

                    productosHTML += '</table>';
                    $('#productos').html(productosHTML);
                },
                error: function(xhr, status, error) {
                    console.error("Error al obtener productos:", error);
                }
            });
        }

        // Mostrar un producto por ID (GET con filtro)
        function obtenerProductoPorId() {
            const id = prompt('Ingrese el ID del producto');
            if (!id) return alert("Debe ingresar un ID válido.");

            $.ajax({
                url: `../controller/api.php?id=` + id,
                type: 'GET',
                contentType: 'application/json',
                dataType: '',
                success: function(producto) {
                    console.log("Producto obtenido:", producto);

                    let productoHTML = '<table border="1">';
                    productoHTML += '<tr><th>ID</th><th>Nombre</th><th>Descripción</th><th>Precio</th></tr>';
                    productoHTML += `<tr>
                                <td>${producto.idPed}</td>
                                <td>${producto.nombre}</td>
                                <td>${producto.descripcion}</td>
                                <td>${producto.precio}</td>
                              </tr>`;
                    productoHTML += '</table>';
                    $('#producto').html(productoHTML);
                },
                error: function(xhr, status, error) {
                    console.error("Error al obtener producto:", error);
                }
            });
        }

        // Crear un producto (POST)
        function crearProducto() {
            const nombre = prompt("Ingrese el nombre del producto:");
            const descripcion = prompt("Ingrese la descripción del producto:");
            const precio = parseFloat(prompt("Ingrese el precio del producto:"));

            if (!nombre || !descripcion || isNaN(precio)) return alert("Debe ingresar datos válidos.");

            $.ajax({
                url: '../controller/api.php',
                type: 'POST',
                data: JSON.stringify({
                    nombre,
                    descripcion,
                    precio
                }),
                contentType: 'application/json',
                dataType: 'json',
                success: function(data) {
                    console.log("Producto creado:", data);
                    obtenerProductos(); // Refresca la tabla
                },
                error: function(xhr, status, error) {
                    console.error("Error al crear producto:", error);
                }
            });
        }

        // Actualizar todos los datos de un producto (PUT)
        function actualizarProductoCompleto() {
            const id = prompt("Ingrese el ID del producto a actualizar:");
            const nombre = prompt("Ingrese el nuevo nombre:");
            const descripcion = prompt("Ingrese la nueva descripción:");
            const precio = parseFloat(prompt("Ingrese el nuevo precio:"));

            if (!id || !nombre || !descripcion || isNaN(precio)) return alert("Debe ingresar datos válidos.");

            $.ajax({
                url: `../controller/api.php?id=${id}`,
                type: 'PUT',
                data: JSON.stringify({
                    nombre,
                    descripcion,
                    precio
                }),
                contentType: 'application/json',
                dataType: 'json',
                success: function(data) {
                    console.log("Producto actualizado:", data);
                    obtenerProductos(); // Refresca la tabla
                },
                error: function(xhr, status, error) {
                    console.error("Error al actualizar producto:", error);
                }
            });
        }

        // Actualizar parcialmente un producto (PATCH)
        function actualizarProductoParcial() {
            const id = prompt("Ingrese el ID del producto a actualizar:");
            const campo = prompt("¿Qué campo desea actualizar? (nombre, descripcion, precio):");
            const valor = prompt(`Ingrese el nuevo valor para ${campo}:`);

            if (!id || !campo || !valor) return alert("Debe ingresar datos válidos.");

            const data = {};
            data[campo] = campo === 'precio' ? parseFloat(valor) : valor;

            $.ajax({
                url: '../localhostcontroller/api.php?id=${id}',
                type: 'PATCH',
                data: JSON.stringify(data),
                contentType: 'application/json',
                dataType: 'json',
                success: function(data) {
                    console.log("Producto actualizado parcialmente:", data);
                    obtenerProductos(); // Refresca la tabla
                },
                error: function(xhr, status, error) {
                    console.error("Error al actualizar producto parcialmente:", error);
                }
            });
        }

        // Eliminar un producto por ID (DELETE)
        function eliminarProducto() {
            const id = prompt("Ingrese el ID del producto a actualizar:");
            if (!id) return alert("Debe ingresar un ID válido.");

            $.ajax({
                url: `../controller/api.php?id=${id}`,
                type: 'DELETE',
                contentType: 'application/json',
                dataType: '',
                success: function(data) {
                    console.log("Producto eliminado:", data);
                    obtenerProductos(); // Refresca la tabla
                },
                error: function(xhr, status, error) {
                    console.error("Error al eliminar producto:", error);
                }
            });
        }
    </script>

    <!-- Botones para realizar las operaciones -->
    <div>
        <h2>Productos</h2>
        <button onclick="obtenerProductos()">Mostrar Todos los Productos</button>
        <button onclick="obtenerProductoPorId()">Mostrar Producto por ID</button>
        <button onclick="crearProducto()">Crear Producto</button>
        <button onclick="actualizarProductoCompleto()">Actualizar Producto</button>
        <button onclick="actualizarProductoParcial()">Actualizar Parcialmente Producto</button>
        <button onclick="eliminarProducto()">Eliminar Producto</button>
    </div>
    <div id="productos"></div>
    <div id="producto"></div>

</body>

</html>