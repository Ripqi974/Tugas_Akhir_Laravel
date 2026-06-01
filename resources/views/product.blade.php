<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Product</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2 class="mb-4 text-center">Data Product</h2>

    <table class="table table-bordered table-striped">

        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Product</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Category</th>
                <th>Brand</th>
            </tr>
        </thead>

        <tbody>

            @foreach($products as $product)

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product->nama_product }}</td>
                <td>Rp {{ number_format($product->harga) }}</td>
                <td>{{ $product->stok }}</td>
                <td>{{ $product->category->nama_category }}</td>
                <td>{{ $product->brand->nama_brand }}</td>
            </tr>

            @endforeach

        </tbody>

    </table>

</div>

</body>
</html>