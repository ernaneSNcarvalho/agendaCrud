<?php
require 'config.php';
$usuarios = [];

$sql = $pdo->query("SELECT * FROM usuarios");
if ($sql->rowCount() > 0) {
    $usuarios = $sql->fetchAll(PDO::FETCH_ASSOC);
}

?>
<a href="adicionar.php">Adicionar Usuario</a>
<table border="1" width="100%">
    <th>ID</th>
    <th>NOME</th>
    <th>EMAIL</th>
    <th>ACOES</th>


    <?php foreach ($usuarios as $usuario) : ?>
        <tr>
            <td><?php echo $usuario['id'] ?></td>
            <td><?php echo $usuario['nome'] ?></td>
            <td><?php echo $usuario['email'] ?></td>
            <td>
                <a href="editar.php?id=<?php echo $usuario['id'] ?>">[EDITAR]<a>
                <a href="excluir.php?id=<?php echo $usuario['id'] ?>">[EXCLUIR]<a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>