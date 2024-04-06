<?php

function setActive($routes) {
    if(is_array($routes)) {
        foreach($routes as $route) {
            if(request()->routeIs($route)) {
                return 'active';
            }
        }
    }
}