@extends('auth.layouts.master')

@section('title', 'Варианты Свойств')

@section('content')
    <div class="col-md-12">
        <h1>Варианты Свойств</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    #
                </th>
                <th>
                    Свойство
                </th>
              
                <th>
                    Значение
                </th>
                
                <th>
                    Действия
                </th>
            </tr>
            @foreach($propertyoptions as $propertyoption)
                <tr>
                    <td>{{ $propertyoption->id }}</td>
                    <td>{{ $property->name }}</td>
                    <td>{{ $propertyoption->name }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('property-options.destroy', [$property,$propertyoption]) }}" method="POST">
                                <a class="btn btn-success" type="button" href="{{ route('property-options.show', [$property,$propertyoption]) }}">Открыть</a>
                                <a class="btn btn-warning" type="button" href="{{ route('property-options.edit',  [$property,$propertyoption]) }}">Редактировать</a>
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Удалить"></form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $propertyoptions->links() }}
        <a class="btn btn-success" type="button"
           href="{{ route('property-options.create', $property) }}">Добавить вариант свойства</a>
    </div>
@endsection