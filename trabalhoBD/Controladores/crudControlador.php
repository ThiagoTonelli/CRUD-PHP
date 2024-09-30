<?php

require_once '../Modelos/crudModelo.php';
$mensagem = '';
$chamados = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (session_status() === PHP_SESSION_NONE) {
        session_start(); // Inicia a sessão apenas se não estiver ativa
    }

    $acao = $_POST['acao'] ?? '';
    $crud = new Crud();

    if ($acao === 'autenticar') {
        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';

        $usuario = $crud->autenticaUsuario($email, $senha); // Autentica e obtém dados do usuário

        if ($usuario) {
            $_SESSION['email'] = $usuario['email']; // Armazena o email do usuário na sessão
            header("Location: ../Vista/SiteInicial/inicio.php");
            exit();
        } else {
            $mensagem = "Usuário ou senha inválidos.";
            require_once '../Vista/SiteLogin/crudVista.php';
            exit();
        }

    } elseif ($acao === 'inserir_chamado') {
        $tipo = $_POST['tipo'];
        $rua = $_POST['logradouro'];
        $numero = $_POST['numero'];
        $bairro = $_POST['bairro'];
        $cep = $_POST['cep'];
        $cidade = $_POST['cidade'];
        $descricao = $_POST['descricao'];
        $email = $_SESSION['email'] ?? null;
        $data_atual = date('d-m-Y H:i:s');

        
        if ($email){
            if ($crud->inserirChamado($tipo, $rua, $numero, $bairro, $cep, $cidade, $descricao, $email, $data_atual)) {
                $mensagem = "Chamado registrado com sucesso.";
                require_once '../Vista/SiteChamado/crudChamado.php';
                exit();
            }else {
                $mensagem = "Erro ao registrar chamado.";
                require_once '../Vista/SiteChamado/crudChamado.php';
                exit();
            }
        }
        else {
            $mensagem = "Erro: Usuário não autenticado.";
            require_once '../Vista/SiteLogin/crudVista.php';
            exit();
        }
    }   
    elseif ($acao === 'cadastra_usuario') {
        $nome_completo = $_POST['nome_completo'] ?? '';
        $email = $_POST['email'] ?? '';
        $confirmeEmail = $_POST['confirme_email'] ?? ''; // Campo de confirmação de email
        $senha = $_POST['senha'] ?? '';
        $confirmeSenha = $_POST['confirme_senha'] ?? '';
        $telefone_celular = $_POST['telefone_celular'] ?? '';
        $telefone_fixo = $_POST['telefone_fixo'] ?? '';
        $cpf = $_POST['cpf'] ?? '';
        $data_nascimento = $_POST['data_nascimento'] ?? '';
        $logradouro = $_POST['logradouro'] ?? '';
        $numero = $_POST['numero'] ?? '';
        $bairro = $_POST['bairro'] ?? '';
        $cep = $_POST['cep'] ?? '';
        $cidade = $_POST['cidade'] ?? '';
    
        // Verificação se as senhas coincidem
        if ($confirmeSenha !== $senha) {
            $mensagem = "As senhas não coincidem.";
            require_once '../Vista/SiteCadastro/crudCadastro.php';
            exit();
        }
    
        // Verificação se os emails coincidem
        if ($confirmeEmail !== $email) {
            $mensagem = "Os emails não coincidem.";
            require_once '../Vista/SiteCadastro/crudCadastro.php';
            exit();
        }
    
        // Verificação se o CPF tem exatamente 11 dígitos
        if (strlen($cpf) !== 11 || !is_numeric($cpf)) {
            $mensagem = "CPF inválido. O CPF deve conter 11 dígitos.";
            require_once '../Vista/SiteCadastro/crudCadastro.php';
            exit();
        }
    
        // Se passar por todas as verificações, tenta realizar o cadastro
        if ($crud->cadastroUsuario($nome_completo, $email, $senha, $telefone_celular, $telefone_fixo, $cpf, $data_nascimento, $logradouro, $numero, $bairro, $cep, $cidade)) {
            $mensagem = "Usuário cadastrado com sucesso.";
            require_once '../Vista/SiteLogin/crudVista.php';
            exit();
        } else {
            $mensagem = "Erro ao cadastrar usuário.";
            require_once '../Vista/SiteCadastro/crudCadastro.php';
            exit();
        }
    }
    
    
    elseif ($acao === 'atualizar_dados') {
        // Aqui não é necessário chamar session_start() novamente
        $email = $_SESSION['email'] ?? null; // Email do usuário deve ser salvo na sessão após login
        $novaSenha = $_POST['nova_senha'] ?? null;
        $confirmaSenha = $_POST['confirma_senha'] ?? null;
    
        // Verifica se as senhas correspondem
        if ($novaSenha !== $confirmaSenha) {
            $mensagem = "As senhas não coincidem";
            require_once '../Vista/SiteDadosCadastrais/crudDadosCadastrais.php';
            exit();
        }
    
        $novoEndereco = [
            'logradouro' => $_POST['novo_logradouro'] ?? null,
            'numero' => $_POST['numero'] ?? null,
            'bairro' => $_POST['bairro'] ?? null,
            'cep' => $_POST['cep'] ?? null,
            'cidade' => $_POST['cidade'] ?? null
        ];
        // Verifica se o email está disponível antes de atualizar
        if ($email) {
                $hashNovaSenha = password_hash($novaSenha, PASSWORD_DEFAULT);
                $resultado = $crud->atualizarDadosUsuario($email, $hashNovaSenha, $novoEndereco);
                $mensagem = $resultado;
                require_once '../Vista/SiteDadosCadastrais/crudDadosCadastrais.php';
                exit();
        } else {
            $mensagem = "Erro: Usuário não autenticado.";
            require_once '../Vista/SiteLogin/crudVista.php';
            exit();
        }
    }
    
    elseif ($acao === 'ver_chamados') {
        $email = $_SESSION['email'] ?? null;
        //require_once '../Vista/SiteVisualizarChamados/crudVisualizaChamado.php';
        if ($email) {
            $chamados = $crud->obtemChamadosUsuario($email); // Chame a função após verificar se o usuário está autenticado
    
            if (!empty($chamados)) {
                // Se houver chamados, exiba a página
                require_once '../Vista/SiteVisualizarChamados/crudVisualizaChamado.php';
            } else {
                // Se não houver chamados, defina a mensagem e exiba a página
                $mensagem = "Não há nenhum chamado seu.";
                $_SESSION['mensagem'] = $mensagem; // Certifique-se de definir a mensagem na sessão
                require_once '../Vista/SiteVisualizarChamados/crudVisualizaChamado.php';
            }
        } else {
            // Se o usuário não estiver autenticado, redirecione para a página de login
            $mensagem = "Erro: Usuário não autenticado.";
            header("Location: ../Vista/SiteLogin/crudVista.php");
            exit();
        }
    }
    
   
}

else {
    // Carregar a vista padrão ou realizar outras ações
    require_once '../Vista/SiteLogin/crudVista.php';
    exit();
}

$mensagem = '';

    //print_r($resultado);
     //liga interface ao CRUD
    //require_once '../Vista/SiteLogin/crudVista.php';
?>
