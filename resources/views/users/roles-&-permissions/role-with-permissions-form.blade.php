@extends('admin-layout')
@section('title', $role->id ? 'Edit Role' : 'Add Role')
@section('content')
<div
    class="py-2 px-6 sticky top-[50px] flex gap-6 justify-between items-center bg-[#f6f9fb] z-10 container-shadow">
    <ul class="list-none flex items-center">
        <li class="flex items-center">
            <div class="pr-4 mr-4 border-r border-[#dde2ee]">
                <img src="{{asset('public/assets/images/svg/home.svg')}}" alt="home" class="w-6 h-6 ">
            </div>
            <a href="{{url('/role-with-permissions')}}" class="text-[#4c545e] text-sm">Roles</a>
        </li>
        <li class="flex items-center">
            <div class="px-2">
                <img src="{{asset('public/assets/images/svg/arrow-right.svg')}}" alt="home" class="w-6 h-6 ">
            </div>
            <span class="text-[#116aef] text-sm">Add Roles With Permissions</span>
        </li>
    </ul>
</div>
<div class="sm:p-6 p-4">
    @include('elements.flash')
    <div class="bg-white p-4 rounded-lg w-full container-shadow mb-4">
        <h5 class="text-lg font-medium leading-5 pb-2 text-[#272727]">{{ $role->id ? 'Edit' : 'Add' }} Roles</h5>
        <div class="mt-6">
            <form id="roleForm" action="{{url('/role-with-permissions/save')}}" method="POST" autocomplete="off">
                @csrf
                <input type="hidden" name="id" value="{{ $role->id }}">
                <div class="">
                    <div class="flex flex-wrap gap-4 items-center w-full text-[#272727] text-sm">
                        <div class="sm:w-[48.5%] w-full">
                            <label for="fname" class="mb-2 inline-block">Role</label>
                            <div class="w-full h-9 relative flex items-center">
                                <span class="h-full flex justify-center items-center rounded-l-lg py-1.5 px-3 border border-[#cdd6dc]">
                                    <img src="{{asset('public/assets/images/form-icons/account-pin-circle-line.svg')}}" alt="account" class="w-5">
                                </span>
                                <input type="text" name="name" minlength="1" maxlength="50" placeholder="e.g. Super Admin" class="h-full py-1.5 px-3 rounded-r-lg border border-[#cdd6dc] focus-visible:outline-0 focus:border-[#88b5f7] w-[calc(100%-46px)]" value="{{ old('name', !empty($role->name) ? $role->name : '') }}" fdprocessedid="ubk2e7">
                            </div>
                        </div>
                    </div>
                    <div class="overflow-x-auto mt-3">
                        <table class="min-w-full border text-sm text-left text-gray-700 bg-white rounded shadow">
                            <thead class="bg-gray-100 border-b">
                                <tr class="font-semibold text-gray-800">
                                    <th class="px-4 py-3 w-[50%]">Permissions</th>
                                    <th class="px-4 py-3 text-center">Select All</th>
                                    <th class="px-4 py-3 text-center">Create</th>
                                    <th class="px-4 py-3 text-center">Edit</th>
                                    <th class="px-4 py-3 text-center">View</th>
                                    <th class="px-4 py-3 text-center">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $groupName => $groupPermissions)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="px-4 py-3">{{ ucwords(str_replace('_', ' ', $groupName)) }}</td>
                                    <td class="px-4 py-3 text-center">
                                        <input type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500 select-all" data-group="{{ $groupName }}"
                                            {{ $groupPermissions->pluck('id')->diff($role ? $role->permissions->pluck('id') : [])->isEmpty() ? 'checked' : '' }}>
                                    </td>
                                    @foreach(['create', 'edit', 'view', 'delete'] as $action)
                                    <td class="px-4 py-3 text-center">
                                        @php
                                        $permission = $groupPermissions->firstWhere('tag', $action . '_' . strtolower($groupName));
                                        @endphp
                                        @if($permission)
                                        <input type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500 permission-checkbox"
                                            name="permissions[]" value="{{ $permission->id }}" data-group="{{ $groupName }}"
                                            {{ in_array($permission->id, $role ? $role->permissions->pluck('id')->toArray() : []) ? 'checked' : '' }}>
                                        @endif
                                    </td>
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="mt-8 flex items-center gap-2 justify-end">
                    <a href="{{url('/blogs')}}"
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
    document.querySelectorAll('.select-all').forEach(selectAll => {
        selectAll.addEventListener('change', function() {
            const group = this.dataset.group;
            const checkboxes = document.querySelectorAll(`input.permission-checkbox[data-group="${group}"]`);
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });
    });
</script>
@endsection