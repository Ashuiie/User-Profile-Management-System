<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Profile') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-2xl mx-auto px-6">
            <div class="bg-gray-900 border border-gray-700 rounded-lg shadow-md p-6 space-y-5">

                <!-- Reusable row -->
                @php
                    $fieldClass = 'bg-gray-800 text-white font-semibold border border-gray-600 rounded px-4 py-2 w-full';
                @endphp

                <div class="space-y-4">
                    <!-- Name -->
                    <div class="flex flex-col gap-1">
                        <label class="text-gray-400 text-sm">Name</label>
                        <input type="text" readonly class="{{ $fieldClass }}" value="{{ Auth::user()->name }}">
                    </div>

                    <!-- Email -->
                    <div class="flex flex-col gap-1">
                        <label class="text-gray-400 text-sm">Email</label>
                        <input type="text" readonly class="{{ $fieldClass }}" value="{{ Auth::user()->email }}">
                    </div>

                    <!-- Bio -->
                    <div class="flex flex-col gap-1">
                        <label class="text-gray-400 text-sm">Bio</label>
                        <input type="text" readonly class="{{ $fieldClass }}" value="{{ $profile->bio ?? 'Not set' }}">
                    </div>

                    <!-- Phone -->
                    <div class="flex flex-col gap-1">
                        <label class="text-gray-400 text-sm">Phone</label>
                        <input type="text" readonly class="{{ $fieldClass }}" value="{{ $profile->phone ?? 'Not set' }}">
                    </div>

                    <!-- Address -->
                    <div class="flex flex-col gap-1">
                        <label class="text-gray-400 text-sm">Address</label>
                        <input type="text" readonly class="{{ $fieldClass }}" value="{{ $profile->address ?? 'Not set' }}">
                    </div>
                </div>

                <!-- Edit Button -->
                <div class="pt-4 text-right">
                    <a href="{{ route('profile.edit') }}"
                       class="inline-block px-5 py-2 bg-white text-gray-900 rounded-md font-semibold hover:bg-gray-200 transition">
                        Edit Profile
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
