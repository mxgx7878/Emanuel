@extends('dashboard.layouts.main')
@section('content')
    <section class="inner_header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="inner_header_links">
                        <li><a href="{{ route('dashboard.advanced.search.view') }}">Search</a></li>
                        <li><a href="{{ route('dashboard.serach.first.name.view') }}">First Name</a></li>
                        <li><a href="{{ route('dashboard.search.member.number.view') }}">Member number</a>
                        </li>
                        <li><a href="{{ route('dashboard.search.popular.searches.view') }}">Popular
                                Searches</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
