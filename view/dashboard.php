<?php
include('../includes/head.php') //scripts e html principal
?>

<body>
    <?php
    include('../includes/menu.php')
    ?>
    <div class="container">
        <table class="table table-hover mt-4">
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
                            <a href="edit-user.php?id_usuario=<?php echo $user['idUsuario'] ?>">
                                <?php echo $user['idUsuario'] ?>
                            </a>
                        </td>
                        <td>
                            <a href="edit-user.php?id_usuario=<?php echo $user['idUsuario'] ?>">
                                <?php echo $user['nomeUsuario'] ?>
                            </a>
                        </td>
                        <td>
                            <a href="edit-user.php?id_usuario=<?php echo $user['idUsuario'] ?>">
                                <?php echo $user['emailUsuario'] ?>
                            </a>
                        </td>
                        <td>
                            <a href="edit-user.php?id_usuario=<?php echo $user['idUsuario'] ?>">
                                <?php echo $user['turmaUsuario'] ?>
                            </a>
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