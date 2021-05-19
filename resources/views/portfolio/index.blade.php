@extends('layout.master')
@section('title', 'Portfolio')
@section('parentPageTitle', 'Pages')

@section('content')

<div class="row clearfix">
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card state_w1">
            <div class="body d-flex justify-content-between">
                <div>
                    <h5>{{ \App\Portfolio::count() }}</h5>
                    <span>Total</span>
                </div>
                <div class="sparkline" data-type="bar" data-width="97%" data-height="55px" data-bar-Width="3" data-bar-Spacing="5" data-bar-Color="#FFC107">5,2,3,7,6,4,8,1</div>
            </div>
        </div>
    </div>

</div>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <a href="{{ route('portfolio.create') }}" class="btn btn-success">Add Project</a>

        <div class="card project_list">
            <div class="table-responsive">
                @if($portfolios->count() > 0)
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
                            @foreach($portfolios as $portfolio)
                                <tr>
                                    <td><img src="{{ ($portfolio->photo) ? $portfolio->photo->getUrl('thumb'): '' }}" alt="Photo" width="100px" height="60px"></td>
                                    <td>{{ $portfolio->name }}</td>
                                    <td>{{ $portfolio->url }}</td>

                                    <td>
                                        <a href="{{ route('portfolio.photos', $portfolio->id) }}" class="btn btn-info waves-effect waves-float btn-sm waves-green"><i class="zmdi zmdi-camera"></i></a>
                                        <a href="{{ route('portfolio.edit', $portfolio->id) }}" class="btn btn-info waves-effect waves-float btn-sm waves-green"><i class="zmdi zmdi-edit"></i></a>
                                        <span onClick="handleDelete({{ $portfolio->id }})" class="btn btn-danger waves-effect waves-float btn-sm waves-red"><i class="zmdi zmdi-delete"></i></span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                <h3>There are currently no projects added.</h3>
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
          <p class="text-center text-bold">Are you sure you want to delete this project?</p>
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
function handleDelete (id) {
    var form = document.getElementById('trashPostForm')
    form.action = '/dashboard/pages/portfolio/' + id
    console.log('trashing', form)
    $('#deletemodal').modal('show');
}
</script>

@stop
