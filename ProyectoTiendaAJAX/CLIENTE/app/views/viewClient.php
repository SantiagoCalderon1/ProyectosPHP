<?php 

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Clientes</title>
    <!-- URL del proyecto ProyectoTiendaAJAX/app/views/viewClient.html -->
  </head>

  <body>
    <header>
      <h1>Mini App Usando AJAX</h1>
    </header>
    <main>
      <div class="container">
        <section class="selectClient">
          <select
            name="selectClient"
            id="selectClient"
            onchange="getClientInfo()"
          >
            <option value="">Seleccione un cliente</option>
          </select>
        </section>
        <section id="clientInfo"></section>
        <section id="formUpdate"></section>
      </div>
    </main>
    <footer>
      <h2>por Santiago Calderón</h2>
    </footer>
  </body>
</html>
