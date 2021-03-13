@extends('auth.layouts.master')

@section('title', 'Вариант свойства ' . $propertyOption->name)

@section('content')
    <div class="col-md-12">
        <h1>Вариант свойства {{ $propertyOption->name }}</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    Поле
                </th>
                <th>
                    Значение
                </th>
            </tr>
            <tr>
                <td>ID</td>
                <td>{{ $propertyOption->id }}</td>
            </tr>
            <tr>
                <td>Название свойства</td>
               
                <td>{{ $property->name }}</td>
            </tr>
            <tr>
                <td>Значение</td>
                <td>{{ $propertyOption->name }}</td>
            </tr>
            <tr>
                <td>Название_en</td>
                <td>{{ $propertyOption->name_en }}</td>
            </tr>
        
        
         
            </tbody>
        </table>
    </div>
@endsection