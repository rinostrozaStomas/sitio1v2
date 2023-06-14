 @extends('layouts.master')

 @section('script')

     <script type="text/javascript">
         $(document).ready(function() {
             $.getJSON('http://sitio1.test/api/tasks', function(json) {
                 var tr = [];
                 for (var i = 0; i < json.length; i++) {
                     tr.push('<tr>');
                     tr.push('<td>' + json[i].id + '</td>');
                     tr.push('<td>' + json[i].title + '</td>');
                     tr.push('<td>' + json[i].description + '</td>');
                     tr.push('<td> <a href="/crud/edit/'+  json[i].id  +'" class=\'edit btn btn-primary\'>Edit</a>  '+
                        '  <button class=\'delete\' data-id="'+  json[i].id  +'"  >Delete</button>'+
                        ' </td>');
                     tr.push('</tr>');
                 }
                 $('#tbl-data tbody').append($(tr.join('')));
                 $('.delete').click(function() {
                    let valor_id = $(this).data('id');
                     var ajxReq = $.ajax({
                         url: 'http://sitio1.test/api/tasks/'+valor_id,
                         type: 'DELETE',
                         success: function(data) {
                             alert(data);
                             location.reload();
                         }
                     });
                 });
             });






         });
     </script>
 @stop

 @section('content')
     <h2>Section title</h2>
     <div class="table-responsive">
        <a href="/crud/new" target="_self" class="btn btn-success" > Nueva tarea </a>
         <table class="table table-striped table-sm" id="tbl-data">
             <thead>
                 <tr>
                     <th scope="col">#</th>
                     <th scope="col">Titulo</th>
                     <th scope="col">Descripcion</th>
                     <th scope="col"> </th>
                 </tr>
             </thead>
             <tbody>

             </tbody>
         </table>
     </div>

 @stop
