@extends('admin-layout')
@section('title', $user->id ? 'Edit User' : 'Add User')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<div
    class="py-2 px-6 sticky top-[50px] flex gap-6 justify-between items-center bg-[#f6f9fb] z-10 container-shadow">
    <ul class="list-none flex items-center">
        <li class="flex items-center">
            <div class="pr-4 mr-4 border-r border-[#dde2ee]">
                <img src="{{asset('public/assets/images/svg/home.svg')}}" alt="home" class="w-6 h-6 ">
            </div>
            <a href="{{url('/users')}}" class="text-[#4c545e] text-sm">Users</a>
        </li>
        <li class="flex items-center">
            <div class="px-2">
                <img src="{{asset('public/assets/images/svg/arrow-right.svg')}}" alt="home" class="w-6 h-6 ">
            </div>
            <span class="text-[#116aef] text-sm">Add Users</span>
        </li>
    </ul>
</div>
<div class="sm:p-6 p-4">
    @include('elements.flash')
    <div class="bg-white p-4 rounded-lg w-full container-shadow mb-4">
        <h5 class="text-lg font-medium leading-5 pb-2 text-[#272727]">{{ $user->id ? 'Edit' : 'Add' }} User</h5>
        <div class="mt-6">
            <form id="userForm" action="{{url('/users/save')}}" method="POST" autocomplete="off">
                @csrf
                <input type="hidden" name="id" value="{{ $user->id }}">
                <div class="">
                    <div class="flex flex-wrap gap-4 items-center w-full text-[#272727] text-sm">
                        <div class="sm:w-[48.5%] w-full">
                            <label for="fname" class="mb-2 inline-block">User Name</label>
                            <div class="w-full h-9 relative flex items-center">
                                <span class="h-full flex justify-center items-center rounded-l-lg py-1.5 px-3 border border-[#cdd6dc]">
                                    <img src="{{asset('public/assets/images/form-icons/account-pin-circle-line.svg')}}" alt="account" class="w-5">
                                </span>
                                <input type="text" name="name" minlength="1" maxlength="50" placeholder="Enter User Name" class="h-full py-1.5 px-3 rounded-r-lg border border-[#cdd6dc] focus-visible:outline-0 focus:border-[#88b5f7] w-[calc(100%-46px)]" value="{{ old('name', !empty($user->name) ? $user->name : '') }}" fdprocessedid="ubk2e7">
                            </div>
                        </div>
                        <div class="sm:w-[48.5%] w-full">
                            <label for="lname" class="mb-2 inline-block">Email ID <span class="text-[#ff5a39]">*</span></label>
                            <div class="w-full h-9 relative flex items-center">
                                <span class="h-full flex justify-center items-center rounded-l-lg py-1.5 px-3 border border-[#cdd6dc]">
                                    <img src="{{asset('public/assets/images/form-icons/home-6-line.svg')}}" alt="home" class="w-5">
                                </span>
                                <input type="text" name="email" minlength="1" maxlength="100" placeholder="Enter Email ID" class="h-full rounded-r-lg py-1.5 px-3 border border-[#cdd6dc] focus-visible:outline-0 focus:border-[#88b5f7] w-[calc(100%-46px)]" value="{{ old('email', !empty($user->email) ? $user->email : '') }}" fdprocessedid="rqgesc">
                            </div>
                        </div>
                        <div class="sm:w-[48.5%] w-full">
                            <label for="mobileNumber" class="mb-2 inline-block">Mobile Number <span class="text-[#ff5a39]">*</span></label>
                            <div class="w-full h-9 relative flex items-center">
                                <span class="h-full flex justify-center items-center rounded-l-lg py-1.5 px-3 border border-[#cdd6dc]">
                                    <img src="{{asset('public/assets/images/form-icons/phone-line.svg')}}" alt="phone" class="w-5">
                                </span>
                                <input type="text" name="mobile" minlength="10" maxlength="10" placeholder="Enter Mobile Number" class="numeric-only h-full rounded-r-lg py-1.5 px-3 border border-[#cdd6dc] focus-visible:outline-0 focus:border-[#88b5f7] w-[calc(100%-46px)]" value="{{ old('mobile', !empty($user->mobile) ? $user->mobile : '') }}" fdprocessedid="upm68d">
                            </div>
                        </div>
                        <div class="sm:w-[48.5%] w-full">
                            <label for="roles" class="mb-2 inline-block">
                                Select Roles <span class="text-[#ff5a39]">*</span>
                            </label>
                            <div class="w-full h-9 relative flex items-center">
                                <span class="h-full flex justify-center items-center rounded-l-lg py-1.5 px-3 border border-[#cdd6dc] bg-white">
                                    <img src="{{ asset('public/assets/images/form-icons/vip-crown-2-line.svg') }}" alt="icon" class="w-5">
                                </span>
                                <select
                                    class="select2-multiple rounded-r-lg h-full border border-[#cdd6dc] focus-visible:outline-0 focus:border-[#88b5f7] w-[calc(100%-46px)] px-3 py-1.5"
                                    name="roles[]" multiple>
                                    @foreach($roles as $id => $role)
                                    @php
                                    $selected = in_array($id, $user->roles->pluck('id')->toArray()) ? 'selected' : '';
                                    @endphp
                                    <option value="{{ $id }}" {{ $selected }}>{{ $role }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        @if(empty($user->id))
                        <div class="sm:w-[48.5%] w-full">
                            <label class="mb-2 inline-block">Password</label>
                            <div class="w-full h-9 relative flex items-center">
                                <span class="h-full flex justify-center items-center rounded-l-lg py-1.5 px-3 border border-[#cdd6dc]">
                                    <img src="{{asset('public/assets/images/form-icons/lock-password-line.svg')}}" alt="lock" class="w-5">
                                </span>
                                <input type="text" name="password" minlength="8" maxlength="15" placeholder="Enter Password" class="h-full py-1.5 px-3 border border-[#cdd6dc] focus-visible:outline-0 focus:border-[#88b5f7] w-[calc(100%-46px)]" fdprocessedid="5perhk">
                                <button type="button" class="h-full flex justify-center items-center rounded-r-lg py-1.5 px-3 border border-[#cdd6dc]" fdprocessedid="1ux1nf">
                                    <img src="{{asset('public/assets/images/form-icons/eye-off-line.svg')}}" alt="eyeoff" class="w-5">
                                </button>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="mt-8 flex items-center gap-2 justify-end">
                    <a href="{{url('/users')}}"
                        class="py-1.5 px-3 text-sm border border-[#d8e2eb] hover:bg-[#d8e2eb] text-[#272727] rounded-md links-shadow">Cancel</a>
                    <button type="submit"
                        class="py-1.5 px-3 text-sm border border-[#116aef] bg-[#116aef] text-white rounded-md links-shadow">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2-multiple').select2();
        $('.numeric-only').on('input', function(e) {
            var input = $(this);
            var value = input.val();
            value = value.replace(/\D/g, '');
            input.val(value);
        });
    });
</script>
@endsection