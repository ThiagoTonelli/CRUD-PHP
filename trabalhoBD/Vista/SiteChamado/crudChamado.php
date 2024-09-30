<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template Otimizado</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Hind:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/trabalhoBD/Vista/SiteChamado/styles.css"> <!-- Crie um arquivo separado para o CSS -->
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
                <li><a href="https://www.alegre.es.gov.br/">Início</a></li>
                <li><a href="/trabalhoBD/Vista/SiteInicial/inicio.php">Menu</a></li>
                <li><a>Cadastrar Chamado</li></a>
                <li><a href="/trabalhoBD/Controladores/crudControlador.php">Sair</a></li>
            </ul>
        </div>
    </section>

    <!-- Conteúdo principal -->
<main>
    <section class="register-ticket-container">
        <h1 class="register-ticket-title">REGISTRAR CHAMADO DE OBRA</h1>
        <form class="register-ticket-form" action="/trabalhoBD/Controladores/crudControlador.php" method="POST">
        <input type="hidden" name="acao" value="inserir_chamado">
            <label for="tipo">Tipo de Chamado</label>
            <select id="tipo" name="tipo" class="input-field" required>
                <option value="">Selecione um tipo</option>
                <option value="pavimentacao">Pavimentação</option>
                <option value="manutencao">Manutenção</option>
            </select>

            <label for="logradouro">Lougadouro</label>
            <input type="text" id="logradouro" name="logradouro" class="input-field" required placeholder="Nome da rua completo">

            <label for="numero">Número</label>
            <input type="number" id="numero" name="numero" class="input-field" required placeholder="Número da residência">

            <label for="bairro">Bairro</label>
            <input type="text" id="bairro" name="bairro" class="input-field" required placeholder="Nome do bairro">

            <label for="cep">CEP</label>
            <input type="number" id="cep" name="cep" class="input-field" required placeholder="XXXXX-XXX">

            <label for="idCidade">Cidade</label>
            <input type="text" id="Cidade" name="cidade" class="input-field" required placeholder="Cidade">

            <label for="Descrição">Descrição</label>
            <textarea id="descricao" name="descricao" class="input-field" required placeholder="Digite a descrição aqui..." rows="4" oninput="autoResize(this)"></textarea>

            <button type="submit" class="register-ticket-btn">Registrar Chamado</button>
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
