<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    {!! Form::open(['route' => 'password.update', 'method' => 'put']) !!}
        <div class="form-group">
            {!! Form::label('current_password', 'Current Password') !!}
            {!! Form::password('current_password', ['id' => 'current_password', 'class' => 'form-control']) !!}
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>
        <div class="form-group">
            {!! Form::label('password', 'New Password') !!}
            {!! Form::password('password', ['id' => 'password', 'class' => 'form-control']) !!}
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>
        <div class="form-group">
            {!! Form::label('password_confirmation', 'Confirm Password') !!}
            {!! Form::password('password_confirmation', ['id' => 'password_confirmation', 'class' => 'form-control']) !!}
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="btn btn-primary me-2">{{ __('Save') }}</button>


            {{-- @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif --}}
        </div>
        {!! Form::close() !!}

</section>
