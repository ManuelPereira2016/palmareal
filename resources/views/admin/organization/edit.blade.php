@extends('layouts.admin.default')
@section('title', 'Editar Encabezado')
@section('content')
<div class="box box-primary">
  <form id="form" action="{{ route('header-update', $organization -> id) }}" method="post">
    <div class="box-header">
    </div>
    <div class="box-body">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="phone" class="control-label">Telefono de Contacto <span class="text-danger">*</span></label>
            <input name="phone_contact" type="text" class="form-control" id="phone" placeholder="Numero telefonico" maxlength="150" value="{{ $organization -> phone_contact }}">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="email" class="control-label">Correo de Contacto <span class="text-danger">*</span></label>
            <input name="email_contact" type="text" class="form-control" id="subtitle" placeholder="Dirección de Correo" maxlength="150" value="{{ $organization -> email_contact }}">
          </div>
        </div>
      </div>   
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label for="email" class="control-label">Texto principal <span class="text-danger">*</span></label>
            <textarea name="title_main" class="form-control" id="title_main" placeholder="Texto principal">{!! $organization -> title_main !!}</textarea>
            <textarea id="fake" style="display: none;">{!! $organization -> title_main !!}</textarea>
          </div>
        </div>
      </div>   
    </div>  
    <div class="box-footer text-center">
      <a href="{{ route('paginas.index') }}" class="btn btn-danger">Cancelar</a>
      <button type="submit" class="btn btn-success">Aceptar</button>
    </div>
  </form>
</div>
<!-- /.box -->
@endsection
@section('scripts')
    <script>
      $('#title_main').pleaseWait(); // starts the waiter
        
      $(function () {
        //bootstrap WYSIHTML5 - text editor
        tinymce.init({
          setup: function (ed) {
            ed.on('init', function(args) {
              ed.setContent($('#fake').text());
              $('#title_main').pleaseWait('stop');
            });
          },
          selector: '#title_main',
          height: 500,
          theme: 'modern',
          language: 'es_MX',
          plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak ',
            'searchreplace wordcount visualblocks visualchars code fullscreen spellchecker',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'paste textcolor colorpicker textpattern imagetools codesample toc help emoticons hr'
          ],
          file_picker_types: 'image',
          image_advtab: true,
          images_upload_handler: function (blobInfo, success, failure) {
              var xhr, formData;
              xhr = new XMLHttpRequest();
              xhr.withCredentials = false;
              xhr.open('POST', '{{ route('image-upload', $organization -> id) }}');
              var token = $('[name="csrf-token"]').attr('content');
              xhr.setRequestHeader("X-CSRF-Token", token);
              xhr.onload = function() {
                  var json;
                  if (xhr.status != 200) {
                      failure('HTTP Error: ' + xhr.status);
                      return;
                  }
                  json = JSON.parse(xhr.responseText);

                  if (!json || typeof json.location != 'string') {
                      failure('Invalid JSON: ' + xhr.responseText);
                      return;
                  }
                  success(json.location);
              };
              formData = new FormData();
              formData.append('file', blobInfo.blob(), blobInfo.filename());
              xhr.send(formData);
          },
          file_picker_callback: function(cb, value, meta) {
              var input = document.createElement('input');
              input.setAttribute('type', 'file');
              input.setAttribute('accept', 'image/*');
              
              // Note: In modern browsers input[type="file"] is functional without 
              // even adding it to the DOM, but that might not be the case in some older
              // or quirky browsers like IE, so you might want to add it to the DOM
              // just in case, and visually hide it. And do not forget do remove it
              // once you do not need it anymore.

              input.onchange = function() {
                var file = this.files[0];
                
                var reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function () {
                  // Note: Now we need to register the blob in TinyMCEs image blob
                  // registry. In the next release this part hopefully won't be
                  // necessary, as we are looking to handle it internally.
                  var id = 'blobid' + (new Date()).getTime();
                  var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                  var base64 = reader.result.split(',')[1];
                  var blobInfo = blobCache.create(id, file, base64);
                  blobCache.add(blobInfo);

                  // call the callback and populate the Title field with the file name
                  cb(blobInfo.blobUri(), { title: file.name });
                };
              };
              
              input.click();
            },
          toolbar1: 'formatselect | bold italic  strikethrough  forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat'
         });
      });
    </script>
@endsection