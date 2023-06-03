@extends('layouts.appsidebar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __(' Edit Income Category') }}</div>
                <div class="card-body">

                    <form method="POST" action="{{ route('incomeCategories.edit', $category->id) }}">
                        @csrf
                        <div class="grid-container">
                            <div class="grid-x grid-padding-x">
                                <div class="medium-6 cell">
                                    <label>Name
                                        <input type="text" placeholder="Name" name="name" value="{{ $category->name }}">
                                    </label>
                                </div>
                            </div>
                            <input type="submit" class="submit success button" value="Save">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection