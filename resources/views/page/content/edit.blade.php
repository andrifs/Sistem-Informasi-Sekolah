@extends('layouts.app')

@section('title', 'Edit Data Mapel')

@section('section-content')
<div class="row">
    <div class="col-md-12 d-flex justify-content-between">
        <div class="col-md-4">
            <h3>Edit Konten</h3>
            <p>Untuk edit isi data konten halaman utama</p>
        </div>
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Isi Konten</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('content.update', $content->id) }}" method="post">
                        @csrf
                        @method('PUT')

                            <div class="form-group">
                                <label for="isi_konten">Isi Konten</label>
                                <textarea name="isi_konten" class="my-editor form-control" id="isi_konten" cols="30" rows="10">{{ $content->isi_konten }}</textarea>
                                @error('isi_konten')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.tiny.cloud/1/0vj2y1tk59wsz0p5wvwhhy6w5kw374l7vqefx2skphcgzilo/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
      selector: 'textarea.my-editor',
      plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
   });
  </script>
@endpush
