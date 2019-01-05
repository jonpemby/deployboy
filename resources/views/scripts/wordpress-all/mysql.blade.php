apt-get update -y
apt-get install -y mysql-server

mysql_secure_installation --use-default --password={{ $environment['MYSQL_PASSWORD'] }}

mysql -u root --password={{ $environment['MYSQL_PASSWORD'] }} -e "CREATE USER {{ snake_case($app_name) }} IDENTIFIED BY '{{ $environment['MYSQL_PASSWORD'] }}';"
mysql -u root --password={{ $environment['MYSQL_PASSWORD'] }} -e "CREATE DATABASE {{ snake_case($app_name) }}_{{ $app_env }};"
mysql -u root --password={{ $environment['MYSQL_PASSWORD'] }} -e "GRANT ALL PRIVILEGES ON {{ snake_case($app_name) }}_{{ $app_env }}.* TO {{ snake_case($app_name) }};"
