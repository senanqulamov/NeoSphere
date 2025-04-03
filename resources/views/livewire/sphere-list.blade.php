<div>
    <div class="p-4 bg-black-50">
        <h2 class="text-lg font-bold mb-4 text-white-700 pb-2 relative">
            Spheres List
            <div id="scroll-indicator-spheres" class="absolute bottom-0 left-0 h-1 bg-blue-500"
                style="width: 0%; transition: width 0.5s ease;"></div>
        </h2>
        <div id="scrollable-container-spheres"
            class="max-h-80 overflow-y-scroll border border-black-50 rounded-md p-2 bg-gray shadow-md relative scrollbar-hidden">
            <ul class="space-y-2">
                @foreach ($spheres as $sphere)
                    <li wire:click="selectSphere('{{ $sphere->id }}')"
                        class="py-2 px-4 bg-gray shadow-sm rounded-md hover:cursor-pointer transform transition-all duration-500 ease-in-out group hover:bg-black/55 hover:text-white hover:shadow-xl">
                        <div class="flex justify-between items-center">
                            <span class="font-medium text-white-800 group-hover:text-white flex gap-2">
                                {{ $sphere->name }}
                                <p>
                                    <span class="inline-block text-white text-xs font-bold px-2 py-1 rounded"
                                        style="background-color: {{ $sphere->type === 'private' ? '#164e63' : '#14532d' }};">
                                        {{ $sphere->type ?? 'N/A' }}
                                    </span>
                                </p>
                            </span>
                            <span class="text-sm text-cyan-300">{{ $sphere->created_at->format('d F Y') }}</span>
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
            const scrollableContainer = document.getElementById('scrollable-container-spheres');
            const scrollIndicator = document.getElementById('scroll-indicator-spheres');

            scrollableContainer.addEventListener('scroll', () => {
                const scrollHeight = scrollableContainer.scrollHeight - scrollableContainer.clientHeight;
                const scrollTop = scrollableContainer.scrollTop;
                const scrollPercentage = (scrollTop / scrollHeight) * 100;
                scrollIndicator.style.width = `${scrollPercentage}%`;
            });
        });

        function loadDetails(url) {
            window.location.href = url;
        }
    </script>
</div>
