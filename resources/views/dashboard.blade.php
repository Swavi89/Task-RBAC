@extends('admin-layout')
@section('title', 'RBAC')
@section('content')
<div class="py-2 px-6 sticky top-[50px] flex gap-6 justify-between items-center bg-[#f6f9fb] z-10 container-shadow">
  <ul class="list-none flex items-center">
    <li class="flex items-center">
      <div class="pr-4 mr-4 border-r border-[#dde2ee]">
        <img src="{{asset ('public/assets/images/svg/home.svg')}}" alt="home" class="w-6 h-6 ">
      </div>
      <!-- <a href="#/" class="text-[#4c545e] text-sm">Home</a> -->
    </li>
    <li class="flex items-center">
      <!-- <div class="px-2">
        <img src="{{asset ('public/assets/images/svg/arrow-right.svg')}}" alt="home" class="w-6 h-6 ">
      </div> -->
      <span class="text-[#116aef] text-sm">Dashboard</span>
    </li>
  </ul>
</div>
<div class="sm:p-6 p-4">
  <div class="bg-[url('{{asset ('public/assets/images/svg/banner.svg')}}')] bg-cover bg-right p-4 rounded-lg mb-4 bg-no-repeat container-shadow">
    <div class="py-6 px-4 text-white">
      <h2 class="text-3xl mb-2 font-medium">{{Auth::user()->name}}</h2>
      <div class="flex flex-wrap items-center gap-4 mt-6">
        <div class="flex gap-4 items-center">
          <div class="md:w-16 w-12 md:h-16 h-12 bg-[#1ec5f9] rounded-lg flex justify-center items-center links-shadow">
            <img src="{{asset ('public/assets/images/svg/surgical-mask.svg')}}" alt="mask" class="invert w-5 h-5">
          </div>
          <div class="">
            <h3 class="text-[28px] leading-none font-medium">{{$user->count() ?? 0}}</h3>
            <p class="text-sm">Users</p>
          </div>
        </div>
        <div class="flex gap-4 items-center">
          <div class="md:w-16 w-12 md:h-16 h-12 bg-[#79d874] rounded-lg flex justify-center items-center links-shadow">
            <img src="{{asset ('public/assets/images/svg/lungs.svg')}}" alt="lungs" class="invert w-5 h-5">
          </div>
          <div class="">
            <h3 class="text-[28px] leading-none font-medium">{{$role->count() ?? 0}}</h3>
            <p class="text-sm">Roles</p>
          </div>
        </div>
        <div class="flex gap-4 items-center">
          <div class="md:w-16 w-12 md:h-16 h-12 bg-[#fea95f] rounded-lg flex justify-center items-center links-shadow">
            <img src="{{asset ('public/assets/images/svg/walk.svg')}}" alt="walk" class="invert w-5 h-5">
          </div>
          <div class="">
            <h3 class="text-[28px] leading-none font-medium">{{$permission->count() ?? 0}}</h3>
            <p class="text-sm">Permissions</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection