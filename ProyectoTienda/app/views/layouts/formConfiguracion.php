<div id="formBox">
    <form action="../app/controllers/controller.php" method="post" id="formConfiguracion">
        <label for="opcionesTabla">Opciones  de tablas:</label>
        <select name="opcionesTabla" id="opcionesTabla">
            <option value="T1" disabled>Cliente</option>
            <option value="T2" disabled>Pedido</option>
            <option value="T3">Producto</option>
        </select>
        <div id="btns">
            <input type="submit" value="Aceptar">
            <input type="submit" value="Cancelar" disabled>
        </div>
        <!-- He desactivado algunas opciones, que después integraré con sus respectivas funciones,
         esta es una versión muy básica de lo que quiero hacer. -->
    </form>
</div> 