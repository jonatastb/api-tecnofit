# Ranking Tecnofit - API

**Descrição**: Este é um projeto de uma API de Rankings, foi desenvolvido com Laravel 11 e SQLite. Com autenticação *sanctum* para proteger as rotas. A principal funcionalidade é exibir o ranking de usuários cadastrados no banco de dados.
<br>
<br>
## Instalação

### 1. Clonar o repositório

```bash
git clone https://github.com/jonatastb/api-tecnofit
cd api-tecnofit
```

### 2. Instalar as dependências do PHP

```bash
composer install
```


### 3. Configuração do ambiente

```bash
cp .env.example .env
```

### 4. Configurar o banco de dados

No arquivo .env, configure as credenciais do banco de dados conforme sua escolha. No meu caso utilizei SQLite, para manter o foco na funcionalidade da API e não na configuração do banco. Se for utilizar SQLite, basta alterar `mysql` para `sqlite`.

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=usuario
DB_PASSWORD=senha
```

### 5. Gerar a chave de aplicativo

```bash
php artisan key:generate
```

### 6. Executar as migrações e seeders do banco de dados

Se estiver utilizando SQLite, o Laravel ira perguntar se você deseja criar o `database.sqlite`, no caso do Laravel não criar sozinho é só criar manualmente na pasta `database/`

```bash
php artisan migrate --seed
```
<br>

## Rodando o Projeto
```bash
php artisan serve 
```
**URL**: http://localhost:8000.

<br>

## Autenticação

Escolha seu programa de testes de API preferido e insira as rotas e configurações nos headers e body(se necessário).

### Login (POST)

A rota de login permite que um usuário se autentique e obtenha um **token** para realizar operações autenticadas.

**Endpoint**: `/api/login`

**Método**: `POST`

**Corpo da Requisição**:

No seeder o admin já é criado com essas informações.

```json
{
  "email": "admin@teste.com", 
  "password": "123456"
}
```

**Resposta bem sucedida:**
```json
{
    "success": true,
    "data": {
        "user": {
            "id": 4,
            "name": "Admin",
            "email": "admin@teste.com"
        },
        "token": "TOKEN"
    },
    "message": "Login bem-sucedido!"
}
```
**Resposta caso as credenciais estejam incorretas:** 
```json
{
    "error": "Credenciais inválidas"
}
```
<br>

### Logout (POST)

A rota de logout permite que o usuário desconecte-se, invalidando o token de autenticação atual.

**Endpoint**: `/api/logout`

**Método**: `POST`

**Cabeçalhos**: 
 ```bash
    Authorization: `Bearer TOKEN_GERADO_NO_LOGIN` (necessário para autenticação de logout)
 ```
**Resposta bem sucedida:**
```json
{
    "message": "Logout bem-sucedido!"
}
```
**Resposta mal sucedida:**
```json 
{
    "success": false,
    "errors": {
        "error": "Not Found",
        "message": "Esta rota não existe ou você não tem permissao."
    }
}
```

<br>

## Ranking

### Ranking - Listar (GET)
A rota retorna todos os movimentos e recordes pessoais.

**Endpoint**: `/api/ranking`

**Método**: `GET`

**Cabeçalhos**: 
 ```bash
    Authorization: `Bearer TOKEN_GERADO_NO_LOGIN` (necessário para autenticação) 
 ```
**Resposta bem sucedida:**
```json
{
    "success": true,
    "data": {
        "Nome do Movimento": [
            {
                "user": "string",
                "value": integer,
                "date": "string",
                "position": integer
            },
        ],
    },
    "message": "Todos os recordes dos movimentos"
}
```
**Resposta mal sucedida:**
```json 
{
    "success": false,
    "errors": {
        "error": "Not Found",
        "message": "Esta rota não existe ou você não tem permissao."
    }
}
```

<br>

### Ranking - Detalhes de um movimento (GET)
A rota para obter os detalhes de um movimento específico, passando o ID do movimento como parâmetro.

**Endpoint**: `/api/ranking/{id}`

**Método**: `GET`

**Parâmetros**: 
 ```bash
    id: ID do movimento desejado (por exemplo, 1)
 ```
**Cabeçalhos**: 
 ```bash
    Authorization: `Bearer TOKEN_GERADO_NO_LOGIN` (necessário para autenticação) 
 ```
**Resposta bem sucedida:**
```json
{
    "success": true,
    "data": {
        "Nome do Movimento": [
            {
                "user": "string",
                "value": integer,
                "date": "string",
                "position": integer
            },
        ],
    },
    "message": "Todos os recordes dos movimentos"
}
```
**Resposta mal sucedida:**
```json 
{
    "success": false,
    "errors": {
        "error": "Not Found",
        "message": "Esta rota não existe ou você não tem permissao."
    }
}
```

<br>

## Observações finais

A descrição do teste mencionava que deveríamos entregar o projeto em um estado que considerássemos pronto para produção. No meu entendimento, uma aplicação que lida com dados dos usuários precisa de um sistema de autenticação. No futuro, diversos aspectos poderiam ser aprimorados, como um login específico para que os usuários visualizem suas pontuações e a implementação de permissões mais detalhadas. No entanto, acredito que entreguei um projeto alinhado ao que foi solicitado, com algumas melhorias adicionais. Qualquer dúvida entre em contato com o desenvolvedor.




