<nav id="dashboard-sidebar"
    class="w-[250px] bg-white fixed top-[50px] left-0 bottom-0 transform transition-transform duration-300 ease-in-out z-10 container-shadow">
    <div class="w-full flex gap-4 items-center overflow-hidden py-5 px-3 border-b border-[#f1f1f1] mb-4">
        <div class="w-12 h-12 rounded-full border border-white overflow-hidden container-shadow">
            <img src="{{asset('public/assets/images/png/profile-1.png')}}" alt="profile">
        </div>
        <div>
            <h5 class="mb-1 text-nowrap truncate text-[#272727] text-lg font-semibold">Swaviman Sahoo</h5>
            <p class="text-sm text-nowrap truncate text-[#272727]">Super Admin</p>
        </div>
    </div>
    <div class="w-full h-[calc(100%-220px)] overflow-y-auto hide-scrollbar">
        <ul class="list-none m-0 p-0">
            <li class="mb-[1px]">
                <a href="{{url('/')}}"
                    class="flex items-center gap-4 py-2 pr-6 pl-4 text-black bg-[#e9f2ff] border-l-2 border-transparent hover:border-[#116aef]">
                    <div class="w-9 h-9 flex justify-center items-center rounded-lg bg-[#116aef]">
                        <img src="{{asset('public/assets/images/svg/home-6-line.svg')}}" alt="home6" class="w-6 h-6 invert">
                    </div>
                    <span class="text-[#116aef] text-sm">Dashboard</span>
                </a>
            </li>
            <li class="mb-[1px]">
                <a href="/dentist-dashboard.html"
                    class="flex items-center gap-4 py-2 pr-6 pl-4 text-black border-l-2 border-transparent hover:border-[#116aef] hover:bg-[#e9f2ff] group">
                    <div class="w-9 h-9 flex justify-center items-center rounded-lg bg-[#e9f2ff] group-hover:bg-white">
                        <img src="{{asset('public/assets/images/svg/home-5-line.svg')}}" alt="home6" class="w-6 h-6 svg-color-change">
                    </div>
                    <span class="text-black text-sm">Blogs</span>
                </a>
            </li>
            <li class="mb-[1px]">
                <a href="javascript:void(0);"
                    class="dropdown-toggle flex items-center gap-4 justify-between py-2 pr-6 pl-4 text-black border-l-2 border-transparent hover:border-[#116aef] hover:bg-[#e9f2ff] group">
                    <div class="flex items-center gap-4">
                        <div class="w-9 h-9 flex justify-center items-center rounded-lg bg-[#e9f2ff] group-hover:bg-white">
                            <img src="{{asset('public/assets/images/svg/stethoscope-line.svg')}}" alt="home6" class="w-6 h-6 svg-color-change">
                        </div>
                        <span class="text-black text-sm">Users</span>
                    </div>
                    <div class="w-6 h-6">
                        <img src="{{asset('public/assets/images/svg/arrow-right.svg')}}" alt="rightarrow" id="dropdown-arrow"
                            class="transition-transform duration-300 ease-in-out transform">
                    </div>
                </a>
                <ul
                    class="list-none m-0 p-0 text-sm dropdown-menu bg-white overflow-hidden transition-all duration-300 ease-in-out max-h-0">
                    <li>
                        <a href="void:javascript(0)"
                            class="py-2.5 pr-4 pl-16 text-black hover:text-[#116aef] active:text-[#116aef] block">
                            Users
                        </a>
                    </li>
                    <li>
                        <a href="void:javascript(0)"
                            class="py-2.5 pr-4 pl-16 text-black hover:text-[#116aef] active:text-[#116aef] block">Roles
                        </a>
                    </li>
                    <li>
                        <a href="void:javascript(0)"
                            class="py-2.5 pr-4 pl-16 text-black hover:text-[#116aef] active:text-[#116aef] block">Permissions
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="w-full bg-white absolute bottom-0 left-0">
        <div class="my-3 mx-5 py-2.5 px-4 bg-[#0ebb13] rounded-md text-white flex gap-4 items-center">
            <div class="w-8 h-8">
                <img src="{{asset('public/assets/images/svg/phone-line.svg')}}" alt="phone-line" class="invert">
            </div>
            <div>
                <p class="mb-1 text-sm font-light">Emergency Contact</p>
                <h5 class="text-lg">0987654321</h5>
            </div>
        </div>
    </div>
</nav>