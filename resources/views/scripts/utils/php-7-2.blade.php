add-apt-repository -y ppa://ondrej/php
apt-get update -y
apt-get install -y php7.2 php7.2-{{ $database_ext }} php7.2-fpm php7.2-mbstring php7.2-json php7.2-curl

