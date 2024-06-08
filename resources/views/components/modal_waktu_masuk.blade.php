<div class="modal fade" id="input_modal_waktu_masuk" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <form action="/logbook/public" method="post" id="form_input_moda_waktu_masuk">
        @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">Logbook</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          @error('nama')
              <div class="alert alert-danger" role="alert">
                  {{$message}}
              </div>
          @enderror
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
        </div>
      </form>
      </div>
  </div>
</div>