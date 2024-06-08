<div class="modal fade" id="modal_delete_logbook" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form action="" method="post" id="form_modal_delete_logbook">
        @method("DELETE")
        @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">Delete Logbook</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
          <p>Apa anda yakin menghapus logbook ini?</p>
        </div>
        <div class="modal-footer">
          <a class="btn btn-danger" data-bs-toggle="modal" >Tidak</a>
          <button class="btn btn-success" type="submit" name="submit">Iya</button>
        </div>
      </form>
      </div>
  </div>
</div>