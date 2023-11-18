@extends('layouts.contentNavbarLayout')

@section('title', 'Trips')

@section('trips-management', 'active open')
@section('trips', 'active')

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <h2>{{ transWord('Trips') }}</h2>
            <div class="card mb-4">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-12">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="card-title text-primary">{{ transWord('All Trips') }}</h5>
                                </div>
                                @can('create_trips')
                                    <div class="col-6">
                                        <div class="text-end">
                                            <a href="{{ route('trips-create') }}" class="btn btn-success">{{ transWord('Create New') }}</a>  
                                        </div>
                                    </div>
                                @endcan
                            </div>
                            <hr>
                            <div class="table">
                                <table id="dataTable" class="yajra-datatable table">
                                    <thead>
                                        <tr>
                                            <th style="width: 1%;">#</th>
                                            <th>{{ transWord('From City') }}</th>
                                            <th>{{ transWord('To City') }}</th>
                                            <th>{{ transWord('Bus') }}</th>
                                            <th class="text-end">{{ transWord('Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            {{-- <div class="col-4">
                                <a href="{{ route('users-all') }}" style="width: 200px" class="btn btn-secondary"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Back</a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>
@endsection

@section('page-script')
    <script type="text/javascript">
        $(function () {
            var table = $('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true,
                // language: {
                //     url: '{{ app()->getLocale() == 'ar' ? asset('/admin/ar.json') : '' }}',
                // },
                ajax: "{{ route('trips-all') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false, orderable: false},
                    {data: 'from_city_id', name: 'to_city_id'},
                    {data: 'to_city_id', name: 'to_city_id'},
                    {data: 'bus_id', name: 'bus_id'},
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            });
        });
    </script>
@endsection
