<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <h2>Invoices list</h2>
        <div class="flex items-center gap-4">
            <a href="{{ route('invoices.create') }}">{{ __('Create New Invoice') }}</a>
        </div>
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($invoices as $invoice)
                <div class="p-6 flex space-x-2">
{{--                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">--}}
{{--                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />--}}
{{--                    </svg>--}}
                    <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-gray-800">{{ $invoice->user->name  }}</span>
                                <small class="ml-2 text-sm text-gray-600">{{ $invoice->created_at->format('j M Y, g:i a') }}</small>
                                @unless ($invoice->created_at->eq($invoice->updated_at))
                                    <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                                @endunless
                            </div>

                            @if ($invoice->user->is(auth()->user()))
                                <x-dropdown>
                                    <x-slot name="trigger">
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>
                                    </x-slot>
                                    <x-slot name="content">
{{--                                        <a href="/rockstars/{{ $rockstar->id}}" class="btn btn-success">Detail</a>--}}
                                        <x-dropdown-link :href="route('invoices.show', $invoice->id)">
                                            {{ __('Detail') }}
                                        </x-dropdown-link>
                                        <x-dropdown-link :href="route('invoices.edit', $invoice)">
                                            {{ __('Edit') }}
                                        </x-dropdown-link>
                                        <form method="POST" action="{{ route('invoices.destroy', $invoice) }}">
                                            @csrf
                                            @method('delete')
                                            <x-dropdown-link :href="route('invoices.destroy', $invoice)"
                                                             onclick="event.preventDefault(); this.closest('form').submit();">
                                                {{ __('Delete') }}
                                            </x-dropdown-link>
                                        </form>

                                    </x-slot>
                                </x-dropdown>
                            @endif

                        </div>
                        <p class="mt-4 text-lg text-gray-900">Title:
                            {{ $invoice->title }}
                        </p>
                        <p class="mt-4 text-lg text-gray-900">Invoice Number: {{ $invoice->invoice_no }}</p>
                        <p class="mt-4 text-lg text-gray-900"><hr/></p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</x-app-layout>
