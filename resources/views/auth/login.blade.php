<x-guest-layout>
    <div class='card mx-auto' style="width: 18rem;">
        <img src="{{asset('img/logo.png') }}" class='card-img-top'/>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 text-warning">
                {{ session('status') }}
            </div>
        @endif
        <div class='card-body'>
            <form class='form' method="POST" action="{{ route('login') }}">
                @csrf

                <div class ='form-group'>
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input  class="form-control" id="email" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <div class ='form-group mt-4'>
                    <x-jet-label for="password" value="{{ __('Password') }}" />
                    <x-jet-input  class="form-control" id="password" type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="block mt-4">
                    <label for="remember_me" class="flex items-center">
                        <x-jet-checkbox id="remember_me" name="remember" />
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-jet-button class="btn btn-primary ml-4">
                        {{ __('Log in') }}
                    </x-jet-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
