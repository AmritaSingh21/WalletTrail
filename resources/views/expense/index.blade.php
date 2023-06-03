@extends('layouts.appsidebar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Expense') }}</div>

                <div class="card-body">
                    <a href="{{ url('expense/add') }}" class="button">Add New</a>
                    <table class="hover">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        @foreach ($expenses as $expense)
                        <tr>
                            <td>{{ $expense->categoryName }}</td>
                            <td>{{ '$ ' . number_format($expense->amount, 2) }}</td>
                            <td>{{ $expense->date }}</td>
                            <td><a class="button warning small" href="{{ route('expense.openEdit',$expense->id) }}">
                                    Edit</a>
                            </td>
                            <td>
                                <a class="button warning small" style="background-color: red;" href="{{ route('expense.delete',$expense->id) }}">
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