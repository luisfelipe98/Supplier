<?php
    include_once("templates/header.php");
?>
<div class="container">
    <h1 id="main-title">Criar Contato</h1>
    <form id="create-form" action="<?= $BASE_URL ?>config/process.php" method="POST">
        <input type="hidden" name="type" value="create">
        <div class="form-group">
            <label for="name">Nome do Contato:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Digite seu nome" required>
        </div>
        <div class="form-group">
            <label for="phone">Telefone do Contato:</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Digite seu telefone" required>
        </div>
        <div class="form-group">
            <label for="observations">Observações:</label>
            <textarea type="text" class="form-control" id="observations" name="observations" placeholder="Insira as observações" required rows="3"></textarea>
        </div>
        <div class="btns-create-form">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <?php include_once("templates/backbtn.html"); ?>  
        </div>
    </form>
</div>
<?php
    include_once("templates/footer.php");
?>