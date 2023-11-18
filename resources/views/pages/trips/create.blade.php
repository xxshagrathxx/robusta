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
                            <h5 class="card-title text-primary">{{ transWord('Create Trip') }}</h5>
                            <form action="{{ route('trips-store') }}" method="post">
                                @csrf

                                <div class="col-6 mb-3">
                                    <div class="form-group">
                                        <label for="from_city_id">{{ transWord('From City') }}<span class="is-required">(*)</span></label>
                                        <select name="from_city_id" id="from_city_id" class="form-select">
                                            <option value="" selected="" disabled="">{{ transWord('Select City') }}</option>
                                            @foreach ($stations as $station)
                                                <option value="{{ $station->id }}">{{ $station->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('from_city_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6 mb-3">
                                    <div class="form-group">
                                        <label for="to_city_id">{{ transWord('To City') }}<span class="is-required">(*)</span></label>
                                        <select name="to_city_id" id="to_city_id" class="form-select">
                                            <option value="" selected="" disabled="">{{ transWord('Select City') }}</option>
                                            @foreach ($stations as $station)
                                                <option value="{{ $station->id }}">{{ $station->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('to_city_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6 mb-3">
                                    <div class="form-group">
                                        <label for="via_city_ids">{{ transWord('Via Cities') }}</label>
                                        <textarea rows="3" class="form-control" name="via_city_ids" placeholder="Enter Via Cities">{{ old('via_city_ids') }}</textarea>
                                        <span style="color: #bcbf23">{{ transWord('Must comma separated between []') }}</span>
                                        @error('via_city_ids')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6 mb-3">
                                    <div class="form-group">
                                        <label for="bus_id">{{ transWord('Bus') }}<span class="is-required">(*)</span></label>
                                        <select name="bus_id" id="bus_id" class="form-select">
                                            <option value="" selected="" disabled="">{{ transWord('Select Bus') }}</option>
                                            @foreach ($buses as $bus)
                                                <option value="{{ $bus->id }}">{{ $bus->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('bus_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <hr>
                                <button type="submit" class="btn btn-round btn-success col-md-1 me-2">{{ transWord('Save') }}</button>
                                <a href="{{ route('trips-all') }}" style="width: 200px" class="btn btn-secondary"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> {{ transWord('Back') }}</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>
@endsection