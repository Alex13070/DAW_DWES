<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>index</title>
    <script src="formulario.js"></script>
    <style>
        html {
            height: 100%;
            width: 99%; 
        }
        body {
            background: #0d0d0d;
        }
    </style>
</head>
<body>
    <div>

        <div class="row p-4">
            <div class="col-md-3"></div>

            <div class="col-md-6">
                <div class="card text-right">
                    <div class="card-header"> 
                        <h3 class="text-center">Genera tu carta de motivación</h3>
                    </div>

                    <div class="card-body">
                        <form action="pdf.php" method="get" id="formulario">
                            <div class="mb-3">
                                <label class="form-label">Nombre</label>
                                <input class="form-control" id="exampleInputEmail1" type="text" name="nombre" placeholder="Nombre">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Empresa</label>
                                <input  class="form-control" id="exampleInputEmail1" type="text" name="empresa" placeholder="Empresa">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Representante</label>
                                <input  class="form-control" id="exampleInputEmail1" type="text" name="representante" placeholder="Representante">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Fecha</label>
                                <input  class="form-control" id="exampleInputEmail1" type="date" name="fecha" placeholder="Fecha">
                            </div>

                            <div class="mb-3" id="mensaje_error" style="display: none;">
                                <div class="form-text text-danger">Debes de rellenar todos los campos</div> 
                            </div>
                            
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <input type="submit" value="Enviar" class="btn btn-primary">
                            </div>
                        </form>
                    </div>                   
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
        
    
    </div>

</body>
</html>