<?php
    if(!isset($_SESSION)){
        session_start();
    }
    $auth = $_SESSION['login'] ?? false;
    $admin = $_SESSION['admin'] ?? 0;
    
?>

<header class="header <?php echo isset( $inicio ) ? 'inicio' : ''; ?>">
        <div class="cabecera">
            <div class="menu1">
                <a href="/" class="logo"><img src="./build/images/STRACKER-LOGO.png" alt="logo"></a>
                <div class="menu2">
                    <p><a href="">SEARCH</a></p>
                        <?php if($auth): ?>
                        <p><a href="/logout">LOGOUT</a></p>
                        <?php endif; ?>
                        <?php if(!$auth): ?>
                            <p><a href="/login">LOGIN</a></p>
                        <?php endif; ?>
                    <?php if($admin == 1 ){ ?>
                        <h4><a href="/admin">admin</a></h4>
                    <?php } ?>
                    <a href="/cart"><img src="../build/images/shopping-cart.png" class="cart-icon"></a>
                </div>
            </div>               
            
            <nav class="navbar">
                <a href="/listado" class="categories">shop</a>
                <a href="/category?category=premium" class="categories">premium</a>
                <a href="/category?category=gamer" class="categories">gamer</a>
                <a href="/category?category=big" class="categories">big</a>
                <a href="/about" class="categories">about us</a>
            </nav>
        </div>
    </header>