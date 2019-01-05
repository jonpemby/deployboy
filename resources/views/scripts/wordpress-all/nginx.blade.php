apt-get install -y nginx

cat <<EOF > /etc/nginx/sites-available/default
@include('scripts.wordpress-all.nginx-config')
EOF

sed -i 's/app_domain/{{ $app_domain }}/' /etc/nginx/sites-available/default
sed -i 's/try_files/try_files \$uri \$uri\/ \/index.php\?\$args;/' /etc/nginx/sites-available/default

