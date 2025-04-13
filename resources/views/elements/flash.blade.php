@if (session('success'))
<div class="flash-alert relative px-4 py-3 rounded bg-green-100 border border-green-400 text-green-700 mb-4" role="alert">
    <strong class="font-bold">Success!</strong>
    <span class="block sm:inline">{{ session('success') }}</span>
    <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer" onclick="this.parentElement.remove()">
        <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20">
            <title>Close</title>
            <path
                d="M14.348 14.849a1.2 1.2 0 01-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 11-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 111.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 111.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 010 1.698z" />
        </svg>
    </span>
</div>
@endif

@if (session('error'))
<div class="flash-alert relative px-4 py-3 rounded bg-red-100 border border-red-400 text-red-700 mb-4" role="alert">
    <strong class="font-bold">Error!</strong>
    <span class="block sm:inline">{{ session('error') }}</span>
    <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer" onclick="this.parentElement.remove()">
        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20">
            <title>Close</title>
            <path
                d="M14.348 14.849a1.2 1.2 0 01-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 11-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 111.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 111.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 010 1.698z" />
        </svg>
    </span>
</div>
@endif

<script>
    setTimeout(function () {
        document.querySelectorAll('.flash-alert').forEach(function (el) {
            el.classList.add('opacity-0', 'transition-opacity', 'duration-1000');
            setTimeout(() => el.remove(), 1000); // remove after fade
        });
    }, 3000);
</script>
