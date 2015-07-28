<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Flat blog</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Lato:400,300&subset=latin-ext' rel='stylesheet' type='text/css'>
    <style>
        body
        {
            font-family: Lato;
            font-size: 2.0em;
            font-weight: 300;
        }
        a:hover
        {
            text-decoration: none;
        }
        img
        {
            width: 100%;
        }
    </style>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <div class="page-header">
        <a href="/">
            <h1>Blog <small>Made with flat files</small></h1>
        </a>
    </div>
    @yield('content')
</div>
</body>
</html>