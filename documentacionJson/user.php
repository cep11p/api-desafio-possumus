<?php


/** Para mostrar listado de usuario
* @url http://desafio.local/api/users
* @method GET
* @return Array Json
{
    "pagesize": 10,
    "pages": 1,
    "total_filtrado": 3,
    "resultado": [
        {
            "id": 1,
            "nombre": "jose",
            "apellido": "gonzalez",
            "nro_documento": "36456789",
            "fecha_nacimiento": "2022-06-07",
            "email": "carlos@correo.com"
        },
        {
            "id": 6,
            "nombre": "Sebastian",
            "apellido": "perez",
            "nro_documento": "36849987",
            "fecha_nacimiento": "2022-06-08",
            "email": "carlos@correo.com"
        },
        {
            "id": 7,
            "nombre": "Lorena",
            "apellido": "Gomez",
            "nro_documento": "36849111",
            "fecha_nacimiento": "2004-06-07",
            "email": "carlos@correo.com"
        }
    ]
}
*/

/** Para crear un usuario. El mismo debe ser mayor a 18 años
* @url http://desafio.local/api/users 
* @method POST
* @param arrayJson
{
	"nombre" : "carlos",
	"apellido" : "perez",
	"nro_documento" : "36849868",
	"email" : "carlos@correo.com",
	"fecha_nacimiento" : "1992-05-07"
}
**/

/** Para modificar usuario. Se busca el usuario por nro de documento, asumiendo que los nro_documento no se repite
* @url desafio.local/api/users/modificar/36849868
* @method PUT
* @param arrayJson
{
	"nombre" : "carlos",
	"apellido" : "perez",
	"nro_documento" : "36849868",
	"email" : "carlos@correo.com",
	"fecha_nacimiento" : "1992-05-07"
}
**/

/****** Para visualizar*****
* @url http://desafio.local/api/users/{$id} 
* @method GET
* @return arrayJson
*/

/****** Para borrar una localidad *****
* @url http://desafio.local/api/users/{$id} 
* @method Delete
* @return arrayJson
*/
