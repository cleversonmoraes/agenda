<?php
    include_once("templates/header.php");
?>
    <div class="container">
        <?php if(isset($printMsg) && $printMsg != ''): ?>
            <p id="msg"><?= $printMsg ?></p>
        <?php endif; ?>
        <h1 id="main-title">Minha Agenda</h1>
        <?php if(count($contacts) > 0): ?>
            <table class="table" id="contacts-table">
                <thead>
                    <tr>
                        <th escope="col">#</th>
                        <th escope="col">Nome</th>
                        <th escope="col">Sobrenome</th>
                        <th escope="col">CPF</th>
                        <th escope="col">Email</th>
                        <th escope="col">Data de Nascimento</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($contacts as $contact): ?>
                        <tr>
                            <td scope="row" class="col-id"><?= $contact["id"] ?></td>
                            <td scope="row"><?= $contact["name"] ?></td>
                            <td scope="row"><?= $contact["lastName"] ?></td>
                            <td scope="row"><?= $contact["cpf"] ?></td>
                            <td scope="row"><?= $contact["email"] ?></td>
                            <td scope="row"><?= $contact["nasc"] ?></td>
                            <td class="actions">
                                <a href="<?= $BASE_URL ?>show.php?id=<?= $contact["id"] ?>"><i class="fas fa-eye check-icon"></i></a>
                                <a href="<?= $BASE_URL ?>edit.php?id=<?= $contact["id"] ?>"><i class="fas fa-edit check-icon"></i></a>
                                <form class="delete-form" action="<?= $BASE_URL ?>/config/process.php" method="POST">
                                    <input type="hidden" name="type" value="delete">
                                    <input type="hidden" name="id" value="<?= $contact ["id"] ?>">
                                    <button class="delete-btn" type="submit"><i class="fa fa-times delete-icon"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p id="empty-list-text">Ainda não há contatos na sua agenda, <a href="<?= $BASE_URL ?>create.php">Clique aqui para adicionar</a></p>
        <?php endif; ?>
    </div>

<?php
    include_once("templates/footer.php");
?>