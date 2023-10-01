<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Add Product</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addModal" >Insert Product</button>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Add Category</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addCateg" >Insert Product</button>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Area Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Description</th>
                                            <th>Category</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Description</th>
                                            <th>Category</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach($product as $pro):?>
                                            <tr>
                                            <td><?=$pro['name']?></td>
                                            <td><?=$pro['description']?></td>
                                            <td><?=$pro['category']?></td>
                                            <td><?=$pro['quantity']?></td>
                                            <td><?=$pro['price']?></td>
                                            <td><?=$pro['image']?></td>
                                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal<?=$pro['id']?>" >Edit</button><a href="/delete/<?=$pro['id']?>" class="btn btn-danger">Delete</a></td>
                                        </tr>
                                            <div class="modal" id="myModal<?=$pro['id']?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Update Product</h4>
                                                    </div>
                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <form action="/save" method="post" enctype="multipart/form-data">
                                                            
                                                            <div class="info">
                                                                <input type="hidden" name="id" value="<?=$pro['id']?>">
                                                                <label for="name">Product Name</label>
                                                                <input class="fname" type="text" name="name" value="<?=$pro['name']?>" >
                                                                
                                                                <label for="description">Description</label>
                                                                <input type="text" name="description" value="<?=$pro['description']?>">
                                                                
                                                                <label for="price">Price</label>
                                                                <input type="number" name="price" value="<?=$pro['price']?>">
                                                                
                                                                <label for="quantity">Quantity</label>
                                                                <input type="number" name="quantity" value="<?=$pro['quantity']?>">
                                                                
                                                                <label for="image">Image</label>
                                                                <input type="file" name="image" value="" img src="/public/<?=$pro['image']?>">
                        
                                                                
                                                                <label for="category">Category</label>
                                                                <select name="category">
                                                                    <?php foreach($category as $categ):?>
                                                                    <option value="<?=$categ['id']?>"><?=$categ['category']?></option>
                                                                    <?php endforeach;?>
                                                                </select>
                                                            </div>
                                                            <button class="btn btn-success" type="Submit" data-bs-dismiss="modal">Submit</button>
                                                        </form>
                                                    </div>
                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>    
                                        </div>
                                            <?php endforeach;?>
                                  </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        
        <style>
.modal {
  display: none;
  position: fixed;
  z-index: 1500;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0,0.4);
  padding-top: 60px;
}

.modal-dialog {
  margin: 50px auto;
  max-width: 80%;
  text-align: left;
}

.modal-content {
  background-color: #fefefe;
  border: 1px solid #888;
  padding: 20px;
  text-align: center;
}

.modal-header, .modal-footer {
  background-color: #f1f1f1;
}

.modal-title {
  flex: 1;
}

.btn-close {
  background: none;
  border: none;
  font-size: 24px;
  cursor: pointer;
}
.modal-footer button {
  margin-right: 10px;
}
.info label {
  display: block;
  margin-bottom: 5px;
  width: 150px; 
}

.info input,
.info select {
  width: calc(103% - 150px);
  padding: 10px;
  margin-bottom: 10px;
  box-sizing: border-box; /* Ensure padding doesn't affect width */
  
}

</style>