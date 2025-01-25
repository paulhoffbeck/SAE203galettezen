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
};
EOL
systemctl restart bind9
systemctl enable bind9
apt install apache2 php libapache2-mod-php
cp -r ../SAE203galettezen/ /var/www/html/
cat <<EOL >/etc/apache2/sites-available/000-default.conf
<VirtualHost *:80>
    DocumentRoot /var/www/html/SAE203galettezen
    <Directory /var/www/html/SAE203galettezen>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
<VirtualHost *:8080>
    DocumentRoot /var/www/html/SAE203galettezen/intranet
    <Directory /var/www/html/SAE203galettezen/intranet>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
EOL

echo "Listen 8080" >> /etc/apache2/ports.conf
chown -R www-data:www-data /var/www/html/SAE203galettezen
chmod -R 755 /var/www/html/SAE203galettezen
chown -R www-data:www-data /var/www/html/SAE203galettezen/intranet
chmod -R 755 /var/www/html/SAE203galettezen/intranet
systemctl restart apache2

