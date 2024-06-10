<div class="modal fade" id="modal_logbook" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <form action="/logbook/public" method="post" id="form_modal_logbook">
        @method('PUT')
        @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">Tambah Logbook</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          @if ($errors->any())
              <div class="alert alert-danger mb-2">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          <input type="hidden" name="id" id="logbook_id">
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama">
          </div>
          <div class="mb-3">
            <label for="kegiatan" class="form-label">Kegiatan</label>
            <input type="hidden" name="kegiatan" id="kegiatan"/>
            <div id="editor_kegiatan" class="bg-light"></div>
          </div>
          <div class="mb-3">
            <label for="waktu_masuk" class="form-label">Waktu Masuk</label>
            <input type="datetime" class="form-control" id="waktu_masuk" name="waktu_masuk">
          </div>
          <div class="mb-3">
            <label for="waktu_keluar" class="form-label">Waktu Keluar</label>
            <input type="datetime" class="form-control" id="waktu_keluar" name="waktu_keluar">
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
        </div>
      </form>
      </div>
  </div>
</div>