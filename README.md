# API DE PRODUTOS

## Subir container com docker  
```bash
docker-compose up -d --build
docker exec -it api-produtos bash 
php artisan migrate
```