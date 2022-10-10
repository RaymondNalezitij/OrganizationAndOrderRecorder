<html lang="">

<link rel="stylesheet" type="text/css" href="{{ url('/css/organizations.css') }}"/>

<div>
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
    <h2>Add organization:</h2>
    <form method="POST" action="{{ route('organization.store') }}">
        @csrf
        <label>
            <input type="text" name="name" placeholder="Name">
        </label>
        <label>
            <input type="text" name="address" placeholder="Address">
        </label>
        <label>
            <input type="number" name="contact_number" placeholder="Contact number">
        </label>
        <label>
            <input type="email" name="contact_email" placeholder="Contact email">
        </label>
        <button type="submit" name="addOrganization">Add Organization</button>
    </form>
    <h2>Organizations:</h2>
    <table class="organization_table">
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Contact Number</th>
            <th>Contact Email</th>
        </tr>
        @foreach($organizations as $organization)
            <tr>
                <td>{{ $organization['name'] }}</td>
                <td>{{ $organization['address'] }}</td>
                <td>{{ $organization['contact_number'] }}</td>
                <td>{{ $organization['contact_email'] }}</td>
                <td>
                    <form method="POST" action="{{ route('organization.store') }}">
                        @csrf
                        <label>
                            <input name="organizationId" type="hidden" value="{{ $organization['id'] }}">
                        </label>
                        <button name="getOrganization" type="submit">&#x3e;</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>

</html>
