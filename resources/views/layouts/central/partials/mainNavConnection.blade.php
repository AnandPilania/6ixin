<!-- ====== Navbar Section Start -->
<!--Nav-->
<nav id="header" class="fixed w-full z-30 top-0 text-white shadow-sm">

  <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 p-2">

    <div class="flex items-center">
      <a class="toggleColour text-white items-center justify-center flex no-underline hover:no-underline font-bold text-2xl lg:text-3xl" href="#">
        <!--Icon from: http://www.potlabicons.com/ -->
        <img class="w-8 h-8 lg:w-9 lg:h-9 xl:h-10 xl:w-10 mr-2 rounded-full inline" src="{{asset('/img/logo.png')}} "/>
        {{env('APP_NAME', 'HUSXL')}}
      </a>
    </div>

    <div class="block lg:hidden">
      <button type="button" x-description="Sidebar toggle, controls the 'sidebarOpen' sidebar state." class="p-2 hover:bg-gray-50 rounded text-gray-500 focus:outline-none  focus:shadow-sm focus:bg-gray-50 lg:hidden" @click="open = true">
        <span class="sr-only">Open sidebar</span>
        <svg class="h-6 w-6" x-description="Heroicon name: outline/menu-alt-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h8m-8 6h16"></path>
        </svg>
      </button>
    </div>

    <div class="w-full  flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 bg-white lg:bg-transparent text-black p-4 lg:p-0 z-20" id="nav-content">
      <ul class="list-reset lg:flex justify-end flex-1 gap-x-2 items-center">
        <li>
         <a href="#" class="text-gray-400 no-underline hover:text-gray-600 hover:text-underline p-2" href="#">
           <x-partials.central.menu-main-link
               title='{{__("Explore")}}'
               iconWidth='0'
               active='{{request()->routeIs( "user.home")}}'
               icon='explore'/>
          </a>
        </li>
        <li>
          <x-jet-dropdown align="right" dropdownClasses="w-screen max-w-sm sm:px-0 py-0 mt-3 -right-28">
              <x-slot name="trigger">
                <x-partials.central.menu-main-link
                title='{{__("Menu")}}'
                iconWidth='0'
                active='{{request()->routeIs( "user.home")}}'
                icon='menuGrid'/>
               </x-slot>

              <x-slot name="content">
                <div class="bg-gray-50 bg-opacity-60">
                  <div class="bg-gray-50 px-4 py-2">
                    <p class="text-base font-medium mt-1 text-gray-900">
                      Engagement
                    </p>
                  </div>
                  <div class="grid grid-cols-3 gap-2 p-2 text-center">

                    <x-partials.central.menu-main-grid-link
                    title='{{__("Career")}}'
                    url='0'
                    iconWidth='0'
                    active='{{request()->routeIs( "user.home")}}'
                    icon='menuGrid'/>
                    <x-partials.central.menu-main-grid-link
                    title='{{__("Marketplace")}}'
                    url='0'
                    iconWidth='0'
                    active='{{request()->routeIs( "user.home")}}'
                    icon='menuGrid'/>
                    <x-partials.central.menu-main-grid-link
                    title='{{__("Salons")}}'
                    url='0'
                    iconWidth='0'
                    active='{{request()->routeIs( "user.home")}}'
                    icon='menuGrid'/>
                    <x-partials.central.menu-main-grid-link
                    title='{{__("Publications")}}'
                    url='0'
                    iconWidth='0'
                    active='{{request()->routeIs( "user.home")}}'
                    icon='menuGrid'/>
                    <x-partials.central.menu-main-grid-link
                    title='{{__("Calendar")}}'
                    url='0'
                    iconWidth='0'
                    active='{{request()->routeIs( "user.home")}}'
                    icon='menuGrid'/>
                    <x-partials.central.menu-main-grid-link
                    title='{{__("Circles")}}'
                    url='0'
                    iconWidth='0'
                    active='{{request()->routeIs( "user.home")}}'
                    icon='menuGrid'/>
                  </div>
                </div>
              </x-slot>
            </x-jet-dropdown>

        </li>
        <li>
          <x-jet-dropdown align="right" dropdownClasses="w-screen max-w-sm sm:px-0  py-0 mt-3">
              <x-slot name="trigger">

                <button id="navAccountBtn" type="button" class="whitespace-nowrap inline-flex items-center justify-center px-5 py-2 border border-blue-500 rounded-md shadow-sm text-sm font-semibold text-blue-600 hover:text-white focus:text-white hover:bg-blue-600 fovus:bg-blue-700">{{__('Account')}}</button>
              </x-slot>
              <x-slot name="content">
                <div class="p-4">
                  <form class="mt-8 space-y-6" action="#" method="POST">
                   <input type="hidden" name="remember" value="true">
                   <div class="rounded-md shadow-sm -space-y-px">
                     <div>
                       <label for="email-address" class="sr-only">Email address</label>
                       <input id="email-address" name="email" type="email" autocomplete="email" required="" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Email address">
                     </div>
                     <div>
                       <label for="password" class="sr-only">Password</label>
                       <input id="password" name="password" type="password" autocomplete="current-password" required="" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Password">
                     </div>
                   </div>

                   <div class="flex items-center justify-between">
                     <div class="flex items-center">
                       <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                       <label for="remember-me" class="ml-2 block text-sm text-gray-900">
                         Remember me
                       </label>
                     </div>

                     <div class="text-sm">
                       <a href="#" class="font-medium text-blue-600 hover:underline hover:text-blue-500">
                         Forgot your password?
                       </a>
                     </div>
                   </div>

                   <div>
                     <div class="grid grid-cols-2 gap-2 mt-1 font-semibold">
                       <a href="#" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm  rounded-sm text-blue-500 hover:text-blue-600 bg-blue-200 bg-opacity-20 hover:bg-opacity-40 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">

                         Register
                       </a>
                     <button type="submit" class="font-semibold group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                       <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                         <svg class="h-5 w-5 text-blue-500 group-hover:text-blue-400"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                           <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                          </svg>
                       </span>
                       Sign in
                     </button>
                   </div>
                 </div>
                 </form>
                 <div class="mt-4">
                   <p class="text-sm font-medium text-gray-700">
                Sign in with
              </p>
              <div class="grid grid-cols-3 gap-2 mt-1">
            <div>
              <a href="#" class="w-full inline-flex justify-center py-2 px-4 border border-gray-100 rounded-md shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                <span class="sr-only">Sign in with Facebook</span>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                  <path fill-rule="evenodd" d="M20 10c0-5.523-4.477-10-10-10S0 4.477 0 10c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V10h2.54V7.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V10h2.773l-.443 2.89h-2.33v6.988C16.343 19.128 20 14.991 20 10z" clip-rule="evenodd"></path>
                </svg>
              </a>
            </div>

            <div>
              <a href="#" class="w-full inline-flex justify-center py-2 px-4 border border-gray-100 rounded-md shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                <span class="sr-only">Sign in with Twitter</span>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                  <path d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84"></path>
                </svg>
              </a>
            </div>

            <div>
              <a href="#" class="w-full inline-flex justify-center py-2 px-4 border border-gray-100 rounded-md shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                    <span class="sr-only">Sign in with GitHub</span>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                      <path fill-rule="evenodd" d="M10 0C4.477 0 0 4.484 0 10.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0110 4.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.203 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.942.359.31.678.921.678 1.856 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0020 10.017C20 4.484 15.522 0 10 0z" clip-rule="evenodd"></path>
                    </svg>
                  </a>
                </div>
              </div>
            </div>
                </div>

              </x-slot>
            </x-jet-dropdown>

        </li>
      </ul>

     </div>
  </div>

 </nav>

<!-- ====== Navbar Section End -->
@push('scripts')

	<script>
		var scrollpos = window.scrollY;
		var header = document.getElementById("header");
		var navcontent = document.getElementById("nav-content");
		var navAccountBtn = document.getElementById("navAccountBtn");
		var brandname = document.getElementById("brandname");
		var toToggle = document.querySelectorAll(".toggleColour");

		document.addEventListener('scroll', function() {

			/*Apply classes for slide in bar*/
			scrollpos = window.scrollY;

			if (scrollpos > 10) {
        header.classList.add("bg-white");
        header.classList.add("bg-opacity-80");
				navAccountBtn.classList.remove("bg-white");
				navAccountBtn.classList.add("gradient");
				navAccountBtn.classList.remove("text-gray-800");
				navAccountBtn.classList.add("text-white");
				//Use to switch toggleColour colours
				for (var i = 0; i < toToggle.length; i++) {
					toToggle[i].classList.add("text-gray-800");
					toToggle[i].classList.remove("text-white");
				}
				header.classList.add("shadow-sm");
				navcontent.classList.remove("bg-gray-100");
				navcontent.classList.add("bg-white");
			} else {
        header.classList.remove("bg-white");
        header.classList.remove("bg-opacity-80");
				navAccountBtn.classList.remove("gradient");
				navAccountBtn.classList.add("bg-white");
				navAccountBtn.classList.remove("text-white");
				navAccountBtn.classList.add("text-gray-800");
				//Use to switch toggleColour colours
				for (var i = 0; i < toToggle.length; i++) {
					toToggle[i].classList.add("text-white");
					toToggle[i].classList.remove("text-gray-800");
				}

				header.classList.remove("shadow-sm");
				navcontent.classList.remove("bg-white");
				navcontent.classList.add("bg-gray-100");

			}

		});
	</script>
@endpush
