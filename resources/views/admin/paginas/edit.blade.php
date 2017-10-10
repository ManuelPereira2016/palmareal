@extends('layouts.admin.default')
@section('title', 'Editar pagina')
@section('content')
    <div class="box box-primary">
        <form id="form" action="{{ route('paginas.update', $page -> id) }}" method="post">
            <div class="box-header">
                <h3 class="box-title">Editar pagina</h3>
            </div>
            <div class="box-body">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title" class="control-label">Titulo <span class="text-danger">*</span></label>
                            <input name="title" type="text" class="form-control" id="title" placeholder="Titulo de la pagina" maxlength="150" value="{{ $page -> title }}">                   
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="subtitle" class="control-label">Subtitulo <span class="text-danger">*</span></label>
                            <input name="subtitle" type="text" class="form-control" id="subtitle" placeholder="Subtitulo de la pagina" maxlength="150" value="{{ $page -> subtitle }}">                   
                        </div>
                    </div>
                </div>      
                <div class="form-group">
                    <label for="description" class="control-label">Descripción</label>
                    <input name="description" type="text" class="form-control" id="description" placeholder="Breve descripción" maxlength="200" value="{{ $page -> description }}">                   
                </div>
                <div class="form-group">
                <label for="content">Contenido <span class="text-danger">*</span></label>
                <textarea name="content" id="content" class="textarea" placeholder="Contenido de la pagina" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">Cargando...</textarea>
                <textarea id="fake" style="display: none;">{{ $page -> content }}</textarea>
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
      $('#content').pleaseWait(); // starts the waiter
        
      $(function () {
        $('body').on('DOMNodeInserted', '.mce-fade', function (e) {
          if (!$('#webm-warning').length){
            $('[role="tabpanel"].mce-first').prepend(
            '<span id="webm-warning" style="padding-left: 20px;display: block;margin-top: 10px;margin-bottom: -5px;    font-weight: 600;">Se recomienda utilizar unicamente videos en formato WEBM.</span>');
          }
        });

        //bootstrap WYSIHTML5 - text editor
        tinymce.init({
          setup: function (ed) {
            ed.on('init', function(args) {
              ed.setContent($('#fake').text());
              $('#content').pleaseWait('stop');             
            });
          },
          selector: '#content',
          height: 500,
          theme: 'modern',
          language: 'es_MX',
          plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak ',
            'searchreplace wordcount visualblocks visualchars code fullscreen spellchecker',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'paste textcolor colorpicker textpattern imagetools codesample toc help emoticons hr'
          ],
          file_picker_types: 'image media',
          image_advtab: true,
          images_upload_handler: function (blobInfo, success, failure) {
              var xhr, formData;
              xhr = new XMLHttpRequest();
              xhr.withCredentials = false;
              xhr.open('POST', '{{ route('image-upload', $page -> id) }}');
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

              if (meta.filetype == 'image') {
                input.setAttribute('accept', 'image/*');
              }

              if (meta.filetype == 'media') {
                input.setAttribute('accept', 'video/*');
              }
              
              // Note: In modern browsers input[type="file"] is functional without 
              // even adding it to the DOM, but that might not be the case in some older
              // or quirky browsers like IE, so you might want to add it to the DOM
              // just in case, and visually hide it. And do not forget do remove it
              // once you do not need it anymore.

              input.onchange = function() {
                $('body').pleaseWait(); // starts loading icon
                var file = this.files[0];

                if (file.type.indexOf('video') == 0){
                    // lets upload the video
                    var xhr, formData;
                    xhr = new XMLHttpRequest();
                    xhr.withCredentials = false;
                    xhr.open('POST', '{{ route('video-upload', $page -> id) }}');
                    var token = $('[name="csrf-token"]').attr('content');
                    xhr.setRequestHeader("X-CSRF-Token", token);
                    xhr.onload = function() {
                        var json;
                        if (xhr.status != 200) {
                            console.log('HTTP Error: ' + xhr.status);
                            return;
                        }
                        json = JSON.parse(xhr.responseText);

                        if (!json || typeof json.location != 'string') {
                            console.log('Invalid JSON: ' + xhr.responseText);
                            return;
                        }
                        // call the callback and populate the Title field with the file name
                        cb(json.location, { title: file.name });

                        $('body').pleaseWait('stop');
                    };
                    formData = new FormData();
                    formData.append('file', file);
                    xhr.send(formData);
                } else {
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

                    $('body').pleaseWait('stop');
                  };
                }
               
              };
              
              input.click();
            },
          toolbar1: 'formatselect | bold italic  strikethrough  forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat'
         });
      });
    </script>
@endsection