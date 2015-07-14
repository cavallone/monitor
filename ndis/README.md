# Installation
1. Install GEOIP
```bash
sudo yum install php-pear
sudo pecl install geoip
```
Add "extension=geoip.so" to `/etc/php.ini`

Restart apache now
