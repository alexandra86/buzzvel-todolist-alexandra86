<h1 align="center" font-family="pattaya">To Do List</h1><br>

<h2 font-family="pattaya">Tecnologias utilizadas</h2>
<div style="display: inline_block"><br>
<img align="center" alt="Alexandra-php" height="80" width="80" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg">
<img align="center" alt="Alexandra-Lv" height="80" width="80" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-plain-wordmark.svg">
   <img align="center" alt="Alexandra-docker" height="80" width="80" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/docker/docker-original.svg">
  <img align="center" alt="Alexandra-mySQL" height="80" width="80" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-plain-wordmark.svg">  
</div><br>

<h2 font-family="pattaya">Descrição</h2><br>
<p font-family="robotto" font-size="16px" line-height="34px" align="justify">
A API é referente a uma aplicação de gerenciamento de tarefas (todolist).
</p><br>

<h2 font-family="pattaya">Libs utilizadas</h2><br>
<ul style="display: inline_block">
<li font-family="robotto" font-size="16px">laravel/framework: "^10.10",</li>
<li font-family="robotto" font-size="16px">tymon/jwt-auth: "^2.0"</li>
</ul><br>


# Documentação da API

## Tabela de Conteúdos

- [Visão Geral](#1-visão-geral)
- [Diagrama ER](#2-diagrama-er)
- [Início Rápido](#3-início-rápido)
    - [Instalando Dependências](#31-instalando-dependências)
    - [Variáveis de Ambiente](#32-variáveis-de-ambiente)
    - [Migrations](#33-migrations)
- [Autenticação](#4-autenticação)
- [Endpoints](#5-endpoints)

---

## 1. Visão Geral

Visão geral do projeto, um pouco das tecnologias usadas.

- [Laravel](https://laravel.com/docs/10.x)
- [Docker](https://www.docker.com/)
- [Composer](https://getcomposer.org/)
- [MySQL](https://dev.mysql.com/doc/)
- [Eloquent](https://laravel.com/docs/10.x/eloquent)

A URL base da aplicação:
http://localhost/api/

---

## 2. Diagrama de Entidade de Relacionamentos (DER)
[ Voltar para o topo ](#tabela-de-conteúdos)


Diagrama DER da API definindo tabelas utilizadas e  seus relacionamentos no banco de dados.

![DER](/todolist/todolist.png)

---
## 3. Início Rápido
[ Voltar para o topo ](#tabela-de-conteúdos)


### 3.1. Instalando Dependências

Clone o projeto em sua máquina e instale as dependências com o comando:

```
composer
```

### 3.2. Comandos Docker
```
comando para rodar o docker: docker compose up;
entrar no container do docker: docker exec -it <nome-do-container> /bin/sh

```

### 3.3. Variáveis de Ambiente

Em seguida, crie um arquivo **.env**, copiando o formato do arquivo **.env.example**:
```
cp .env.example .env
```

Configure suas variáveis de ambiente com suas credenciais do MySQL e uma nova database da sua escolha.

### 3.4. Migrations

Execute as migrations com o comando:

```
criar tabela: php artisan make:migration create_<nome-da-tabela>_table
criar Model: php artisan make:model <nome-da-model>
rodar a migração: php artisan migrate
```

## 4. Autenticação
[ Voltar para o topo ](#tabela-de-conteúdos)


Na aplicação foi usada a biblioteca [jwtAuth](https://jwt-auth.readthedocs.io/en/develop/laravel-installation/) para criação de token e autenticação do cliente.

---
## 5. Endpoints

[ Voltar para o topo ](#tabela-de-conteúdos)

## **users**

A tabela users é definida como:

| Campo      | Tipo   | Descrição                                     |
| -----------|--------|-------------------------------------------------|
| id         | number | Identificador único do usuário                  |
| name       | string | O nome do usuário.                              |
| email      | string | O e-mail do usuário.                            |
| password   | string | A senha de acesso do usuário                   |


### Endpoints

| Método   | Rota       | Descrição                               |
|----------|------------|-----------------------------------------|
| POST     | /users     | Criação de um usuário.                  |
| GET      | /users     | Lista todos os usuários.                 |
| GET      | /users/{id} | Lista um usuário, usando seu ID como parâmetro|
| PATCH    | /users/{id} | Atualiza um usuário, usando seu ID como parâmetro|
| DELETE   | /users/{id} | Deleta um usuário, usando seu ID como parâmetro| 

---

### 1.1. **Criar Usuário**

[ Voltar para os Endpoints ](#5-endpoints)

### `/users`

### Exemplo de Request:
```
POST /users
Host: http://localhost/api/
Authorization: None
Content-type: application/json
```

### Corpo da Requisição:
```json
{
	"name": "Alexandra",
	"email": "alexandra@mail.com",
	"password": "123456"
}
```
### Resposta da Requisição:
```json
{
	"name": "Alexandra",
	"email": "alexandra@mail.com",
	"id": 1
}

OBS: Não há retorno da senha na resposta da requisição.
```
### 1.2. **Listar todos usuários**
```
GET /users
Host: http://localhost/api/
Authorization: None
Content-type: application/json
```

### Corpo da Requisição:
```
Não possui body.
```
### Resposta da Requisição:
```json
[
	{
		"id": 1,
		"name": "Alexandra",
		"email": "alexandra@mail.com",
		"tasks": [
			{
				"id": 1,
				"title": "Ir ao mercado",
				"description": "comprar frutas",
				"created_at": "2023-08-28T01:49:23.000000Z",
				"updated_at": "2023-08-28T01:49:23.000000Z",
				"its_finished": 0,
				"user_id": 1
			}
		]
	}
]
```
### 1.3. **Listar Usuário por id**
### Exemplo de Request:
```
GET /users/{id}
Host: http://localhost/api/
Authorization: None
Content-type: application/json
```

### Corpo da Requisição:
```
Não possui body.
```
### Resposta da Requisição:
```json
{
	"id": 1,
	"name": "Alexandra",
	"email": "alexandra@mail.com",
	"tasks": [
		{
			"id": 1,
			"title": "Ir ao mercado",
			"description": "comprar frutas",
			"created_at": "2023-08-28T01:49:23.000000Z",
			"updated_at": "2023-08-28T01:49:23.000000Z",
			"its_finished": 0,
			"user_id": 1
		}
	]
}

```
### 1.4. **Atualizar Usuário por id**

### Exemplo de Request:
```
PATCH /users/{id}
Host: http://localhost/api/
Authorization: esta rota necessita do token do usuário para acesso
Content-type: application/json
```

### Corpo da Requisição:
```json
{
	"name": "Alexya"
}
```
### Resposta da Requisição:
```json
{
	"id": 1,
	"name": "Alexya",
	"email": "alexandra@mail.com"
}
```

### 1.5. **Deletar Usuário por id**

### Exemplo de Request:
```
DELETE users/{id}
Host: http://localhost/api/
Authorization: esta rota necessita do token do usuário para acesso
Content-type: application/json
```

### Corpo da Requisição:
```
Não possui body
```
### Resposta da Requisição:
```
{
	"message": "User deleted successfully!"
}
```


### 2.1. **Login**

[ Voltar para os Endpoints ](#5-endpoints)

### `/auth/login`

### Exemplo de Request:
```
POST /auth/login
Host: http://localhost/api/
Authorization: None
Content-type: application/json
```

### Corpo da Requisição:
```json
{
	"email": "alexandra@mail.com",
	"password": "123456"
}
```
### Resposta da Requisição:
```json
{
	"token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0L2FwaS9hdXRoL2xvZ2luIiwiaWF0IjoxNjkzMTg3OTk3LCJleHAiOjE2OTMxOTE1OTcsIm5iZiI6MTY5MzE4Nzk5NywianRpIjoiSjdsTnNrYnJHT2JDUG90ayIsInN1YiI6IjEiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.g5Mu8Typ5kplmkJWHj55Bb60O4N_mBLLPEU5rgsDWjw",
	"user": {
		"id": 1,
		"name": "Alexandra",
		"email": "alexandra@mail.com"
	}
}
```

## **tasks**

A tabela tasks é definida como:

| Campo      | Tipo   | Descrição                                     |
| -----------|--------|-------------------------------------------------|
| id         | number | Identificador único da terefa.                 |
| title      | string | O nome da tarefa.                              |
| description | string | A descrição da tarefa.                   |
| created_at | timestamps | A data da criação da tarefa.                   |
| updated_at | timestamps | A data da atualização da tarefa.                   |
| user_id  | Foreign Key | Chave estrangeira do relacionamento entre usuário e tarefa.  |


### Endpoints

| Método   | Rota       | Descrição                               |
|----------|------------|-----------------------------------------|
| POST     | /tasks     | Criação de uma tarefa.                  |
| GET      | /tasks      | Lista todas as tarefas.                 |
| GET      | /tasks/{id} | Lista uma tarefa, usando seu ID como parâmetro|
| PATCH    | /tasks/{id}  | Atualiza uma tarefa, usando seu ID como parâmetro|
| DELETE   | /tasks/{id}   | Deleta uma tarefa, usando seu ID como parâmetro| 

---

### 3.1. **Criar Tarefa**

[ Voltar para os Endpoints ](#5-endpoints)

### `/tasks`

### Exemplo de Request:
```
POST /tasks
Host: http://localhost/api/
Authorization: esta rota necessita do token do usuário para acesso
Content-type: application/json
```

### Corpo da Requisição:
```json
{
	"title": "Ir ao mercado",
	"description": "comprar frutas"
}
```
### Resposta da Requisição:
```json
{
	"title": "Ir ao mercado",
	"description": "comprar frutas",
	"user_id": 1,
	"updated_at": "2023-08-28T01:49:23.000000Z",
	"created_at": "2023-08-28T01:49:23.000000Z",
	"id": 1
}
```
### 1.2. **Listar todas as tarefas**
```
GET /tasks
Host: http://localhost/api/
Authorization: esta rota necessita do token do usuário para acesso
Content-type: application/json
```

### Corpo da Requisição:
```
Não possui body.
```
### Resposta da Requisição:
```json
[
	{
		"id": 1,
		"title": "Ir ao mercado",
		"description": "comprar frutas",
		"created_at": "2023-08-29T12:58:57.000000Z",
		"updated_at": "2023-08-29T12:58:57.000000Z",
		"its_finished": 0,
		"user_id": 1,
		"user_task": {
			"id": 1,
			"name": "Alexandra",
			"email": "alexandra@mail.com"
		}
	},
	{
		"id": 2,
		"title": "Ir à biblioteca",
		"description": "Devolver o livro que peguei emprestado.",
		"created_at": "2023-08-29T12:59:59.000000Z",
		"updated_at": "2023-08-29T12:59:59.000000Z",
		"its_finished": 0,
		"user_id": 1,
		"user_task": {
			"id": 1,
			"name": "Alexandra",
			"email": "alexandra@mail.com"
		}
	}
]
```
### 3.3. **Listar Tarefa por id**
### Exemplo de Request:
```
GET /tasks/{id}
Host: http://localhost/api/
Authorization: esta rota necessita do token do usuário para acesso
Content-type: application/json
```

### Corpo da Requisição:
```
Não possui body.
```
### Resposta da Requisição:
```json

{
	"id": 1,
	"title": "Ir ao mercado",
	"description": "comprar frutas",
	"created_at": "2023-08-29T12:58:57.000000Z",
	"updated_at": "2023-08-29T12:58:57.000000Z",
	"its_finished": 0,
	"user_id": 1,
	"user_task": {
		"id": 1,
		"name": "Alexandra",
		"email": "alexandra@mail.com"
	}
}

```
### 3.4. **Atualizar Tarefa por id**

### Exemplo de Request:
```
PUT /tasks/{id}
Host: http://localhost/api/
Authorization: esta rota necessita do token do usuário para acesso
Content-type: application/json
```

### Corpo da Requisição:
```json
{
	"title": "supermercado"
}
```
### Resposta da Requisição:
```json
{
	"id": 1,
	"title": "supermercado",
	"description": "comprar frutas",
	"created_at": "2023-08-28T01:49:23.000000Z",
	"updated_at": "2023-08-28T02:06:20.000000Z",
	"its_finished": 0,
	"user_id": 1
}
```

### 3.5. **Deletar Tarefa por id**

### Exemplo de Request:
```
DELETE /tasks/{id}
Host: http://localhost/api/
Authorization: esta rota necessita do token do usuário para acesso
Content-type: application/json
```

### Corpo da Requisição:
```
Não possui body
```
### Resposta da Requisição:
```
{
	"message": "Task deleted successfully!"
}
```

### Exemplo de possíveis erros de request.
### Parâmetros da Requisição:
| Parâmetro   | Tipo        | Descrição                             |
|-------------|-------------|---------------------------------------|
| email     | string    | Identificador único do usuário (User) |

### Corpo da Requisição:
```json
{
	"name": "Alexandra",
	"email": "alexandra@mail.com",
	"password": "123456"
}
```

### Exemplo de Response:
```
201 OK
```
```json
{
	"name": "Alexandra",
	"email": "alexandra@mail.com",
	"id": 1
}
```

### Possíveis Erros:
| Código do Erro | Descrição |
|----------------|-----------|
| 409 Conflict   | "errors": "E-mail already registered!" |

