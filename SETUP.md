# Cadi Backend - Magento 2.4.8+ Docker Setup Guide

This guide documents the complete setup process for the Cadi Backend Magento project using Docker.

## Prerequisites

- Docker and Docker Compose installed
- Magento Marketplace credentials (get them from: https://marketplace.magento.com/customer/accessKeys/)

## Project Ports

This project uses unique ports to avoid conflicts with other Magento projects:
- **8081**: Web server (Nginx)
- **3308**: MariaDB database
- **9203**: OpenSearch
- **1082**: Mailcatcher web interface
- **1026**: Mailcatcher SMTP port

## Initial Setup

### 1. Start Docker Containers

```bash
cd "/home/umar/Projects/Cadi Backend"
docker-compose up -d
```

Wait for all containers to start. Check status:
```bash
docker-compose ps
```

### 2. Install Magento

Enter the PHP container:
```bash
docker exec -it cadi-backend-php bash
```

Inside the container, navigate to the web root:
```bash
cd /var/www/html
```

Install Magento using Composer:
```bash
composer create-project --repository-url=https://repo.magento.com/ magento/project-community-edition .
```

**Note:** You'll need to provide your Magento Marketplace credentials when prompted:
- Public Key: (from https://marketplace.magento.com/customer/accessKeys/)
- Private Key: (from https://marketplace.magento.com/customer/accessKeys/)

### 3. Set Permissions

Still inside the PHP container:
```bash
chown -R www-data:www-data .
find . -type d -exec chmod 770 {} \;
find . -type f -exec chmod 660 {} \;
chmod u+x bin/magento
```

### 4. Copy Nginx Configuration

Copy the nginx sample configuration:
```bash
cp nginx.conf.sample nginx.conf
```

### 5. Install Magento

Exit the PHP container and run the installation from your host machine:
```bash
docker exec cadi-backend-php bin/magento setup:install \
  --base-url=http://localhost:8081 \
  --db-host=db \
  --db-name=magento \
  --db-user=magento \
  --db-password=magento \
  --admin-firstname=Admin \
  --admin-lastname=User \
  --admin-email=admin@example.com \
  --admin-user=admin \
  --admin-password=Admin123! \
  --language=en_US \
  --currency=USD \
  --timezone=America/Chicago \
  --use-rewrites=1 \
  --search-engine=opensearch \
  --opensearch-host=opensearch \
  --opensearch-port=9200
```

### 6. Configure Email (Mailcatcher)

Configure Magento to use Mailcatcher for email:
```bash
docker exec cadi-backend-php bin/magento config:set system/smtp/disable 0
docker exec cadi-backend-php bin/magento config:set system/smtp/host mailcatcher
docker exec cadi-backend-php bin/magento config:set system/smtp/port 1025
docker exec cadi-backend-php bin/magento cache:flush
```

### 7. Enable 2FA Bypass Module (Development Only)

Enable the custom module to bypass 2FA for development:
```bash
docker exec cadi-backend-php bin/magento module:enable Custom_DisableTfa
docker exec cadi-backend-php bin/magento setup:upgrade
docker exec cadi-backend-php bin/magento cache:flush
```

## Access URLs

- **Storefront**: http://localhost:8081
- **Admin Panel**: http://localhost:8081/admin_* (check admin URI with: `docker exec cadi-backend-php bin/magento info:adminuri`)
- **Mailcatcher**: http://localhost:1082

## Default Admin Credentials

- **Username**: `admin`
- **Password**: `Admin123!` (change this after first login!)

## Important Notes

1. **OpenSearch**: This project uses OpenSearch 2.11.0 for search functionality.

2. **2FA Bypass Module**: The custom module (`Custom_DisableTfa`) bypasses 2FA for development purposes. **Do not use this in production!**

3. **Mailcatcher**: All emails are caught by Mailcatcher and can be viewed at http://localhost:1082. No emails are actually sent.

4. **Data Persistence**: 
   - Database data is stored in the `dbdata` Docker volume
   - OpenSearch data is stored in the `opensearch-data` Docker volume
   - Source code is in the `src/` directory

## Troubleshooting

### Containers not starting
```bash
docker-compose logs [service-name]
```

### Permission issues
```bash
docker exec cadi-backend-php chown -R www-data:www-data /var/www/html
```

### Cache issues
```bash
docker exec cadi-backend-php bin/magento cache:flush
```

### Port conflicts
If you have port conflicts, edit `docker-compose.yml` and change the port mappings.

### Check container status
```bash
docker-compose ps
```

### View logs
```bash
docker-compose logs -f [service-name]
```

## Useful Commands

### Stop containers
```bash
docker-compose down
```

### Start containers
```bash
docker-compose up -d
```

### Restart a specific service
```bash
docker-compose restart [service-name]
```

### Access PHP container
```bash
docker exec -it cadi-backend-php bash
```

### Access database
```bash
docker exec -it cadi-backend-db mysql -u magento -pmagento magento
```

## Next Steps

1. Change the default admin password
2. Configure your store settings
3. Install sample data (optional)
4. Set up SSL for production (if needed)
5. Remove or properly configure 2FA for production use

