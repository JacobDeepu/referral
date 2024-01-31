<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Referral') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto px-4 py-4 shadow-md sm:rounded-lg">
                    <form method="POST" action="{{ route('referral.update', $referral) }}">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-input-label for="name" value="{{ __('Name') }}" />
                            <x-text-input class="mt-1 block w-full" id="name" name="name" type="text" :value="old('name', $referral->name)" required autofocus autocomplete="name" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="phone" value="{{ __('Phone') }}" />
                            <x-text-input class="mt-1 block w-full" id="phone" name="phone" type="text" :value="old('phone', $referral->phone)" required />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="email" value="{{ __('Email') }}" />
                            <x-text-input class="mt-1 block w-full" id="email" name="email" type="email" :value="old('email', $referral->email)" required />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="course" value="{{ __('Course') }}" />
                            <x-text-input class="mt-1 block w-full" id="course" name="course" type="text" :value="old('course', $referral->course)" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="referral_token" value="{{ __('Referral Code') }}" />
                            <x-text-input class="mt-1 block w-full" id="referral_token" name="referral_token" type="text" :value="old('referral_token', $referral->referrer)" />
                        </div>
                        <div class="mt-4 flex">
                            <x-primary-button>
                                {{ __('Save') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
