# Customer Invoice Manager

Projeto desenvolvido em Laravel para gerenciamento de **clientes** e suas **faturas (invoices)** apenas para fins didáticos. O sistema permite a criação, edição, deleção, filtragem e visualização de dados, além de contar com autenticação via **Laravel Sanctum**.

## ✨ Funcionalidades

- CRUD de Clientes  
- CRUD de Faturas  
- Filtro amplo de dados 
- Middleware de autenticação com Laravel Sanctum  
- Seeds para popular banco de dados com dados de exemplo  
- Implementação de lógica para remoção e verificação de dados  
- Criação em massa de pedidod (Bulk Insert)  

---

## ⚙️ Requisitos

- PHP >= 8.1  
- Composer  
- MySQL ou outro banco de dados compatível  
- Laravel 12.x  

---

## 🚀 Instalação

### 1. Clone o repositório

```bash
git clone https://github.com/seu-usuario/customers-api.git
cd customers-api
```

### 2. Instale as dependências PHP

```bash
composer install
```

### 3. Copie o arquivo `.env` e configure

```bash
cp .env.example .env
```

Edite o `.env` com as credenciais do seu banco de dados:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=usuario
DB_PASSWORD=senha
```

### 4. Gere a chave da aplicação

```bash
php artisan key:generate
```

### 5. Rode as migrations e seeders

```bash
php artisan migrate --seed
```
---

## 🔐 Autenticação com Sanctum

Este projeto utiliza o Laravel Sanctum para autenticação. Acesse a url ```http://127.0.0.1:8000/setup``` e em seguida cole o token **Bearer** em requisições.

Para mais informações, consulte a [documentação do Sanctum](https://laravel.com/docs/sanctum).

---

## ▶️ Executando o servidor

```bash
php artisan serve
```

O projeto estará acessível em:

```
http://127.0.0.1:8000
```

---

## 📌 Rotas úteis

| Método | Rota                | Descrição                      |
|--------|---------------------|--------------------------------|
| POST   | /api/v1/customers      | Cria um novo cliente           |
| PUT    | /api/v1/customers/{id} | Atualiza um cliente            |
| PATCH  | /api/v1/customers/{id} | Atualiza um cliente de forma parcial           |
| DELETE | /api/v1/customers/{id} | Deleta um cliente              |
| POST   | /api/v1/invoices       | Cria uma nova fatura           |
| POST   | /api/v1/invoices/bulk  | Cria novas faturas em massa    |
| PUT    | /api/v1/invoices/{id}  | Atualiza uma fatura            |
| PATCH  | /api/v1/invoices/{id}  | Atualiza uma fatura de forma parcial           |
| DELETE | /api/v1/invoices/{id}  | Remove uma fatura              |
| GET    | /api/v1/customers      | Lista e filtra clientes        |
| GET    | /api/v1/invoices       | Lista e filtra faturas         |

---
