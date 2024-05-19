<?php
    include_once("templates/header.php");
?>

<div class="container container-create">
        <?php
            include_once("templates/backbtn.html");
        ?>
        <h1 id="main-title">Adicionar Endereço</h1>

        <form action="<?= $BASE_URL ?>config/process.php" method="POST">
            <input type="hidden" name="type" value="addAdress">
            <div class="form-group">
                <label for="name">CEP:</label>
                <input class="form-control" type="text" name="cep" id="cep" placeholder="Digite o CEP" required >
            </div>
            <div class="form-group">
                <label for="name">RUA:</label>
                <input class="form-control" type="text" name="rua" id="rua" placeholder="Digite a RUA">
            </div>
            <div class="form-group">
                <label for="name">NÚMERO:</label>
                <input class="form-control" type="text" name="numero" id="numero" placeholder="Digite o NÚMERO">
            </div>
            <div class="form-group">
                <label for="name">BAIRRO:</label>
                <input class="form-control" type="text" name="bairro" id="bairro" placeholder="Digite o BAIRRO">
            </div>
            <div class="form-group">
                <label for="name">CIDADE:</label>
                <input class="form-control" type="text" name="cidade" id="cidade" placeholder="Digite a CIDADE">
            </div>
            <div class="form-group">
                <label for="name">ESTADO:</label>
                <input class="form-control" type="text" name="estado" id="estado" placeholder="Digite o ESTADO">
            </div>
            <button type="submit" class="btn btn-primary">Adicionar Endereço</button>
        </form>

<?php
    include_once("templates/footer.php");
?>