1. Entrar na pasta "C:\Windows\System32\drivers\etc"
2. Alterar o arquivo "host", colocando o código na ultima linha

Código:
127.0.0.1		www.nomesite.com.br

1. Entrar na pasta "C:\xampp\apache\conf\extra"
2. Alterar o arquivo "httpd-vhosts.conf", colocando o código na ultima linha

Código: 

<VirtualHost *:80>
    ServerAdmin filipeodev@gmail.com
    DocumentRoot "C:/site-base-slim"
    ServerName www.site-base-slim.com.br
    ErrorLog "logs/dummy-host2.example.com-error.log"
    CustomLog "logs/dummy-host2.example.com-access.log" common
    <Directory "C:/site-base-slim">
        Require all granted

        RewriteEngine On

        RewriteCond %{REQUEST_FILENAME} !-d
        RewriteCond %{REQUEST_FILENAME} !-f
        RewriteRule ^ index.php [QSA,L]
    </Directory>
</VirtualHost>

