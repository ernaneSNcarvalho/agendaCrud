<?php
require 'config.php';
$usuario = [];

$id = filter_input(INPUT_GET, 'id');
if($id){
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

    if($sql->rowCount() > 0){
        $usuario = $sql->fetch(PDO::FETCH_ASSOC);
    }else{
        header("Location: index.php");
        exit;
    }
}

?>

<h1>Editar Usuario:</h1>
<form method="post" action="editar_action.php">
<input type="hidden" name="id" value="<?php $usuario['id'] ?>" />
    <label>
        Nome: <br />
        <input type="text" name="nome" placeholder="Nome" value="<?php echo $usuario['nome'] ?>"/>
        <br />
    </label>

    <label>
        Email: <br />
        <input type="text" name="email" placeholder="E-mail"  value="<?php echo $usuario['email'] ?>" />
        <br />
    </label>
    <br />

    <input type="submit" value="Enviar" />
</form>