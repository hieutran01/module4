<!DOCTYPE html>
<html>
<head>
    <title>Product Discount Calculator</title>
</head>
<body>
    <h1>Product Discount Calculator</h1>

    <form method="post" action="{{ route('calculate') }}">
        @csrf

        <label for="product_description">Product Description:</label>
        <input type="text" name="product_description" id="product_description" required><br>

        <label for="list_price">List Price:</label>
        <input type="number" name="list_price" id="list_price" required><br>

        <label for="discount_percent">Discount Percent:</label>
        <input type="number" name="discount_percent" id="discount_percent" required><br>

        <button type="submit">Calculate Discount</button>
    </form>
</body>
</html>
