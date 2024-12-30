<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


class ViewAdminComponents {

    public function renderSidebar()
    {
        return '
            <!-- Sidebar -->
            <div class="sidebar" id="mySidebar">
                <div class="side-header">
                    <img src="../assets/imgs/logo.png" width="120" height="120" alt="Swiss Collection">
                    <h5 style="margin-top:10px;">Hello, Admin</h5>
                </div>
                <hr style="border:1px solid; background-color:#8a7b6d; border-color:#3B3131;">
<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
<a href="/Retail_Ecommerce_Website/public/admin.php"><i class="fa fa-home"></i> Dashboard</a>
<a href="/Retail_Ecommerce_Website/app/view/pages/admin/viewCustomers.php" onclick="showCustomers()"><i class="fa fa-users"></i> Customers</a>
<a href="/Retail_Ecommerce_Website/app/view/pages/admin/viewCategories.php" onclick="showCategory()"><i class="fa fa-th-large"></i> Category</a>
<a href="/Retail_Ecommerce_Website/app/view/pages/admin/viewProducts.php" onclick="showProductItems()"><i class="fa fa-th"></i> Products</a>
<a href="/Retail_Ecommerce_Website/app/view/pages/admin/viewOrders.php" onclick="showOrders()"><i class="fa fa-list"></i> Orders</a>

            </div>
            <div id="main">
                <button class="openbtn" onclick="openNav()"><i class="fa fa-home"></i></button>
            </div>
            <script>
            function showProductItems() {
                $.ajax({
                    url:"./adminView/viewAllProducts.php",
                    method:"post",
                    data:{record:1},
                    success:function(data){
                        $(".allContent-section").html(data);
                    }
                });
            }
    
           function showCategory() {  
    $.ajax({
        url: "/Retail_Ecommerce_Website/app/controller/categoryActions.php",
        method: "POST",
        data: { action: "show", record: 1 },
        success: function(data) {
            $(".allContent-section").html(data);
        }
    });
}


function addCategory(category_name, category_description) {
    $.ajax({
        url: "/Retail_Ecommerce_Website/app/controller/categoryActions.php",
        method: "post",
        data: { action: "add", category_name: category_name, category_description: category_description },
        success: function(response) {
            alert("Category Added Successfully");
            add();
        }
    });
}

function deleteCategory(id) {
    $.ajax({
        url: "/Retail_Ecommerce_Website/app/controller/categoryActions.php",
        method: "post",
        data: { action: "delete", id: id },
        success: function(response) {
            alert("Category Deleted Successfully");
            showCategory();
        }
    });
}

    
            function showSizes() {  
                $.ajax({
                    url:"./adminView/viewSizes.php",
                    method:"post",
                    data:{record:1},
                    success:function(data){
                        $(".allContent-section").html(data);
                    }
                });
            }
    
            function showProductSizes() {  
                $.ajax({
                    url:"./adminView/viewProductSizes.php",
                    method:"post",
                    data:{record:1},
                    success:function(data){
                        $(".allContent-section").html(data);
                    }
                });
            }
    
            function showCustomers() {
                $.ajax({
                    url:"./viewCustomers.php",
                    method:"post",
                    data:{record:1},
                    success:function(data){
                        $(".allContent-section").html(data);
                    }
                });
            }
    
            function showOrders() {
                $.ajax({
                    url:"./adminView/viewAllOrders.php",
                    method:"post",
                    data:{record:1},
                    success:function(data){
                        $(".allContent-section").html(data);
                    }
                });
            }
    
            function ChangeOrderStatus(id) {
                $.ajax({
                    url:"./controller/updateOrderStatus.php",
                    method:"post",
                    data:{record:id},
                    success:function(data){
                        alert("Order Status updated successfully");
                        $("form").trigger("reset");
                        showOrders();
                    }
                });
            }
    
            function ChangePay(id) {
                $.ajax({
                    url:"./controller/updatePayStatus.php",
                    method:"post",
                    data:{record:id},
                    success:function(data){
                        alert("Payment Status updated successfully");
                        $("form").trigger("reset");
                        showOrders();
                    }
                });
            }
    
            function addItems() {
                var p_name = $("#p_name").val();
                var p_desc = $("#p_desc").val();
                var p_price = $("#p_price").val();
                var category = $("#category").val();
                var upload = $("#upload").val();
                var file = $("#file")[0].files[0];
    
                var fd = new FormData();
                fd.append("p_name", p_name);
                fd.append("p_desc", p_desc);
                fd.append("p_price", p_price);
                fd.append("category", category);
                fd.append("file", file);
                fd.append("upload", upload);
                $.ajax({
                    url:"./controller/addItemController.php",
                    method:"post",
                    data:fd,
                    processData: false,
                    contentType: false,
                    success: function(data){
                        alert("Product Added successfully.");
                        $("form").trigger("reset");
                        showProductItems();
                    }
                });
            }
    
            function itemEditForm(id) {
                $.ajax({
                    url:"./adminView/editItemForm.php",
                    method:"post",
                    data:{record:id},
                    success:function(data){
                        $(".allContent-section").html(data);
                    }
                });
            }
    
            function updateItems() {
                var product_id = $("#product_id").val();
                var p_name = $("#p_name").val();
                var p_desc = $("#p_desc").val();
                var p_price = $("#p_price").val();
                var category = $("#category").val();
                var existingImage = $("#existingImage").val();
                var newImage = $("#newImage")[0].files[0];
                var fd = new FormData();
                fd.append("product_id", product_id);
                fd.append("p_name", p_name);
                fd.append("p_desc", p_desc);
                fd.append("p_price", p_price);
                fd.append("category", category);
                fd.append("existingImage", existingImage);
                fd.append("newImage", newImage);
    
                $.ajax({
                    url:"./controller/updateItemController.php",
                    method:"post",
                    data:fd,
                    processData: false,
                    contentType: false,
                    success: function(data){
                        alert("Data Update Success.");
                        $("form").trigger("reset");
                        showProductItems();
                    }
                });
            }
    
            function itemDelete(id) {
                $.ajax({
                    url:"./controller/deleteItemController.php",
                    method:"post",
                    data:{record:id},
                    success:function(data){
                        alert("Items Successfully deleted");
                        $("form").trigger("reset");
                        showProductItems();
                    }
                });
            }
    
            function cartDelete(id) {
                $.ajax({
                    url:"./controller/deleteCartController.php",
                    method:"post",
                    data:{record:id},
                    success:function(data){
                        alert("Cart Item Successfully deleted");
                        $("form").trigger("reset");
                        showMyCart();
                    }
                });
            }
    
            function eachDetailsForm(id) {
                $.ajax({
                    url:"./view/viewEachDetails.php",
                    method:"post",
                    data:{record:id},
                    success:function(data){
                        $(".allContent-section").html(data);
                    }
                });
            }
    
            function categoryDelete(id) {
                $.ajax({
                    url:"./controller/catDeleteController.php",
                    method:"post",
                    data:{record:id},
                    success:function(data){
                        alert("Category Successfully deleted");
                        $("form").trigger("reset");
                        showCategory();
                    }
                });
            }
    
            function sizeDelete(id) {
                $.ajax({
                    url:"./controller/deleteSizeController.php",
                    method:"post",
                    data:{record:id},
                    success:function(data){
                        alert("Size Successfully deleted");
                        $("form").trigger("reset");
                        showSizes();
                    }
                });
            }
    
            function variationDelete(id) {
    [_{{{CITATION{{{_1{](https://github.com/Dharinimarinette/First-Aid/tree/08c888dc34847791386fd88ee2816dd8ca8651ac/index.js)[_{{{CITATION{{{_2{](https://github.com/SanchitaMishra170676/innogeeks/tree/0b29f07729d7ab0cf7723e713544ff55ff813109/static%2Fjs%2Fmain.js)[_{{{CITATION{{{_3{](https://github.com/Nasim992/IUBAT_JOURNAL/tree/48e998e2c8a8efa8376d104adb03402a64d90c06/reviewer%2Fdashboard.php)[_{{{CITATION{{{_4{](https://github.com/AliniCanedo/navbar-responsiva/tree/bca6fbed0a69c1c1ebeca59622745127b5c8192d/js%2Fdesktop.js)';
    }
    
        public function renderAdminHeader() {
            return '
            <!-- nav -->
            <nav class="navbar navbar-expand navbar-light px-5" style="background-color: #071739;">
                <a class="navbar-brand ml-5" href="./index.php">
                    <img src="../assets/imgs/logo.png" width="80" height="80" alt="profile_picture">
                </a>
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>
    
                <div class="user-cart">
                    ' . (isset($_SESSION['user_id']) ? '
                    <a href="" style="text-decoration:none;">
                        <i class="fa fa-user mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>
                    </a>
                    ' : '
                    <a href="/Retail_Ecommerce_Website/public/home_page.php" class="btn " style="text-decoration:none;">
    <i class="fa fa-sign-in" style="font-size:30px; color:#fff;" aria-hidden="true"></i>
</a>

                    ') . '
                </div>
            </nav>
            <script>
            function openNav() {
                document.getElementById("mySidebar").style.width = "250px";
                document.getElementById("main").style.marginLeft = "250px";  
                document.getElementById("main-content").style.marginLeft = "250px";
                document.getElementById("main").style.display="none";
            }
    
            function closeNav() {
                document.getElementById("mySidebar").style.width = "0";
                document.getElementById("main").style.marginLeft= "0";  
                document.getElementById("main").style.display="block";  
            }
            </script>';
        }


}