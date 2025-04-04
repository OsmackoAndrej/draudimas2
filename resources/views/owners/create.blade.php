@extends('layouts.app')



@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <form method="post" action="{{ route("owners.store") }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Name:</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Surname:</label>
                        <input type="text" class="form-control" name="surname">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email:</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone:</label>
                        <input type="text" class="form-control" name="phone">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Adresas:</label>
                        <input type="text" class="form-control" name="adress">
                    </div>
                    <button type="submit" class="btn btn-success">Add</button>

                </form>
            </div>
        </div>
    </div>
@endsection
