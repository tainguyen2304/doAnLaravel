<div wire:ignore.self  class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">add brand</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form  action=" {{url('admin/brand')}}"  method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="mb-3" >
                    <label >
                       Brand Name
                    </label>
                    <input type="text" name="name" class="form-control">
                    @error('name')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>
                        Brand Slug
                    </label>
                    <input type="text" name="slug" class="form-control">
                    @error('slug')
                    <small class="text-danger">
                        {{$message}}
                    </small>
                @enderror
                </div>
               
                <div class="mb-3">
                    <label>
                          Status
                    </label>
                    <br/>
                    <input type="checkbox" name="status" >    Checked=Hidden, Un-Checked=Visible
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" >Save</button>
            </div>
        </form>
       
      </div>
    </div>
  </div>
