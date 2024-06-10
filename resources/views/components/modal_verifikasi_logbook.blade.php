<div class="modal fade" id="modal_verifikasi_logbook" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
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
          @error('catatan')
              <div class="alert alert-danger" role="alert">
                  {{$message}}
              </div>
          @enderror
          <div class="mb-3">
            <label for="catatan" class="form-label">Catatan</label>
            <input type="hidden" name="catatan" id="catatan" required/>
            <div id="editor_catatan" class="bg-light"></div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-danger"  type="submit" name="ditolak" id="ditolak">Ditolak</button>
          <button class="btn btn-success" type="submit" name="diterima" id="diterima">Diterima</button>
        </div>
      </form>
      </div>
  </div>
</div>