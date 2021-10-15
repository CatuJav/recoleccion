@extends('adminlte::page')



@section('content')
    <h1>Categorías de produtos o servicios</h1>


   <div class="card">
       <div class="card-body">

           <button type="button" class="btn btn-primary" data-toggle="modal" id="btnModal">
               Nueva categoría
           </button>

           <!-- Modal NUEVO-->
           <div class="modal fade"  id="modalCRUD" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog">
                   <div class="modal-content">
                       <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel">Nuevo</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                           </button>
                       </div>
                       <form id="addCategoria">
                           @csrf
                       <div class="modal-body">
                           <div class="form-group">
                               <label for="nomCategoria">Nombre de la categoría</label>
                               <input type="text" class="form-control" id="nomCategoria"  required>
                           </div>
                           <div class="form-group">
                               <label for="descCategoria">Descripción de la categoría</label>
                               <input type="text" class="form-control" id="descCategoria" >
                           </div>



                       </div>
                       <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                           <button type="submit" class="btn btn-primary" id="btnguardar" >Guardar</button>


                       </div>
                       </form>
                   </div>
               </div>
           </div>

           <!-- Modal EDITAR-->
           <div class="modal fade"  id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
               <div class="modal-dialog">
                   <div class="modal-content">
                       <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel1">Editar</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                           </button>
                       </div>
                       <form id="editCategoria">
                           @csrf
                           <div class="modal-body">
                               <div class="form-group">
                                   <label for="idEditCategoria">ID de la categoría</label>
                                   <input type="text" class="form-control" id="idEditCategoria"  readonly>
                               </div>
                               <div class="form-group">
                                   <label for="nomEditCategoria">Nombre de la categoría</label>
                                   <input type="text" class="form-control" id="nomEditCategoria"  required>
                               </div>
                               <div class="form-group">
                                   <label for="descEditCategoria">Descripción de la categoría</label>
                                   <input type="text" class="form-control" id="descEditCategoria" >
                               </div>



                           </div>
                           <div class="modal-footer">
                               <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                               <button type="submit" class="btn btn-success" id="btnactualizar" >Actualizar</button>


                           </div>
                       </form>
                   </div>
               </div>
           </div>

           <div class="table-responsive">
                @csrf
               <table class="table table-hover" id="categorias">
                   <thead>
                   <tr>
                       <th scope="col">ID</th>
                       <th scope="col">Nombre</th>
                       <th scope="col">Descripción</th>
                       <th scope="col">Estado</th>
                       <th scope="col">Acciones</th>

                   </tr>
                   </thead>

               </table>
           </div>
       </div>
   </div>

@stop

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.6.0/dt-1.11.3/b-2.0.1/r-2.2.9/sb-1.2.2/sp-1.4.0/sl-1.3.3/datatables.min.css"/>







@stop

@section('js')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.6.0/dt-1.11.3/b-2.0.1/r-2.2.9/sb-1.2.2/sp-1.4.0/sl-1.3.3/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>



    <script>
        //TRAE LOS DATOS Y MUESTRA EN LA TABLA
       var tablaCategoria= $('#categorias').DataTable(
            {
                "ajax":"{{route('datable.categorias')}}",
                "columns":[
                    {data:'id'},
                    {data:'nombre_categoria'},
                    {data: 'descripcion_categoria'},
                    {data: 'activo',"render":function (data, type, row) {

                          if (data=='1'){
                              return '<span class="badge rounded-pill bg-success">Activo</span>';
                            }else{
                              return '<span class="badge rounded-pill bg-danger">Desactivado</span>';
                          }
                        }},
                    {"defaultContent": "<button class='btn btn-primary' id='editbtn'>Editar</button> <button class='btn btn-danger' id='deletebtn'>Eliminar</button>"},



                ],
                responsive:true,
                autoWidth:false,
                "language": {
                    "lengthMenu": "Mostrar "+
                        `<select class='custom-select custom-select-sm form-control form-control-sm'>
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="-1">Todos</option>

                         </select>`
                        + " registros por página",
                    "zeroRecords": "Nada encontrado",
                    "info": "Mostrando la página _PAGE_ de _PAGES_",
                    "infoEmpty": "No records available",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    "search":'Buscar',
                    "paginate":{
                        "next":"Siguiente",
                        "previous":"Anterior"
                    }
                },

            }
        );
        //EDITAR
        $('#categorias tbody').on( 'click', '#editbtn', function () {
            var data = tablaCategoria.row( $(this).parents('tr') ).data();
            $('#idEditCategoria').val(data.id);
            $('#nomEditCategoria').val(data.nombre_categoria);
            $('#descEditCategoria').val(data.descripcion_categoria);

            $('#modalEditar').modal('show');



        } );
        $(document).on('submit','#editCategoria', function (event) {
            event.preventDefault();
            var id=$.trim($('#idEditCategoria').val());
            var nombre=$.trim($('#nomEditCategoria').val());
            var descripcion=$.trim($('#descEditCategoria').val());


            $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{route('datable.categorias.update')}}",
                    type: 'POST',
                    datatype:"json",
                    data:{
                        'id':id,
                        'nombre_categoria':nombre,
                        'descripcion_categoria':descripcion,
                    },
                    success:function (data){

                        tablaCategoria.ajax.reload(null,false);

                    }
                }
            );
            $("#editCategoria").trigger("reset");
            $("#modalEditar").modal('hide');
           // $('body').removeClass('modal-open');
            //$('.modal-backdrop').remove();
        });

        //BORRAR
        $('#categorias tbody').on( 'click', '#deletebtn', function () {
            var data = tablaCategoria.row( $(this).parents('tr') ).data();

            var id = data.id;
           // alert(  data.id);
            $.ajax({

                    url: "{{route('datable.categorias.delete')}}",
                    type: 'GET',
                    datatype:"json",
                    data:{
                        'id':id,

                    },
                    success:function (data){

                        tablaCategoria.ajax.reload(null,false);

                    }
                }
            );

        } );

        //NUEVO
        $(document).on('click','#btnModal',function (eve){
            $('#modalCRUD').modal('show');

        })


        //Añande el nuevo a objeto a la tabla y la base de datos
        $(document).on('submit','#addCategoria', function (event) {
        event.preventDefault();
        var nombre=$.trim($('#nomCategoria').val());
        var descripcion=$.trim($('#descCategoria').val());


        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{route('datable.categorias.create')}}",
            type: 'POST',
            datatype:"json",
            data:{
                'nombre_categoria':nombre,
                'descripcion_categoria':descripcion,
            },
            success:function (data){

                tablaCategoria.ajax.reload(null,false);

            }
            }
        );
        $("#addCategoria").trigger("reset");
        $("#modalCRUD").modal('hide');
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
    });


    </script>
@stop
