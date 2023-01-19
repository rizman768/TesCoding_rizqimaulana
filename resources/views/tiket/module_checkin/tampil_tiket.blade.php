@extends ('layout.template')

@section('content')
<div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <center><h6 class="text-white text-capitalize ps-3">Check-In</h6></center>
              </div>
            </div>
            <div class="card-body">
              @if ($errors->any())
                <div class="alert alert-danger">
                  <strong>Whoops!</strong> There were some problems with your input.<br><br>
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
                </div>
              @endif
              @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success')}}
                </div>
              @endif
                <form role="form" class="text-start" action="/cari" method="get">
                @csrf
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Cari Tiket</label>
                    <input type="text" name="cari" class="form-control">
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Cari Tiket</button>
                  </div>
                </form>
                <table class="table align-items-center mb-0">
                    <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No Hp</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $i=0   ?>
                    @foreach($tiket as $data)
                        <tr>
                            <td>
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">{{++$i}}</h6>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">{{$data->nama}}</h6>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">{{$data->hp}}</h6>
                                </div>
                            </td>
                            <td>
                                @if ($data->status == "1")
                                    <center><span class="badge badge-sm bg-gradient-success">Sudah Check-in</span>
                                @else
                                    <form method="POST" action="/cekin">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $data->id }}">
                                        <input type="hidden" name="status" value=1>
                                        <button type="submit" class="btn bg-gradient-success">Check-In</button>
                                    </form></center>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
              </div>
          </div>
        </div>
      </div>
@endsection