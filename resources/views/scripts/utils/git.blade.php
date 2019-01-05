mkdir /var/repo
git init --bare /var/repo/app.git

echo "#!/bin/bash" >> /var/repo/app.git/post-receive
echo "git --work-tree=/var/www/{{ $app_domain }} --git-dir=/var/repo/app.git checkout -f" >> /var/repo/app.git/post-receive

chmod +x /var/repo/app.git/post-receive
