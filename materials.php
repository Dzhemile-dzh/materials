<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
        <h2>Add New Material</h2>
        <form id="materialForm" class="form-group">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" class="form-control" id="description" name="description">
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="text" class="form-control" id="quantity" name="quantity">
            </div>
            <div class="form-group">
                <label for="unit">Unit:</label>
                <input type="text" class="form-control" id="unit" name="unit">
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" class="form-control" id="price" name="price">
            </div>
            <div class="form-group">
                <label for="document">Document:</label>
                <input type="file" class="form-control-file" id="document" name="document">
            </div>
            <input type="submit" class="btn btn-primary" value="Submit">
            <input type="button" class="btn btn-success" value="Display Materials" onclick="window.location.href='displayMaterials.php'">

        </form>
    </div>
  </body>
</html>

<script src="js/upload.js"></script>