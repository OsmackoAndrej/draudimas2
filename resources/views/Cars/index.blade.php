@extends('layouts.app')



@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <a href="{{ route("cars.create") }}" class="btn btn-success">{{__('Add new car')}}</a>
                <table class="table">
                    <tbody>
                    <tr>
                        <th>{{__('Registration number')}}</th>
                        <th>{{__('Brand')}}</th>
                        <th>{{__('Model')}}</th>
                        <th>{{__('Owner')}}</th>
                        <th>{{__('Photo')}}</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </tbody>
                    <tbody>
                    @foreach($cars as $car)
                        <tr>
                            <td>{{$car->reg_number}}</td>
                            <td>{{$car->brand}}</td>
                            <td>{{$car->model}}</td>
                            <td>{{$car->owner_id}}</td>
                            <td>
                                @if ($car->photos && count($car->photos) > 0)
                                    @foreach ($car->photos as $photo)
                                        <img src="{{ asset('storage/' . $photo->photo) }}" alt="Car Photo" width="100">

                                    @endforeach
                                @else
                                    {{ __('No photos available') }}
                                @endif

                            </td>

                            <td>
                                @can('editCar', $car)
                                <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-primary">{{__('Edit')}}</a>
                                @endcan

                            </td>
                            <td>
                                @can('editCar', $car)
                                <form action="{{ route('cars.destroy', $car->id) }}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button href="" class="btn btn-danger">{{__('Delete')}}</button>
                                </form>

                                @endcan
                            </td>
                        </tr>

                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
