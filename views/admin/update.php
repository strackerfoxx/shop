<div class="contenedor login">
    <div class="contenedor-sm">
        <h2>UPDATE</h2>
        <p class="descripcion-pagina">create a product</p>
        
    <a href="/admin" class="boton-B boton-verde">Volver</a>

    <?php include_once __DIR__ . '/../templates/alertas.php'; ?>

        <form method="POST" class="formulario" novalidate enctype="multipart/form-data">

            <?php include __DIR__ . '/formulario_product.php'; ?>

        <input type="submit" class="boton-B boton-amarillo" value="update product">
        </form>

    </div>
</div>