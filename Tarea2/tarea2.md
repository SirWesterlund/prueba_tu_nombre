# <center>Tarea 2: Freestyle job - despliegue web/git<center>

<p> Esta es la configuración para descargarnos el repositorio de GitHub, como se ve más abajo, el contenido se ha guardado en el workspace y dentro de él está clonado que es el job que ha relizado la tarea.</p>

<p align="center"> <img src="./cap1.png"></p>

<p align="center"> <img src="./cap2.png"></p>

<p align="center"> <img src="./cap3.png"></p>

<p>Ahora crearemos los volúmenes tras haber logrado el clonado. Aquí tengo los dos comandos con los volúmenes, el de jenkins tiene persistencia y también un volumen a la carpeta /www en mi máquina local y /www para él y el de Apache simplemente el volumen para el clonado del repositorio.</p>

<p align="center"> <img src="./cap4.png"></p>

<p align="center"> <img src="./cap5.png"></p>

<p>/www en mi máquina local:</p>

<p align="center"> <img src="./cap6.png"></p>

<p>/var/www/html en el docker de apache:</p>

<p align="center"> <img src="./cap7.png"></p>

<p>/www en el docker de jenkins:</p>

<p align="center"> <img src="./cap8.png"></p>