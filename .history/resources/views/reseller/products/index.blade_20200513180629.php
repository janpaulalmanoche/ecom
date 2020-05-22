@extends ('layouts.resellerLayout.reseller_design')
@section('content')


<select-products user="{{auth()->user()}}" ></select-products>

@endsection