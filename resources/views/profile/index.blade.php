@component('components.app')
    <header class="mb-6 relative">
        <div class="relative">
            <img src="/images/default-profile-banner.jpg"
                  alt=""
                  class="mb-2"
            >

            <img src="{{ $user->avatar }}"
                 alt=""
                 class="rounded-full mr-2 absolute bottom-0 transform -translate-x-1/2 translate-y-1/2"
                 style="left: 50%"
                 width="150"
            >
        </div>

        <div class="flex justify-between items-center mb-6">
            <div style="max-width: 270px">
                <h2 class="font-bold text-2xl mb-0">{{ $user->first_name }} {{ $user->last_name }}</h2>
                <p class="text-sm">Joined {{ $user->created_at->diffForHumans() }}</p>
            </div>

            <div class="flex">
                @can ('edit', $user)
                    <a href="{{ route('edit-profile', current_user()) }}"
                       class="rounded-full border border-gray-300 py-2 px-4 text-black text-xs mr-2"
                    >
                        Edit Profile
                    </a>
                @endcan
                
                @component('components.follow-button', ['user' => $user]))@endcomponent
            </div>
        </div>

        <p class="text-sm">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus dolorum, nemo assumenda, iste ipsam aut modi corporis quia sit voluptatum dolores sequi aspernatur culpa numquam debitis vitae officiis consequuntur sapiente?
        </p>


    </header>

    @include('includes/_timeline', [
        'tweets' => $tweets    
    ])

@endcomponent
