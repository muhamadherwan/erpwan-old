<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">

        <section>
            <header>
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Edit Invoice') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    {{ __("Fill out all fields.") }}
                </p>
                <br><br>
            </header>

             <form method="POST" action="{{ route('invoices.update', $invoice) }}">
                @csrf
                 @method('patch')

                <div>
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                                  :value="old('title', $invoice->title)"
                                  required autofocus autocomplete="title" />
                    <x-input-error class="mt-2" :messages="$errors->get('title')" />
                </div>

                <br><br>
                <div>
                    <x-input-label for="invoice_no" :value="__('Invoice Number')" />
                    <x-text-input id="invoice_no" name="invoice_no" type="text" class="mt-1 block w-full"
                                  :value="old('invoice_no', $invoice->invoice_no)"
                                  required autofocus autocomplete="invoice_no" />
                    <x-input-error class="mt-2" :messages="$errors->get('invoice_no')" />
                </div>

                <br><br>

                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                    <a href="{{ route('invoices.index') }}">{{ __('Cancel') }}</a>
                </div>
            </form>
        </section>
    </div>
</x-app-layout>
