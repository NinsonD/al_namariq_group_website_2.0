@extends('core::layout.app')

@section('title', __('admin.faqs'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.faqs')]
    ]
])
@endsection

@section('content')
<x-card :heading="__('admin.faqs')" :route="route('admin.faqs.create')">

    @if(isset($faqs) && !$faqs->isEmpty())
    <div class="table-responsive">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>
                        {{ __('admin.sn') }}
                    </th>
                    <th>
                        {{ __('admin.question') }}
                    </th>
                    <th>
                        {{ __('admin.answer') }}
                    </th>
                    <th>
                        {{ __('admin.status') }}
                    </th>
                    <th>
                        {{ __('admin.show_on_homepage') }}
                    </th>
                    <th width="13%">
                        {{ __('admin.action') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($faqs as $faq)
                <tr>
                    <td>{{ ($faqs->currentpage() - 1) * $faqs->perpage() + $loop->iteration }}</td>
                    <td>{{$faq->getTranslation(getDefaultLocale())->question}}</td>
                    <td>{{$faq->getTranslation(getDefaultLocale())->answer}}</td>
                    <td>
                        <x-badge :variant="$faq->status == 1 ? 'success' : 'danger'" text="{{ $faq->status == 1 ? __('admin.active') : __('admin.inactive')}}" />
                    </td>
                    <td>
                        <x-badge :variant="$faq->show_on_homepage == 1 ? 'success' : 'danger'" text="{{ $faq->show_on_homepage == 1 ? __('admin.yes') : __('admin.no') }}" />
                    </td>
                    <td>

                        @can('faqs-edit')
                        <x-table.edit :route="route('admin.faqs.edit', ['faq' => $faq->id, 'code' => getDefaultLocale()])" />
                        @endcan

                        @can('faqs-delete')
                        <x-table.delete :route="route('admin.faqs.destroy', ['faq' => $faq->id])" />
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-end">
        {{ $faqs->links('components.pagination') }}
    </div>
    @else
        <x-data-not-found />
    @endif

</x-card>
@endsection

