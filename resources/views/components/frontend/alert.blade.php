@props(['type'])

<div {{ $attributes->merge(['class' => 'alert alert-dismissible fade show']) }} role="alert">
    {{ session($type) }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
