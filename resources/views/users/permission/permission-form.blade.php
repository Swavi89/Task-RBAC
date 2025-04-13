@extends('admin-layout')
@section('title', $permission->id ? 'Edit User' : 'Add User')
@section('content')
<div
    class="py-2 px-6 sticky top-[50px] flex gap-6 justify-between items-center bg-[#f6f9fb] z-10 container-shadow">
    <ul class="list-none flex items-center">
        <li class="flex items-center">
            <div class="pr-4 mr-4 border-r border-[#dde2ee]">
                <img src="{{asset('public/assets/images/svg/home.svg')}}" alt="home" class="w-6 h-6 ">
            </div>
            <a href="{{url('/permissions')}}" class="text-[#4c545e] text-sm">Permissions</a>
        </li>
        <li class="flex items-center">
            <div class="px-2">
                <img src="{{asset('public/assets/images/svg/arrow-right.svg')}}" alt="home" class="w-6 h-6 ">
            </div>
            <span class="text-[#116aef] text-sm">Add Permission</span>
        </li>
    </ul>
</div>
<div class="sm:p-6 p-4">
    @include('elements.flash')
    <div class="bg-white p-4 rounded-lg w-full container-shadow mb-4">
        <h5 class="text-lg font-medium leading-5 pb-2 text-[#272727]">{{ $permission->id ? 'Edit' : 'Add' }} Permissions</h5>
        <div class="mt-6">
            <form id="permissionsForm" action="{{url('/permissions/save')}}" method="POST" autocomplete="off">
                @csrf
                <input type="hidden" name="id" value="{{ $permission->id }}">
                <div class="">
                    <div class="flex flex-wrap gap-4 items-center w-full text-[#272727] text-sm">
                        <div class="sm:w-[48.5%] w-full">
                            <label for="fname" class="mb-2 inline-block">User Name</label>
                            <div class="w-full h-9 relative flex items-center">
                                <span class="h-full flex justify-center items-center rounded-l-lg py-1.5 px-3 border border-[#cdd6dc]">
                                    <img src="{{asset('public/assets/images/form-icons/account-pin-circle-line.svg')}}" alt="account" class="w-5">
                                </span>
                                <input type="text" name="name" minlength="1" maxlength="50" placeholder="e.g. Create Blogs" class="h-full py-1.5 px-3 rounded-r-lg border border-[#cdd6dc] focus-visible:outline-0 focus:border-[#88b5f7] w-[calc(100%-46px)]" value="{{ old('name', !empty($permission->name) ? $permission->name : '') }}" fdprocessedid="ubk2e7">
                            </div>
                        </div>
                        <div class="sm:w-[48.5%] w-full">
                            <label for="lname" class="mb-2 inline-block">Tags <span class="text-[#ff5a39]">*</span></label>
                            <div class="w-full h-9 relative flex items-center">
                                <span class="h-full flex justify-center items-center rounded-l-lg py-1.5 px-3 border border-[#cdd6dc]">
                                    <img src="{{asset('public/assets/images/form-icons/secure-payment-line.svg')}}" alt="account" class="w-5">
                                </span>
                                <input type="text" name="tag" placeholder="e.g. create_blogs" minlength="1" maxlength="50" class="h-full rounded-r-lg py-1.5 px-3 border border-[#cdd6dc] focus-visible:outline-0 focus:border-[#88b5f7] w-[calc(100%-46px)]" fdprocessedid="5hshmc" value="{{ old('tag',!empty($permission->tag) ? $permission->tag : '') }}">
                            </div>
                        </div>
                        <div class="w-full">
                            <label for="fname" class="mb-2 inline-block">Description</label><span class="text-xs"> (Optional)</span>
                            <textarea type="text" name="description" rows="3"
                                class="rounded-lg py-1.5 px-3 border border-[#cdd6dc] focus-visible:outline-0 focus:border-[#88b5f7] w-full">{{ old('description',!empty($permission->description) ? $permission->description : '') }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="mt-8 flex items-center gap-2 justify-end">
                    <a href="{{url('/permissions')}}"
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
<script>
    $(document).ready(function() {
        $('.numeric-only').on('input', function(e) {
            var input = $(this);
            var value = input.val();
            value = value.replace(/\D/g, '');
            input.val(value);
        });
    });
</script>
@endsection