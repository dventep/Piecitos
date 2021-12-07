<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Factura</title>
  <style>
    body {margin:0}
    table.info_Piecitos, table.info_Destinatario, .info_Compra {
        width: 100%;
        padding: 5px;
        margin-top: 12px;
    }
    .nombre_Piecitos {
        width: 40%;
    }
    .nombre {
        font-weight: 900;
        font-size: 31px;
    }
    .titulo_Destinatario {
        font-weight: 600;
        font-size: 20px;
        width: 65%;
        color: #3f6c09;
        border-bottom: 2px solid #3f6c09;
    }
    .titulo_Factura {
        text-align: right;
        font-size: 25px;
        font-weight: 700;
        border-bottom: 2px solid #3f6c09;
    }
    .nombre_usuario {font-weight: 700;}
    .factura {
        color: #3f6c09;
        font-weight: 550;
        display: inline-block;
        width: 50%;
    }
    .valor_total {
        background-color: #3f6c09;
        color: white;
        margin: 6px;
        display: block;
        text-align: center;
        width: 100%
    }
    .valor_total span {
        padding: 15px 0;
        text-align: center;
        display: inline-block;
        width: 50%;
        box-sizing: border-box;
    }
    .text_Total {
        border-right: 3px solid white;
    }
    .content_Destinatario td{
        padding-top: 15px;
    }
    tr.info_Compra-tr {
        text-align: center;
    }
    .info_Compra-tr td:nth-child(2) {
        text-align: left;
    }
    .info_Compra-tr td {
        height: 30px;
        background-color: gainsboro;
        padding: 14px;
        font-weight: 700;
    }
    .detalles_compra {
        background-color: #EDDCD2;
    }
    tr.detalles_compra td {
        padding: 15px 10px;
    }
    td.numero_Compra {
        text-align: center;
        background-color: #CB997E;
        color: white;
        font-weight: 700;
    }
    span.titulo_Producto {
        display: block;
        font-size: 1.3rem;
        color: #3f6c09;
        font-weight: 500;
    }
    td.cantidad_Compra, td.precio_Compra, td.total_unidad_Compra {
        text-align: center;
    }
    .total {
        font-weight: 700;
        text-align: center;
        color: #3f6c09;
        font-size: 1.2rem;
    }
    td.total_contenido {
        border-top: 2px solid;
        padding: 10px 0;
    }
  </style>
</head>
<body>
    <table class="info_Piecitos">
        <tr>
            <td class="nombre_Piecitos">
                <span class="nombre">PIECITOS</span><br>NIT: 890903538
            </td>
            <td>Ubicación: Calle 35D #56-42</td>
            <td>Cel: +57 321 643 9529</td>
            <td>Email: info@piecitos.com</td>
        </tr>
    </table>
    <table class="info_Destinatario">
        <thead>
            <tr>
                <td class="titulo_Destinatario">DESTINATARIO:</td>
                <td class="titulo_Factura">FACTURA</td>
            </tr>
        </thead>
        <tbody>
            <tr class="content_Destinatario">
                <td>
                    <span class="nombre_usuario">{{ nombre }} {{ apellido }}</span><br>{{ numero_id }}<br><br>
                    {{ direccion_envio }}<br>{{ correo }}
                </td>
                <td>                    
                    <span class="factura">N° FACTURA:</span>2312<br>
                    <span class="factura">FECHA DE FACTURA:</span>29/02/2021<br>
                    <span class="factura">MÉTODO DE PAGO:</span>{{ metodo }}<br>
                    <br>
                    <span class="valor_total">
                        <span class="text_Total">TOTAL</span><span>${{ carrito }}</span>
                    </span>                    
                </td>
            </tr>
        </tbody>
    </table>
    <table class="info_Compra">
        <thead>
            <tr class="info_Compra-tr">
                <td>N°</td>
                <td>DESCRIPCIÓN</td>
                <td>PRECIO</td>
                <td>CANTIDAD</td>
                <td>TOTAL</td>
            </tr>
        </thead>
        <tbody>
            {{ fila }}
            <tr class="total">
                <td></td>
                <td></td>
                <td class="total_contenido" colspan="2">TOTAL</td>
                <td class="total_contenido">${{ carrito }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>