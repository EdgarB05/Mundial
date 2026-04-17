@if(session('success'))
    <div class="alert alert-success alert-dismissible d-flex align-items-center fade show auto-dismiss-alert" role="alert">
        <i class="fa-solid fa-circle-check"></i>
        <strong class="mx-2">¡Éxito!</strong>
        <span>{{ session('success') }}</span>
        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible d-flex align-items-center fade show auto-dismiss-alert" role="alert">
        <i class="fa-solid fa-circle-exclamation"></i>
        <strong class="mx-2">¡Error!</strong>
        <span>{{ session('error') }}</span>
        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
    </div>
@endif

@if(session('warning') || isset($warning))
    <div class="alert alert-warning alert-dismissible d-flex align-items-center fade show auto-dismiss-alert" role="alert">
        <i class="fa-solid fa-triangle-exclamation"></i>
        <strong class="mx-2">¡Advertencia!</strong>
        <span>{{ session('warning') ?? $warning }}</span>
        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
    </div>
@endif

<script>
    setTimeout(function () {
        document.querySelectorAll('.auto-dismiss-alert').forEach(function (alerta) {
            alerta.classList.remove('show');

            setTimeout(function () {
                alerta.remove();
            }, 500);
        });
    }, 5000);
</script>