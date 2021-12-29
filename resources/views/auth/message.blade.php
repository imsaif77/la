@extends('layouts.app')
@section('title', __('Fiti5'))
@section('content')

<div class="">
	<h2 class="page-ath-heading">{!! $text !!}
		@isset($subtext)
		<small>{!! $subtext !!}</small>
		@endisset
	</h2>

	@if (session('warning'))
	<div class="alert alert-dismissible fade show alert-warning" role="alert">
		<a href="javascript:void(0)" class="close" data-dismiss="alert" aria-label="close">&nbsp;</a>
		{!! session('warning') !!}
	</div>
	@else
	@isset($msg)
	<div class="text-{{ isset($msg['type']) ? $msg['type'] : 'info' }}">{!! isset($msg['text']) ? $msg['text'] : $msg !!}</div>
	@endisset
	@endif
	<div class="gaps-4x"></div>
	@isset($hideButton)
	@else
	<p><a class="btn btn-primary" href="{{ route('login') }}">{{ __('Sign in') }}</a></p>
	@endisset
</div>
@endsection
