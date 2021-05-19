@extends('layout.master')
@section('title', 'Project Photos')
@section('parentPageTitle', 'Pages')

@section('content')



<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <a href="{{ route('portfolio.addphoto', $portfolio->id) }}" class="btn btn-success">Add Photo</a>

        <div class="card project_list">
            <div class="table-responsive">
                @if($photos->count() > 0)
                    <table class="table table-hover c_table">
                        <thead>
                            <tr>

                                <th>Image</th>
                                <th>Name</th>
                                <th>URL</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($photos as $photo)
                                <tr>
                                    <td><img src="{{ ($photo->photo) ? $photo->photo->getUrl('thumb'): '' }}" alt="Photo" width="100px" height="60px"></td>
                                    <td>{{ $photo->name }}</td>
                                    <td>{{ $photo->url }}</td>

                                    <td>
                                        <span onClick="handleDelete({{ $portfolio->id }}, {{ $photo->id }})" class="btn btn-danger waves-effect waves-float btn-sm waves-red"><i class="zmdi zmdi-delete"></i></span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                <h3>There are currently no photos added.</h3>
                @endif
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="deletemodalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
     <form action="" method="POST" id="trashPostForm">
     @csrf
     @method('DELETE')
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deletemodalLabel">Confirm Delete</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p class="text-center text-bold">Are you sure you want to delete this photo?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </div>
      </div>
      </form>
    </div>
  </div>


@endsection


@section('page-script')
<script src="{{asset('assets/bundles/sparkline.bundle.js')}}"></script>
<script src="{{asset('assets/js/pages/charts/sparkline.js')}}"></script>



<script>
function handleDelete (portfolioId, id) {
    var form = document.getElementById('trashPostForm')
    form.action = '/dashboard/pages/portfolio/' + portfolioId + '/delphoto/' + id
    console.log('trashing', form)
    $('#deletemodal').modal('show');
}
</script>

@stop
