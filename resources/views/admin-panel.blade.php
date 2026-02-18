<x-layout>
    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @endpush

    @include('layouts.admin-dashboard')

        @include('layouts.admin-sidebar')
</x-layout>