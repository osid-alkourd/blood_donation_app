@extends('dashboard.layout.dashboard')

@section('title', 'عروض التبرع')
@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection

@section('content')

 <div class="modal fade" id="deleteDonationOfferModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="POST" action="{{ route('dashboard.donation_offers.force-delete')}}">
            @csrf
            @method('delete')
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">  حذف عرض التبرع</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
             <input type="hidden" name="donation_offer_id" id="donation_offer_id"/> 
             <h6> هل انت متاكد من حذف هذا العرض</h6>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
            <button type="submit" class="btn btn-danger">حذف</button>
            </div>
       </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="confirmDonationOfferModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="POST" action="{{ route('dashboard.donation_offers.confirm')}}">
            @csrf
            @method('PUT')
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">    اتمام عملية التبرع</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
             <input type="hidden" name="donation_offer_id" id="donation_offer_id_for_confirm"/> 
             <h6> هل تريد اتمام عملية التبرع ؟؟ </h6>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
            <button type="submit" class="btn btn-primary">تاكيد</button>
            </div>
       </form>
      </div>
    </div>
  </div>

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
                                                <button class="btn btn-outline-primary confirm-donation-offer" value="{{ $offer->id }}" type="submit">تاكيد </button>
                                        </td>
                                        <td>
            
                                                <button type="submit" class="btn btn-outline-danger delete-donation-offer" value="{{ $offer->id }}">حذف</button>
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
    <script>
         $(document).ready(function(){
            //  $('.delete-donation-offer').click(function (e) {
                $(document).on('click' , '.delete-donation-offer' , function (e) {
                 e.preventDefault();
                 var donation_offer_id = $(this).val();
                 $('#donation_offer_id').val(donation_offer_id);
                 $('#deleteDonationOfferModal').modal('show');
              });

              $(document).on('click' , '.confirm-donation-offer' , function (e) {
                 e.preventDefault();
                 var donation_offer_id_for_confirm = $(this).val();
                 $('#donation_offer_id_for_confirm').val(donation_offer_id_for_confirm);
                 $('#confirmDonationOfferModal').modal('show');
              });
         });
    </script>
@endsection
<!-- /.row (main row) -->
