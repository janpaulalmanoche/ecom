@extends ('layouts.resellerLayout.reseller_design')
@section('content')

<reseller-order date="1"> </reseller-order>
@endsection
{{

    dd(

        date('F d Y',strtotime(Carbon\Carbon::now()))
    )
}}