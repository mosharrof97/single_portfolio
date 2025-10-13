@if(Session::has('error'))
<div class="alert alert-danger d-flex justify-content-between" role="alert" id="danger-alert">
    <h5>{{ Session::get('error') }}</h5>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(Session::has('success'))
<div class="alert alert-success d-flex justify-content-between" role="alert" id="success-alert">
    <h5>{{ Session::get('success') }}</h5>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(() => {
            const successAlert = document.getElementById('success-alert');
            const dangerAlert = document.getElementById('danger-alert');

            if (successAlert) successAlert.remove();
            if (dangerAlert) dangerAlert.remove();
        }, 10000);
    });

</script>
