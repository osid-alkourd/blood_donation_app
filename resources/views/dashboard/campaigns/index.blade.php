@extends('dashboard.layout.dashboard')
@section('title', ' حملات التبرع')



@section('content')
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
                        <h3 class="card-title">DataTable with default features</h3>
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
                                        <td><img src="{{ asset('storage/' . $campaign->image_url) }}" alt="" height="50"></td>
                                        <td>
                                            <a href="{{ route('dashboard.campaigns.edit', [$campaign->id]) }}"
                                                class="btn btn-sm btn-outline-success">تعديل</a>
                                            <!-- /.btn btn-sm btn-outline-success -->
                                        </td>
                                        <td>
                                            <form method="POST"
                                                action="{{ route('dashboard.campaigns.destroy', $campaign->id) }}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">حذف</button>
                                            </form>
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



<!-- /.row (main row) -->
