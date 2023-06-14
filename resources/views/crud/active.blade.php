 @extends('layouts.master')

 @section('script')

     <script type="text/javascript">
         $(document).ready(function() {

        
             var id = window.location.href.split('/')[5];

             $.getJSON('http://sitio1.test/api/tasks/' + id, function(data) {
                  
                 $('#title').val(data.title)
                 $('#description').val(data.description)
             });


             $("#form-task").on("submit", function(event) {
                 event.preventDefault();
                 var ajxReq = $.ajax({
                     url: 'http://sitio1.test/api/tasks/' + id,
                     type: 'PATCH',
                     data: $("#form-task").serialize(),
                     success: function(data) {
                         alert("Se ha guardado correctamente");
                         var url = "http://sitio1.test/crud";
                         $(location).attr('href', url);
                     }
                 });

             });
         });
     </script>
 @stop

 @section('content')
     <h2>Activar Tarea</h2>

     <form id="form-task">
         <div class="mb-3">
             <label for="exampleFormControlInput1" class="form-label">Titulo</label>
             <input type="text" class="form-control" id="title" name="title" placeholder=" ">
         </div>
         <div class="mb-3">
             <label for="exampleFormControlTextarea1" class="form-label">Descripcion</label>
             <textarea class="form-control" id="description" rows="3" name="description"></textarea>
         </div>
         <button type="submit" class="btn btn-primary">Guardar</button>
     </form>
 @stop
