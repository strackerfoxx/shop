    <div class="campo">
    <label for="nombre">Name:</label>
    <input type="text" id="nombre" name="nombre" placeholder="Name of the product" value="<?php echo s($product->nombre); ?>">
    </div>

    <div class="campo">
    <label for="precio">Price:</label>
    <input type="number" id="precio" name="precio" placeholder="Price of the product" value="<?php echo $product->precio; ?>">
    </div>

    <div class="campo">
    <label for="categoria">Category:</label>
    <input type="text" id="categoria" name="categoria" placeholder="Category of the product" value="<?php echo $product->categoria; ?>">
    </div>

    <div class="campo">
    <label for="imagen">Image:</label>
    <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">
    <?php if($product->imagen){ ?>
        <img src="../image/<?php echo $product->imagen; ?>" class="img-small">
    <?php } ?>
    </div>

    <div class="campo">
    <label for="descripcion">Description:</label>
    <textarea id="descripcion" name="descripcion"><?php echo s($product->descripcion); ?></textarea>
    </div>