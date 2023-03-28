@extends('dashboard.layout.dashboard')
@section('title', ' تعديل على حملة ')


@section('content')
    <!-- Main content -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">


                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"> نشر حملة تبرع </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('dashboard.campaigns.update', [$campaign->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">اضافة صورة</label>
                                    <input type="file" class="form-control" name="image">
                                    @error('image')
                                        <div style="color:red;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"> انشرها</button>
                        </form>
                        <!-- /.row -->
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
