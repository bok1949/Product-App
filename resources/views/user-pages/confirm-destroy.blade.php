<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content alert alert-danger">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
        <p> Are you sure you want to delete <span class="font-weight-bold">{{$product->product_name}}</span>?</p>

      </div>
      <div class="modal-footer">
          <form action="{{route('dashboard.destroy', $product->id)}}" method="post">
                @csrf
                @method('DELETE')
          
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Continue</button>
            </form>
      </div>
    </div>
  </div>
</div>