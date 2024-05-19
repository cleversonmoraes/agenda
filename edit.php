<?php
    include_once("templates/header.php");
?>

    <div class="container container-create">
        <?php
            include_once("templates/backbtn.html");
        ?>
        <h1 id="main-title">Editar Contato</h1>

        <form action="<?= $BASE_URL ?>config/process.php" method="POST">
            <input type="hidden" name="type" value="edit">
            <input type="hidden" name="id" value="<?= $contact['id'] ?>">
            <div class="form-group">
                <label for="name">Nome do contato:</label>
                <input class="form-control" type="text" name="name" id="name" placeholder="Digite o nome" required value="<?= $contact['name'] ?>">
            </div>
            <div class="form-group">
                <label for="lastName">Sobrenome:</label>
                <input class="form-control" type="text" name="lastName" id="lastName" placeholder="Digite o Sobrenome" required value="<?= $contact['lastName'] ?>">
            </div>
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input class="form-control" type="text" name="cpf" id="cpf" placeholder="Digite o CPF" required value="<?= $contact['cpf'] ?>">
            </div>
            <div class="form-group">
                <label for="lastName">Email:</label>
                <input class="form-control" type="email" name="email" id="email" placeholder="Digite o Email" required value="<?= $contact['email'] ?>">
            </div>
            <div class="form-group">
                <label for="lastName">Data de Nascimento:</label>
                <input class="form-control" type="date" name="nasc" id="nasc" placeholder="Digite a data de nascimento" required value="<?= $contact['nasc'] ?>">
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
        <form action="<?= $BASE_URL ?>addAdress.php" method="POST">
            <button type="submit" class="btn btn-primary">Adicionar Endereço</button>
        </form>
    </div>


<?php
    include_once("templates/footer.php");
?>