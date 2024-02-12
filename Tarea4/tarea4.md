# <center>Tarea 4: Creación de nodos (agents)<center>

# Nodo con AWS/SSH

<p>Configuramos las credenciales de nuestra instancia AWS:</p>

<p align="center"> <img src="./credenciales.png"></p>
<p align="center"> <img src="./cap4.png"></p>

<p>Creamos el nodo que he llamado "SSH" con la siguiente configuración:</p>

<p align="center"> <img src="./cap3.png"></p>

<p>Ahora creamos el pipeline que utilizará la etiqueta que le hemos puesto, en mi caso "AWS":</p>

<p align="center"> <img src="./pipeline.png"></p>

<p>Entonces ahora ejecutamos el pipeline y vemos si ha funcionado:</p>

<p align="center"> <img src="./cap2.png"></p>
<p align="center"> <img src="./cap1.png"></p>

# Nodo con JNLP

<p>Importante tener esto bien configurado, sino no nos funcionará, también crear el nodo, el tener en cuenta en meter los dos docker en la misma red e instalar el paquete "default-jre"</p>

<p align="center"> <img src="./importante.png"></p>

<p>Ahora hacemos los pasos que nos muestra jenkins y debería funcionar tal que así:</p>

<p align="center"> <img src="./cap5.png"></p>

<p>Tras esto, creamos el pipeline para este nodo. Será el mismo proceso que en el anterior:</p>

<p align="center"> <img src="./config.png"></p>

<p>Probamos que funcione:</p>

<p align="center"> <img src="./JNLP.png"></p

<p>Y vemos su estado:</p>

<p align="center"> <img src="./pipeline_status.png"></p>