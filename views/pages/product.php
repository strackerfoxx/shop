<?php include_once  __DIR__ . '/../templates/header.php'; ?>

<div class="product">
    <img src="../image/<?php echo $product->imagen; ?>" alt="image of the headphone" class="img">
    <div class="name-desc">
        <h3><?php echo $product->nombre; ?></h3>
        <p><?php echo $product->descripcion; ?></p>
        <p class="price">Precio: $<?php echo $product->precio; ?></p>
    </div>
    <div class="final">
        <p class="price">$ <?php echo $product->precio; ?></p>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil reprehenderit consectetur</p>


        <a href="/cart/add?id=<?php echo $product->id; ?>" class="boton-verde" data-cy='product-boton'>add to Cart</a>
    </div>
    
</div>

<?php include_once  __DIR__ . '/../templates/footer.php'; ?>