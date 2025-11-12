<!DOCTYPE html>
<html>
<head>
    <title>Create Item</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input[type="text"], input[type="number"], input[type="date"], textarea { width: 100%; padding: 8px; max-width: 500px; }
        .btn { padding: 10px 20px; text-decoration: none; color: white; border: none; border-radius: 3px; cursor: pointer; }
        .btn-success { background-color: #28a745; }
        .error { color: red; font-size: 14px; }
    </style>
</head>
<body>
    <h1>Create New Item</h1>

    @if($errors->any())
        <div style="background-color: #f8d7da; padding: 10px; margin: 10px 0; border-radius: 5px;">
            <ul>
                @foreach($errors->all() as $error)
                    <li class="error">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('items.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label>Description:</label>
            <textarea name="description" rows="4">{{ old('description') }}</textarea>
        </div>
        <div class="form-group">
            <label>Quantity:</label>
            <input type="number" name="quantity" value="{{ old('quantity') }}" min="0">
        </div>
        <div class="form-group">
            <label>Price:</label>
            <input type="number" name="price" value="{{ old('price') }}" step="0.01" min="0">
        </div>
        <div class="form-group">
            <label>Purchase Date:</label>
            <input type="date" name="purchase_date" value="{{ old('purchase_date') }}">
        </div>
        <button type="submit" class="btn btn-success">Create</button>
        <a href="{{ route('items.index') }}">Back</a>
    </form>
</body>
</html>