<?php
    include_once("templates/header.php");
?>
<div class="container">
    <h1 id="main-title">Editar Contato</h1>
    <form id="create-form" action="<?= $BASE_URL ?>config/process.php" method="POST">
        <input type="hidden" name="type" value="edit">
        <input type="hidden" name="id" value="<?= $contact["id"] ?>">
        <div class="form-group">
            <label for="name">Nome do Contato:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Digite seu nome" value="<?= $contact["name"] ?>" required>
        </div>
        <div class="form-group">
            <label for="phone">Telefone do Contato:</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Digite seu telefone" value="<?= $contact["phone"] ?>" required>
        </div>
        <div class="form-group">
            <label for="observations">Observações:</label>
            <textarea type="text" class="form-control" id="observations" name="observations" placeholder="Insira as observações" required rows="3"><?= $contact["observations"] ?></textarea>
        </div>
        <div class="btns-create-form">
            <button type="submit" class="btn btn-primary">Atualizar</button>
            <?php include_once("templates/backbtn.html"); ?>  
        </div>
    </form>
</div>
<?php
    include_once("templates/footer.php");
?>