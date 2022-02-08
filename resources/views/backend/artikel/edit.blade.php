@extends('../backend/layouts.template')

@section('content')
      <!-- ============================================================== -->
      <!-- Page wrapper  -->
      <!-- ============================================================== -->
      <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Form Edit Data Artikel</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Library
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Start Page Content -->
          <!-- ============================================================== -->
          {{-- <div class="row"> --}}
            {{-- <div class="col-md-6"> --}}
              <div class="card">
                <form class="form-validate form-horizontal" method="POST" enctype="multipart/form-data"
                action="{{ route('artikel.update',$artikel->id_artikel) }}">
                
                {{-- Code untuk menyimpan --}}
                {!! csrf_field() !!}
                {{-- Code untuk cek apakah ada artikel yang dipilih untuk diedit --}}
                {!! isset($artikel) ? method_field('PUT') : '' !!}

                {{-- Inputtan tak terlihat --}}
                <input type="hidden" name="id_artikel" value="{{ isset($artikel) ? $artikel->id_artikel : '' }}">
                {{-- <input type="hidden" name="tanggal" value="{{ date('Y-m-d') }}"> --}}

                  <div class="card-body">
                    <div class="card-title">
                      <a href="/dashboard">Dashboard / </a>
                      <a href="/artikel">Artikel / </a>
                      Edit Data
                    </div>
                    <div class="form-group row">
                      <label
                        for="judul"
                        class="col-sm-3"
                        >Judul Artikel</label>
                      <div class="col-sm-13">
                        <input
                          type="text"
                          class="form-control"
                          id="judul" name="judul"
                          placeholder="Masukkan judul"
                          value="{{ isset($artikel) ? $artikel->judul : '' }}"/>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="kategori_artikel"
                        class="col-sm-3"
                        >Kategori</label>
                      {{-- <div class="col-sm-13">
                          <select name="id_ktg" class="select2 form-select shadow-none"
                          style="width: 100%; height: 36px">  
                          @foreach ($kategori as $data)
                            <option value="{{ $data->id_ktg }}">{{ $data->id_ktg }}</option>
                          @endforeach               
                          </select>
                      </div> --}}
                        <div class="col-md-13">
                          <select name="id_ktg"
                            class="select2 form-select shadow-none"
                            style="width: 100%; height: 36px">
                            <option>Select</option>
                            <option value="KAT01" {{ ($artikel->id_ktg=="KAT01")? "selected" : "" }}>Tirta Agung</option>
                            <option value="KAT02" {{ ($artikel->id_ktg=="KAT02")? "selected" : "" }}>Kala Senja</option>
                            <option value="KAT03" {{ ($artikel->id_ktg=="KAT03")? "selected" : "" }}>Berita</option>
                            <option value="KAT04" {{ ($artikel->id_ktg=="KAT04")? "selected" : "" }}>Hiburan</option>
                          </select>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="penulis"
                        class="col-sm-3"
                        >Penulis</label
                      >
                      <div class="col-sm-13">
                        <input
                          type="text"
                          class="form-control"
                          id="penulis" name="penulis"
                          placeholder="Masukkan nama penulis"
                          value="{{ isset($artikel) ? $artikel->penulis : '' }}"
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3">
                        Gambar / Sampul</label>
                      <div class="col-md-13">
                        <div class="custom-file">
                          <input type="hidden" name="nama_gambar" value="{{ isset($artikel) ? $artikel->gambar : '' }}">
                          <td><img src="/data/data_artikel/{{ isset($artikel) ? $artikel->gambar : '' }}" width="100"></td>
                          <input
                            type="file"
                            id="gambar" name="gambar"
                            class="custom-file-input {{ $errors->has('gambar') ? 'is-invalid' : ''}}"
                          />
                          @if ( $errors->has('gambar'))
                            <span class="text-danger small">
                              <p>{{ $errors->first('gambar') }}</p>
                            </span>
                          @endif

                          <div class="invalid-feedback">
                            Example invalid custom file feedback
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="isi" 
                        class="col-sm-3"
                        >Tulis Isi Artikel</label
                      >
                      <div class="col-sm-13">
                        <textarea class="ckeditor" id="isi" name="isi">{!! isset($artikel) ? $artikel->isi : '' !!}</textarea>
                      </div>
                    </div>
                  </div>
                  <div class="border-top">
                    <div class="card-body float-end">
                      <a href="/artikel"><button type="button" class="btn btn-secondary">BATAL</button></a>
                      <button type="submit" class="btn btn-primary">
                        SIMPAN
                      </button>
                    </div>
                  </div>
                </form>
              </div>
      {{-- </div>         --}}
      <!-- ============================================================== -->
      <!-- End Page wrapper  -->
      <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

    

    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ ('backend/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ ('backend/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ ('backend/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ ('backend/assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ ('backend/dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ ('backend/dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ ('backend/dist/js/custom.min.js') }}"></script>
    <!-- This Page JS -->
    <script src="{{ ('backend/assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ ('backend/dist/js/pages/mask/mask.init.js') }}"></script>
    <script src="{{ ('backend/assets/libs/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ ('backend/assets/libs/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ ('backend/assets/libs/jquery-asColor/dist/jquery-asColor.min.js') }}"></script>
    <script src="{{ ('backend/assets/libs/jquery-asGradient/dist/jquery-asGradient.js') }}"></script>
    <script src="{{ ('backend/assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js') }}"></script>
    <script src="{{ ('backend/assets/libs/jquery-minicolors/jquery.minicolors.min.js') }}"></script>
    <script src="{{ ('backend/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ ('backend/assets/libs/quill/dist/quill.min.js') }}"></script>
    <script>
      //***********************************//
      // For select 2
      //***********************************//
      $(".select2").select2();

      /*colorpicker*/
      $(".demo").each(function () {
        //
        // Dear reader, it's actually very easy to initialize MiniColors. For example:
        //
        //  $(selector).minicolors();
        //
        // The way I've done it below is just for the demo, so don't get confused
        // by it. Also, data- attributes aren't supported at this time...they're
        // only used for this demo.
        //
        $(this).minicolors({
          control: $(this).attr("data-control") || "hue",
          position: $(this).attr("data-position") || "bottom left",

          change: function (value, opacity) {
            if (!value) return;
            if (opacity) value += ", " + opacity;
            if (typeof console === "object") {
              console.log(value);
            }
          },
          theme: "bootstrap",
        });
      });
      /*datwpicker*/
      jQuery(".mydatepicker").datepicker();
      jQuery("#datepicker-autoclose").datepicker({
        autoclose: true,
        todayHighlight: true,
      });
      var quill = new Quill("#editor", {
        theme: "snow",
      });
    </script>

    <!-- Link Js CkEditor -->
    <script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js')}}"></script>

    @endsection

