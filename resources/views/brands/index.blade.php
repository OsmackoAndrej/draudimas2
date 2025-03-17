@extends('layouts.app')



@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <a href="{{ route("brands.create") }}" class="btn btn-success">Add new brand</a>
                <table class="table">
                    <tbody>
                    <tr>
                        <th>Brand</th>
                        <th>Registracijos numeris</th>
                        <th>Modelis</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </tbody>
                    <tbody>
                    @foreach($brands as $brand)
                        <tr>
                            <td>{{$brand->title}}</td>
                            <td>{{$brand->reg_number}}</td>
                            <td>
                                @foreach($brand->modelis as $modelis)
                                    {{$modelis->title}} <br>
                                @endforeach

                            </td>

                            <td>
                                <a href="{{ route('brand.edit', $brand->id) }}" class="btn btn-primary">Edit</a>


                            </td>
                            <td>
                                <form action="{{ route('brand.destroy', $brand->id) }}" method="post">
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
