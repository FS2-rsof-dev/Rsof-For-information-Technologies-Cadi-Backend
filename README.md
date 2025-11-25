# Cadi Backend - Magento 2.4.8+ Project

This is a Magento 2.4.8+ project set up with Docker for the Cadi Backend.

## Quick Start

1. **Start Docker containers:**
   ```bash
   docker-compose up -d
   ```

2. **Follow the setup instructions in SETUP.md**

## Project Structure

```
Cadi Backend/
├── docker-compose.yml          # Docker services configuration
├── docker/
│   ├── nginx/
│   │   └── default.conf        # Nginx configuration
│   └── php/
│       └── www.conf            # PHP-FPM pool configuration
├── src/                        # Magento source code (created during installation)
│   └── app/code/Custom/
│       └── DisableTfa/         # 2FA bypass module (development only)
├── SETUP.md                    # Detailed setup instructions
└── README.md                   # This file
```

## Ports Used

- **8081**: Web server (Nginx)
- **3308**: MariaDB database
- **9203**: OpenSearch
- **1082**: Mailcatcher web interface
- **1026**: Mailcatcher SMTP port

## Services

- **web**: Nginx web server
- **php**: PHP-FPM 8.2 container
- **db**: MariaDB 10.4 database
- **opensearch**: OpenSearch 2.11.0
- **mailcatcher**: Mail catcher service

## Important Notes

- This project uses unique ports to avoid conflicts with other Magento projects
- The 2FA bypass module is for development only - do not use in production
- All emails are caught by Mailcatcher (view at http://localhost:1082)

## Documentation

See `SETUP.md` for complete setup and installation instructions.

