<?php

include_once('../model/db.php');
include_once('../controller/getDataController.php');

$data = get_data($db, 'usuario');
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="../js/cadastro.js"></script>
</head>

<body>
    <h1>Usuarios:</h1>
    <div class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Email</th>
                    <th scope="col">Turma</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data as $user) {
                ?>
                    <tr>
                        <td>
                            <?php echo $user['idUsuario'] ?>
                        </td>
                        <td>
                            <?php echo $user['nomeUsuario'] ?>
                        </td>
                        <td>
                            <?php echo $user['emailUsuario'] ?>
                        </td>
                        <td>
                            <?php echo $user['turmaUsuario'] ?>
                        </td>
                    </tr>
                <?php
                }
                ?>




                <!-- <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>

                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>

                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Otto</td>
                    <td>Otto</td>

                </tr> -->
            </tbody>
        </table>
    </div>



</body>

</html>