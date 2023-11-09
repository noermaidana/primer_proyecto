//index va a estar encargado de inicializar el servicio de la API REST
//Funciones como: "Definir el puerto donde se va a ejecutar la API REST" entre otras

//express va a ser el servidor de la API REST
import express from 'express';

//morgan muestra por consola la solicitud de los clientes
import morgan from 'morgan';

//Importamos las rutas del archivo routes
import { router } from './routes.js';

//Aca creamos el servidor de la API REST con la contante "app"
const app = express();

//Seteamos el puerto de nuestra aplicación
//puerto por donde se procesan las solicitudes
app.set('port', 3000);
 
//Método de morgan para poder ver por consola la solicitud de los clientes
app.use(morgan('dev')); //cargamos el scrip "dev" en "package.json" que nos permite ejecutar 
                        //el servidor una unica vez

//Método de express que permite interpretar los objetos JSON de las solicitudes
//de los clientes que se van enviando
app.use(express.json());

//Incluimos las rutas dentro del servidor al generarlo
app.use(router);

//Indicamos a la aplicación cual es el puerto (call back)
app.listen(app.get('port'), () => {
    console.log(`Server on port ${app.get('port')}`);
})