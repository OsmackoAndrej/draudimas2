@extends('layouts.app')



@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <form method="post" action="{{ route("models.store") }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Title:</label>
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Brand ID:</label>
                        <select class="form-control" name="brand_id">
                            <option value="">-</option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->title }} </option>
                            @endforeach

                        </select>

                    </div>

                    <button type="submit" class="btn btn-success">Add</button>

                </form>
            </div>
        </div>
    </div>
@endsection
