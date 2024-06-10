@extends('layouts.main')

@section('css')
<link href="./assets/css/quiljs.min.css" rel="stylesheet" />
@endsection

@section('js')
<script src="./assets/js/jquery.min.js"></script>
<script src="./assets/js/quiljs.min.js"></script>
<script>
  const quill = new Quill('#editor', {
    theme: 'snow',
    placeholder: 'Kegiatan...',
    
  });

  const deskripsi = document.getElementById('kegiatan');
  document.getElementById('form_input_modal_waktu_keluar').addEventListener('submit',function(e) {
    if(quill.getText() !== '\n' && quill.getText() !== 'Harap isi bidang ini.\n') {
      const delta = quill.getSemanticHTML();
      deskripsi.value = delta;
      } else {
        e.preventDefault();
      quill.setText('Harap isi bidang ini.')
    }
  });  

  $(document).ready(function(){
    $('#input_modal_waktu_keluar').on('show.bs.modal', function (e) {
      var rowid = $(e.relatedTarget).data('id') ?? "{!! Session::get('validation_waktukeluar') !!}"
      $('#form_input_modal_waktu_keluar').attr('action',`/logbook/${rowid}/public`);
    });
  });

  $('#form_input_moda_waktu_masuk').on('submit', function(e) {
    e.target.submit.innerText = 'Loading...';
    e.target.submit.setAttribute('disabled',true)
  })
  $('#form_input_moda_waktu_keluar').on('submit', function(e) {
    e.target.submit.innerText = 'Loading...';
    e.target.submit.setAttribute('disabled',true)
  })
  </script>
  @session('validation_waktumasuk')
  <script>
    $(function() {
      $('#input_modal_waktu_masuk').modal('show');
    });
  </script>
  @endsession
  @session('validation_waktukeluar')
  <script>
    $(function() {
      $('#input_modal_waktu_keluar').modal('show');
    });
  </script>
  @endsession
@endsection

@section('main')
  <main>
      <section class="py-5">
        <div class="container px-0">
          <div class="mask d-flex align-items-center h-100">
            <div class="container-fluid">
              <div class="d-flex mb-3 align-items-center gap-3 justify-content-between  flex-column flex-sm-row">
                <h2 class='mb-0 fs-6'>LOGBOOK</h2>
                <a class="btn btn-primary d-block px-4" style="width:fit-content" data-bs-toggle="modal" href="#input_modal_waktu_masuk" role="button">TAMBAH DATA</a>
              </div>
              <div class="row justify-content-center">
                <div class="col-12 px-0">
                    <div class="table-responsive">
                    @if(count($logbook) > 0)
                      <table class="table table-borderless table-striped">
                        <thead>
                          <tr>
                            <th scope="col" width='25' class='text-center text-light bg-primary'>No</th>
                            <th scope="col" class="bg-primary text-light">Nama</th>
                            <th scope="col" class="min-w-400 text-light bg-primary">Kegiatan</th>
                            <th scope="col" class="text-light bg-primary">Waktu Masuk</th>
                            <th scope="col" class="text-light bg-primary">Waktu Keluar</th>
                            <th scope="col" class="text-light bg-primary min-w-400">Catatan</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($logbook as $i => $row)
                          <tr>
                            <td valign='middle' class='text-center'>{{ ++$i }}</td>
                            <td valign='middle'>{{ $row['nama'] }}</td>
                            <td valign='middle' class="kegiatan text-center">
                              @if(!$row['kegiatan'])
                              -
                              @else
                              {!! $row['kegiatan'] !!}
                              @endif
                            </td>
                            <td valign='middle'>{{ $row['waktu masuk'] }}</td>
                            <td valign='middle'>
                              @if(!$row['waktu keluar'])
                              <div class="d-block">
                                <a href='#input_modal_waktu_keluar' data-id="{{$row['id']}}" data-bs-toggle="modal" class="btn btn-success text-light btn-sm px-3 mb-1">
                                Waktu Keluar
                                </a>
                              </div>
                              @else
                              {{ $row['waktu keluar'] }}
                              @endif
                            </td>
                            <td valign='middle' class="text-center">
                              @if(!$row['catatan'])
                              -
                              @else
                              {!! $row['catatan'] !!}
                              @endif
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    @else
                      <h4 class='text-center py-5'>Data Tidak Ada</h4>
                    @endif
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      {{-- modal --}}
      @include('components.modal_waktu_masuk')
      @include('components.modal_waktu_keluar')
    </main>
@endsection