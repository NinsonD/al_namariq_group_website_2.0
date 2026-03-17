@extends('installer::layout')

@php
    $steps = \Modules\Installer\Traits\InstallerTrait::getSteps();
@endphp

@section('title', 'Setup Completed')

@section('content')

<x-installer :steps="$steps" cardTitle="Setup Completed" :center="true">

    <x-slot:card>

        <h4 class="mb-7 ">All done! Your site is ready to go. Tap below to visit <br> your  Dashboard or check out your  Website!</h4>
    
        <div class="d-flex align-items-center justify-content-center gap-3">
            <a href="{{ route('home') }}" class="ins-btn">
                Visit Website
            </a>
            <a href="{{ route('login') }}" class="ins-btn success-label">
               Go To Dashboard
            </a>
        </div>
            
    </x-slot:card>

</x-installer>
@endsection