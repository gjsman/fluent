@if ($errors->any())
    <div {{ $attributes }}>
        <flux:heading class="!text-red-600 !dark:text-red-400">{{ __('Whoops! Something went wrong.') }}</flux:heading>

        <flux:subheading class="mt-3 list-disc list-inside text-sm !text-red-600 !dark:text-red-400">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </flux:subheading>
    </div>
@endif
