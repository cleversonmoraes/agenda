<?php
    include_once("templates/header.php");
?>
   
   <div class="container" id="view-contact-container">

    <?php
        include_once("templates/backbtn.html");
    ?>
    <h1 id="main-title"><?= $contact['name'] ?></h1>
    <p class="bold">Sobrenome</p>
    <p><?= $contact['lastName'] ?></p>
    <p class="bold">CPF</p>
    <p><?= $contact['cpf'] ?></p>
    <p class="bold">Email</p>
    <p><?= $contact['email'] ?></p>
    <p class="bold">Data de Nascimento</p>
    <p><?= $contact['nasc'] ?></p>
   </div>

<?php
    include_once("templates/footer.php");
?>