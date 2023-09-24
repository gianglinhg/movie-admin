<section>
    <header>
        <h2 class="">
            {{ __('Profile Information') }}
        </h2>

        <p class="">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>
    {{-- <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" /> --}}

        {!! Form::open(['route' => 'profile.update', 'method' => 'patch']) !!}

        <div class="form-group">
            {!! Form::label('name', 'E-Mail Address') !!}
            {!! Form::text('name', old('name', $user->name), ['id' => 'name', 'class' => 'form-control']) !!}
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        <div class="form-group">
            {!! Form::label('email', 'E-Mail Address') !!}
            {!! Form::text('email', old('email', $user->email), ['id' => 'email', 'class' => 'form-control']) !!}
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div>
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="btn btn-primary me-2">{{ __('Save') }}</button>

            {{-- @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="btn btn-primary"
                >{{ __('Saved.') }}</p>
            @endif --}}
        </div>
        {!! Form::close() !!}

</section>
