<?php
namespace Check;

use Check\Core as C;

// Set constants (root server path + root URL)
define('PROT', (!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on') ? 'https://' : 'http://');
define('ROOT_URL', PROT . $_SERVER['HTTP_HOST'] . str_replace('\\', '', dirname(htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES))) . '/'); // Remove backslashes for Windows compatibility
define('ROOT_PATH', __DIR__ . '/');

try
{
    require ROOT_PATH . 'Core/Loader.php';
    C\Loader::getInstance()->init(); // Load necessary classes
    $aParams = ['ctrl' => (!empty($_GET['p']) ? $_GET['p'] : 'blog'), 'act' => (!empty($_GET['a']) ? $_GET['a'] : 'index')];
    C\Router::run($aParams);
} catch (\Exception $e) {
    echo $e->getMessage();
}