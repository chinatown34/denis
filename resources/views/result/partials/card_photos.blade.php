<div class="card card-warning">
    <div class="card-header">
      <h3 class="card-title">Фото модели</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
        </button>
      </div>
      <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="row">
        <div class="col-2">
        <a data-fancybox="gallery" href="{{ $result->person->photo }}" ><img class="img-fluid img-thumbnail mb-2" src="{{ $result->person->photo }}"></a>
        </div>
        @foreach($result->person->photos as $photo)
            <div class="col-2">
            <a data-fancybox="gallery" href="{{ $photo->photo }}"><img class="img-fluid img-thumbnail mb-2" src="{{ $photo->photo }}"></a>
            </div>
        @endforeach
        </div>
    </div>
    <!-- /.card-body -->
  </div>