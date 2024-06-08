<div class="modal fade" id="input_modal_waktu_keluar" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <form method="post" id="form_input_modal_waktu_keluar" action="">
      @method('PUT')
      @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">Logbook</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          @error('kegiatan')
              <div class="alert alert-danger" role="alert">
                  {{$message}}
              </div>
          @enderror
          <div class="mb-3">
            <label for="kegiatan" class="form-label">Kegiatan</label>
            <input type="hidden" name="kegiatan" id="kegiatan" required/>
            <div id="editor" class="bg-light"></div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" type="submit" name="submit" >Simpan</button>
        </div>
      </form>
      </div>
  </div>
</div>