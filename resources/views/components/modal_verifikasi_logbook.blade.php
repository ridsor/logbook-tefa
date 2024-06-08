<div class="modal fade" id="modal_verifikasi_logbook" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form action="" method="post" id="form_modal_verifikasi_logbook">
        @method("POST")
        @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">Verifikasi Logbook</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <input type="hidden" name="status" id="status" value="ditolak">
        </div>
        <div class="modal-footer">
          <button class="btn btn-danger"  type="submit" name="ditolak" id="ditolak">Ditolak</button>
          <button class="btn btn-success" type="submit" name="diterima" id="diterima">Diterima</button>
        </div>
      </form>
      </div>
  </div>
</div>