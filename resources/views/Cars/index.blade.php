@extends('layouts.app')



@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <a href="{{ route("cars.create") }}" class="btn btn-success">Add new car</a>
                <table class="table">
                    <tbody>
                    <tr>
                        <th>Registracijos numeris</th>
                        <th>Brendas</th>
                        <th>Modelis</th>
                        <th>Savininkas</th>
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
                                <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-primary">Edit</a>


                            </td>
                            <td>
                                <form action="{{ route('cars.destroy', $car->id) }}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button href="" class="btn btn-danger">Delete</button>
                                </form>

                            </td>
                        </tr>

                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
