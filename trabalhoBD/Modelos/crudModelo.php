<?php

require_once '../Config/dataBase.php';

class Crud extends Conexao {
    public $conexao;

    public function __construct() {
        // Instância de conexão
        $this->conexao = new Conexao();
    }

    public function obtemRegistros() {
        if ($this->conexao->statusConexao() === "Conectado") {
            try {
                $query = "SELECT email FROM usuarios";
                $PDOStatement = $this->conexao->prepare($query); // Acesse a conexão e prepare a query
                $PDOStatement->execute();
                $result = $PDOStatement->fetchAll(PDO::FETCH_ASSOC);
    
                if (empty($result)) {
                    return "Nenhum registro encontrado.";
                }
    
                return $result;
            } catch (PDOException $e) {
                //return 'Erro na consulta: ' . $e->getMessage();
            }
        } else {
            return "Erro na conexão com o banco de dados.";
        }
    }  

    public function inserirChamado($tipo, $rua, $numero, $bairro, $cep, $cidade, $descricao, $email, $data) {
        try {
            // Primeiro, obtenha o ID do usuário
            $sql = "SELECT id FROM usuarios WHERE email = :email";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
    
            if ($stmt->rowCount() === 0) {
                return false; // Usuário não encontrado
            }
            
            // Recupera o ID do usuário
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            $user_id = $usuario['id'];
            
            // Insere o chamado
            $query = "INSERT INTO chamados_obra (tipo_chamado, rua, numero, bairro, cep, cidade, descricao, user_id, data) 
                      VALUES (:tipo, :rua, :numero, :bairro, :cep, :cidade, :descricao, :user_id, :data)";
            $stmt = $this->conexao->prepare($query);
    
            // Bind dos parâmetros
            $stmt->bindParam(':tipo', $tipo);
            $stmt->bindParam(':rua', $rua);
            $stmt->bindParam(':numero', $numero);
            $stmt->bindParam(':bairro', $bairro);
            $stmt->bindParam(':cep', $cep);
            $stmt->bindParam(':cidade', $cidade);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':data', $data);
    
            // Executa a consulta
            return $stmt->execute();
        } catch (PDOException $e) {
            // Retorna o erro
            return 'Erro na inserção: ' . $e->getMessage(); 
        }
    }
    
    

    public function autenticaUsuario($email, $senha) {
        $sql = "SELECT * FROM usuarios WHERE email = :email"; // Seleciona todos os campos do usuário
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            $senhaHash = $usuario['senha'];
    
            // Verifica se a senha está correta
            if (password_verify($senha, $senhaHash)) {
                return $usuario; // Retorna os dados do usuário
            }
        } 
        return false; // Usuário não encontrado ou senha inválida
    }    

    public function cadastroUsuario($nome_completo, $email, $senha, $telefone_celular, $telefone_fixo, $cpf, $data_nascimento, $logradouro, $numero, $bairro, $cep, $cidade) {
        try {
            $sql = "INSERT INTO usuarios (nome_completo, email, senha, telefone_celular, telefone_fixo, cpf, data_nascimento, logradouro, numero, bairro, cep, cidade)
                    VALUES (:nome_completo, :email, :senha, :telefone_celular, :telefone_fixo, :cpf, :data_nascimento, :logradouro, :numero, :bairro, :cep, :cidade)";
            $stmt = $this->conexao->prepare($sql);

            // Bind dos parâmetros
            $stmt->bindParam(':nome_completo', $nome_completo);
            $stmt->bindParam(':email', $email);
            $senhaHash = password_hash($senha, PASSWORD_BCRYPT);
            $stmt->bindParam(':senha', $senhaHash);
            $stmt->bindParam(':telefone_celular', $telefone_celular);
            $stmt->bindParam(':telefone_fixo', $telefone_fixo);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->bindParam(':data_nascimento', $data_nascimento);
            $stmt->bindParam(':logradouro', $logradouro);
            $stmt->bindParam(':numero', $numero);
            $stmt->bindParam(':bairro', $bairro);
            $stmt->bindParam(':cep', $cep);
            $stmt->bindParam(':cidade', $cidade);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "CPF JA CADASTRADO";
            return false; 
        }
    }

    public function atualizarDadosUsuario($email, $novaSenha = null, $novoEndereco = null) {
        try {
            // Verifica se o email do usuário existe no banco de dados
            $sql = "SELECT id FROM usuarios WHERE email = :email";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            if ($stmt->rowCount() === 0) {
                return "Erro: Usuário não encontrado.";
            }

            // Recupera o ID do usuário
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            $userId = $usuario['id'];

            // Inicia a query de atualização
            $query = "UPDATE usuarios SET ";
            $params = [];
            $fieldsToUpdate = [];

            // Se a nova senha foi fornecida, atualiza a senha
            if (!empty($novaSenha)) {
                $senhaHash = password_hash($novaSenha, PASSWORD_BCRYPT);
                $fieldsToUpdate[] = "senha = :senha";
                $params[':senha'] = $senhaHash;
            }

            // Se o novo endereço foi fornecido, atualiza o endereço
            if (!empty($novoEndereco) && is_array($novoEndereco)) {
                if (!empty($novoEndereco['logradouro'])) {
                    $fieldsToUpdate[] = "logradouro = :logradouro";
                    $params[':logradouro'] = $novoEndereco['logradouro'];
                }
                if (!empty($novoEndereco['numero'])) {
                    $fieldsToUpdate[] = "numero = :numero";
                    $params[':numero'] = $novoEndereco['numero'];
                }
                if (!empty($novoEndereco['bairro'])) {
                    $fieldsToUpdate[] = "bairro = :bairro";
                    $params[':bairro'] = $novoEndereco['bairro'];
                }
                if (!empty($novoEndereco['cep'])) {
                    $fieldsToUpdate[] = "cep = :cep";
                    $params[':cep'] = $novoEndereco['cep'];
                }
                if (!empty($novoEndereco['cidade'])) {
                    $fieldsToUpdate[] = "cidade = :cidade";
                    $params[':cidade'] = $novoEndereco['cidade'];
                }
            }

            // Verifica se há campos para atualizar
            if (empty($fieldsToUpdate)) {
                return "Nenhum dado foi fornecido para atualizar.";
            }

            // Constrói a query final com os campos que serão atualizados
            $query .= implode(", ", $fieldsToUpdate) . " WHERE id = :id";
            $params[':id'] = $userId;

            // Prepara a consulta
            $stmt = $this->conexao->prepare($query);

            // Bind dos parâmetros
            foreach ($params as $param => $value) {
                $stmt->bindValue($param, $value);
            }

            // Executa a consulta
            return $stmt->execute() ? "Dados atualizados com sucesso." : "Erro ao atualizar dados.";

        } catch (PDOException $e) {
            //return "Erro: " . $e->getMessage();
        }
    }

    public function obtemChamadosUsuario($email) {
        try {
            // Primeiro, obtenha o ID do usuário com base no email
            $queryUsuario = "SELECT id FROM usuarios WHERE email = :email";
            $stmtUsuario = $this->conexao->prepare($queryUsuario);
            $stmtUsuario->bindParam(':email', $email);
            $stmtUsuario->execute();
    
            // Verifica se o usuário foi encontrado
            if ($stmtUsuario->rowCount() === 0) {
                return []; // Retorna um array vazio
            }
    
            // Recupera o ID do usuário
            $usuario = $stmtUsuario->fetch(PDO::FETCH_ASSOC);
            $user_id = $usuario['id'];
    
            // Agora, faz a consulta para obter os chamados associados a esse usuário
            $queryChamados = "SELECT * FROM chamados_obra WHERE user_id = :user_id";
            $stmtChamados = $this->conexao->prepare($queryChamados);
            $stmtChamados->bindParam(':user_id', $user_id);
            $stmtChamados->execute();
    
            $result = $stmtChamados->fetchAll(PDO::FETCH_ASSOC);
    
            return $result; // Retorna o array de chamados
        } catch (PDOException $e) {
            // Log do erro (opcional)
            //error_log("Erro ao obter chamados: " . $e->getMessage());
            // Retorna um array vazio em caso de erro na consulta
            //return []; 
        }
    }       
    
}

?>
