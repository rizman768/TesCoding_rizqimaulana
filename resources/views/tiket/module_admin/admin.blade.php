@extends ('layout.template')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3 text-center">Daftar Pemesan</h6>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
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
                    <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID Tiket</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No Hp</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Option</th>
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
                                    <h6 class="mb-0 text-sm">{{$data->id}}</h6>
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
                            <td class="align-middle"><center>
                                <form action="/deletetiket/{{$data->id}}" method="POST">
                                    <a class="btn btn-primary btn-sm" href="/edit-tiket/{{$data->id}}">Edit</a>

                                    @csrf

                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                </form></center>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection