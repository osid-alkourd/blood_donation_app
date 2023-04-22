@extends('dashboard.layout.dashboard')
@section('title', ' حملات التبرع')



@section('content')
<div class="modal fade" id="deleteCampaignModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="POST" action="{{ route('dashboard.campaigns.destroy')}}">
            @csrf
            @method('delete')
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">  حذف حملة التبرع </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
             <input type="hidden" name="campaign_id" id="campaign_id"/> 
             <h6> هل انت متاكد من حذف هذه الحملة</h6>
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

    @if (session('campaign_created'))
        <div class="alert alert-success">
            {{ session('campaign_created') }}
        </div>
    @endif
    @if (session('campaign_updated'))
        <div class="alert alert-success">
            {{ session('campaign_updated') }}
        </div>
    @endif
    @if (session('campaign_deleted'))
        <div class="alert alert-danger">
            {{ session('campaign_deleted') }}
        </div>
    @endif
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">


                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">حملات التبرع الموجودة في النظام</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table" width="100%">
                            <thead>
                                <tr>
                                    <th class="th-sm">وصف الحملة </th>
                                    <th class="th-sm">تاريخ النشر</th>
                                    <th class="th-sm"> ناشر الحملة</th>
                                    <th class="th-sm">تعديل</th>
                                    <th class="th-sm"> حذف</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($campaigns as $campaign)
                                    <tr>
                                        <td><img src="{{ asset('storage/' . $campaign->image_url) }}" alt="" height="50"></td>
                                        <td>{{ $campaign->updated_at }} </td>
                                        <td>{{ $campaign->admin_name }}</td>
                                        <td>
                                            <a href="{{ route('dashboard.campaigns.edit', [$campaign->id]) }}"
                                                class="btn btn-sm btn-outline-success">تعديل</a>
                                            <!-- /.btn btn-sm btn-outline-success -->
                                        </td>
                                        <td>
                                                <button type="submit" class="btn btn-sm btn-outline-danger delete-campaign" value="{{$campaign->id }}">حذف</button>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>

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
delete-campaign
<script>
    $(document).ready(function(){
           $(document).on('click' , '.delete-campaign' , function (e) {
            e.preventDefault();
            var campaign_id = $(this).val();
            $('#campaign_id').val(campaign_id);
            $('#deleteCampaignModal').modal('show');
         });
    });
</script>
@stop


<!-- /.row (main row) -->
