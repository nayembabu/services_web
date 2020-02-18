<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="include/bootstrap4/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="include/fontawesome5/css/fontawesome.min.css">
    <!-- jQuery UI css -->
    <link rel="stylesheet" href="include/jqueryui/jquery-ui.min.css">
    <!-- custom css -->
    <link rel="stylesheet" href="include/custom.css">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Notifications   <span><i class="fas fa-envelope"></i></span>
        </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
              

            </ul>

        </div>
    </nav>
<br><br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 mx-auto">
                <form action="">

                    <div class="form-group">
                        <label for="form number">Slip Number</label>
                        <input type="text" name="slipNo" id="" class="form-control">
                    </div>
                    <button class="btn btn-primary" type="submit">submit</button>
                </form>
            </div>
        </div>
    </div>



    <!-- jQuery -->
    <script src="include/jquery3.min.js"></script>
    <script src="include/jqueryui/jquery-ui.min.js"></script>
    <!-- Bootstrap js -->
    <script src="include/bootstrap4/js/bootstrap.min.js"></script>
</body>

</html>