@extends('layouts.appsidebar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="GET" action="{{ route('monthlyReport') }}">
                @csrf
                <div class="grid-container">
                    <div class="grid-x grid-padding-x">
                        <div class="medium-6 cell">
                            <label>Month
                                <input type="month" name="month" value="{{$viewData['month']}}">
                            </label>
                        </div>
                    </div>
                    <input type="submit" class="submit button" value="Select Month">
                </div>
            </form>
            <div class="card card2">
                <div class="card-header">{{ __('Monthly Reports') }}</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>Income</th>
                                    <td>{{ '$ ' . number_format($viewData["inc_total"], 2) }}</td>
                                </tr>
                                <tr>
                                    <th>Expenses</th>
                                    <td>{{ '$ ' . number_format($viewData["exp_total"], 2) }}</td>
                                </tr>
                                <tr>
                                    <th>Profit</th>
                                    <td>{{ '$ ' . number_format($viewData["profit"], 2) }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>Income by category</th>
                                    <th>{{ '$ ' . number_format($viewData["inc_total"], 2) }}</th>
                                </tr>
                                @foreach($viewData["inc_summary"] as $inc)
                                <tr>
                                    <th>{{ $inc['name'] }}</th>
                                    <td>{{ '$ ' . number_format($inc["amount"], 2) }}</td>
                                </tr>
                                @endforeach
                            </table>
                            <img class="graph" src="{{'data:image/gif;base64,' . base64_encode( $viewData['graph1']) }}"></img>
                        </div>
                        <div class="col-md-4">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>Expenses by category</th>
                                    <th>{{'$ ' . number_format($viewData["exp_total"], 2) }}</th>
                                </tr>
                                @foreach($viewData["exp_summary"] as $inc)
                                <tr>
                                    <th>{{ $inc['name'] }}</th>
                                    <td>{{ '$ ' . number_format($inc["amount"], 2) }}</td>
                                </tr>
                                @endforeach
                            </table>
                            <img class="graph" src="{{'data:image/png;base64,' . base64_encode( $viewData['graph2']) }}"></img>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection