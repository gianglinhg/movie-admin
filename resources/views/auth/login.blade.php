<x-guest-layout>
   <div class="auth-form-light text-left p-5">
        <div class="brand-logo">
          <img src="../../assets/images/logo-dark.svg">
        </div>
        <h4>Hello! let's get started</h4>
        <h6 class="font-weight-light">Sign in to continue.</h6>
        <form class="pt-3" method="POST" action="{{ route('login') }}">
           @csrf
          <div class="form-group">
            <input type="email" name="email" class="form-control form-control-lg" placeholder="example@email.com" value="{{old('email')}}"  autocomplete="username">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
          </div>
          <div class="form-group">
            <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" required autocomplete="current-password">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
          </div>
          <div class="mt-3">
            <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
          </div>
          <div class="my-2 d-flex justify-content-between align-items-center">
            <div class="form-check">
              <label class="form-check-label text-muted">
                <input type="checkbox" class="form-check-input"> Keep me signed in <i class="input-helper"></i></label>
            </div>
            <a href="#" class="auth-link text-black">Forgot password?</a>
          </div>
          {{-- <div class="mb-2">
            <button type="button" class="btn btn-block btn-facebook auth-form-btn">
              <i class="mdi mdi-facebook me-2"></i>Connect using facebook </button>
          </div> --}}
          <div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="register.html" class="text-primary">Create</a>
          </div>
        </form>
    </div>
</x-guest-layout>
