@extends('layouts.pkmpkh')
@section('title', 'Ratio Kriteria')

@section('content')

    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Data Ratio Kriteria</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.ratioCriteria') }}"
                                    class="text-muted">Home</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Ratio Kriteria</li>
                        </ol>
                    </nav>
                </div>
            </div>

        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- basic table -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header bg-primary">
                            <h4 class="mb-0 text-white">List Perbandingan Kriteria</h4>
                        </div>
                        {{-- @dd($data) --}}
                        <div class="table-responsive">
                            <table class="table table-bordered table-responsive-lg">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        @foreach ($data->matrix as $key => $props)
                                            @if ($key != 'sumCol')
                                                <th class="text-center" scope="col">{{ $key }}</th>
                                            @endif
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data->matrix as $key => $value)
                                        <tr>
                                            @if ($key != 'sumCol')
                                                <th scope="col">{{ $key }}
                                                </th>

                                                @foreach ($value as $keys => $values)
                                                    <td class="text-center">{{ $values }}</td>
                                                @endforeach
                                            @endif
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th scope="col">jumlah </th>

                                        @foreach ($data->matrix['sumCol'] as $values)
                                            <td class="text-center">{{ $values }}</td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- basic table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-header bg-primary">
                                    <h4 class="mb-0 text-white">Eigen Table</h4>
                                </div>
                                <div class="table-responsive mt-3">
                                    <form class="form-group" method="POST"
                                        action="{{ route('admin.ratioCriteria.saveEigen') }}">
                                        @csrf
                                        <table class="table table-bordered table-responsive-lg">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    @foreach ($data->eigen as $key => $props)
                                                        @if ($key == 'sumEigen')
                                                            <th class="text-center" scope="col">Tot. Eigen</th>
                                                            <th class="text-center" scope="col">Avg. Eigen</th>
                                                        @else
                                                            <th class="text-center" scope="col">{{ $key }}</th>
                                                        @endif
                                                    @endforeach
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data->eigen as $keyName => $value)
                                                    <tr>
                                                        @if ($keyName != 'sumEigen')
                                                            <th scope="col">{{ $keyName }}
                                                            @else
                                                            <th scope="col">Jumlah
                                                        @endif
                                                        @foreach ($value as $key => $valueMatrix)
                                                            @if ($key == 'totalEigen')
                                                                @if ($keyName != 'sumEigen')
                                                                    <input type="hidden"
                                                                        name="total_eigen['{{ $keyName }}']"
                                                                        value="{{ round($valueMatrix, 3) }}">
                                                                    <input type="hidden"
                                                                        name="average_eigen['{{ $keyName }}']"
                                                                        value="{{ round($valueMatrix / $data->eigen['sumEigen']['totalEigen'], 3) }}">
                                                                @endif
                                                                <td class="text-center">{{ round($valueMatrix, 3) }}</td>
                                                                <td class="text-center">
                                                                    {{ round($valueMatrix / $data->eigen['sumEigen']['totalEigen'], 3) }}
                                                                </td>
                                                            @else
                                                                <td class="text-center">{{ round($valueMatrix, 3) }}</td>
                                                            @endif
                                                        @endforeach
                                                        </th>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <br />
                                        <button type="submit" class="btn btn-primary">Simpan</button>

                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="col-md-6">
                            <div class="card border-primary">
                                <div class="card-header bg-primary">
                                    <h4 class="mb-0 text-white">Indeks Konsistensi</h4>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title" colspan='{{ count($data->eigen) + 1 }}'>Lamda Max</h5>
                                    <td colspan='1'>{{ round($data->lamda['sumLamda'], 5) }}</td>
                                    <hr>
                                    <h5 class="card-title" colspan='{{ count($data->eigen) + 1 }}'>IR Variable</h5>
                                    <td colspan='1'>{{ round($data->lamda['IR'], 2) }}</td>
                                    <hr>
                                    <h5 class="card-title" colspan='{{ count($data->eigen) + 1 }}'>Consistency Index (CI)
                                    </h5>
                                    <td colspan='1'>{{ round($data->lamda['CI'], 5) }}</td>
                                    <hr>
                                    <h5 class="card-title" colspan='{{ count($data->eigen) + 1 }}'>Consistency Ratio = CI
                                        / IR</h5>
                                    <td colspan='1'>{{ round($data->lamda['constant'], 5) }}</td>
                                    <hr>
                                    <h5 class="card-title" colspan='{{ count($data->eigen) + 1 }}'>Consistency Status
                                    </h5>
                                    <td colspan='1'>
                                        @if ($data->lamda['constant'] < 0.1)
                                            Consistent
                                        @else
                                            inConsistent
                                        @endif
                                    </td>
                                    </tr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">message</h5>
                    <button type="button" class="btn btn-dark" data-dismiss="modal" aria-label="Close"><i
                            class="fa fa-times"></i>
                    </button>
                </div>
                <form action="{{ route('admin.massRatioCriteria') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input id="_rowCriteria" type="text" name="row" hidden>
                        @foreach ($data->matrix as $key => $value)
                            @if ($key == 'sumCol')
                                @continue
                            @endif
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Nilai terhadap :
                                    {{ $key }}</label>
                                <input type="text" class="form-control" id="recipient-name"
                                    name="{{ $key }}">
                            </div>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@section('js')
    <script>
        $('#exampleModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var datas = button.data('whatever') // Extract info from data-* attributes
            var title = button.data('title') // Extract info from data-* attributes

            var modal = $(this)
            modal.find('.modal-title').text('Edit row Data = ' + title)
            modal.find('#_rowCriteria').val(title)
            modal.find('.modal-body input').attr('readonly', false)
            $.each(datas, function(indexInArray, valueOfElement) {
                modal.find('.modal-body input[name="' + indexInArray + '"]').val(valueOfElement)
                if (valueOfElement == 0) {
                    modal.find('.modal-body input[name="' + indexInArray + '"]').attr('readonly', true)
                }

            });
        })
    </script>

@endsection
