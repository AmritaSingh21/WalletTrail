@extends('layouts.appsidebar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Income') }}</div>

                <div class="card-body">
                    <a href="{{ url('income/add') }}" class="button">Add New</a>
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
                        @foreach ($incomes as $income)
                        <tr>
                            <td>{{ $income->categoryName }}</td>
                            <td>{{ '$ ' . number_format($income->amount, 2) }}</td>
                            <td>{{ $income->date }}</td>
                            <td><a class="button warning small" href="{{ route('income.openEdit',$income->id) }}">
                                    Edit</a>
                            </td>
                            <td>
                                <a class="button warning small" style="background-color: red;" href="{{ route('income.delete',$income->id) }}">
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