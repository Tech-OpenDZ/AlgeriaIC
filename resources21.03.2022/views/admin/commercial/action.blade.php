<form name='deletePartnerForm' id='deletePartnerForm' action="{{route('manage-commercial-quotes.destroy',$delete_id)}}" method="POST">
    {{method_field('DELETE')}}
    {{ csrf_field() }}
    <input type="hidden" name="delete" value="{{$delete_id}}" id="delete_hidden">
    <div class="modal-header"> 
        <h4 class="modal-title">Delete</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
        <p>Are you sure want to delete this Commercial Quote?</p>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-primary" id="delete">Yes</button>
    </div>
</form>


