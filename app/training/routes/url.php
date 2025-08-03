<?php
// Example: https://127.0.0.1.com/xss2/
// Instead of subdomain, we take the first part of the path
$path = trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), '/');
$parts = explode('/', $path);
$module = isset($parts[0]) && $parts[0] !== '' ? $parts[0] : 'www';

$valid_modules = array(
    'www'      => 1,
    'xss'      => 1,
    'xss2'     => 1,
    'xss3'     => 1,
    'xss4'     => 1,
    'or1'      => 1,
    'or2'      => 1,
    'csrf'     => 1,
    'idor'     => 1,
    'lfi'      => 1,
    'sqli'     => 1,
    'sqli2'    => 1,
    'ssrf'     => 1,
    'ssrf2'    => 1,
    'ssrf3'    => 1,
    'ssrf4'    => 1,
    'ssrf5'    => 1,
    'ssrf6'    => 1,
    'ssrf7'    => 1,
    'xxe'      => 1,
    'xxe2'     => 1,
    'upload'   => 1,
    'upload2'  => 1,
    'rce'      => 1,
    'rce2'     => 1,
    'rce3'     => 1,
);

\Controller\Home::$modules = $valid_modules;

if (isset($valid_modules[$module])) {
    if ($module == 'rce') {
        Route::add(['GET', 'POST'], "/$module", 'RCE@lesson1');
        Route::add(['GET', 'POST'], "/$module/stock-check", 'RCE@lesson1StockCheck');
        Route::add(['GET', 'POST'], "/$module/stock", 'RCE@lesson1Stock');
    }

    if ($module == 'rce2') {
        Route::add(['GET', 'POST'], "/$module", 'RCE@lesson2');
    }

    if ($module == 'rce3') {
        Route::add(['GET', 'POST'], "/$module", 'RCE@lesson3');
        Route::add(['GET', 'POST'], "/$module/comment/[int]", 'RCE@lesson3comment');
    }

    if ($module == 'xss') {
        Route::add(['GET', 'POST'], "/$module", 'XSS@lesson1');
    }

    if ($module == 'xss2') {
        Route::add(['GET', 'POST'], "/$module", 'XSS@lesson2');
    }

    if ($module == 'xss3') {
        Route::add(['GET', 'POST'], "/$module", 'XSS@lesson3');
    }

    if ($module == 'xss4') {
        Route::add(['GET', 'POST'], "/$module", 'XSS@lesson4');
    }

    if ($module == 'or1') {
        Route::add(['GET', 'POST'], "/$module", 'OpenRedirect@lesson1');
    }

    if ($module == 'or2') {
        Route::add(['GET', 'POST'], "/$module", 'OpenRedirect@lesson2');
    }

    if ($module == 'ssrf') {
        Route::add(['GET', 'POST'], "/$module", 'SSRF@lesson1');
    }

    if ($module == 'ssrf2') {
        Route::add(['GET', 'POST'], "/$module", 'SSRF@lesson2');
    }

    if ($module == 'ssrf3') {
        Route::add(['GET', 'POST'], "/$module", 'SSRF@lesson3');
    }

    if ($module == 'ssrf4') {
        Route::add(['GET', 'POST'], "/$module", 'SSRF@lesson4');
    }

    if ($module == 'ssrf5') {
        Route::add(['GET', 'POST'], "/$module", 'SSRF@lesson5');
    }

    if ($module == 'ssrf6') {
        Route::add(['GET', 'POST'], "/$module", 'SSRF@lesson6');
    }

    if ($module == 'ssrf7') {
        Route::add(['GET', 'POST'], "/$module", 'SSRF@lesson7');
    }

    if ($module == 'lfi') {
        Route::add(['GET', 'POST'], "/$module", 'LFI@lesson1');
        Route::add(['GET', 'POST'], "/$module/image", 'LFI@image');
    }

    if ($module == 'csrf') {
        Route::add(['GET', 'POST'], "/$module", 'CSRF@home');
        Route::add(['GET', 'POST'], "/$module/logout", 'CSRF@logout');
        Route::add(['GET', 'POST'], "/$module/login", 'CSRF@login');
        Route::add(['GET', 'POST'], "/$module/email", 'CSRF@email');
        Route::add(['GET', 'POST'], "/$module/reset-password", 'CSRF@resetPassword');
        Route::add(['GET', 'POST'], "/$module/password", 'CSRF@password');
        Route::add(['GET', 'POST'], "/$module/notifications", 'CSRF@notifications');
        Route::add(['GET', 'POST'], "/$module/reset", 'CSRF@reset');
    }

    if ($module == 'idor') {
        Route::add(['GET', 'POST'], "/$module", 'IDOR@lesson1');
        Route::add(['GET', 'POST'], "/$module/settings/[int]", 'IDOR@account');
    }

    if ($module == 'sqli') {
        Route::add(['GET', 'POST'], "/$module", 'SQLi@lesson1');
        Route::add(['GET', 'POST'], "/$module/article", 'SQLi@article');
    }

    if ($module == 'sqli2') {
        Route::add(['GET', 'POST'], "/$module", 'SQLi@lesson2');
        Route::add(['GET', 'POST'], "/$module/article", 'SQLi@article2');
        Route::add(['GET', 'POST'], "/$module/article-count", 'SQLi@articleCount');
    }

    if ($module == 'xxe') {
        Route::add(['GET', 'POST'], "/$module", 'XXE@lesson1');
    }

    if ($module == 'xxe2') {
        Route::add(['GET', 'POST'], "/$module", 'XXE@lesson2');
    }

    if ($module == 'upload') {
        Route::add(['GET', 'POST'], "/$module", 'Upload@lesson1');
    }

    if ($module == 'upload2') {
        Route::add(['GET', 'POST'], "/$module", 'Upload@lesson2');
    }

    if ($module == 'www') {
        Route::add(['GET', 'POST'], "/", 'Home@listAll');
    }
} else {
    View::page('invalid');
}
