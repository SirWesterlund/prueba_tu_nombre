# <center>Tarea 1 Job Básico</center>

<p>Creo la carpeta test</p>

<p align="center"> <img src="./carpeta.png"></p>

&nbsp;

<p>Ahora dentro de ella creo el proyecto de estilo libre que lo he llamado id</p>

<p align="center"> <img src="./id.png"></p>

<p>Ahora dentro de id pongo lo necesario para que se ejecute periódicamente:</p>

<p align="center"> <img src="./periodically.png"></p>

<p>Ahora hago el script que necesito para realizar las comprobaciones necesarias y pongo el código en Build Steps, después abajo del todo pongo el correo al que quiero que sean recibidas las notificaciones.</p>

<p align="center"> <img src="./script-y-mail.png"></p>

<p>Tras esto nos vamos a Administrar Jenkins y en System ponemos lo siguiente:</p>

<p align="center"> <img src="./extended.png"></p>
<p align="center"> <img src="./system.png"></p>

<p>Podemos probar la configuración enviando un mensaje de prueba a una dirección de correo haciendo esto:</p>

<p align="center"> <img src="./prueba-correo.png"></p>

<p>Y si todo ha funcionado nos debe salir el mensaje que dice "Email was succesfully sent" y nos debería haber llegado rápidamente."</p>

<p align="center"> <img src="./prueba-de-envio.png"></p>

<p>También tenemos que darle a jenkins unas credenciales desde gmail en el apartado de verificación de dos pasos y copiar y pegar esa contraseña</p>

<p align="center"> <img src="./contraseña-jenkins.png"></p>

<p>Ahora vamos a probar a id, dando a Construir ahora, a ver si hace lo que tiene que hacer</p>

<p align="center"> <img src="./contruimos.png"></p>

<p>Si todo ha ido bien, nos debería haber notificado que ha llegado un error ya que lo hemos hecho así, y podemos ver el log en Console Output desde Jenkins y también desde el correo como se puede ver:</p>

<p align="center"> <img src="./console-output.png"></p>
<p align="center"> <img src="./buildfallada.png"></p>