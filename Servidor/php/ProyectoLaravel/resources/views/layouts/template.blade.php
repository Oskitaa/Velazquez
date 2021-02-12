<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        
        <style>
            body{
                display:flex;
                align-items:center;
                justify-content:center;
                flex-direction:column;
                text-align: center;
            }
            .inicio{
                font-size: x-large;
                margin-bottom: 100px;
                color: blue;
            }

            table,th,td{
                border:1px solid;    
            }

            .centros, .categorias .alumnos {
                width: 200px;
                font-size: 2em;
            }

            td{
                width:200px;
            }

            form{
                display:inline-block;
            }

            a{
                text-decoration:none;
            }
        </style>

</head>
<body>
    

    <div class="inicio">
        @yield("inicio")
        <button><a href="/">Inicio</a></button>
    </div>

    <div class="cabecera">
    @yield("cabecera")
    </div>
</body>
</html>