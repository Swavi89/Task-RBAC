<nav id="dashboard-sidebar"
    class="w-[250px] bg-white fixed top-[50px] left-0 bottom-0 transform transition-transform duration-300 ease-in-out z-10 container-shadow">
    <div class="w-full flex gap-4 items-center overflow-hidden py-5 px-3 border-b border-[#f1f1f1] mb-4">
        <div class="w-12 h-12 rounded-full border border-white overflow-hidden container-shadow">
            <img src="{{asset('public/assets/images/png/profile-1.png')}}" alt="profile">
        </div>
        <div>
            <h5 class="mb-1 text-nowrap truncate text-[#272727] text-lg font-semibold">{{Auth::user()->name}}</h5>
            <p class="text-sm text-nowrap truncate text-[#272727]">{{Auth::user()->roles->first()->name ?? ''}}</p>
        </div>
    </div>
    <div class="w-full h-[calc(100%-220px)] overflow-y-auto hide-scrollbar">
        <ul class="list-none m-0 p-0">
            <li class="mb-[1px]">
                <a href="{{url('/')}}"
                    class="flex items-center gap-4 py-2 pr-6 pl-4 text-black {{ Request::is('/') ? 'bg-[#e9f2ff] border-l-2 border-[#116aef]' : 'border-l-2 border-transparent hover:border-[#116aef] hover:bg-[#e9f2ff]' }} group">
                    <div class="w-9 h-9 flex justify-center items-center rounded-lg {{ Request::is('/') ? 'bg-[#116aef]' : 'bg-[#e9f2ff] group-hover:bg-white' }}">
                        <img src="{{asset('public/assets/images/svg/home-6-line.svg')}}" alt="home6" class="w-6 h-6 {{ Request::is('/') ? 'invert' : 'svg-color-change' }}">
                    </div>
                    <span class="{{ Request::is('/') ? 'text-[#116aef]' : 'text-black' }} text-sm">Dashboard</span>
                </a>
            </li>
            @hasPermission('create_blogs')
            <li class="mb-[1px]">
                <a href="{{url('/blogs')}}"
                    class="flex items-center gap-4 py-2 pr-6 pl-4 text-black {{ Request::is('blogs') || Request::is('blogs/*') ? 'bg-[#e9f2ff] border-l-2 border-[#116aef]' : 'border-l-2 border-transparent hover:border-[#116aef] hover:bg-[#e9f2ff]' }} group">
                    <div class="w-9 h-9 flex justify-center items-center rounded-lg {{ Request::is('blogs') || Request::is('blogs/*') ? 'bg-[#116aef]' : 'bg-[#e9f2ff] group-hover:bg-white' }}">
                        <img src="{{asset('public/assets/images/svg/home-5-line.svg')}}" alt="home6" class="w-6 h-6 {{ Request::is('blogs') || Request::is('blogs/*') ? 'invert' : 'svg-color-change' }}">
                    </div>
                    <span class="{{ Request::is('blogs') || Request::is('blogs/*') ? 'text-[#116aef]' : 'text-black' }} text-sm">Blogs</span>
                </a>
            </li>
            @endhasPermission
            <li class="mb-[1px]">
                <a href="javascript:void(0);"
                    class="dropdown-toggle flex items-center gap-4 justify-between py-2 pr-6 pl-4 text-black {{ Request::is('users') || Request::is('users/*') || Request::is('role-with-permissions') || Request::is('permissions') || Request::is('role-with-permissions/*') || Request::is('permissions/*') ? 'bg-[#e9f2ff] border-l-2 border-[#116aef]' : 'border-l-2 border-transparent hover:border-[#116aef] hover:bg-[#e9f2ff]' }} group">
                    <div class="flex items-center gap-4">
                        <div class="w-9 h-9 flex justify-center items-center rounded-lg {{ Request::is('users') || Request::is('users/*') || Request::is('role-with-permissions') || Request::is('permissions') || Request::is('role-with-permissions/*') || Request::is('permissions/*') ? 'bg-[#116aef]' : 'bg-[#e9f2ff] group-hover:bg-white' }}">
                            <img src="{{asset('public/assets/images/svg/stethoscope-line.svg')}}" alt="home6" class="w-6 h-6 {{ Request::is('users') || Request::is('users/*') || Request::is('role-with-permissions') || Request::is('permissions') || Request::is('role-with-permissions/*') || Request::is('permissions/*') ? 'invert' : 'svg-color-change' }}">
                        </div>
                        <span class="{{ Request::is('users') || Request::is('users/*') || Request::is('role-with-permissions') || Request::is('role-with-permissions/*') || Request::is('permissions') || Request::is('permissions/*') ? 'text-[#116aef]' : 'text-black' }} text-sm">Users</span>
                    </div>
                    <div class="w-6 h-6">
                        <img src="{{asset('public/assets/images/svg/arrow-right.svg')}}" alt="rightarrow" id="dropdown-arrow"
                            class="transition-transform duration-300 ease-in-out transform {{ Request::is('users') || Request::is('users/*') || Request::is('role-with-permissions') || Request::is('role-with-permissions/*') || Request::is('permissions') || Request::is('permissions/*') ? 'rotate-90' : '' }}">
                    </div>
                </a>
                <ul
                    class="list-none m-0 p-0 text-sm dropdown-menu bg-white overflow-hidden transition-all duration-300 ease-in-out {{ Request::is('users') || Request::is('users/*') || Request::is('role-with-permissions') || Request::is('role-with-permissions/*')
                     || Request::is('permissions') || Request::is('permissions/*') ? 'max-h-[300px]' : 'max-h-0' }}">
                    <li>
                        <a href="{{url('/users')}}"
                            class="py-2.5 pr-4 pl-16 {{ Request::is('users') || Request::is('users/*') ? 'text-[#116aef]' : 'text-black hover:text-[#116aef] active:text-[#116aef]' }} block">
                            Users
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/role-with-permissions')}}"
                            class="py-2.5 pr-4 pl-16 {{ Request::is('role-with-permissions') || Request::is('role-with-permissions/*') ? 'text-[#116aef]' : 'text-black hover:text-[#116aef] active:text-[#116aef]' }} block">Roles
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/permissions')}}"
                            class="py-2.5 pr-4 pl-16 {{ Request::is('permissions') || Request::is('permissions/*') ? 'text-[#116aef]' : 'text-black hover:text-[#116aef] active:text-[#116aef]' }} block">Permissions
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
                <h5 class="text-lg">8093478546</h5>
            </div>
        </div>
    </div>
</nav>