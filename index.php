<?php  

    // for project url
    $base_url = "/route/";
    $routes   = [];

    function route(string $path, callable $callback)
    {
        global $routes,$base_url;

        $end_url = $base_url.$path;
        $end_url = explode("/", $end_url);
        
        // menghilangkan array yang kosong
        $end_url = array_filter($end_url, function($value) { return !is_null($value) && $value !== ''; });
        $end_url = "/".implode("/", $end_url);

        if($path == "/"){
            $end_url .= "/";
        }
        $routes[$end_url] = $callback;
    }

    function execute()
    {
        global $routes;
        $uri = $_SERVER['REQUEST_URI'];
        foreach ($routes as $path => $callback) {
            if($path != $uri) continue;
            $callback();
        }
    }
    
    route('/home', function(){
        include('pages/home.php');
    });

    route('/coba', function(){
        echo "aing maung";
    });

    execute();
?>