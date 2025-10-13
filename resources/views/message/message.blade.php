<div class="">
    @if (session('success'))
        <div class="alert alert-success">
            <span class="text-success">{{ session('success') }}</span>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            <span class="text-danger">{{ session('error') }}</span>
        </div>
    @endif
</div>