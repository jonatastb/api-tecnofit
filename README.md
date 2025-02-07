# Ranking Tecnofit - API

**Descrição**: Este é um projeto de uma API de Rankings, ele foi feito em Laravel 11 e SQLite. Com auntenticação *sanctum* para as rotas. Sua funcionalidade principal é mostrar o ranking de usuários já cadastrados no banco.

---

## Tecnologias Utilizadas

- **PHP** (versão 8.x ou superior)
- **Laravel** (versão 11.x)
- **SQLite** (ou o banco de dados de sua escolha)
- **Composer** (para gerenciar dependências)
- **Node.js** (caso tenha dependências de frontend com JavaScript)
- **Vue.js** ou **React** (dependendo do seu stack de frontend, se houver)

---

## Instalação

### 1. Clonar o repositório

```bash
git clone https://github.com/jonatastb/api-tecnofit
cd seu-projeto
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

No .env altere para o banco de dados de sua escolha. No meu caso utilizei SQLite, para manter o foco na funcionalidade da API e não na configuração do banco.

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

```bash
php artisan migrate --seed
```

---

## Rodando o Projeto
```bash
php artisan serve 
```
**URL**: http://localhost:8000.

--- 
## Autenticação

Escolha seu programa de testes de API preferido e insira as rotas e configurações nos headers e body(se necessário). Ao final vou deixar um exemplo básico no Postman.

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
### Logout (POST)

A rota de logout permite que o usuário desconecte-se, invalidando o token de autenticação atual.

**Endpoint**: `/api/logout`

**Método**: `POST`

**Cabeçalhos**: 
-- **Authorization** `Bearer TOKEN_GERADO_NO_LOGIN`  

### Logout (POST)

A rota de logout permite que o usuário desconecte-se, invalidando o token de autenticação atual.

**Endpoint**: `/api/logout`

**Método**: `POST`

**Cabeçalhos**: 
 ```bash
    Authorization: `Bearer TOKEN_GERADO_NO_LOGIN` (necessário para autenticação de logout)
 ```

## Ranking

### Ranking - Listar (GET)
A rota para retornar todos os movimentos e Recordes pessoais.

**Endpoint**: `/api/ranking`

**Método**: `GET`

**Cabeçalhos**: 
 ```bash
    Authorization: `Bearer TOKEN_GERADO_NO_LOGIN` (necessário para autenticação) 
 ```

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

---
## Observações finais

A descrição do teste mencionava que deveríamos entregar o projeto em um estado que considerássemos pronto para produção. No meu entendimento, uma aplicação que lida com dados dos usuários precisa de um sistema de autenticação. No futuro, diversos aspectos poderiam ser aprimorados, como um login específico para que os usuários visualizem suas pontuações e a implementação de permissões mais detalhadas. No entanto, acredito que entreguei um projeto alinhado ao que foi solicitado, com algumas melhorias adicionais. Qualquer dúvida entre em contato por `jonatas.bueno@outlook.com` ou `(41) 9 8715-6232` 




