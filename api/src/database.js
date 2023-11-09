import mysqlConnection from 'mysql2/promise';

//propiedades de la base de datos
const properties = {
    host: 'localhost',
    user: 'root',
    password: '',
    //Nombre de la base de datos en phpMyAdmin
    database: 'rojasm_noelia'
};

//exportamos la conexión con la base de datos con una constante "pool" 
//(va a tener el pool de conexión con la BD)
export const pool = mysqlConnection.createPool(properties);