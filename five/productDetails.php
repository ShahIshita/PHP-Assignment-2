<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Product</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="./style/style.css">
</head>

<body>

  <div class="d-flex">


    <div class="container main-container">
      <h2>Add Product</h2>

      <div id="output"></div>

      <form id="productForm" enctype="multipart/form-data" onsubmit="submitForm(event)">
        <div class="form-group">
          <label for="productName" class="form-label">Product Name:</label>
          <input type="text" class="form-control input-lg"  id="productName" name="productName" required>
        </div>

        <div class="form-group">
          <label for="productPrice" class="form-label">Price:</label>
          <input type="number" class="form-control input-lg" id="productPrice" name="productPrice"  required>
        </div>

        <div class="form-group">
          <label for="productImage" class="form-label">Image:</label>
          <input type="file" class="form-control input-lg"  id="productImage" name="productImage" accept="image/*" required>
        </div>

        <div class="form-group">
          <label for="productDescription" class="form-label">Description:</label>
          <textarea class="form-control input-lg" id="productDescription" name="productDescription" required></textarea>
        </div>

        <div class="form-group">
          <label for="productStatus" class="form-label">Status:</label>
          <select class="form-select" id="productStatus" name="productStatus" required>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
          </select>
        </div><br>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a class="btn btn-primary" href="home.php">Home</a>
      </form>

      <div class="mt-3" id="tableData"></div>
    </div>
  </div>

  

  <script>
    function submitForm(event) {
    event.preventDefault();
    const formData = new FormData(document.getElementById("productForm"));

    $.ajax({
        type: "POST",
        url: "./data/productDetails-process.php",
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function (xhr) {
          let token = localStorage.getItem('token');
          xhr.setRequestHeader('Authorization', token);
        },
        success: function(response) {
            const responseData = JSON.parse(response);
            $("#output").html(`<div class="alert alert-success">${responseData.message}</div>`);
            
            // Change the table content here
            $("#tableData").html(`
                <h3>Product Output:</h3>
                <ul>
                    <li><strong>Product Name:</strong> ${responseData.productData.productName}</li>
                    <li><strong>Product Price:</strong> ${responseData.productData.productPrice}</li>
                    <li><strong>Product Image:</strong> ${responseData.productData.productImage}</li>
                    <li><strong>Product Description:</strong> ${responseData.productData.productDescription}</li>
                    <li><strong>Product Status:</strong> ${responseData.productData.productStatus}</li>
                </ul>
            `);

            clearForm();
        },
        error: function(_, _2, err) {
            $("#output").html('<div class="alert alert-danger">Error: ' + err + '</div>');
        }
    });
}

function clearForm() {
    document.getElementById("productForm").reset();
}

  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>