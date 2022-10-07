<?php include_once  __DIR__ . '/../templates/header.php'; ?>


<main class="contenedor seccion">
    <h1>administrador</h1>

    <a href="/crear" class="boton boton-verde">Nueva Propiedad</a>

    <h2>Propiedades</h2>
    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>nombre</th>
                <th>categoria</th>
                <th>imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody> <!-- mostrar resultados -->
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo $product->id; ?></td>
                <td><?php echo $product->nombre; ?></td>
                <td><?php echo $product->categoria; ?></td>
                <td><img src="../image/<?php echo $product->imagen; ?>" class="imagen-tabla"></td>
                <td>$<?php echo $product->precio; ?></td>
                <td>
                    <form method="POST" class="w-100" action="/delete" >

                    <input type="hidden" name="id" value="<?php echo $product->id; ?>" />

                        <input type="submit" class="boton-rojo-block" value="Eliminar">
                    </form>
                    <a href="/update?id=<?php echo $product->id;?>
                    "class="boton-amarillo-block">Actualizar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>

<?php include_once  __DIR__ . '/../templates/footer.php'; ?>