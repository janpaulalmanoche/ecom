@extends ('layouts.resellerLayout.reseller_design')
@section('content')


<select-products :auth-user="{{auth()->user()}}"></select-products>
{{dd(auth()->user()->id)}}

@endsection