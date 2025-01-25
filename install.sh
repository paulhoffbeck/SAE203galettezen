apt update
apt install -y bind9
cat <<EOL >/etc/bind/named.conf.options
options {
	directory "/var/cache/bind";
	allow-query { any; };
	forwarders {
        8.8.8.8;
        8.8.4.4;
    };
}
EOL
systemctl restart bind9
systemctl enable bind9
apt install apache2 php libapache2-mod-php
cp -r SAE203Galettezen/ /var/www/html/site
cat <<EOL >/etc/apache2/sites-available/000-default.conf
<VirtualHost *:80>
    DocumentRoot /var/www/html/site
    <Directory /var/www/html/site>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
EOL
chown -R www-data:www-data /var/www/html/site
chmod -R 755 /var/www/html/site
systemctl restart apache2

