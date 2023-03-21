@extends('dashboard.layout.dashboard')
@section('title', ' نشر مقالة')



@section('content')
    <!-- Main content -->


    <section class="content">
        <div class="row">
            <div class="col-12">


                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"> نشر مقالة </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('dashboard.articals.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-4">
                                    <label for=""> العنوان الرئيسي</label>
                                    <input type="text" name="title" value="{{ old('title') }}" class="form-control">
                                    @error('title')
                                        <div style="color:red;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for=""> اضافة رابط </label>
                                    <input type="text" name="url" value="{{ old('url') }}" class="form-control">
                                    @error('url')
                                        <div style="color:red;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for=""> اضافة صورة</label>
                                    <input type="file" name="image"  class="form-control">
                                    @error('image')
                                        <div style="color:red;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> <br>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <label for="">وصف المقالة</label>
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div style="color:red;">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div> <br>

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
