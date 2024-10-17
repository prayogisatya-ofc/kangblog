@props(['icon', 'title'])

<div class="card">
    <div class="card-header">
        <i class="fa-solid fa-{{ $icon }} me-1"></i>
        {{ $title }}
    </div>

    <div class="card-body">
        {{ $slot }}
    </div>
</div>