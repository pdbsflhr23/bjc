@extends('layout.admin')

@section('content')
<div class="container-fluid">
    <!-- START CONTAINER -->
    <div class="row" >
        <!-- START CONTENT ROW -->
        <div class="col-xs-12">
            <div class="widget widget-default">
                <header class="widget-header">
                    <h3 class="page-header-heading">
                        <span class="typcn typcn-document-add page-header-heading-icon"></span>
                        Nodes
                        <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">Add Node</button>
                    </h3>
                </header>
                    <div class="widget-body">
                        <table class="table table-condensed table-responsive">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Code</th>
                                <th>Address</th>
                                <th>GPS</th>
                                <th>IP</th>
                                <th>Entry Date</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{'', $count = 1  }}
                            @foreach($nodes as $node)
                                <tr>
                                    <th scope="row">{{ $count }}</th>
                                    <td>{{ $node->code }}</td>
                                    <td>{{ $node->name }}</td>
                                    <td>{{ $node->gpse }}</td>
                                    <td>{{ $node->ip }}</td>
                                    <td>{{ date('d-m-Y', strtotime($node->dtime)) }}</td>
                                    <td class="text-right">
                                        <button class="btn btn-transparent btn-xs edit-me" data-toggle="modal" data-target="#editModal"  id="{{ $node->id }}"><span class="fa fa-pencil"></span> <span class="hidden-xs hidden-sm hidden-md">Edit</span></button>
                                        <div class="btn btn-transparent btn-transparent-danger btn-xs del-me" data-toggle="modal" data-target="#deleteModal" id="{{ $node->id }}"><span class="fa fa-trash-o"></span> <span class="hidden-xs hidden-sm hidden-md">Delete</span></div>
                                    </td>
                                </tr>
                                {{'', $count++ }}
                            @endforeach
                            </tbody>
                        </table>
                        <ul class="pagination pull-right">
                            <li>{{ $nodes->links() }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- END CONTENT ROW -->
</div>
<!-- END CONTAINER -->
<!-- ADD NODE MODEL -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center modal-lg">
            <div class="modal-content">
                <form method="POST" id="add_node">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Add New Node</h4>
                    </div>
                    <div class="modal-body">
                        <div class="widget-body">
                            <div id="alert_save"></div>
                            <div class="form-group">
                                <label for="username">Node Address *</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="username">Node Gps E *</label>
                                <input type="text" class="form-control" name="gpse" id="gpse" placeholder="GPSE">
                            </div>
                            <div class="form-group">
                                <label for="username">Node Gps N *</label>
                                <input type="text" class="form-control" name="gpsn" id="gpsn" placeholder="GPSN">
                            </div>
                            <div class="form-group">
                                <label for="username">IP *</label>
                                <input type="text" class="form-control" name="ipaddress" id="ipaddress" placeholder="IP Address">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="save_me">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END ADD NODE MODEL -->
<!-- ADD NODE MODEL -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center modal-lg">
            <div class="modal-content">
                <form method="POST" id="edit_node">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Edit Node</h4>
                    </div>
                    <input type="hidden" class="form-control" name="id" id="ide" >
                    <div class="modal-body">
                        <div class="widget-body">
                            <div id="alert_edit"></div>
                            <div class="form-group">
                                <label for="username">Node Address *</label>
                                <input type="text" class="form-control" name="name" id="namee" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="username">Node Gps E *</label>
                                <input type="text" class="form-control" name="gpse" id="gpsee" placeholder="GPSE">
                            </div>
                            <div class="form-group">
                                <label for="username">Node Gps N *</label>
                                <input type="text" class="form-control" name="gpsn" id="gpsne" placeholder="GPSN">
                            </div>
                            <div class="form-group">
                                <label for="username">IP *</label>
                                <input type="text" class="form-control" name="ipaddress" id="ipaddresse" placeholder="IP Address">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="edit_me">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END ADD NODE MODEL -->
<!-- DELETE NODE MODEL -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center modal-lg">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Delete Node</h4>
                    </div>
                    <div class="modal-body">
                        <div id="alert_del"></div>
                        <p>Are you sure to delete?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" id="delete-me">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END ADD NODE MODEL -->
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){

            //////////////////////////////////// SAVE //////////////////////////////////////
            $('#save_me').on('click', function (e) {
                $.ajax({
                    type: "POST",
                    headers: {'X-CSRF-Token': $('input[name="_token"]').val()},
                    url: '{{ URL('node/save') }}',
                    data: $('#add_node').serialize(),
                    success: function (msg) {
                        $('#alert_save').empty();
                        $('#alert_save').append('<div class="alert alert-success">Node has been Added successfully!</div>');
                    }
                });
            });

            //////////////////////////////////// EDIT //////////////////////////////////////
            $('#edit_me').on('click', function (e) {
                $.ajax({
                    type: "POST",
                    headers: {'X-CSRF-Token': $('input[name="_token"]').val()},
                    url: '{{ URL('node/update') }}',
                    data: $('#edit_node').serialize(),
                    success: function (msg) {
                        $('#alert_edit').empty();
                        $('#alert_edit').append('<div class="alert alert-success">Node has been updated successfully!</div>');
                    }
                });
            });
            //////////////////////////////////// EDIT DATA //////////////////////////////////////
            $('.edit-me').on('click', function(){
                var id = $(this).attr("id");
                getEdit(id);
            });
            //////////////////////////////////// DELETE DATA //////////////////////////////////////
            $('.del-me').on('click', function(){
                var id = $(this).attr("id");
                $('#delete-me').off('click').on('click', function () {
//                    console.log(id);
                    setDel(id);
                });
            });
        });

        //////////////////////////////////// GET EDIT DATA //////////////////////////////////////
        function getEdit(id){
            $('#ide, #namee, #gpsee, #gpsne, #ipaddresse').val('');
            $.ajax({
                headers: {'X-CSRF-Token': $('input[name="_token"]').val()},
                type: "POST",
                url: "{{ url('node/edit') }}/"+id,
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: function(data){
                    $('#ide').val(data.id);
                    $('#namee').val(data.name);
                    $('#gpsee').val(data.gpse);
                    $('#gpsne').val(data.gpsn);
                    $('#ipaddresse').val(data.ip);
                }
            });
        }

        //////////////////////////////////// GET EDIT DATA //////////////////////////////////////
        function setDel(id){
            $.ajax({
                headers: {'X-CSRF-Token': $('input[name="_token"]').val()},
                type: "POST",
                url: "{{ url('node/delete') }}/"+id,
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: function(data){
                },
                complete: function(){
                    $('#alert_del').empty();
                    $('#alert_del').append('<div class="alert alert-success">Node has been deleted successfully!</div>');
                }
            });
        }

    </script>
@endsection