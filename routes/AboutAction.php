<?php
namespace Routes;

class AboutAction {
    public static function index () {
        return function ($request, $response, $service) {
            $service->pageTitle = 'Deneme';
            $service->render('views/about.php');
        };
    }
}
