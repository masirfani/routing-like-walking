<?php 

    route('/', function(){
        echo "<h1>Hello, who is you?</h1>";
    });

    route('/home', function(){
        include('views/pages/home.php');
    });

    route('/coba', function(){
        echo "aing maung";
    });