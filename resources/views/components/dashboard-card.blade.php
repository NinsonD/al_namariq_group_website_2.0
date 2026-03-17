@props([
    'value' => 0,
    'title' => '',
])
<div class="dashboard-card">
    <div class="dashboard-card-icon">
        <span>
            {{ $slot }}
        </span>
    </div>
    <div class="dashboard-card-content">
        <span class="dashboard-card-subtitle">
            {{ $title }}
        </span>
        <h4 class="dashboard-card-title m-0"> {{ $value }}</h4>
    </div>
</div>
