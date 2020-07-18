<?php
    use \Core\Routing;
    use \Controllers\IndexController;
    use \Controllers\AboutController;
    use Controllers\CartController;
    use \Controllers\ContactController;
    use \Controllers\LoginController;
    use \Controllers\RegisterController;
    use \Controllers\StoreController;
    use \Controllers\Http404Controller;
    use \Controllers\ProductController;
    use \Controllers\LogoutController;
    use Controllers\OrderController;

//Routing
    Routing::url('/^$/i', new IndexController() );
    Routing::url('/^\/about$/i', new AboutController() );
    Routing::url('/^\/contact$/i', new ContactController() );
    Routing::url('/^\/store$/i', new StoreController() );
    Routing::url('/^\/cart/i', new CartController());
    Routing::url('/^\/orders/i', new OrderController());
    Routing::url('/^\/store\/[0-9]*/i', new ProductController());
    Routing::url('/^\/logout$/', new LogoutController());
    Routing::url('/^\/login$/', new LoginController());
    Routing::url('/^\/register$/', new RegisterController());
    Routing::url('/.*/',new Http404Controller());
?>