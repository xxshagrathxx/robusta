@extends('layouts.contentNavbarLayout')

@section('title', 'buses')

@section('buses-management', 'active open')
@section('buses', 'active')

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <h2>{{ transWord('Buses') }}</h2>
            <div class="card mb-4">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-12">
                        <div class="card-body">
                            <h5 class="card-title text-primary">{{ transWord('Edit Bus') }}</h5>
                            <form action="{{ route('buses-update', $bus->id) }}" method="post">
                                @csrf

                                <div class="col-6 mb-3">
                                    <div class="form-group">
                                        <label for="name">{{ transWord('Name') }}<span class="is-required"> (*)</span></label>
                                        <input type="text" class="form-control" name="name" placeholder="Enter Name" value="{{ old('name', $bus->name) }}" />
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6 mb-3">
                                    <div class="form-group">
                                        <label for="total_seats">{{ transWord('total_seats') }}</label>
                                        <input type="number" class="form-control" name="total_seats" placeholder="Enter Total Seats" value="{{ old('total_seats', $bus->total_seats) }}" />
                                        <span style="color: #bcbf23">{{ transWord('If not entered, Default value is 12') }}</span>
                                        @error('total_seats')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <hr>
                                <button type="submit" class="btn btn-round btn-success col-md-1 me-2">{{ transWord('Save') }}</button>
                                <a href="{{ route('buses-all') }}" style="width: 200px" class="btn btn-secondary"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> {{ transWord('Back') }}</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>
@endsection