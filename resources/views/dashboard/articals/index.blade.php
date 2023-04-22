@extends('dashboard.layout.dashboard')
@section('title', ' عرض المقالات')



@section('content')
<div class="modal fade" id="deleteArticalModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="POST" action="{{ route('dashboard.articals.destroy')}}">
            @csrf
            @method('delete')
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">  حذف المقالة  </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
             <input type="hidden" name="artical_id" id="artical_id"/> 
             <h6> هل انت متاكد من حذف هذه المقالة</h6>
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
    @if (session('created_artical'))
        <div class="alert alert-success">
            {{ session('created_artical') }}
        </div>
    @endif
    @if (session('artical_updated'))
        <div class="alert alert-success">
            {{ session('artical_updated') }}
        </div>
    @endif
    @if (session('artical_deleted'))
        <div class="alert alert-danger">
            {{ session('artical_deleted') }}
        </div>
    @endif

    <section class="content">
        <div class="row">
            <div class="col-8">
                @foreach ($articals as $artical)
                    <div class="card">
                        <h5 class="card-header"> {{ $artical->title }}</h5>
                        <div class="card-body">
                            <p class="card-text"> {{ $artical->description }}</p>
                            <p><a href="{{ $artical->url }}">اصغط هنا</a></p>
                            <p><img src="{{ asset('storage/' . $artical->image_url) }}" alt="" height="50"></p>

                            <a href="{{ route('dashboard.articals.edit', $artical->id) }}"
                                class="btn btn-success">تعديل</a>
                                <button type="submit" class="btn btn-danger delete-artical" value="{{$artical->id}}" >حذف</button>
                        </div>
                    </div>
                @endforeach



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
           $(document).on('click' , '.delete-artical' , function (e) {
            e.preventDefault();
            var artical_id = $(this).val();
            $('#artical_id').val(artical_id);
            $('#deleteArticalModal').modal('show');
         });
    });
</script>
@stop


<!-- /.row (main row) -->
