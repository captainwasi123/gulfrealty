@if ($paginator->hasPages())
<div>
    <p class="text-sm text-gray-700 leading-5 dark:text-gray-400 fs-sm text-nowrap mb-0">
        {!! __('Showing') !!}
        @if ($paginator->firstItem())
            <span class="font-medium">{{ $paginator->firstItem() }}</span>
            {!! __('to') !!}
            <span class="font-medium">{{ $paginator->lastItem() }}</span>
        @else
            {{ $paginator->count() }}
        @endif
        {!! __('of') !!}
        <span class="font-medium">{{ $paginator->total() }}</span>
        {!! __('results') !!}
    </p>
</div>
@else
<div>
    <p class="text-sm text-gray-700 leading-5 dark:text-gray-400 fs-sm text-nowrap mb-0">
        {!! __('Showing') !!}
        <span class="font-medium">{{ $paginator->total() }}</span>
        {!! __('results') !!}
    </p>
</div>

@endif