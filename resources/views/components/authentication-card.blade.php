<div class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 sm:justify-center sm:pt-0 dark:bg-gray-900">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full px-6 py-4 mt-6 overflow-hidden bg-white shadow-md sm:max-w-md dark:bg-gray-800 sm:rounded-lg">
        {{ $slot }}
    </div>

    @if(request()->routeIs('login'))
    <p class="mt-4 text-sm font-light text-gray-500 dark:text-gray-400">
        {{ __('Don’t have an account yet?') }} 
        <a href="{{ route('register') }}" class="font-medium text-teal-600 hover:underline dark:text-teal-500">
            {{ __('Register')}}
        </a>
    </p>
    @else
    <p class="mt-4 text-sm font-light text-gray-500 dark:text-gray-400">
        {{ __('Already registered?') }}
        <a href="{{ route('login') }}" class="font-medium text-teal-600 hover:underline dark:text-teal-500">
            {{ __('Log in')}}
        </a>
    </p>
    @endif
</div>
