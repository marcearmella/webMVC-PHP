<?php

    require_once 'controllers/template.controller.php';
    require_once 'models/links.model.php';
    require_once "controllers/form.controller.php";
    require_once "models/form.model.php";

    $mvc = new MvcController();
    $mvc -> plantilla();

?>