@extends('errors.minimal')

@section('title', __('error.error_500'))
@section('code', '500')
@section('message', __('error.error_500_desc'))
