@extends('layouts.app')
{{ App::getLocale() }} <!-- Выведет текущий язык -->
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <a href="{{ route("owners.create") }}" class="btn btn-success">{{__('Add new owner')}}</a>
                <table class="table">
                    <thead>
                    <tr>
                        <th>{{__('Name')}}</th>
                        <th>{{__('Surname')}}</th>
                        <th>{{__('Email')}}</th>
                        <th>{{__('Phone')}}</th>
                        <th>{{__('Address')}}</th>
                        <th>{{__('Cars')}}</th>
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
                                @foreach($owner->cars as $car)
                                <p>{{ $car->brand }} {{ $car->model }} ({{ $car->reg_number }})</p>
                                @endforeach
                            </td>
                            <td>
                                @can('update',$owner)
                                <a href="{{ route('owners.edit', $owner->id) }}" class="btn btn-primary">{{__('Edit')}}</a>
                                    @endcan
                            </td>
                            <td>
                                <form action="{{ route('owners.destroy', $owner->id) }}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button href="" class="btn btn-danger">{{__('Delete')}}</button>
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
