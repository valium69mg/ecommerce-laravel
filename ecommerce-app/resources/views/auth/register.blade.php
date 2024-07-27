<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <!-- User -->
        <div class="mt-4">
            <h3 class="categoryh3"> User Details </h3>
        </div>

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Phone -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Address -->
        <div class="mt-4">
            <h3 class="categoryh3"> Address Details </h3>
        </div>

        <!-- Street name -->
        <div class="mt-4">
            <x-input-label for="street_name" :value="__('Street Name')" />
            <x-text-input id="street_name" class="block mt-1 w-full" type="text" name="street_name" :value="old('street_name')" required autocomplete="off" />
            <x-input-error :messages="$errors->get('street_name')" class="mt-2" />
        </div>
        <!-- Street Number -->
        <div class="mt-4">
            <x-input-label for="street_number" :value="__('Street Number')" />
            <x-text-input id="street_number" class="block mt-1 w-full" type="text" name="street_number" :value="old('street_number')" required autocomplete="off" />
            <x-input-error :messages="$errors->get('street_number')" class="mt-2" />
        </div>

        <!-- City -->
        <div class="mt-4">
            <x-input-label for="city" :value="__('City')" />
            <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required autocomplete="off" />
            <x-input-error :messages="$errors->get('city')" class="mt-2" />
        </div>
        
        <!-- State -->
        <div class="mt-4">
            <x-input-label for="state" :value="__('State')" />
            <x-text-input id="state" class="block mt-1 w-full" type="text" name="state" :value="old('state')" required autocomplete="off" />
            <x-input-error :messages="$errors->get('state')" class="mt-2" />
        </div>

        <!-- Country -->
        <div class="mt-4">
            <x-input-label for="country" :value="__('Country')" />
            <x-text-input id="country" class="block mt-1 w-full" type="text" name="country" :value="old('country')" required autocomplete="off" />
            <x-input-error :messages="$errors->get('zip_code')" class="mt-2" />
        </div>
        
        <!-- codigo postal -->
        <div class="mt-4">
            <x-input-label for="zip_code" :value="__('Zip Code')" />
            <x-text-input id="zip_code" class="block mt-1 w-full" type="text" name="zip_code" :value="old('zip_code')" required autocomplete="off" />
            <x-input-error :messages="$errors->get('zip_code')" class="mt-2" />
        </div>
        
        <!-- Password -->
        <div class="mt-4">
            <h3 class="categoryh3"> Password </h3>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
