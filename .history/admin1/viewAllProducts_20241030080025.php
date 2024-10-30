<?php
include "./adminHeader.php";
include "./sidebar.php";
?>

<div id="main-content" class="container allContent-section py-4">
    <div>
        <h2>Product Items</h2>
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center">ID.</th>
                    <th class="text-center">Product Image</th>
                    <th class="text-center">Product Name</th>
                    <th class="text-center">Product Description</th>
                    <th class="text-center">Category Name</th>
                    <th class="text-center">Unit Price</th>
                    <th class="text-center" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody id="productTableBody">

                <tr>
                    <td>1</td>
                    <td><img height='100px' src='../assets/imgs/All_Setd.954.png'></td>
                    <td>Lunch Box</td>
                    <td>V neckline and Drawstring style make you more sexy Match well with your skinny leggings, pants
                        or jeans for a fashion look Suitable for casual, home.</td>
                    <td>Lunch Boxes</td>
                    <td>600</td>
                    <td><button class="btn btn-primary" style="height:40px" onclick="openEditModal(this)">Edit</button>
                    </td>
                    <td><button class="btn btn-danger" style="height:40px" onclick="deleteProduct(this)">Delete</button>
                    </td>
                </tr>

                <tr>
                    <td>2</td>
                    <td><img height='100px' src='../assets/imgs/ii.webp'></td>
                    <td>Water Bottle</td>
                    <td>Crop Tops for Women Basic Off Shoulder Sexy Print V Neck Slim Shirt Vest with Button at Swiss
                        Collecttion.</td>
                    <td>Tops</td>
                    <td>890</td>
                    <td><button class="btn btn-primary" style="height:40px" onclick="openEditModal(this)">Edit</button>
                    </td>
                    <td><button class="btn btn-danger" style="height:40px" onclick="deleteProduct(this)">Delete</button>
                    </td>
                </tr>

                <tr>
                    <td>3</td>
                    <td><img height='100px' src='../assets/imgs/tops.jpg'></td>
                    <td>Plastic PLate</td>
                    <td>Tops for Women Basic Off Shoulder V Neck Slim Shirt Vest with Button at Swiss Collecttion. </td>
                    <td>Tops</td>
                    <td>950</td>
                    <td><button class="btn btn-primary" style="height:40px" onclick="openEditModal(this)">Edit</button>
                    </td>
                    <td><button class="btn btn-danger" style="height:40px" onclick="deleteProduct(this)">Delete</button>
                    </td>
                </tr>

                <tr>
                    <td>4</td>
                    <td><img height='100px' src='../assets/imgs/check-strappy-dress.jpg'></td>
                    <td>short dress</td>
                    <td>Cute dress for Women Basic Print Slim dress with Button at Swiss Collecttion.</td>
                    <td>Tops</td>
                    <td>700</td>
                    <td><button class="btn btn-primary" style="height:40px" onclick="openEditModal(this)">Edit</button>
                    </td>
                    <td><button class="btn btn-danger" style="height:40px" onclick="deleteProduct(this)">Delete</button>
                    </td>
                </tr>

                <tr>
                    <td>5</td>
                    <td><img height='100px' src='../assets/imgs/shirtdress.jpg'></td>
                    <td>Shirtdress</td>
                    <td>Shirt Dresses for Women Basic dresses with Button at Swiss Collecttion. </td>
                    <td>Dresses</td>
                    <td>1850</td>
                    <td><button class="btn btn-primary" style="height:40px" onclick="openEditModal(this)">Edit</button>
                    </td>
                    <td><button class="btn btn-danger" style="height:40px" onclick="deleteProduct(this)">Delete</button>
                    </td>
                </tr>

            </tbody>
        </table>

        <button type="button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#myModal">
            Add Product
        </button>

        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">New Product Item</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="addItemForm" onsubmit="addItems(); return false;" enctype='multipart/form-data'>
                            <div class="form-group">
                                <label for="name">Product Name:</label>
                                <input type="text" class="form-control" id="p_name" required>
                            </div>
                            <div class="form-group">
                                <label for="price">Price:</label>
                                <input type="number" class="form-control" id="p_price" required>
                            </div>
                            <div class="form-group">
                                <label for="qty">Description:</label>
                                <input type="text" class="form-control" id="p_desc" required>
                            </div>
                            <div class="form-group">
                                <label>Category:</label>
                                <select id="category" required>
                                    <option disabled selected>Select category</option>
                                    <option>Dresses</option>
                                    <option>Tops</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="file">Choose Image:</label>
                                <input type="file" class="form-control-file" id="file">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-secondary" id="upload" style="height:40px">Add
                                    Item</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"
                            style="height:40px">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Product Item</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form onsubmit="updateProduct(); return false;">
                            <input type="hidden" id="edit_product_id">
                            <div class="form-group">
                                <label for="name">Product Name:</label>
                                <input type="text" class="form-control" id="edit_p_name" required>
                            </div>
                            <div class="form-group">
                                <label for="price">Price:</label>
                                <input type="number" class="form-control" id="edit_p_price" required>
                            </div>
                            <div class="form-group">
                                <label for="qty">Description:</label>
                                <input type="text" class="form-control" id="edit_p_desc" required>
                            </div>
                            <div class="form-group">
                                <label>Category:</label>
                                <select id="edit_category" required>
                                    <option>Tops</option>
                                    <option>Dresses</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-secondary" style="height:40px">Update Item</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"
                            style="height:40px">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    function addItems() {
        event.preventDefault();
        const name = document.getElementById("p_name").value;
        const price = document.getElementById("p_price").value;
        const desc = document.getElementById("p_desc").value;
        const category = document.getElementById("category").value;
        const image = "";

        const tableBody = document.getElementById("productTableBody");


        const newRow = document.createElement("tr");
        const rowCount = tableBody.rows.length + 1;

        newRow.innerHTML = `
          <td>${rowCount}</td>
          <td><img height='100px' src='${image}'></td>
          <td>${name}</td>
          <td>${desc}</td>
          <td>${category}</td>
          <td>${price}</td>
          <td><button class="btn btn-primary" style="height:40px" onclick="openEditModal(this)">Edit</button></td>
          <td><button class="btn btn-danger" style="height:40px" onclick="deleteProduct(this)">Delete</button></td>
      `;

        tableBody.appendChild(newRow);
        $('#myModal').modal('hide');
        document.getElementById("addItemForm").reset();
    }

    function deleteProduct(button) {
        const row = button.closest("tr");
        row.parentNode.removeChild(row);
    }

    function openEditModal(button) {
        const row = button.closest("tr");
        const cells = row.getElementsByTagName("td");


        document.getElementById("edit_product_id").value = cells[0].innerText;
        document.getElementById("edit_p_name").value = cells[2].innerText;
        document.getElementById("edit_p_price").value = cells[5].innerText;
        document.getElementById("edit_p_desc").value = cells[3].innerText;
        document.getElementById("edit_category").value = cells[4].innerText;

        $('#editModal').modal('show');
    }

    function updateProduct() {
        const id = document.getElementById("edit_product_id").value;
        const rows = document.getElementById("productTableBody").rows;

        for (let i = 0; i < rows.length; i++) {
            const cells = rows[i].getElementsByTagName("td");
            if (cells[0].innerText == id) {
                cells[2].innerText = document.getElementById("edit_p_name").value;
                cells[5].innerText = document.getElementById("edit_p_price").value;
                cells[3].innerText = document.getElementById("edit_p_desc").value;
                cells[4].innerText = document.getElementById("edit_category").value;
                break;
            }
        }

        $('#editModal').modal('hide');
    }
    </script>
</div>