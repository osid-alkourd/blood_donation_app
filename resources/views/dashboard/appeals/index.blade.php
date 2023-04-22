@extends('dashboard.layout.dashboard')

@section('title', 'مناشدات التبرع')
@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection

@section('content')

<div class="modal fade" id="deleteAppealModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="POST" action="{{ route('dashboard.appeals.force-delete')}}">
            @csrf
            @method('delete')
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">  حذف المناشدة</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
             <input type="hidden" name="appeal_id" id="appeal_id"/> 
             <h6>هل انت متاكد من حذف هذه المناشدة</h6>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
            <button type="submit" class="btn btn-danger">حذف</button>
            </div>
       </form>
      </div>
    </div>
  </div>
    <!-- Main content -->
    @if (session('appeal_deleted'))
        <div class="alert alert-danger">
            {{ session('appeal_deleted') }}
        </div>
    @endif
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">


                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"> جميع مناشدات التبرع الموجودة في النظام  </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table" width="100%">
                            <thead>
                                <tr>
                                    <th class="th-sm">الاسم </th>
                                    <th class="th-sm">وصف المناشدة</th>
                                    <th class="th-sm">رقم الهاتف</th>
                                    <th class="th-sm">فصيلة الدم</th>
                                    <th class="th-sm">تاريخ المناشدة</th>
                                    <th class="th-sm"> الموقع</th>
                                    <th class="th-sm"> حذف</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($appeals as $appeal)
                                    <tr>
                                        <td>{{ $appeal->name }}</td>
                                        <td>{{ $appeal->description }}</td>
                                        <td>{{ $appeal->phone_number }}</td>
                                        <td>{{ $appeal->blood_type }}</td>
                                        <td>{{ $appeal->updated_at }}</td>
                                        <td>{{ $appeal->location }}</td>
                                        <td> 
                                             <button type="submit" class="btn btn-outline-danger delete-appeal"  data-toggle="modal" value="{{ $appeal->id }}">حذف</button>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>الاسم</th>
                                    <th>وصف المناشدة</th>
                                    <th>رقم الهاتف</th>
                                    <th>فصيلة الدم</th>
                                    <th>تاريخ المناشدة</th>
                                    <th> الموقع</th>
                                    <th>حذف</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>

    <!-- /.content -->
@endsection('content')

@section('scripts')
    <!-- DataTables -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <script>
        $(function() {
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": true,
                "language": {
                    "url": "{{ asset('ar.json') }}"
                }
            });
        });
    </script>

    <script>
         $(document).ready(function(){
                $(document).on('click' , '.delete-appeal' , function (e) {
                 e.preventDefault();
                 var appeal_id = $(this).val();
                 $('#appeal_id').val(appeal_id);
                 $('#deleteAppealModal').modal('show');
              });
         });

        // $(document).ready(function(){
        //      $('#delete-appeal').click(function(e){
        //            e.preventDefault();
        //            alert('hello');
        //      });
        // });
    </script>
@endsection
<!-- /.row (main row) -->
