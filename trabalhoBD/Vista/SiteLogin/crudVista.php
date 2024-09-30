<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template Otimizado</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Hind:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/trabalhoBD/Vista/SiteLogin/styles.css"> <!-- Crie um arquivo separado para o CSS -->
</head>
<body>

    <!-- Cabeçalho -->
    <header>
        <div class="header-top">
            <div class="city-name">CIDADE JARDIM</div>
            <nav class="top-nav">
                <ul>
                    <li><img src="/trabalhoBD/Vista/SiteLogin/Imagens/mapa.png" alt="Mapa do Site" class="nav-icon"><a href="#">MAPA DO SITE</a></li>
                    <li><img src="/trabalhoBD/Vista/SiteLogin/Imagens/dados-abertos.png" alt="Dados Abertos" class="nav-icon"><a href="#">DADOS ABERTOS</a></li>
                    <li><img src="/trabalhoBD/Vista/SiteLogin/Imagens/facebook.png" alt="Facebook" class="nav-icon"><a href="#">FACEBOOK</a></li>
                    <li><img src="/trabalhoBD/Vista/SiteLogin/Imagens/instagram.png" alt="Instagram" class="nav-icon"><a href="#">INSTAGRAM</a></li>
                    <li><img src="/trabalhoBD/Vista/SiteLogin/Imagens/youtube.png" alt="YouTube" class="nav-icon"><a href="#">YOUTUBE</a></li>
                    <li><img src="/trabalhoBD/Vista/SiteLogin/Imagens/twitter.png" alt="Twitter" class="nav-icon"><a href="#">TWITTER</a></li>
                    <li><img src="/trabalhoBD/Vista/SiteLogin/Imagens/telefone.png" alt="Telefone" class="nav-icon"><a href="#">TELEFONE</a></li>
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
                <input type="text" placeholder="Pesquisar...">
                <button>Buscar</button>
            </div>
        </div>
    </header>

    <section class="barra">
        <h1>SECRETARIA EXECUTIVA DE OBRAS</h1>
        <ul class="lista">
            <li><a href="https://www.alegre.es.gov.br/">Início</a></li>
            <li><a href="#">Secretarias Executivas</a></li>
            <li><a href="#">SEOSU</a></li>
            <li><a href="#">Login</a></li>
        </ul>
    </section>

    <!-- Conteúdo principal -->
    <main>
        <section class="login-container">
            <h1 class="login-title">ENTRAR</h1>
            <form  class="login-form" action="../Controladores/crudControlador.php" method="POST">
                <input type="hidden" name="acao" value="autenticar">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="input-field" required>
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" class="input-field" required>
                <button type="submit" class="login-btn">ENTRAR</button>
            </form>
            <?php if (!empty($mensagem)): ?>
                <p style="color: green;"><?php echo $mensagem; ?></p>
            <?php endif; ?>
            <div class="extra-options">
                <a href="#" class="forgot-password">Esqueci minha senha</a>
                <span class="register">Ainda não é registrado? <a href="/trabalhoBD/Vista/SiteCadastro/crudCadastro.php">Cadastre-se aqui</a></span>
            </div>
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

