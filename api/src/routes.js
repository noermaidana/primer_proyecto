//con routes definimos las rutas que nos daran el acceso a deteminados métodos 

import { Router } from "express";
//variable "producto" exportada en el controller
import { producto } from './controller.js';

//exportamos la constante router para que sea visible en el index
export const router = Router()

//los metodos "getAll" y "getOne" se definen en el controller
//router.tipodesolicitud('/producto'[esto sigue al ip:puerto], variable.metdefcontroller)

//get sirve para consultar recursos que estan ubicados en la URL especificada

//consulta los productos registrados en la BD
router.get('/productos', producto.getAll);

//consulta por el id ingresado si el producto existe en la BD
router.get('/producto/:id_producto', producto.getOne);

//agrega un producto a la BD
router.post('/productos/add', producto.add);

//delete elimina un producto por id en la BD
router.delete('/productos/deleteID', producto.deleteID);

//put acutaliza la BD y es equivalente al update en una BD
router.put('/productos/update', producto.update);