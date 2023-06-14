 @extends('layouts.master')

 @section('script')

     <script type="text/javascript">
         $(document).ready(function() {
             $("#form-task").on("submit", function(event) {
                 event.preventDefault();
                 $.post(
                     "http://sitio1.test/api/tasks",
                     $("#form-task").serialize(),
                     function(data) {
                         console.log(data);
                         alert("Se ha guardado correctamente");
                         var url = "http://sitio1.test/crud";
                         $(location).attr('href', url);
                     });
             });
         });
     </script>
 @stop

 @section('content')
     <h2>Nueva tarea</h2>

     <form id="form-task">
         <div class="mb-3">
             <label for="exampleFormControlInput1" class="form-label">Titulo</label>
             <input type="text" class="form-control" id="exampleFormControlInput1" name="title" placeholder=" ">
         </div>
         <div class="mb-3">
             <label for="exampleFormControlTextarea1" class="form-label">Descripcion</label>
             <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
         </div>
         <button type="submit" class="btn btn-primary">Guardar</button>
     </form>
 @stop
