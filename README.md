# Trabajo 1 Sistemas Opertaivos
Explorador de archivos WEB gráfico

Para ejecutar este proyecto:
## - Windows:
  1. Instalar el wamp server, ejecutarlo y que todos los servicios esten activos
  2. Copiar la carpeta del proyecto dentro de la carpeta WWW que se encuentra en la carpeta donde esta instalado el Wamp server *(C:\wamp64)*
  3. Abrir el navegador web, y Pegar la dirección:
      ~~~
      localhost/Trabajo1SO/index.html
      ~~~

## - Linux (Fedora):
  1. Copiar la carpeta del proyecto en nuestro escritorio
  2. Debemos tener instalado XAMPP y php en nuestro equipo
  3. Comprobamos la instalación de PHP con el comando:
      ~~~
      php73 -v
      ~~~
  4. Instalación y inicialización de Apache Service con los comandos:
      ~~~
      dnf install httpd
      systemctl start httpd.service
      ~~~
  4. Configuraramos el Firewall con los comandos:
      ~~~
      firewall-cmd --get-active-zones
      firewall-cmd --permanent --zone=public --add-service=http
      systemctl restart firewalld.service
      ~~~