@extends('admin-layout')
@section('title', 'Blogs List')
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
            <span class="text-[#116aef] text-sm">Blogs</span>
        </li>
    </ul>
</div>
<div class="sm:p-6 p-4">
    @include('elements.flash')
    <div class="bg-white p-4 rounded-lg w-full container-shadow mb-4">
        <div class="flex flex-wrap gap-5 justify-between items-center md:pb-8 pb-4">
            <h5 class="text-lg font-medium leading-5 text-[#272727]">Blog List</h5>
            @hasPermission('create_blogs')
            <a href="{{url('blogs/add')}}" class="text-white bg-[#116aef] rounded-md py-1.5 px-3 text-sm links-shadow">Add Blog</a>
            @endhasPermission
        </div>
        <div class="rounded-md overflow-hidden border border-[#cdd6dc] w-full">
            <div class="w-full overflow-x-auto">
                @if($blogs->isEmpty())
                <p class="text-red-500 text-center">No blog found.</p>
                @else
                <table
                    class="w-full border-collapse m-0 align-middle text-[#31373d] text-sm text-left table-auto doctor-list-table">
                    <thead class="align-bottom">
                        <tr class="">
                            <th class="p-2 pr-7 font-semibold truncate relative">
                                #
                            </th>
                            <th class="p-2 pr-7 font-semibold truncate relative">
                                Title
                            </th>
                            <th class="p-2 pr-7 font-semibold truncate relative">
                                Status
                            </th>
                            @if(auth()->check() && (auth()->user()->hasPermission('edit_blogs') || auth()->user()->hasPermission('delete_blogs')))
                            <th class="p-2 pr-7 font-semibold truncate relative">
                                Actions
                            </th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($blogs as $index => $blog)
                        <tr>
                            <td class="p-2 truncate">00{{$index+1}}</td>
                            <td class="p-2 truncate">{{$blog->title}}</td>
                            <td class="p-2 flex items-center w-max truncate">
                                <span class="inline-flex items-center rounded-md px-2 py-1 text-xs font-medium {{ $blog->status == 'active' ? 'text-green-700' : 'text-red-700' }} ring-inset">{{ $blogStatuses[$blog->status]}}</span>
                            </td>
                            <td class="p-2 truncate">
                                <div class="flex items-center gap-1">
                                    @hasPermission('edit_blogs')
                                    <a href='{{ url("blogs/$blog->id/edit") }}'
                                        class="w-7 h-7 rounded-md border border-[#0ebb13] hover:bg-[#0ebb13] flex justify-center items-center group links-shadow">
                                        <img src="{{asset('public/assets/images/svg/edit-box-line.svg')}}" alt="edit"
                                            class="h-4 w-4 opacity-70 group-hover:invert group-hover:brightness-0 group-hover:opacity-100">
                                    </a>
                                    @endhasPermission
                                    @hasPermission('delete_blogs')
                                    <a href='{{ url("blogs/$blog->id/delete") }}'
                                        class="w-7 h-7 rounded-md border border-[#ff5a39] hover:bg-[#ff5a39] flex justify-center items-center group links-shadow">
                                        <img src="{{asset('public/assets/images/svg/delete-bin.svg')}}" alt="delete"
                                            class="h-4 w-4 opacity-70 group-hover:invert group-hover:brightness-0 group-hover:opacity-100">
                                    </a>
                                    @endhasPermission
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection