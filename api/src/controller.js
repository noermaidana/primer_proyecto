//en controller van todas las funcionalidades de nuesra aplicación
//en este caso el programa realiza consultas en la base de datos

//importamos la variable pool creada en la database.js

//ocupamos un pool nos permite generar un pool de conexiones, basicamente habilita que 
//existan conexiones paralelas en nuestra infraestructura o sino de manera concurrente 
//entre las solicitudes
import {pool} from './database.js';

//parámetro "req" (request) es lo que solcita el cliente
//parámetro "res" (response) es lo que responde el servidor a la solicitud
class ProductoController{

//con "async" y "await" hacemos que nuestras consultas sean asíncronas lo que significa que 
//el servidor no se debe de estancar tras recibir varias solicitudes (arma una cola de estas)

    //Método getAll que va traer todo lo que se encuentre en la base de datos
    async getAll(req, res) {
        //la contante "result" consiste en una "query" (una consulta)
        
        //'SELECT * FROM nombretabla' va a ejecutar la consulta en la BD
        
        //Con los [] limitamos a que solo nos muestre la primer lista dentro del JSON y asi
        //evitamos que se traiga información del buffer 
        try{
            const [result] = await pool.query('SELECT * FROM productos');
        
            //aca se devuelven los resultados de esa consulta
            res.json(result);
        
        } catch (error){
            res.status(500).json({"Error": "Ocurrio un error al obtener los productos"});
        }
    }

    //Método getOne va a dar un producto (en la BD) de acuerdo al id
    async getOne(req, res) {
        try {
            const producto = req.params.id_producto;
            const [result] = await pool.query('SELECT * FROM productos WHERE id_producto=?', [producto]);
        //Si la longitud es mayor a cero te muestra lo que coincide
        if (result.length > 0){
            //muestra los datos del id de correspondiente al producto
            res.json(result[0]);
        }else{
            //Mensaje de error
            res.status(404).json({"Error":`No hay producto registrado con el id ${producto.id_producto}`});
        }
        }catch (error) {
            res.status(500).json({"Error": "Ocurrió un error al obtener el producto"});
        }
    }

    //Método add permite agregar o crear productos en la BD
    async add(req, res){
        try{
            const producto = req.body;
            if(!producto.nombre||!producto.precio||!producto.stock){
                res.status(400).json({ "Error": "Por favor completar los datos obligatorios" });
                return;
            }
            const[result] = await pool.query(`INSERT INTO productos(nombre, precio, stock) VALUES (?, ?, ?)`, 
            [producto.nombre, producto.precio, producto.stock]);
            res.json({ "ID insertado": result.insertId, "Mensaje": "Producto agregado con éxito" });
        }catch (error) {
            res.status(500).json({ "Error": "Ocurrió un error al agregar el producto" });
        }
    }

    //Método delete va a borrar productos de la BD con el id proporcionado por el cliente
    async deleteID(req, res){
        try{
            const id = req.body.id_producto;
            const [result] = await pool.query(`DELETE FROM productos WHERE id_producto=(?)`, [id]);
            //(affected.Rows) indica el número de filas eliminadas de la BD 
            if (result.affectedRows > 0) {
                res.json({"Mensaje": `Producto con id ${id} eliminado exitosamente`});
            } else {
                res.status(404).json({"Error": `No se encontró ningún producto con el ID ${id}`});
            }
        }catch (error) {
            res.status(500).json({"Error": "Ocurrió un error al eliminar el producto"});
        }
    }

    //Método update va a actualizar los registros en la BD, con lo proporcionado por el cliente
    async update(req, res){
        try{
        const producto = req.body;
        const [result] = await pool.query(`UPDATE productos SET nombre=(?), precio=(?), stock=(?) WHERE id_producto=(?)`,
        [producto.nombre, producto.precio, producto.stock, producto.id_producto]);
        //(changedRows) es el número de filas actualizados en la BD 
        if (result.changedRows === 1) {
            res.json({ "Mensaje": `Producto de id ${producto.id_producto} actualizado exitosamente` });
        } else if (result.changedRows === 0) {
            res.status(404).json({ "Error": `No se encontró ningún cambio en el producto con el id ${producto.id_producto}` });
        } else {
            res.status(500).json({ "Error": "No se pudo actualizar el producto en la base de datos" });
        }
        }catch (error) {
            res.status(500).json({ "Error": "Ocurrió un error al actualizar el producto" });
        }
    }
}
//exportamos una constante "producto" para que pueda ser visible fuera del controller
//en routes por ejemplo
export const producto = new ProductoController();