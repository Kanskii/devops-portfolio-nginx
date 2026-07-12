# DevOps Portfolio

Портфолио-сайт DevOps-инженера на чистом PHP, упакованный в Docker
и разворачиваемый через `docker-compose` (Nginx + PHP-FPM). CI на
GitHub Actions прогоняет lint и собирает образ при каждом push/PR.

## Структура проекта

```
devops-portfolio/
├── index.php              # главная страница
├── about.php               # обо мне / навыки / опыт
├── projects.php             # карточки проектов
├── contacts.php              # контакты + форма (демо, без реальной отправки)
├── includes/                  # общие header/footer/config
├── css/style.css               # стили (тёмная тема)
├── images/                      # изображения (пусто, добавьте свои)
├── Dockerfile                    # образ php-fpm с кодом приложения
├── docker-compose.yml             # nginx + php для локальной разработки
├── nginx/default.conf               # конфиг nginx (proxy_pass на php-fpm)
├── .github/workflows/ci.yml           # CI: php-lint + docker build
└── README.md
```

## Быстрый старт

Требования: установленный Docker и Docker Compose.

```bash
git clone <your-repo-url> devops-portfolio
cd devops-portfolio
docker compose up -d --build
```

Сайт будет доступен на [http://localhost:8080](http://localhost:8080).

Остановить и удалить контейнеры:

```bash
docker compose down
```

## Локальная разработка без Docker

Если под рукой есть PHP 8.x, можно поднять встроенный сервер:

```bash
php -S localhost:8000
```

## CI/CD

Workflow `.github/workflows/ci.yml` запускается на каждый push и pull
request в ветку `main` и выполняет:

1. **lint** — проверку синтаксиса всех `.php`-файлов (`php -l`).
2. **docker-build** — сборку Docker-образа и публикацию в реестр(ы):

   - По умолчанию workflow пушит образ в GitHub Container Registry (GHCR) под тегами
     `ghcr.io/<OWNER>/devops-portfolio:latest` и `ghcr.io/<OWNER>/devops-portfolio:<sha>`.
   - Опционально workflow также может пушить в Docker Hub при наличии секретов
     `DOCKERHUB_USERNAME` и `DOCKERHUB_TOKEN`.

Настройка секретов:

  `DOCKERHUB_TOKEN` (personal access token или пароль).
  для аутентификации при пуше в `ghcr.io`.

После добавления секретов пуш в Docker Hub будет выполняться автоматически при
каждом пуше в `main`.

SSH деплой

Workflow может автоматически деплоить образ на удалённый сервер по SSH.
Для этого добавьте в `Settings → Secrets` репозитория следующие секреты:

- `SSH_HOST` — IP или доменное имя сервера
- `SSH_USER` — пользователь для подключения по SSH (например, `ubuntu`)
- `SSH_PRIVATE_KEY` — приватный SSH-ключ (PEM), соответствующий публичному ключу на сервере
- `SSH_PORT` — (опционально) порт SSH, по умолчанию `22`

На сервере должно быть установлено Docker. По умолчанию workflow выполняет
команды:

```bash
docker pull ghcr.io/<OWNER>/devops-portfolio:latest
docker stop devops-portfolio || true
docker rm devops-portfolio || true
docker run -d --restart=always --name devops-portfolio -p 80:80 ghcr.io/<OWNER>/devops-portfolio:latest
```

Если вы используете приватный образ в GHCR, настройте на сервере доступ к GHCR
через `docker login` с помощью Personal Access Token, либо используйте публичный образ
или Docker Hub.

## Настройка контента

Все тексты, ссылки на соцсети и список навыков/проектов правятся в
`includes/config.php`, `about.php` и `projects.php` — верстка отдельно
от контента не разносится специально, чтобы проект было легко читать
и редактировать без сборщиков.

## Дальнейшие идеи для развития

- Добавить Kubernetes-манифесты (`k8s/`) и деплой через Helm.
- Подключить Terraform для инфраструктуры (например, деплой на VPS/EC2).
- Добавить stage `deploy` в CI с публикацией на сервер по SSH или через
  registry + webhook.
- Настроить мониторинг контейнеров (Prometheus + cAdvisor + Grafana).
