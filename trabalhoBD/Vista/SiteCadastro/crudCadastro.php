<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template Otimizado</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Hind:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/trabalhoBD/Vista/SiteCadastro/styles.css"> <!-- Crie um arquivo separado para o CSS -->
</head>
<body>
    
    <!-- Cabeçalho -->
    <header>
        <div class="header-top">
            <div class="city-name">CIDADE JARDIM</div>
            <nav class="top-nav">
                <ul>
                    <li><img src="Imagens/mapa.png" alt="Mapa do Site" class="nav-icon"><a href="#">MAPA DO SITE</a></li>
                    <li><img src="Imagens/dados-abertos.png" alt="Dados Abertos" class="nav-icon"><a href="#">DADOS ABERTOS</a></li>
                    <li><img src="Imagens/facebook.png" alt="Facebook" class="nav-icon"><a href="#">FACEBOOK</a></li>
                    <li><img src="Imagens/instagram.png" alt="Instagram" class="nav-icon"><a href="#">INSTAGRAM</a></li>
                    <li><img src="Imagens/youtube.png" alt="YouTube" class="nav-icon"><a href="#">YOUTUBE</a></li>
                    <li><img src="Imagens/twitter.png" alt="Twitter" class="nav-icon"><a href="#">TWITTER</a></li>
                    <li><img src="Imagens/telefone.png" alt="Telefone" class="nav-icon"><a href="#">TELEFONE</a></li>
                </ul>
            </nav>
        </div>
        <div class="header-bottom">
            <div class="logo-container">
                <a href="https://www.alegre.es.gov.br">
                    <img src="Imagens/logo-color.png" alt="Logo" class="logo">
                </a>
            </div>            
            <nav class="main-nav">
                <ul>
                    <li><a href="#">Início</a></li>
                    <li><a href="#">Diário Oficial</a></li>
                    <li><a href="#">Acesso Cidadão</a></li>
                    <li><a href="#">Administração</a></li>
                    <li><a href="#">A Cidade</a></li>
                    <li><a href="#">Contatos</a></li>
                </ul>
            </nav>
            <div class="search-container">
                <div class="search-icon">
                    <img src="Imagens/lupa.png" alt="">
                </div>
                <input type="text" placeholder="">
            </div>
            
        </div>
    </header>

    <section class="barra">
        <div class="secretaria"><b>SECRETARIA EXECUTIVA DE OBRAS</b></div>
        <div class="slista">
            <ul>
                <li><a href="#">Início</a></li>
                <li><a href="#">Secretarias Executivas</a></li>
                <li><a href="#">SEOSU</a></li>
                <li><a href="/trabalhoBD/Controladores/crudControlador.php">Login</a></li>
            </ul>
        </div>
    </section>

    <!-- Conteúdo principal -->
    <main>
        <section class="register-user-container">
            <h1 class="register-user-title">CADASTRO</h1>
            <form class="register-user-form" action="/trabalhoBD/Controladores/crudControlador.php" method="POST">
            <input type="hidden" name="acao" value="cadastra_usuario">
                <label for="nome">Nome Completo</label>
                <input type="text" id="nome_completo" name="nome" class="input-field" required placeholder="Nome completo">
    
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" class="input-field" required placeholder="Seu e-mail">
    
                <label for="confirmEmail">Confirme o E-mail</label>
                <input type="email" id="confirmEmail" name="confirme_email" class="input-field" required placeholder="Confirme seu e-mail">
    
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" class="input-field" required placeholder="Crie uma senha">
    
                <label for="confirmSenha">Confirme a Senha</label>
                <input type="password" id="confirmSenha" name="confirme_senha" class="input-field" required placeholder="Confirme sua senha">
    
                <label for="telefoneCelular">Telefone Celular</label>
                <input type="tel" id="telefoneCelular" name="telefone_celular" class="input-field" required placeholder="(XX) XXXXX-XXXX">
    
                <label for="telefoneFixo">Telefone Fixo</label>
                <input type="tel" id="telefoneFixo" name="telefone_fixo" class="input-field" placeholder="(XX) XXXX-XXXX">
    
                <label for="cpf">CPF</label>
                <input type="text" id="cpf" name="cpf" class="input-field" required placeholder="XXX.XXX.XXX-XX" maxlength="14">
    
                <label for="dataNascimento">Data de Nascimento</label>
                <input type="date" id="dataNascimento" name="data_nascimento" class="input-field" required>
    
                <div class="address-fields">
                    <label for="logradouro">Logradouro</label>
                    <input type="text" id="logradouro" name="logradouro" class="input-field" required placeholder="Nome da sua Rua">
    
                    <label for="numero">Número</label>
                    <input type="number" id="numero" name="numero" class="input-field" required placeholder="Número da residência">
                </div>
    
                <div class="address-fields">
                    <label for="bairro">Bairro</label>
                    <input type="text" id="bairro" name="bairro" class="input-field" required placeholder="Nome do bairro">
    
                    <label for="cep">CEP</label>
                    <input type="text" id="cep" name="cep" class="input-field" required placeholder="XXXXX-XXX" maxlength="10">
                </div>
    
                <label for="cidade">Cidade</label>
                <input type="text" id="cidade" name="cidade" class="input-field" required placeholder="Cidade">
    
                <button type="submit" class="register-user-btn">Cadastrar</button>
            </form>
            <?php if (!empty($mensagem)): ?>
                <p style="color: green;"><?php echo $mensagem; ?></p>
            <?php endif; ?>
        </section>
    </main>
       

    <!-- Rodapé -->
    <footer>
        <div class="footer-content">
            <div class="footer-left">
                <b>Município de Alegre</b>
                <p>CNPJ: 27.174.101/0001-35</p>
                <p>Atendimento de Segunda à Sexta-Feira</p>
                <p>Horário: 07:30 às 11:30 / 13:00 às 17:00</p>
            </div>
            <div class="footer-center">
                <img src="Imagens/brasao-teste.png" alt="Logo do Footer" class="footer-logo">
            </div>
            <div class="footer-right">
                <b>(28) 3300-0100</b>
                <p>PRQ GETULIO VARGAS, n°01 - CENTRO</p>
                <p>Alegre - Espírito Santo</p>
                <p>CEP 29500-000</p>
            </div>
        </div>
    </footer>

</body>
</html>
