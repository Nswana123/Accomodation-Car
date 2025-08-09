<!-- Top Bar for Small Screens -->
<style>
  .filter-skyblue {
    filter: brightness(0) saturate(100%) invert(66%) sepia(32%) saturate(2413%) hue-rotate(165deg) brightness(102%) contrast(95%);
  }
  .btn-outline-skyblue {
  color: #87CEEB;
  border-color: #87CEEB;
}

.btn-outline-skyblue:hover {
  background-color: #87CEEB;
  color: #fff;
  border-color: #87CEEB;
}

</style>
<header class="flex justify-between items-center px-4 py-3 bg-white shadow-md md:hidden fixed top-0 w-full z-50">
<div>
<img src="{{ asset('image/Logo.png') }}" alt="PaYpaRy Logo" class="filter-skyblue" style="height: 24px; width: auto;">

</div>





    @if(Auth::check())
        <div class="dropdown text-end">
            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="customerDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->fname }}
            </a>
            <ul class="dropdown-menu text-small" aria-labelledby="customerDropdown">
                <li class="text-sky-400">
                    <a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('CutProfile.edit') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-gear-fill" width="16" height="16" fill="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" fill="currentColor"
                                  d="M12 15.75a3.75 3.75 0 100-7.5 3.75 3.75 0 000 7.5zM19.5 12a7.5 7.5 0 01-.17 1.64l1.79 1.39a.75.75 0 01.17.94l-1.69 2.93a.75.75 0 01-.93.31l-2.1-.84a7.51 7.51 0 01-1.4.81l-.31 2.24a.75.75 0 01-.74.63H9.88a.75.75 0 01-.74-.63l-.31-2.24a7.51 7.51 0 01-1.4-.81l-2.1.84a.75.75 0 01-.93-.31L2.71 16a.75.75 0 01.17-.94l1.79-1.39a7.51 7.51 0 010-3.28L2.88 8.99a.75.75 0 01-.17-.94l1.69-2.93a.75.75 0 01.93-.31l2.1.84a7.51 7.51 0 011.4-.81l.31-2.24A.75.75 0 019.88 2h4.25c.37 0 .68.27.74.63l.31 2.24a7.51 7.51 0 011.4.81l2.1-.84a.75.75 0 01.93.31l1.69 2.93a.75.75 0 01-.17.94l-1.79 1.39c.11.53.17 1.08.17 1.64z"/>
                        </svg>
                        Profile Settings
                    </a>
                </li>
                <li class="text-sky-400"><hr class="dropdown-divider"></li>
                <li class="text-sky-400">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button class="dropdown-item d-flex align-items-center gap-2" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-box-arrow-right" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M10.146 12.354a.5.5 0 0 1-.708-.708L12.293 9H1.5a.5.5 0 0 1 0-1h10.793L9.438 5.354a.5.5 0 1 1 .708-.708l3.5 3.5a.5.5 0 0 1 0 .708l-3.5 3.5z"/>
                                <path fill-rule="evenodd" d="M13 1a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-4a.5.5 0 0 0-1 0v4a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V1a1 1 0 0 1 1-1h9a1 1 0 0 1 1 1v4a.5.5 0 0 0 1 0V1z"/>
                            </svg>
                            Log Out
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    @else
        <div class="text-end">
<a href="{{ route('login') }}" class="btn btn-outline-skyblue">Login</a>
        </div>
    @endif
</header>

<!-- Top Navigation for Medium and Up -->
<nav class="hidden md:flex items-center px-8 py-4 bg-white border-b border-gray-300 fixed top-0 w-full z-50">
<img src="{{ asset('image/Logo.png') }}" alt="PaYpaRy Logo" class="filter-skyblue" style="height: 24px; width: auto;">
</div>

    <ul class="flex space-x-12 ms-auto items-center">
        <li class="text-sky-400"><a href="{{ url('/dashboard') }}" class="hover:text-blue-800">Home</a></li>
        <li class="text-sky-400"><a href="{{ route('application.history') }}" class="hover:text-blue-800">History</a></li>
        <li class="text-sky-400"><a href="{{ route('application.marketplace') }}" class="hover:text-blue-800">Shop</a></li>
        <li class="text-sky-400"><a href="/about" class="hover:text-blue-800">About</a></li>

        @if(Auth::check())
            <div class="dropdown text-end">
                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="customerDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->fname }}
                </a>
                <ul class="dropdown-menu text-small" aria-labelledby="customerDropdown">
                    <li class="text-sky-400">
                        <a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('CutProfile.edit') }}">
                            <!-- same gear SVG -->
                            Profile Settings
                        </a>
                    </li>
                    <li class="text-sky-400"><hr class="dropdown-divider"></li>
                    <li class="text-sky-400">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button class="dropdown-item d-flex align-items-center gap-2" type="submit">
                                <!-- same logout SVG -->
                                Log Out
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        @else
            <div class="text-end">
            <a href="{{ route('login') }}" class="btn btn-outline-skyblue">Login</a>


            </div>
        @endif
    </ul>
</nav>

<nav class="fixed bottom-0 w-full bg-white border-t border-gray-300 z-50 md:hidden">
  <ul class="flex justify-around p-2">
    <li>
      <a href="{{ url('/dashboard') }}" class="flex flex-col items-center text-sky-400 hover:text-sky-400">
        <!-- Home Icon -->
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l9-9 9 9M4 10v10a1 1 0 001 1h3m10-11v10a1 1 0 01-1 1h-3m-4 0h4"/>
        </svg>
        <span class="text-xs mt-1">Home</span>
      </a>
    </li>

    <li>
      <a href="{{ route('application.history') }}" class="flex flex-col items-center text-sky-400 hover:text-sky-400">
        <!-- History Icon -->
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
        <span class="text-xs mt-1">History</span>
      </a>
    </li>

    <li>
      <a href="{{ route('application.marketplace') }}" class="flex flex-col items-center text-sky-400 hover:text-sky-400">
        <!-- Shop Icon -->
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h18l-1.5 9H4.5L3 3zm0 0l1.5 9h15L21 3M5 21h14a1 1 0 001-1v-4H4v4a1 1 0 001 1z"/>
        </svg>
        <span class="text-xs mt-1">Shop</span>
      </a>
    </li>

  <li>
  <a href="/about" class="flex flex-col items-center text-sky-400 hover:text-sky-400">
    <!-- Information Circle Icon -->
    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
      <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20 10 10 0 000-20z" />
    </svg>
    <span class="text-xs mt-1">About</span>
  </a>
</li>
  </ul>
</nav>



