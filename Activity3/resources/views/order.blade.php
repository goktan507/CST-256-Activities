<html>
<head>
	<title>Add Order</title>
</head>
<body>
	<div>
		<form action="addorder" method="post">
			{{ csrf_field() }}
			<div class=demo-table>
				<div class="form-head">Add Order</div>
    				<div class="form-column">
    					<div>
    						<label for="product">Product</label><span id="product_info" class="error-info"></span>
    					</div>
    					<div>
    						<input name="product" id="product" type="text" class="demo-input-box">
    					</div>
    				</div>
    				<div class="form-column">
    					<div>
    						<label for="customerID">Customer ID</label><span id="customerid_info" class="error-info"></span>
    					</div>
    					<div>
    						<input name="customerID" id="customerID" value="{{ Session::get('nextID') }}" type="text" class="demo-input-box">
    					</div>
    					<div>
    						<input name="firstName" id="firstName" value="{{ Session::get('firstName')}}" type="text" class="demo-input-box">
    					</div>
    					<div>
    						<input name="lastName" id="lastName" value="{{ Session::get('lastName')}}" type="text" class="demo-input-box">
    					</div>
    				</div>
				<div>
					<input type="submit" class="btnLogin">
				</div>
			</div>
		</form>
	</div>
</body>
</html>