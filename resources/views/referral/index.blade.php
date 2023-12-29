<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Referrals') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="relative overflow-x-auto p-6 shadow-md sm:rounded-lg">
                    <table class="w-full text-left text-sm text-gray-500">
                        <thead class="bg-gray-50 text-xs uppercase text-gray-700">
                            <tr>
                                <th class="px-6 py-3" scope="col">
                                    {{ __('Sl No.') }}
                                </th>
                                <th class="px-6 py-3" scope="col">
                                    {{ __('Name') }}
                                </th>
                                <th class="px-6 py-3" scope="col">
                                    {{ __('Phone') }}
                                </th>
                                <th class="px-6 py-3" scope="col">
                                    {{ __('Email') }}
                                </th>
                                <th class="px-6 py-3" scope="col">
                                    {{ __('Referred By') }}
                                </th>
                                <th class="px-6 py-3" scope="col">
                                    {{ __('Actions') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($referrals as $referral)
                                <tr class="border-b bg-white">
                                    <td class="whitespace-nowrap px-6 py-4 font-medium text-gray-900">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 font-medium text-gray-900">
                                        {{ $referral->name }}
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 font-medium text-gray-900">
                                        {{ $referral->phone }}
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 font-medium text-gray-900">
                                        {{ $referral->email }}
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 font-medium text-gray-900">
                                        {{ $referral->referrer->name ?? 'Not Specified' }}
                                    </td>
                                    <td class="w-56 px-0 py-4">
                                        <x-link href="{{ route('referral.edit', $referral) }}">
                                            <svg class="feather feather-check-square mr-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                <polyline points="9 11 12 14 22 4"></polyline>
                                                <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                                            </svg> Edit
                                        </x-link>
                                        <form class="inline-block" method="POST" action="{{ route('referral.destroy', $referral) }}">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button type="submit" onclick="return confirm('Are you sure?')">
                                                <svg class="feather feather-trash-2 mr-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                                </svg> Delete
                                            </x-danger-button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr class="border-b bg-white">
                                    <td class="whitespace-nowrap px-6 py-4 font-medium text-gray-900" colspan="2">
                                        {{ __('No referrals Found') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="px-6 py-4">
                        {{ $referrals->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
