@extends('layouts.app')



@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <form method="post" action="{{ route("brand.store") }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Brand:</label>
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Registracijos numeris:</label>
                        <input type="text" class="form-control" name="reg_number">
                    </div>

                    <button type="submit" class="btn btn-success">Add</button>

                </form>
            </div>
        </div>
    </div>
@endsection
