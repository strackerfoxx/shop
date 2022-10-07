<?php include_once  __DIR__ . '/../templates/header.php'; ?>
<div class="container-products">  

<?php foreach ($products as $product){ ?>
        <div class="producto">
           <a href="/product?id=<?php echo $product->id; ?>">
           <img src="../image/<?php echo $product->imagen; ?>" alt="image of the headphone" class="proto"></a>
            <div class="mini-desc">
                <p><?php echo $product->nombre; ?></p>
                <p class="price">$ <?php echo $product->precio; ?></p>
                <a href="/product?id=<?php echo $product->id; ?>&categoria=<?php echo $product->categoria; ?>"
                class="boton-amarillo" data-cy='product-boton'>See product</a>

                <form action="/cart" id="formulario" method="POST" name="formulario">
                    <input type="hidden"  name="ref" id="ref" value="<?php echo $product->id; ?>" />
                    <input type="hidden"  name="precio" id="precio" value="<?php echo $product->precio; ?>" />
                    <input type="hidden"  name="titulo" id="titulo" value="<?php echo $product->nombre; ?>" />
                    <input type="hidden"  name="cantidad" id="cantidad" value="1" />
                    <input type="submit"  class="boton-rojo" data-cy='product-boton' value="add to Cart">
                </form>
            </div>
        </div>

<?php } ?>
    </div>
<a href="/listado"><input type="submit" class="boton-B boton-sec" value="see all"></a>