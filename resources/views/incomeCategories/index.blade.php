@extends('layouts.appsidebar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Income Categories') }}</div>

                <div class="card-body">
                    <a href="{{ url('incomeCategories/add') }}" class="button">Add New</a>

                    @if($errors->any())
                    <p class="error">{{$errors->first()}}</p>
                    @endif
                    <table class="hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        @foreach($incomeCategories as $category)
                        <tr>
                            <td>{{ $category["name"] }} </td>
                            <td><a class="button warning small" href="{{ route('incomeCategories.openEdit',$category->id) }}">
                                    Edit</a>
                            </td>
                            <td>
                                <a class="button warning small" style="background-color: red;" href="{{ route('incomeCategories.delete',$category->id) }}">
                                    Delete
                                </a>
                            </td>

                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection