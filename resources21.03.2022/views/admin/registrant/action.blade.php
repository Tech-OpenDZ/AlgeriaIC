<form name='deleteAdminForm' id='deleteAdminForm' action="{{route('manage-registrant.destroy',$delete_id)}}"  method="POST">
    {{method_field('DELETE')}}
    {{ csrf_field() }}
    <input type="hidden" name="delete" value="{{$delete_id}}" id="delete_hidden">
        <div class="modal-header">
            <h4 class="modal-title">Delete</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <p>Voulez-vous vraiment supprimer cette inscription ?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"> Non </button>
            <button type="submit" class="btn btn-primary" id="delete"> Oui </button>
        </div>
</form>
