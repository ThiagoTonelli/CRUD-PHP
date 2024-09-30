# Sistema de Chamados de Obras - Secretaria de Obras Municipal

**Desenvolvedores:**  
- Kailany Alves Silva  
- Lukas Rodrigues Basilio  
- Ryan Carlos Sarcinelli  
- Thiago Tonelli da Silva  

## Descrição do Projeto

Este projeto consiste no desenvolvimento de um protótipo para o sistema de Chamados de Obras da Secretaria de Obras do Município. O objetivo principal é fornecer uma plataforma online acessível aos cidadãos para registrar chamados relacionados a obras públicas, como **solicitações de manutenção, reparos** e **asfaltamento de vias**.

## Funcionalidades

- **Cadastro de Chamados:** O cidadão pode registrar novos chamados para manutenção ou asfaltamento, inserindo informações detalhadas como localização, tipo de problema e descrição da obra necessária.

- **Cadastro e Login de Usuários:** O cidadão pode Criar a sua conta (única por pessoa) e entrar no sistema. 
  
- **Visualização de Chamdados:** Os cidadãos podem visualizar todos os chamados registrados, organizados por categorias, como andamento, resolvidos e pendentes. Além disso, é possível buscar por chamados específicos usando filtros como localização, tipo de obra e status.

- **Alteração de dados Cadastrais:** Os usuários podem editar seus dados pessoais, como nome, endereço, e-mail e telefone, garantindo que suas informações estejam sempre atualizadas.


## Tecnologias Utilizadas

### Front-end
- **HTML5 e CSS3:** Estrutura e estilo das páginas de front-end.

### Back-end
- **PHP:** Responsável pelo processamento das requisições do sistema e comunicação com o banco de dados.
  
### Banco de Dados
- **PostgreSQL:** Usado para armazenar os dados dos chamados, usuários e status do sistema. O banco de dados é executado localmente para desenvolvimento.

## Estrutura do Projeto

A estrutura do projeto está organizada da seguinte forma:

```bash
trabalhoBD
│
├── Config
│   └── dataBase.php                    # Arquivo de conexão com o banco de dados
│
├── Controladores
│   |── crudControlador.php             # Controlador principal para CRUD
|   └── Imagens
│
├── Modelos
│   └── crudModelo.php                  # Modelo para interação com o banco de dados
│
├── Vista
│   ├── SiteCadastro
│   │   ├── crudCadastro.php            # Lógica de cadastro
│   │   ├── estiloCadastro.css          # Arquivo CSS para cadastro
│   │   └── Imagens/                        # Imagens do site de cadastro
│   │
│   ├── SiteLogin
│   │   ├── crudVista.php               # Lógica de login
│   │   ├── estiloLogin.css             # Arquivo CSS para o login
│   │   └── Imagens/                        # Imagens do site de login
│   │
│   ├── DadosCadastrais
│   │   ├── crudCadastro.php            # Lógica de dados cadastrais
│   │   ├── estiloDados.css             # Arquivo CSS para dados cadastrais
│   │   └── Imagens/                        # Imagens para dados cadastrais
│   │
│   ├── SiteInicial
│   │   ├── inicio.php                  # Página inicial
│   │   ├── estiloInicial.css           # Arquivo CSS para página inicial
│   │   └── Imagens/                        # Imagens da página inicial
│   │
│   ├── SiteChamado
│   │   ├── crudChamado.php             # Lógica para chamados
│   │   ├── estiloChamado.css           # Arquivo CSS para a página de chamados
│   │   └── Imagens/                        # Imagens para a página de chamados
│   │
│   └── SiteVisualizarChamados
│       ├── crudChamado.php             # Lógica para visualizar chamados
│       ├── estiloVisualizar.css        # Arquivo CSS para visualizar chamados
│       └── Imagens/                        # Imagens para visualizar chamados
│
└── index.php/
````

## Configuração do Ambiente

### Requisitos

- **Servidor Web (Apache, Nginx, etc.)**
- **PHP 7.4 ou superior**
- **PostgreSQL**

## Passos para Execução

1. **Clonar o repositório:**  
   Para obter o código-fonte, clone o repositório do projeto com o seguinte comando:

   ```bash
   git clone git@github.com:kailanyas/projeto-banco-de-dados.git
   

2. **Configurar o Banco de Dados:**  
   No diretório do projeto, existe um arquivo SQL com o script de criação das tabelas e dados de exemplo. Para configurar o banco de dados:

   - Abra o terminal e conecte-se ao PostgreSQL:
     ```bash
     psql -U seu_usuario -d seu_banco_de_dados
     
   - Importe o arquivo `banco-de-dados/script.sql` para criar as tabelas necessárias:
     ```bash
     \i caminho/para/o/script.sql
     

3. **Configurar a Conexão com o Banco de Dados:**  
   No arquivo `Config/dataBase.php`, você deverá ajustar as credenciais de conexão ao banco de dados de acordo com o ambiente local:

   ```php
   $host = "localhost";
   $dbname = "nome_do_banco";
   $user = "seu_usuario";
   $password = "sua_senha";
   ```

4. **Executar o Sistema:**  
   Agora, com o banco de dados configurado e a conexão ajustada, coloque os arquivos do projeto em um servidor web local (como XAMPP, WAMP ou LAMP) ou em um servidor remoto.

   - Inicie o servidor Apache e PostgreSQL no XAMPP, WAMP ou LAMP.
   - Acesse o sistema via navegador no endereço:  
     ```bash
     http://localhost/seu_projeto/index.php
     ```

## Melhorias Futuras

- **Autenticação de Usuário:** Implementar um sistema de login e autenticação para os usuários, permitindo que cidadãos acompanhem apenas seus próprios chamados.
  
- **Relatórios:** Gerar relatórios sobre o andamento das obras, incluindo estatísticas de tempo de resposta e resolução.
  
- **Mobile-First:** Adaptar o design das páginas para melhorar a usabilidade em dispositivos móveis.
