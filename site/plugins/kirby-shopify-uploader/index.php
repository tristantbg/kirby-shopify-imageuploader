<?php

@include_once __DIR__ . '/vendor/autoload.php';

@include_once __DIR__ . '/src/KirbyShopify.php';

@include_once __DIR__ . '/src/models/shopify.products.php';
@include_once __DIR__ . '/src/models/shopify.product.php';

Kirby::plugin('tristanb/kirby-shopify', [
    'options' => [
      'cache.api' => true
    ],
    'pageModels' => [
        'shopify.products' => 'ShopifyProductsPage',
        'shopify.product' => 'ShopifyProductPage',
    ],
    'blueprints' => [
        'pages/shopify.products' => __DIR__ . '/src/blueprints/shopify.products.yml',
        'pages/shopify.product' => __DIR__ . '/src/blueprints/shopify.product.yml'
    ],
    'routes' => [
      [
        'pattern' => 'kirby-shopify/api/cache/clear',
        'method' => 'POST',
        'action'  => function () {
          \KirbyShopify\App::clearCache();
          \KirbyShopify\App::clearKirbyCache();
          return 'Cache cleared';
        }
      ]
    ],
    'hooks' => [
        'page.update:after' => function ($newPage, $oldPage) {
            \KirbyShopify\App::uploadImagesToProduct($newPage);
        }
    ]
]);
