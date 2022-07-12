<!-- ====== Navbar Section Start -->
<!--Nav-->
<nav id="header" x-data="{ open: false }" class="fixed w-full z-30 top-0 text-white">

  <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-0.5 px-4">

    <div class="flex items-center">
      <a href="{{route('central.landing')}}">
      <span id="mainLogo"
          class="text-gray-600 items-center justify-center flex no-underline hover:no-underline font-bold text-2xl lg:text-3xl order-1 tracking-tight sm:leading-none w-10 h-10 xl:h-14 xl:w-14 pt-2" >
        <x-form.icon
        path='logo'
        viewBox='0 0 500 500'
        width='full'
        height='full'
        class='inline'
        />
      </span>

        <span id="sloganDisplay" class="">
        </span>
       </a>
    </div>

    <div class="flex lg:hidden">
      <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-600 hover:text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                      <path :class="{'hidden': open, 'inline-flex': ! open }"
                             class="inline-flex"
                             stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h8m-8 6h16"></path>
                      <path :class="{'hidden': ! open, 'inline-flex': open }"
                             class="hidden"
                             stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

     </div>

    <div class="w-full  flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 bg-white lg:bg-transparent text-black p-2 lg:p-0 z-20" id="nav-content">
      <ul class="list-reset lg:flex justify-end flex-1 gap-x-2 items-center">
        <li>
          <a href="{{route('central.services')}}" class="text-gray-400 no-underline hover:text-gray-600 hover:text-underline p-0" href="#">
            <x-partials.central.menu-main-link
                title='{{__("Services")}}'
                url='central.services'
                active='{{request()->routeIs( "central.services.*")}}'
                icon=''/>
           </a>
        </li>
        <li>
          <x-jet-dropdown align="right" dropdownClasses="w-screen max-w-sm sm:px-0 py-0">
              <x-slot name="trigger">
                <button>
                  <x-partials.central.menu-main-link
                      title='{{__("Services")}}'
                      url='central.services'
                      active='{{request()->routeIs( "central.services.*")}}'
                      icon=''/>
               </button>
               </x-slot>

              <x-slot name="content">
                <div class="bg-gray-50 bg-opacity-60">
                  <div class="bg-gray-50 px-4 py-2">
                    <p class="text-base font-medium mt-1 text-gray-900">
                      Services
                    </p>
                  </div>
                  <div class="grid grid-cols-3 gap-2 p-2 text-center">

                  </div>
                </div>
              </x-slot>
            </x-jet-dropdown>
        </li>
        <li>


        </li>
        <li>

        </li>
      </ul>

     </div>
  </div>
<!-- Mobile menu -->
<div x-show="open" @click.away="open = false"  :class="{'block': open, 'hidden': ! open}" class="hidden lg:hidden h-screen overflow-auto bg-white -mt-24 pt-24">
    <div class="pt-2 pb-3">

      </div>
    </div>
 </nav>

<!-- ====== Navbar Section End -->
@push('scripts')

	<script>
		var scrollpos = window.scrollY;
    var header = document.getElementById("header");
    var mainLogo = document.getElementById("mainLogo");
		var navcontent = document.getElementById("nav-content");
		var navAccountBtn = document.getElementById("navAccountBtn");
		var brandname = document.getElementById("brandname");
		var sloganDisplay = document.querySelectorAll(".menuSlogan");

		document.addEventListener('scroll', function() {

			/*Apply classes for slide in bar*/
			scrollpos = window.scrollY;

			if (scrollpos > 10) {
        header.classList.add("bg-white");
        header.classList.add("bg-opacity-80");
        header.classList.add("shadow-sm");
        mainLogo.classList.add("p-2");
				navAccountBtn.classList.remove("bg-white");
				navAccountBtn.classList.add("bg-blue-600");
				navAccountBtn.classList.remove("text-blue-600");
				navAccountBtn.classList.add("text-white");
				//Use to switch menuSlogan colours
				for (var i = 0; i < sloganDisplay.length; i++) {
					sloganDisplay[i].classList.add("text-gray-800");
					sloganDisplay[i].classList.remove("text-gray-600");
				}
				header.classList.add("shadow-sm");
				navcontent.classList.remove("bg-gray-100");
				navcontent.classList.add("bg-white");
			} else {
        header.classList.remove("bg-white");
        header.classList.remove("bg-opacity-80");
        header.classList.remove("shadow-sm");
        mainLogo.classList.remove("p-2");
				navAccountBtn.classList.remove("bg-blue-600");
				navAccountBtn.classList.add("bg-white");
				navAccountBtn.classList.remove("text-white");
				navAccountBtn.classList.add("text-blue-600");
				//Use to switch menuSlogan colours
				for (var i = 0; i < sloganDisplay.length; i++) {
					sloganDisplay[i].classList.add("text-gray-600");
					sloganDisplay[i].classList.remove("text-gray-800");
				}

				header.classList.remove("shadow-sm");
				navcontent.classList.remove("bg-white");
				navcontent.classList.add("bg-gray-100");

			}

		});
	</script>
@endpush
