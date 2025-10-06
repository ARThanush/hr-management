@extends('layouts.app')

@section('page-content')
    <div class="content container-fluid">

        <x-breadcrumb class="col">
            <x-slot name="title">{{ __('Project List') }}</x-slot>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ __('Projects') }}</li>
            </ul>
            <x-slot name="right">
                <div class="col-auto float-end ms-auto">
                    <a href="javascript:void(0)" data-url="{{ route('projects.create') }}" class="btn add-btn"
                        data-ajax-modal="true" data-size="lg" data-title="Add Project">
                        <i class="fa-solid fa-plus"></i> {{ __('Add Project') }}
                    </a>
                    <div class="view-icons">
                        <a href="{{ route('projects.index') }}" class="grid-view btn btn-link "><i class="fa fa-th"></i></a>
                        <a href="{{ route('projects.list') }}" class="list-view btn btn-link active"><i class="fa-solid fa-bars"></i></a>
                    </div>
                </div>
            </x-slot>
        </x-breadcrumb>

        <div class="card">
            <div class="card-body">
                {!! $dataTable->table(['class' => 'table table-striped custom-table w-100']) !!}
            </div>
        </div>

    </div>
@endsection

@push('page-scripts')
@vite([
    "resources/js/datatables.js"
])
{!! $dataTable->scripts(attributes: ['type' => 'module']) !!}
@endpush
