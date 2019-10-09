<?php

$namespace = 'App\Modules';

Route::group([
    'middleware' => 'cors'
], function () {
    // require routes of modules
    require base_path("app/Modules/V1/Authentication/routes.php");
    require base_path("app/Modules/V1/Event/routes.php");
    require base_path("app/Modules/V1/Item/routes.php");
    require base_path("app/Modules/V1/Cause/routes.php");
    require base_path("app/Modules/V1/Category/routes.php");
    require base_path("app/Modules/V1/Charity/routes.php");

});
