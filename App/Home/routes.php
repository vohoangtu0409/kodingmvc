<?php
router()->addGet('/',[
    '_controller' => \App\Home\Controllers\IndexController::class,
    '_action'   => 'index',
    '_view' =>  'home::index'
]);

router()->addGet('/{id}',[
    '_controller' => \App\Home\Controllers\IndexController::class,
    '_action'   => 'index',
    '_view' =>  'home::index'
]);