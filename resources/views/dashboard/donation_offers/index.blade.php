@extends('dashboard.layout.dashboard')

@section('title', 'عروض التبرع')
@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection

@section('content')
    <!-- Main content -->
    @if (session('donation_confirmed'))
        <div class="alert alert-success">
            {{ session('donation_confirmed') }}
        </div>
    @endif
    @if (session('donation_deleted'))
        <div class="alert alert-danger">
            {{ session('donation_deleted') }}
        </div>
    @endif
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">


                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">جميع عروض التبرع النشطة</h3>
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
                                    <th class="th-sm"> حذف</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($offers as $offer)
                                    <tr>
                                        <td>{{ $offer->name }}</td>
                                        <td>{{ $offer->blood_type }}</td>
                                        <td>{{ $offer->phone_number }}</td>
                                        <td>{{ $offer->id_number }}</td>
                                        <td>{{ $offer->location }}</td>
                                        <td>{{ $offer->created_at }}</td>
                                        <td>
                                            <form method="POST"
                                                action="{{ route('dashboard.donation_offers.confirm', $offer->id) }}">
                                                @csrf
                                                @method('PUT')
                                                <button class="btn btn-outline-primary" type="submit">تاكيد </button>
                                            </form>
                                        </td>
                                        <td>
                                            <form method="POST"
                                                action="{{ route('dashboard.donation_offers.force-delete' ,$offer->id)}}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-outline-danger">حذف</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach


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
                                    <th> حذف</th>
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
