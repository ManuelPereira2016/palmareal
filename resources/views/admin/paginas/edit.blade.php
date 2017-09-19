@extends('layouts.admin.default')
@section('title', 'Editar pagina')
@section('content')
    <div class="box box-primary">
        <form action="{{ route('paginas.update', $page -> id) }}" method="post">
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
                <textarea name="content" id="content" class="textarea" placeholder="Contenido de la pagina" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $page -> content }}</textarea>
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
    <script src="{{asset('adminlte/plugins/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('adminlte/plugins/tinymce/themes/modern/theme.min.js')}}"></script>
    <script>
        
      $(function () {
        //bootstrap WYSIHTML5 - text editor
        tinymce.init({
          selector: 'textarea',
          height: 500,
          theme: 'modern',
          language: 'es_MX',
          plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak ',
            'searchreplace wordcount visualblocks visualchars code fullscreen spellchecker',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'template paste textcolor colorpicker textpattern imagetools codesample toc help emoticons hr'
          ],
          toolbar1: 'formatselect | bold italic  strikethrough  forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
          image_advtab: true,
          content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css'
          ]
         });
      });
    </script>
@endsection