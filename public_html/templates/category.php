<!-- Modal -->
<div class="modal fade" id="category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Category Selection</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

<!-- Form Start-->

      <form id="category_form" onsubmit="return false">
        <div class="form-group">


        <label>Category Name</label>
        <input type="text" class="form-control" name="category_name" id="category_name" aria-describedby="emailHelp" placeholder="category_name">
        <small id="cat_error" class="form-text text-muted"></small>
       
        </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Parent Category</label>
            <select class="form-control" id= "Parent_cat" name="Parent_cat">
             
            </select>

          </div>
  
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>

        </div>

      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

 <!-- Form end -->    
 
      </div>
    </div>
  </div>
</div>