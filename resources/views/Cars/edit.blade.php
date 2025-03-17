@extends('layouts.app')



@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <form method="post" action="{{ route("cars.update") }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Registracijos numeris:</label>
                        <input type="text" class="form-control" name="reg_number" value="{{ $car->reg_number }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Brand:</label>
                        <input type="text" class="form-control" name="brand" value="{{ $car->brand }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Modelis:</label>
                        <input type="text" class="form-control" name="model" value="{{ $car->model }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Brand:</label>
                        <input type="text" class="form-control" name="owner_id" value="{{ $car->owner_id }}">
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>

                </form>
            </div>
        </div>
    </div>
@endsection
