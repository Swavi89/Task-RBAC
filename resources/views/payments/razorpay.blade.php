@extends('admin-layout')
@section('title', 'Payment Form')
@section('content')
<div
    class="py-2 px-6 sticky top-[50px] flex gap-6 justify-between items-center bg-[#f6f9fb] z-10 container-shadow">
    <ul class="list-none flex items-center">
        <li class="flex items-center">
            <div class="pr-4 mr-4 border-r border-[#dde2ee]">
                <img src="{{asset('public/assets/images/svg/home.svg')}}" alt="home" class="w-6 h-6 ">
            </div>
            <a href="{{url('/razorpay')}}" class="text-[#4c545e] text-sm">Payments</a>
        </li>
        <li class="flex items-center">
            <div class="px-2">
                <img src="{{asset('public/assets/images/svg/arrow-right.svg')}}" alt="home" class="w-6 h-6 ">
            </div>
            <span class="text-[#116aef] text-sm">Add Payment</span>
        </li>
    </ul>
</div>
<div class="sm:p-6 p-4">
    @include('elements.flash')
    <div class="bg-white p-4 rounded-lg w-full container-shadow mb-4">
        <h5 class="text-lg font-medium leading-5 pb-2 text-[#272727]">Payments</h5>
        <div class="mt-6">
            <form action="{{route('razorpay.pay')}}" method="POST" autocomplete="off">
                @csrf
                {{-- <input type="hidden" name="id" value="{{ $blog->id }}"> --}}
                <div class="">
                    <div class="flex flex-wrap gap-4 items-center w-full text-[#272727] text-sm">
                        <div class="sm:w-[48.5%] w-full">
                            <label for="fname" class="mb-2 inline-block">Amount</label>
                            <div class="w-full h-9 relative flex items-center">
                                <span class="h-full flex justify-center items-center rounded-l-lg py-1.5 px-3 border border-[#cdd6dc]">
                                    <img src="{{asset('public/assets/images/form-icons/account-pin-circle-line.svg')}}" alt="account" class="w-5">
                                </span>
                                <input type="text" name="amount" minlength="1" maxlength="50" placeholder="e.g. Enter Amount In Rupees" class="h-full py-1.5 px-3 rounded-r-lg border border-[#cdd6dc] focus-visible:outline-0 focus:border-[#88b5f7] w-[calc(100%-46px)]" value="" fdprocessedid="ubk2e7">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-8 flex items-center gap-2 justify-end">
                    <button type="submit"
                        class="py-1.5 px-3 text-sm border border-[#116aef] bg-[#116aef] text-white rounded-md links-shadow">
                        Pay
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

