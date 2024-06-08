@extends('layouts.main')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
<script>
  const quill = new Quill('#editor', {
    theme: 'snow',
    placeholder: 'Kegiatan...',
    
  });
  
  const deskripsi = document.getElementById('kegiatan');
  document.getElementById('form_modal_logbook').addEventListener('submit',function(e) {
    if(quill.getText() !== '\n' && quill.getText() !== 'Harap isi bidang ini.\n') {
      const delta = quill.getSemanticHTML();
      deskripsi.value = delta;
      } else {
        e.preventDefault();
      quill.setText('Harap isi bidang ini.')
    }
  });  

  $(document).ready(function(){
      $('#modal_logbook').on('show.bs.modal', function (e) {
          var logbook = $(e.relatedTarget).data('logbook') ?? {!! Session::get('validation_logbook') !!}
          console.log(logbook);
          $('#nama').val(logbook.nama)
          quill.clipboard.dangerouslyPasteHTML(logbook.kegiatan);
          $('#waktu_masuk').val(logbook['waktu masuk'])
          $('#waktu_keluar').val(logbook['waktu keluar'])

          $('#form_modal_logbook').attr('action',`/logbook/${logbook.id}`);
      });

      $('#modal_delete_logbook').on('show.bs.modal', function (e) {
          var logbook = $(e.relatedTarget).data('logbook') ?? {!! Session::get('validation_verifikasilogbook') !!}
          $('#form_modal_delete_logbook').attr('action',`/logbook/${logbook}`);
      });
      $('#modal_verifikasi_logbook').on('show.bs.modal', function (e) {
          var logbook = $(e.relatedTarget).data('logbook')
          console.log(logbook)
          $('#form_modal_verifikasi_logbook').attr('action',`/logbook/${logbook}/verifikasi`);
          $('#diterima').on('click', function(e) {
            $('#status').val('diterima')
          })
          $('#ditolak').on('click', function(e) {
            $('#status').val('ditolak')
          })
      });
  });

  $('#form_modal_logbook').on('submit', function(e) {
    e.target.submit.innerText = 'Loading...';
    e.target.submit.setAttribute('disabled',true)
  })
  $('#form_modal_delete_logbook').on('submit', function(e) {
    e.target.submit.innerText = 'Loading...';
    e.target.submit.setAttribute('disabled',true)
  })
  $('#form_modal_verifikasi_logbook').on('submit', function(e) {
    e.target.diterima.innerText = 'Loading...';
    e.target.ditolak.innerText = 'Loading...';
    e.target.ditolak.setAttribute('disabled',true)
    e.target.diterima.setAttribute('disabled',true)
  })
  </script>
  @session("validation_logbook")
  <script>
    $(function() {
      $('#modal_logbook').modal('show');
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
              <div class="row justify-content-center">
                <div class="col-12 px-0">
                    <div class="table-responsive">
                    @if(count($logbook) > 0)
                      <table class="table table-borderless table-striped" id="daftar_logbook">
                        <thead>
                          <tr>
                            <th scope="col" width='25' class='text-center text-light bg-primary'>No</th>
                            <th scope="col" class="bg-primary text-light">Nama</th>
                            <th scope="col" class="min-w-400 text-light bg-primary">Kegiatan</th>
                            <th scope="col" class="text-light bg-primary">Waktu Masuk</th>
                            <th scope="col" class="text-light bg-primary">Waktu Keluar</th>
                            <th scope="col" class="text-light bg-primary">Status</th>
                            <th scope="col" class="text-light bg-primary">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($logbook as $i => $row)
                          <tr>
                            <td valign='middle' class='text-center'>{{ ++$i }}</td>
                            <td valign='middle'>{{ $row['nama'] }}</td>
                            <td valign='middle' class="kegiatan">
                              @if(!$row['kegiatan'])
                              -
                              @else
                              {!! $row['kegiatan'] !!}
                              @endif
                            </td>
                            <td valign='middle'>{{ $row['waktu masuk'] }}</td>
                            <td valign='middle'>
                              {{ $row['waktu keluar'] }}
                              </td>
                            <td valign='middle'>{{ $row['status'] }}</td>
                            <td valign='middle'>
                              <div class="d-block">
                                @if($row['status'] === 'belum diverifikasi')
                                <a href='#modal_verifikasi_logbook' data-logbook="{{$row['id']}}" data-bs-toggle="modal" class="btn btn-warning text-light btn-sm px-3">
                                Verifikasi
                                </a>
                                @endif
                                <a href='#modal_logbook' data-logbook="{{json_encode($row)}}" data-bs-toggle="modal" class="btn btn-success text-light btn-sm px-3">
                                Edit
                                </a>
                                <a href='#modal_delete_logbook' data-logbook="{{$row['id']}}" data-bs-toggle="modal" class="btn btn-danger text-light btn-sm px-3">
                                Del
                                </a>
                              </div>
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
      @include('components.modal_logbook')
      @include('components.modal_delete_logbook')
      @include('components.modal_verifikasi_logbook')
    </main>
@endsection