## Requirements
- Docker compose

## Setup

Execute commands step by step

- `git clone https://github.com/achrafkh/sqdec.git`

- `cd sqdec && cp my-project/.env.example my-project/.env`

- `docker-compose run --rm myapp composer update`

- `docker-compose run --rm myapp php artisan migrate`

- `docker-compose run --rm myapp npm install`

- `docker-compose run --rm myapp npm run build`

- `docker-compose up -d`

- Visit http://localhost:8000