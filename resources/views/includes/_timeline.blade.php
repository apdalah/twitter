<div class="border border-gray-300 rounded-lg">
    @forelse ($tweets as $tweet)
        @include('includes/_tweet')
    @empty
        <p class="p-4">No tweets yet.</p>
    @endforelse

    {{ $tweets->links() }}
</div>
