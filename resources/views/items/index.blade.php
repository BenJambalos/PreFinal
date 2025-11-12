<!DOCTYPE html>
<html>
<head>
    <title>Items</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .btn { padding: 5px 10px; text-decoration: none; color: white; border-radius: 3px; }
        .btn-primary { background-color: #007bff; }
        .btn-success { background-color: #28a745; }
        .btn-danger { background-color: #dc3545; }
        .search-box { margin: 20px 0; }
        input[type="text"] { padding: 8px; width: 300px; }
    </style>
</head>
<body>
    <h1>Items List</h1>

    @if(session('success'))
        <div style="background-color: #d4edda; padding: 10px; margin: 10px 0; border-radius: 5px;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('items.create') }}" class="btn btn-success">Add New Item</a>

    <div class="search-box">
        <form action="{{ route('items.index') }}" method="GET">
            <input type="text" name="search" placeholder="Search..." value="{{ $search }}">
            <button type="submit" class="btn btn-primary">Search</button>
            @if($search)
                <a href="{{ route('items.index') }}" class="btn btn-primary">Clear</a>
            @endif
        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Purchase Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>${{ number_format($item->price, 2) }}</td>
                    <td>{{ date('M d, Y', strtotime($item->purchase_date)) }}</td>
                    <td>
                        <a href="{{ route('items.edit', $item) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('items.destroy', $item) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align: center;">No items found</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 20px;">
        {{ $items->links() }}
    </div>
</body>
</html>