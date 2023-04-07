<?php
    include_once("templates/header.php");
?>
<div class="container" id="view-contact-container">
    <h1 id="main-title"><?= $contact['name']?></h1>
    <p class="bold">Telefone:</p>
    <p><?= $contact['phone'] ?></p>
    <p class="bold">Observações:</p>
    <p><?= $contact['observations'] ?></p>
    <div class="btns-container">
        <?php include_once("templates/backbtn.html"); ?>
        <?php include_once("templates/editbtn.html"); ?>
    </div>
</div>
<?php
    include_once("templates/footer.php");
?>