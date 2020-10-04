@component('components.master')

    <div class="container mx-auto flex justify-center">
        @component('components.panel', ['heading' => 'Login'])

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="username"
                    >
                        Username
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                           type="text"
                           name="username"
                           id="username"
                           autocomplete="username"
                           autofocus
                           value="{{ old('username') }}"
                           required
                    >

                    @error('username')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="first_name"
                    >
                        First Name
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                           type="text"
                           name="first_name"
                           id="first_name"
                           value="{{ old('first_name') }}"
                           required
                    >

                    @error('first_name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="last_name"
                    >
                        Last Name
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                           type="text"
                           name="last_name"
                           id="last_name"
                           value="{{ old('last_name') }}"
                           required
                    >

                    @error('last_name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="email"
                    >
                        Email
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                           type="email"
                           name="email"
                           id="email"
                           value="{{ old('email') }}"
                           autocomplete="email"
                           required
                    >

                    @error('email')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="password"
                    >
                        Password
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                           type="password"
                           name="password"
                           id="password"
                           autocomplete="new-password"
                    >

                    @error('password')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="password_confirmation"
                    >
                        Password Confirmation
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                           type="password"
                           name="password_confirmation"
                           id="password_confirmation"
                           autocomplete="new-password"
                    >

                    @error('password_confirmation')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <button type="submit"
                            class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                    >
                        Register
                    </button>
                </div>
            </form>
            @endcomponent
    </div>

@endcomponent
