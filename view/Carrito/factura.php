<table>	
	<tr>
		<td style="width:150px"><img src="images/piecitos.png" width="100" height="100"></td>


		<td style="background-color:white; width:140px">
			
			<div style="font-size:8.5px; text-align:right; line-height:15px;">
				
				<br>
				NIT: 71.759.963-9

				<br>
				Dirección: Calle 44B 92-11

			</div>

		</td>

		<td style="background-color:white; width:140px">

			<div style="font-size:8.5px; text-align:right; line-height:15px;">
				
				<br>
				Teléfono: 305 789 36 91
				
				<br>
				www.piecitos.com.co

			</div>
			
		</td>

		<td style="background-color:white; width:110px; text-align:center; color:red"><br><br>FACTURA N.<br>$valorVenta</td>

	</tr>

</table>



<table
	
	<tr>
		
		<td style="width:540px"><img src="images/back.jpg"></td>
	
	</tr>

</table>

<table style="font-size:10px; padding:5px 10px;">

	<tr>
	
		<td style="border: 1px solid #666; background-color:white; width:390px">

			Cliente: $respuestaCliente[nombre]

		</td>

		<td style="border: 1px solid #666; background-color:white; width:150px; text-align:right">
		
			Fecha: $fecha

		</td>

	</tr>

	<tr>
	
		<td style="border: 1px solid #666; background-color:white; width:540px">Vendedor: $respuestaVendedor[nombre]</td>

	</tr>

	<tr>
	
	<td style="border-bottom: 1px solid #666; background-color:white; width:540px"></td>

	</tr>

</table>



<table style="font-size:10px; padding:5px 10px;">

	<tr>
	
	<td style="border: 1px solid #666; background-color:white; width:260px; text-align:center">Producto</td>
	<td style="border: 1px solid #666; background-color:white; width:80px; text-align:center">Cantidad</td>
	<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">Valor Unit.</td>
	<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">Valor Total</td>

	</tr>

</table>



<table style="font-size:10px; padding:5px 10px;">

	<tr>
		
		<td style="border: 1px solid #666; color:#333; background-color:white; width:260px; text-align:center">
			$item[descripcion]
		</td>

		<td style="border: 1px solid #666; color:#333; background-color:white; width:80px; text-align:center">
			$item[cantidad]
		</td>

		<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">$ 
			$valorUnitario
		</td>

		<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">$ 
			$precioTotal
		</td>


	</tr>

</table>




<table style="font-size:10px; padding:5px 10px;">

	<tr>

		<td style="color:#333; background-color:white; width:340px; text-align:center"></td>

		<td style="border-bottom: 1px solid #666; background-color:white; width:100px; text-align:center"></td>

		<td style="border-bottom: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center"></td>

	</tr>
	<tr>
	
		<td style="border-right: 1px solid #666; color:#333; background-color:white; width:340px; text-align:center"></td>

		<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">
			Metodo de oago:
		</td>
		
		<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">
			$ $metodo de pago
		</td>

	</tr>
	
	<tr>
	
		<td style="border-right: 1px solid #666; color:#333; background-color:white; width:340px; text-align:center"></td>

		<td style="border: 1px solid #666;  background-color:white; width:100px; text-align:center">
			Neto:
		</td>

		<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">
			$ $neto
		</td>

	</tr>

	<tr>

		<td style="border-right: 1px solid #666; color:#333; background-color:white; width:340px; text-align:center"></td>

		<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">
			Impuesto:
		</td>
	
		<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">
			$ $impuesto
		</td>

	</tr>

	<tr>
	
		<td style="border-right: 1px solid #666; color:#333; background-color:white; width:340px; text-align:center"></td>

		<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">
			Total:
		</td>
		
		<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">
			$ $total
		</td>

	</tr>


</table>