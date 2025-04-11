@extends('layouts.app')



@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">


                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <div>
                                {{ $error }}
                            </div>

                        @endforeach
                    </div>
@endif




                <form method="post" action="{{ route("cars.store") }}" enctype="multipart/form-data">


                    @csrf

                    <div class="mb-3">
                        <label class="form-label">{{__('Registration number')}}:</label>
                        <input type="text" class="form-control" @error('reg_number') is-invalid @enderror" name="reg_number" value="{{ old('reg_number') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{__('Brand')}}:</label>
                        <input type="text" class="form-control" @error('brand') is-invalid @enderror" name="brand" value="{{ old('brand')}}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{__('Modelis')}}:</label>
                        <input type="text" class="form-control" name="model">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{__('Savininkas')}}:</label>
                        <input type="text" class="form-control" name="owner_id">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{__('Car Photo')}}:</label>
                        <input type="file" class="form-control" name="photo" required>
                    </div>

                    <button type="submit" class="btn btn-success">{{__('Add')}}</button>

                </form>
            </div>
        </div>
    </div>
@endsection
