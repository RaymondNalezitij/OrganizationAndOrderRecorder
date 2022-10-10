<html lang="">

<link rel="stylesheet" type="text/css" href="{{ url('/css/product.css') }}"/>

<div style="margin:20px">
    <form>
        <input type="button" value="Go back" onclick="history.back()">
    </form>

    <div style="max-width: 800px; display: flex; flex-direction: row; justify-content: space-between">
        <div style="border: 1px solid #1a202c; padding: 0 10px; height: fit-content; width: fit-content">
            <h1 style="max-width: 450px">{{ $product[0]['name'] }}</h1>
            <div style="margin: 10px">
                <h3>Type: {{ $product[0]['type'] }}</h3>
                <h3>Quantity: {{ $product[0]['quantity'] }}</h3>
                <h3>Current price: {{ $product[0]['price']/100 }} €</h3>
            </div>
        </div>
        <div style="border: 1px solid #1a202c; height: fit-content; width: fit-content">
            <h1 style="padding-left: 10px">Order history:</h1>
            <table class="product_list">
                <tr>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Date provided</th>
                </tr>
                @foreach($orderedBy as $company)
                    <tr>
                        <td>{{ $company[0][0]['name'] }}</td>
                        <td class="table_description">{{ $company[1] }}</td>
                        <td class="table_description">{{ $company[2] }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

</html>
