<div class="modal" id="addModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Insert Product</h4>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="/save" method="post" enctype="multipart/form-data">
                    <p id="modalData"></p> 
                    <div class="info">
                        <input type="hidden" name="id" value="">
                        <label for="name">Product Name</label>
                        <input class="fname" type="text" name="name" value="" >
                        
                        <label for="description">Description</label>
                        <input type="text" name="description" value="">
                        
                        <label for="price">Price</label>
                        <input type="number" name="price" value="">
                        
                        <label for="quantity">Quantity</label>
                        <input type="number" name="quantity" value="">
                        
                        <label for="image">Image</label>
                        <input type="file" name="image" value="">
                        
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
<div class="modal" id="addCateg">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Create Playlist</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
          <form action="/saveCategory" method="post">
            <!-- <p id="modalData"></p> -->
            <input type="text" id="" name="category">
            <button type="Submit" class="btn btn-success" data-bs-dismiss="modal">Submit</button>
            </form>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>

<!-- Add some CSS to style the modal -->
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
}

.modal-content {
  background-color: #fefefe;
  border: 1px solid #888;
  padding: 20px;
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
</style>