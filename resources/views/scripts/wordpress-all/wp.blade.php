apt-get install -y unzip

wget https://wordpress.org/latest.zip

unzip latest.zip
rm latest.zip
mv wordpress /var/www/{{ $app_domain }}

chown -R www-data /var/www/{{ $app_domain }}

cp /var/www/{{ $app_domain }}/wp-config-sample.php /var/www/{{ $app_domain }}/wp-config.php
sed -i 's/database_name_here/{{ snake_case($app_name) }}_{{ $app_env }}/' /var/www/{{ $app_domain }}/wp-config.php
sed -i 's/username_here/{{ snake_case($app_name) }}/' /var/www/{{ $app_domain }}/wp-config.php
sed -i 's/password_here/{{ $environment['MYSQL_PASSWORD'] }}/' /var/www/{{ $app_domain }}/wp-config.php

service nginx restart

echo "1 * * * *  root  php /var/www/{{ $app_domain }}/wp-cron.php" >> /etc/crontab
