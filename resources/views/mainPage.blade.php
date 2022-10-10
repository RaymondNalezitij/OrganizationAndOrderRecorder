<html lang="">

<link rel="stylesheet" type="text/css" href="{{ url('/css/mainPage.css') }}"/>

<body class="antialiased">

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

<div>
    @foreach($organizations as $organization)
        <div style="display: flex;flex-direction: row">
            <div style="border: 1px solid #1a202c; padding: 0 10px; height: fit-content; width:fit-content">
                <h1>{{ $organization['name'] }}</h1>
                <div style="margin: 10px">
                    <h3>Address: {{ $organization['address'] }}</h3>
                    <h3>Contact number: {{ $organization['contact_number'] }}</h3>
                    <h3>Contact email: {{ $organization['contact_email'] }}</h3>
                </div>
            </div>
            <div style="border: 1px solid #1a202c; height: fit-content; width:fit-content; margin-bottom: 20px">
                <h3 style="padding: 0 10px;">Order history:</h3>
                <table class="product_list">
                    <tr>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Date provided</th>
                    </tr>
                    @foreach($productInfo as $product)
                        @if($product[1] == $organization['id'])
                            <tr>
                                <td class="table_description">{{ $product[0][0]['name'] }}</td>
                                <td class="table_description">{{ $product[2] }}</td>
                                <td class="table_description">{{ $product[0][0]['price']/100 }}</td>
                                <td class="table_description">{{ $product[3] }}</td>
                            </tr>
                        @endif
                    @endforeach
                </table>
            </div>
        </div>
    @endforeach
</div>
</body>
</html>
