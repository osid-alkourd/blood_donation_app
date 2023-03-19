@extends('dashboard.layout.dashboard')
@section('title', ' نشر حملة تبرع')



@section('content')
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
                        <form action="{{ route('dashboard.campaigns.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">وصف الحملة</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                                @error('description')
                                    <div style="color:red;">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--
                                        <div class="row">
                                            <div class="col-6">
                                              <label for=""> مكان الحملة</label>
                                              <input type="text" class="form-control" placeholder="مكان الحملة">
                                            </div>
                                            
                                        </div> <br>
                                        -->
                            <button type="submit" class="form-group btn btn-primary">انشرها</button>
                            <!-- /.form-group btn btn-primary -->
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
