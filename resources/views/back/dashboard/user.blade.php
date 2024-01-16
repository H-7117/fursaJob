@extends('layouts.back')

@section('content')
<div>
    Dashboard
    <!-- Live as if you were to die tomorrow. Learn as if you were to live forever. - Mahatma Gandhi -->

    @php
        $hasPermission = Account::hasPermission('become_tenant');
    @endphp

    @if ($hasPermission)
        <p>The user has the 'become_tenant' permission.</p>
    @else
        <p>The user does not have the 'become_tenant' permission.</p>
    @endif

</div>
@endsection
