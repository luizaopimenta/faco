# Projeto Laravel - Formulários de treino (Login, Upload de Imagem e Vídeo)

Este repositório contém um scaffold mínimo de um projeto Laravel para que alunos treinem formulários HTML e consumam rotas HTTP de login e uploads de arquivos.

Setup rápido

1. Instalar dependências:

```bash
composer install
```

2. Copiar `.env` e gerar chave:

```bash
cp .env.example .env
php artisan key:generate
```

3. Criar arquivo SQLite (opção simples para testes):

```bash
mkdir -p database
touch database/database.sqlite
php artisan migrate
```

4. Linkar storage público:

```bash
php artisan storage:link
```

5. Rodar servidor local:

```bash
php artisan serve
```

Exemplos de consumo (cURL)

Login (cria usuário se não existir):

```bash
curl -X POST http://127.0.0.1:8000/login \
  -F "email=aluno@example.com" \
  -F "password=secret"
```

Upload de imagem:

```bash
curl -X POST http://127.0.0.1:8000/upload/image \
  -F "image=@/caminho/para/exemplo.jpg"
```

Upload de vídeo:

```bash
curl -X POST http://127.0.0.1:8000/upload/video \
  -F "video=@/caminho/para/exemplo.mp4"
```

Observações

- Este scaffold é mínimo: após `composer install` o framework Laravel completo será baixado pelo Composer.
- Use `sqlite` para facilitar; você pode configurar `DB_CONNECTION` para `mysql` se preferir.
