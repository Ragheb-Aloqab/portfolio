<?php

function locale_url($locale) {
    $routeName = \Illuminate\Support\Facades\Route::currentRouteName();
    $params = request()->route()->parameters();
    $params['locale'] = $locale;

    return route($routeName, $params);
}
