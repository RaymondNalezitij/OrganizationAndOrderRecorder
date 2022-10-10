<html lang="">

<link rel="stylesheet" type="text/css" href="{{ url('/css/products.css') }}"/>

<div>
    <a href="/">
        <button>Full list</button>
    </a>
    <a href="/organizations">
        <button>Organizations</button>
    </a>
    <a href="/products">
        <button>Products</button>
    </a>
</div>

<h2>Add product:</h2>
<form method="POST" action="{{ route('products.store') }}">
    @csrf
    <label>
        <input type="text" name="name" placeholder="Name">
    </label>
    <label>
        <input type="text" name="type" placeholder="Type">
    </label>
    <label>
        <input type="number" name="quantity" placeholder="Quantity">
    </label>
    <label>
        <input type="number" name="price" placeholder="Price">
    </label>
    <button type="submit" name="addProduct">Add product</button>
</form>

<h2>Products:</h2>
<table class="product_table">
    <tr>
        <th>Name</th>
        <th>Type</th>
        <th>Quantity</th>
        <th>Price</th>
    </tr>
    @foreach($products as $product)
        <tr>
            <td>{{ $product['name'] }}</td>
            <td>{{ $product['type'] }}</td>
            <td>{{ $product['quantity'] }}</td>
            <td>{{ number_format($product['price']/100,2) }}</td>
            <td>
                <form method="POST" action="{{ route('products.store') }}">
                    @csrf
                    <label>
                        <input name="productId" type="hidden" value="{{ $product['id'] }}">
                    </label>
                    <button name="getProduct" type="submit">&#x3e;</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
</html>
