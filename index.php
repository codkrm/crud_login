<?php 
  require 'header.php'; 

  if (!isset($_SESSION['crud_login']) || empty($_SESSION['crud_login'])) {
    header("Location: login.php");
  }

?>
<div class="container">
<h1>CRUD em PHP</h1>
<a href="create.php" class="btn btn-primary">Criar registro</a>
<a href="core/functions.php?logout" class="btn btn-danger">Sair do sistema</a>
<br />
<br />
<br />
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Sobrenome</th>
      <th scope="col">Dt. Cadastro</th>
      <th scope="col">Status</th>
      <th scope="col">Opções</th>
    </tr>
  </thead>
  <tbody>
    <?php if($result): ?>
      <?php foreach($read as $users): ?>
        <tr>
          <th scope="row"><?php echo $users['id']; ?></th>
          <td><?php echo $users['name']; ?></td>
          <td><?php echo $users['surname']; ?></td>
          <td><?php echo $users['caddate']; ?></td>
          <td>
              <label class="switch">
                  <input type="checkbox" name="status" id="status<?php echo $users['id']; ?>" <?php echo ($users['status'] == 1)?'checked':'unchecked'; ?> onclick="statusChanger(<?php echo $users['id'] ?>)" />
                <span class="slider"></span>
              </label>
          </td>
          <td>
            <a href="update.php?id=<?php echo $users['id']; ?>">Editar</a>
            <a href="core/functions.php?delid=<?php echo $users['id']; ?>">Excluir</a>
          </td>
        </tr>
      <?php endforeach; ?>
    <?php else: ?>
      <tr>
        <td>
          Nenhum resultado encontrado
        </td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>
</div>
<?php require 'footer.php'; ?>
