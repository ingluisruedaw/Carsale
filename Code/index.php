<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="pagina web para la automatizacion de los procesos de compraventa de vehiculos">
    <meta name="keywords" content="pagina web para la automatizacion de los procesos de compraventa de vehiculos">
    <title>CARSALE - compraventa de vehiculos</title>

    <!-- Favicons-->
    <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
    <!-- For Windows Phone -->
    <!-- CORE CSS-->  

    <link href="estilos/dashboard/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="estilos/dashboard/css/style.css" type="text/css" rel="stylesheet" media="screen,projection">

    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->    
    <link href="estilos/dashboard/js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="estilos/dashboard/js/plugins/jvectormap/jquery-jvectormap.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="estilos/dashboard/js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">

    <!--API DE GOOGLE ANALYTICS-->
    <script>
    (
      function(i,s,o,g,r,a,m){
        i['GoogleAnalyticsObject']=r;
        i[r]=i[r]||
        function(){
          (i[r].q=i[r].q||[]).push(arguments)
        },i[r].l=1*new Date();
        a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      }
    )
    (window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-106626248-1', 'auto');
    ga('send', 'pageview');
  </script>
  
</head>
<!--style="background-image: url(./images/fondo.jpg);"-->
<body>
    <?php 
      if(isset($_GET['id'])||isset($_GET['id'])==""){
        include 'controlador/index.php'; 
      }else{ 
      }
    ?>  
</body>
</html>
