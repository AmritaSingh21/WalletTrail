@extends('layouts.appsidebar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __(' Edit Expense') }}</div>
                <div class="card-body">

                    <form method="POST" action="{{ route('expense.edit', $expense->id) }}">
                        @csrf
                        <div class="grid-container">
                            <div class="grid-x grid-padding-x">
                                <div class="medium-6 cell">
                                    <label>Expense Category
                                        <select name="category_id">
                                            @foreach($expenseCategories as $category)
                                            @if($expense->category_id === $category->id)
                                            <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                            @else
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </label>
                                    <label>Amount
                                        <input type="number" min="0.01" step="0.01" name="amount" value="{{$expense->amount}}" required>
                                    </label>
                                    <label>Entry Date
                                        <input type="date" name="date" value="{{$expense->date}}" required>
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