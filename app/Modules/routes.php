<?php

$namespace = 'App\Modules';

Route::group([
    'middleware' => 'cors'
], function () {
    // require routes of modules
    require base_path("app/Modules/V1/Authentication/routes.php");
});
