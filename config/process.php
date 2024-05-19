<?php

use function PHPSTORM_META\type;

    session_start();

    include_once("connection.php");
    include_once("url.php");

    $data= $_POST;

    //MODIFICAÇÕES NO BANCO
    if (!empty($data)) {

        //CRIAR CONTATO
        if($data["type"] === "create") {
            
            $name = $data["name"];
            $lastName = $data["lastName"];
            $cpf = $data["cpf"];
            $email = $data["email"];
            $nasc = $data["nasc"];

            $query = "INSERT INTO contacts (name, lastName, cpf, email, nasc) VALUES (:name, :lastName, :cpf, :email, :nasc)";

            $stmt = $conn->prepare($query);

            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":lastName", $lastName);
            $stmt->bindParam(":cpf", $cpf);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":nasc", $nasc);

            try {

                $stmt->execute();
                $_SESSION["msg"] = "Contato criado com sucesso!";
        
            } catch (PDOException $e) {
                // erro na conexão
                $error = $e->getMessage();
                echo"Erro: $error";
            }    

        } else if ($data["type"] === "edit") {

            $name = $data["name"];
            $lastName = $data["lastName"];
            $cpf = $data["cpf"];
            $email = $data["email"];
            $nasc = $data["nasc"];
            $id = $data["id"];

            $query = "UPDATE contacts 
                    SET name = :name, lastName = :lastName, cpf = :cpf, email = :email, nasc = :nasc
                    WHERE id = :id";

            $stmt = $conn->prepare($query);

            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":lastName", $lastName);
            $stmt->bindParam(":cpf", $cpf);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":nasc", $nasc);
            $stmt->bindParam(":id", $id);

            try {

                $stmt->execute();
                $_SESSION["msg"] = "Contato atualizado com sucesso!";
        
            } catch (PDOException $e) {
                // erro na conexão
                $error = $e->getMessage();
                echo"Erro: $error";
            }


        // DELETAR USUÁRIO
        } else if ($data["type"] === "delete") {

            $id = $data["id"];

            $query = "DELETE FROM contacts WHERE id = :id";

            $stmt = $conn->prepare($query);

            $stmt->bindParam(":id", $id);



            try {

                $stmt->execute();
                $_SESSION["msg"] = "Removido com sucesso!";
        
            } catch (PDOException $e) {
                // erro na conexão
                $error = $e->getMessage();
                echo"Erro: $error";
            }
        

        // INSERIR ENDEREÇO - INCOMPLETO :D - BATENDO A CABEÇA PRA ENTENDER PORQUE NAO ESTA ATUALIZANDO O BANCO DE DADOS
        } else if ($data["type"] === "addAdress") {


            $cep = $data["cep"];
            $rua = $data["rua"];
            $numero = $data["numero"];
            $bairro = $data["bairro"];
            $cidade = $data["cidade"];
            $estado = $data["estado"];
            $id = $data["id"];


            $query = "UPDATE contacts 
            SET cep = :cep, rua = :rua, numero = :numero, bairro = :bairro, cidade = :cidade, estado = :estado
            WHERE id = :id";

            $stmt = $conn->prepare($query);

            $stmt->bindParam(":cep", $cep);
            $stmt->bindParam(":rua", $rua);
            $stmt->bindParam(":numero", $numero);
            $stmt->bindParam(":bairro", $bairro);
            $stmt->bindParam(":cidade", $cidade);
            $stmt->bindParam(":estado", $estado);
            $stmt->bindParam(":id", $id);

            try {

                $stmt->execute();
                $_SESSION["msg"] = "Endereço atualizado com sucesso!";
        
            } catch (PDOException $e) {
                // erro na conexão
                $error = $e->getMessage();
                echo"Erro: $error";
            }

        }
 
        //REDIRECT HOME
        header("Location:" . $BASE_URL . "../index.php");

    //SELEÇÃO DE DADOS
    } else {
        $id;

        if(!empty($_GET)) {
            $id = $_GET["id"];
        }

        // Retorna o dado de um contato
        if(!empty($id)) {
            $query = "SELECT * FROM contacts WHERE id = :id";

            $stmt = $conn->prepare($query);

            $stmt->bindParam(":id", $id);

            $stmt->execute();

            $contact = $stmt->fetch();
        } else {

        }

        // Retorna todos os contatos
        $contacts = [];

        $query = "SELECT * FROM contacts";

        $stmt = $conn->prepare($query);

        $stmt->execute();

        $contacts = $stmt->fetchAll();
    }
   
    // FECHAR CONEXÃO
    $conn = null;


    //INFELIZMENTE A CORRERIA DO DIA A DIA NAO ME PERMITIU ADICIONAR MAIS FUNCIONALIDADES A TEMPO. MEU FOCO NOS ULTIMOS MESES TINHA SIDO FRONT END, MAS O TESTE ME TROUXE NOVOS HORIZONTES EM RELAÇÃO AO BACK END. PRETENDO PROSSEGUIR COM OS ESTUDOS DE BACK DAQUI EM DIANTE. INDEPENDENTE DO RESULTADO DO TESTE, AGRADEÇO PELA OPORTUNIDADE E PELO DESAFIO. :D
?>