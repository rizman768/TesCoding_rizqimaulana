@extends ('layout.template')

@section('content')
<div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <center><h6 class="text-white text-capitalize ps-3">Edit Tiket</h6></center>
              </div>
            </div>
            <div class="card-body">
                <form role="form" class="text-start" action="/updatetiket" method="post">
                @csrf

                <input type="hidden" name="id" value="{{ $tiket->id }}">

                  <div class="input-group input-group-outline my-3">
                    <input type="text" name="nama" class="form-control" value="{{$tiket->nama}}">
                    @if ($errors->has('nama'))
                        <span class="text-danger">{{ $errors->first('nama') }}</span>
                    @endif
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <input type="text" name="hp" class="form-control" value="{{$tiket->hp}}">
                    @if ($errors->has('hp'))
                        <span class="text-danger">{{ $errors->first('hp') }}</span>
                    @endif
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Edit</button>
                  </div>
                </form>
              </div>
          </div>
        </div>
      </div>
@endsection