@extends('core::layout.app')

@section('title', __('admin.contact_messages'))

@section('breadcrumb')
@include('core::layout.partials.breadcrumb', [
    'title' => __('admin.settings'),
    'breadcrumbs' => [
        ['label' => __('admin.dashboard'), 'url' => route('admin.dashboard')],
        ['label' => __('admin.contact_messages')]
    ]
])
@endsection

@section('content')

@can('contact_message-receiver_mail_update')
<x-card>
    <div class="p-2">
        <form action="{{ route('admin.update-contact-receiver-mail') }}" method="POST">
            @csrf
            @method('POST')
            <div class="mb-4">
                <x-input-label for="contact" :value="__('attribute.contact_receiver_mail')" />
                <x-text-input id="contact" name="contact_message_receiver_mail" :value="old('contact_message_receiver_mail', $settings->contact_message_receiver_mail)" />
                <x-input-error field="contact_message_receiver_mail" />
            </div>
            <div class="">
                <button type="submit" class="btn btn-success gap-1">
                    <x-icons.update /> {{ __('admin.update') }}
                </button>
            </div>
        </form>
    </div>
</x-card>
@endcan

<x-card :heading="__('admin.contact_messages')">

     @if(isset($messages) && !$messages->isEmpty())
    <div class="table-responsive table-invoice">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>
                        {{ __('admin.sn') }}
                    </th>
                    <th>
                        {{ __('admin.name') }}
                    </th>
                    <th>
                        {{ __('admin.email') }}
                    </th>
                    <th>
                        {{ __('admin.create_at') }}
                    </th>
                    <th>
                        {{ __('admin.action') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($messages as $index => $message)
                    <tr>
                        <td>{{ ++$index }}</td>
                        <td>{{ $message->name }}</td>
                        <td>
                            <a class=" text-hover-underline" href="mailto:{{$message->email}}">{{ $message->email }}</a>
                        </td>
                        <td>{{ $message->created_at->format('M d, Y') }}</td>
                        <td>
                            @can('contact_message-show')
                            <x-table.view :route="route('admin.contact-message.show', $message->id)" />
                            @endcan

                            @can('contact_message-delete')
                            <x-table.delete :route="route('admin.contact-message.destroy', $message->id)" />
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-end">
        {{ $messages->links('components.pagination') }}
    </div>
    @else
        <x-data-not-found />
    @endif
</x-card>
@endsection
