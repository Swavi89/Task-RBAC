<header class="px-5 min-h-[50px] bg-[#116aef] sticky top-0 flex items-center z-10">
    <div class="flex items-center gap-5 justify-between w-full">
        <div class="flex items-center">
            <button type="button" class="bg-white w-8 h-8 rounded-md" onclick="myFunction()">
                <img src="{{asset('public/assets/images/svg/mobilemenu.svg')}}" alt="mobilemenu">
            </button>
        </div>
        <div class="flex items-center">
            <div class="lg:flex hidden gap-2 items-center">
                <div class="relative">
                    <a href="void:javascript(0)"
                        class="w-9 h-9 rounded-md flex justify-center items-center cursor-pointer links-shadow">
                        <p class="text-white font-bold">SS</p>
                    </a>
                    <span class="w-3 h-3 bg-[#4cff39] absolute -top-1 -right-0.5 border-2 border-white rounded-full"></span>
                </div>
            </div>
            <div class="relative ml-3">
                <a href="void:javascript(0)"
                    class="flex justify-center items-center cursor-pointer">
                    <!-- <img src="{{asset('public/assets/images/svg/fr.svg')}}" alt="flag" class="w-5 h-5 rounded"> -->
                    <!-- <p class="text-white">Logout</p> -->
                    <span class="text-white text-sm">Logout</span>
                </a>
            </div>
        </div>
    </div>
</header>