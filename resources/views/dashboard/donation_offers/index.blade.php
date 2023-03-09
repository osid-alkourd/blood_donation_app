@extends('dashboard.layout.dashboard')

@section('title' ,  'عروض التبرع')
@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection

@section('content')
    <!-- Main content -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">


                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">DataTable with default features</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table" width="100%">
                            <thead>
                                <tr>
                                    <th class="th-sm">الاسم </th>
                                    <th class="th-sm">فصيلة الدم </th>
                                    <th class="th-sm"> رقم الهاتف</th>
                                    <th class="th-sm"> رقم الهوية</th>
                                    <th class="th-sm"> الموقع</th>
                                    <th class="th-sm">تاريخ المناشدة</th>
                                    <th class="th-sm"> تاكيد التبرع</th>
                                    <th class="th-sm">  حذف</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                               
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>الاسم </th>
                                    <th>فصيلة الدم </th>
                                    <th> رقم الهاتف</th>
                                    <th> رقم الهوية</th>
                                    <th> الموقع</th>
                                    <th>تاريخ المناشدة</th>
                                    <th> تاكيد التبرع</th>
                                    <th>  حذف</th>
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
@endsection
<!-- /.row (main row) -->
