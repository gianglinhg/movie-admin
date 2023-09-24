<x-guest-layout>
    {{-- <form method="POST" action="{{ route('register') }}">
        @csrf

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
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form> --}}

    <div class="auth-form-light text-left p-5">
        <div class="brand-logo">
          <img src="../../assets/images/logo-dark.svg">
        </div>
        <h4>New here?</h4>
        <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
        <form class="pt-3" method="POST" action="{{ route('register') }}">
          <div class="form-group">
            <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Username">
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
          </div>
          <div class="form-group">
            <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email">
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
          </div>
          <div class="form-group">
            <select class="form-control form-control-lg" id="exampleFormControlSelect2">
              <option>Country</option>
              <option>United States of America</option>
              <option>United Kingdom</option>
              <option>India</option>
              <option>Germany</option>
              <option>Argentina</option>
            </select>
          </div>
          <div class="form-group">
            <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
          </div>
          <div class="mb-4">
            <div class="form-check">
              <label class="form-check-label text-muted">
                <input type="checkbox" class="form-check-input"> I agree to all Terms &amp; Conditions <i class="input-helper"></i></label>
            </div>
          </div>
          <div class="mt-3">
            <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="../../index.html">SIGN UP</a>
          </div>
          <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="{{ route('login')}}" class="text-primary">Login</a>
          </div>
        </form>
      </div>

</x-guest-layout>
