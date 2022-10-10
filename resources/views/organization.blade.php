<html lang="">

<link rel="stylesheet" type="text/css" href="{{ url('/css/organization.css') }}"/>

<div style="margin:20px">
    <form>
        <input type="button" value="Go back" onclick="history.back()">
    </form>

    <div style="max-width: 900px; display: flex; flex-direction: row; justify-content: space-between">
        <div style="border: 1px solid #1a202c; padding: 0 10px; height: fit-content">
            <h1>{{ $organization[0]['name'] }}</h1>
            <div style="margin: 10px">
                <h3>Address: {{ $organization[0]['address'] }}</h3>
                <h3>Contact number: {{ $organization[0]['contact_number'] }}</h3>
                <h3>Contact email: {{ $organization[0]['contact_email'] }}</h3>
            </div>
        </div>
        <div>
            <div style="border: 1px solid #1a202c; height: fit-content; width: fit-content">
                <h1 style="padding-left: 10px">Order history:</h1>
                <table class="product_list">
                    <tr>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Date provided</th>
                    </tr>
                    @foreach($orderedProducts as $product)
                        <tr>
                            <td>{{ $product[0][0]['name'] }}</td>
                            <td class="table_description">{{ $product[1] }}</td>
                            <td class="table_description">{{ $product[0][0]['price']/100 }}</td>
                            <td class="table_description">{{ $product[2] }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <h1>Add order:</h1>
            <form method="POST" action="{{ route('organization.store') }}">
                @csrf
                <label>
                    <input name="organizationId" type="hidden" value="{{ $organization[0]['id'] }}">
                </label>
                <div style="display: flex; flex-direction: row">
                    <div style="display: flex; flex-direction: column; margin: 0 5px">
                        <label for="product">Select product:</label>
                        <select name="product" id="product">
                            @foreach($products as $product)
                                <option value="{{ $product['name'] }}">{{ $product['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div style="display: flex; flex-direction: column; margin: 0 5px">
                        <label for="quantity">Select quantity:</label>
                        <input name="quantity" type="number" style="width: 130px">
                    </div>
                    <button name="addProduct" type="submit" style="margin: 19px 5px 0 5px">Add product</button>
                </div>
            </form>
        </div>
    </div>
</div>
</html>
