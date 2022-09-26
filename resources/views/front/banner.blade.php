@extends('layouts.main')

@section('content')
    <div class="bg-indigo-700 h-screen">
        <div class="max-w-2xl mx-auto text-center py-16 px-4 sm:py-20 sm:px-6 lg:px-8">

            <a href="{{ route('create') }}"
                class="mt-8 w-full inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50 sm:w-auto">
                استخراج شهادة </a>

            <a href="{{ route('track') }}"
                class="mt-8 w-full inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50 sm:w-auto">
                تتبع شهادة </a>
        </div>
    </div>
@endsection
