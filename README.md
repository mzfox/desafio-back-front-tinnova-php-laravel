# Desafio Técnico TINNOVA 2025 - Backend com Laravel + Frontend Blade

Este projeto consiste em uma aplicação para cadastro e gerenciamento de veículos, além da implementação dos exercícios 1 a 5 solicitados no desafio técnico da TINNOVA. A API foi desenvolvida em **Laravel 10**, com banco de dados **PostgreSQL**, e um frontend integrado em **Blade (Laravel)** que consome os endpoints via `fetch`.

---

## ✅ Tecnologias Utilizadas

- PHP 8.1
- Laravel 10
- PostgreSQL
- Blade (Laravel View)
- HTML + JS (fetch API)
- PHPUnit (para testes automatizados)

---

## 📚 Exercícios 1 a 5

| Exercício | Descrição | Tecnologia | Como rodar |
|-----------|-----------|------------|------------|
| 1         | Cálculo de percentual de votos | Laravel (PHP) | Acesse `http://localhost:8000/exercicio1` |
| 2         | Ordenação Bubble Sort de array | Laravel (PHP) | Acesse `http://localhost:8000/exercicio2` |
| 3         | Cálculo de fatorial recursivo | Laravel (PHP) | Acesse `http://localhost:8000/exercicio3` |
| 4         | Soma de múltiplos de 3 ou 5 até um limite | Laravel (PHP) | Acesse `http://localhost:8000/exercicio4` |
| 5         | Cadastro completo de veículos com API REST + frontend | Laravel + Blade + PostgreSQL | API: `/api/veiculos`, Frontend: `/veiculos-ui` |

> Os Exercícios 1 a 4 estão organizados em controllers individuais com rotas dedicadas em `routes/web.php`.

---

## 📦 Funcionalidades da API RESTful (Exercício 5)

| Método  | Endpoint                      | Descrição                               |
|---------|-------------------------------|------------------------------------------|
| GET     | `/api/veiculos`               | Lista todos os veículos                  |
| GET     | `/api/veiculos?marca&ano&cor` | Lista com filtros de marca, ano e cor   |
| GET     | `/api/veiculos/{id}`          | Detalha um veículo por ID                |
| POST    | `/api/veiculos`               | Cadastra novo veículo                    |
| PUT     | `/api/veiculos/{id}`          | Atualização completa de um veículo       |
| PATCH   | `/api/veiculos/{id}`          | Atualização parcial                      |
| DELETE  | `/api/veiculos/{id}`          | Remove um veículo                        |

---

## 🧪 Testes Automatizados

Executar testes:

```bash
php artisan test
```

---

## 💻 Frontend Integrado (Blade)

### Acesse a interface:

```
http://localhost:8000/veiculos-ui
```

### Funcionalidades disponíveis:

- Listagem de todos os veículos
- Cadastro via formulário
- Edição reutilizando o formulário
- Exclusão com confirmação
- Atualização automática após ações

---

## ⚙️ Como Rodar Localmente

### 1. Clone o repositório

```bash
git clone https://github.com/mzfox/desafio-back-front-tinnova-php-laravel.git
cd desafio-back-front-tinnova-php-laravel
```

### 2. Instale as dependências

```bash
composer install
```

### 3. Configure o ambiente

```bash
cp .env.example .env
php artisan key:generate
```

Configure seu PostgreSQL no `.env`:

```
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=tinnova_db
DB_USERNAME=postgres
DB_PASSWORD=sua_senha
```

### 4. Execute as migrations

```bash
php artisan migrate
```

### 5. Rode a aplicação

```bash
php artisan serve
```

Acesse:

```
http://localhost:8000/veiculos-ui
```

---

## ✍️ Autor

Desenvolvido por **Matheus Visotto**  
🔗 [github.com/mzfox](https://github.com/mzfox)