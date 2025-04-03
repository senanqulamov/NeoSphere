<div>
    <div class="p-4 bg-black-50">
        <h2 class="text-lg font-bold mb-4 text-white-700 pb-2 relative">
            User List
            <div id="scroll-indicator" class="absolute bottom-0 left-0 h-1 bg-blue-500"
                style="width: 0%; transition: width 0.5s ease;"></div>
        </h2>
        <div id="scrollable-container"
            class="max-h-80 overflow-y-scroll border border-black-50 rounded-md p-2 bg-gray shadow-md relative scrollbar-hidden">
            <ul class="space-y-2">
                @foreach ($users as $user)
                    <li
                        class="py-2 px-4 bg-gray shadow-sm rounded-md hover:cursor-pointer transform transition-all duration-500 ease-in-out group hover:bg-black/55 hover:text-white hover:shadow-xl">
                        <div class="flex justify-between items-center">
                            <span class="font-medium text-white-800 group-hover:text-white">
                                {{ $user->name }}
                                <p>({{ $user->karma_points }}) <span class="text-sm text-red-300">krm</span></p>
                            </span>
                            <span class="text-sm text-cyan-300">{{ $user->created_at->format('d F Y') }}</span>
                        </div>
                        <div
                            class="hidden group-hover:block mt-2 text-sm text-gray-700 opacity-0 transition-opacity duration-500 ease-in-out group-hover:opacity-100 group-hover:text-white">
                            <div class="bg-cyan-900/35 p-3 rounded-md">
                                <p class="font-semibold text-white mb-2">Details:</p>
                                <hr class="my-2 border-gray-300">
                                <p>Email: {{ $user->email ?? 'N/A' }}</p>
                                <p>Title: {{ $user->title ?? 'N/A' }}</p>
                                <p>Address: {{ $user->address ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <style>
        .scrollbar-hidden::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hidden {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }

        /* Added to remove extra space */
        #scrollable-container-spheres {
            margin-bottom: 0;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const scrollableContainer = document.getElementById('scrollable-container');
            const scrollIndicator = document.getElementById('scroll-indicator');

            scrollableContainer.addEventListener('scroll', () => {
                const scrollHeight = scrollableContainer.scrollHeight - scrollableContainer.clientHeight;
                const scrollTop = scrollableContainer.scrollTop;
                const scrollPercentage = (scrollTop / scrollHeight) * 100;
                scrollIndicator.style.width = `${scrollPercentage}%`;
            });
        });
    </script>
</div>
