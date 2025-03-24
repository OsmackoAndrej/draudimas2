@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <a href="{{ route("owners.create") }}" class="btn btn-success">Add new owner</a>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Adresas</th>
                        <th>Cars</th> <!-- Новый столбец для машин -->
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($owners as $owner)
                        <tr>
                            <td>{{ $owner->name }}</td>
                            <td>{{ $owner->surname }}</td>
                            <td>{{ $owner->email }}</td>
                            <td>{{ $owner->phone }}</td>
                            <td>{{ $owner->address }}</td>
                            <td>
                                @foreach($owner->cars as $car) <!-- Предполагается связь owner->cars -->
                                <p>{{ $car->brand }} {{ $car->model }} ({{ $car->reg_number }})</p>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('owners.edit', $owner->id) }}" class="btn btn-primary">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('owners.destroy', $owner->id) }}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button class="btn btn-danger">Delete</button>
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
