<div class="overflow-x-auto pb-4">
    <div class="inline-block">

        {{-- Month labels --}}
        <div class="flex ml-10 mb-1">
            <div class="w-10"></div> {{-- spacer for weekday labels column --}}
            <div class="flex gap-[2px]">
                @foreach ($columns as $i => $col)
                    <div class="w-4 text-xs leading-4 text-gray-600 dark:text-gray-400 text-center">
                        {{ $monthLabels[$i] ?? '' }}
                    </div>
                @endforeach
            </div>
        </div>

        <div class="flex">
            {{-- Weekday labels column --}}
            <div class="mr-2 flex flex-col justify-start items-end text-xs text-gray-600 dark:text-gray-400"
                 style="height: calc(7 * 1rem + 6 * 2px)"> {{-- try to match cell heights --}}
                @for ($r = 0; $r < 7; $r++)
                    <div class="h-4 leading-4" style="line-height: 1rem;">
                        @if (isset($weekdayPositions[$r]))
                            {{ $weekdayPositions[$r] }}
                        @endif
                    </div>
                    @if ($r < 6)
                        <div class="h-[2px]"></div>
                    @endif
                @endfor
            </div>

            <div class="flex gap-[2px]">
                @foreach ($columns as $col)
                    <div class="flex flex-col gap-[2px]">
                        @foreach ($col as $cell)
                            <div
                                class="w-4 h-4 rounded-sm relative group transition-transform duration-150 transform"
                                style="background-color: var(--heatmap-{{ $levelForCount($cell['count']) }}"
                                aria-label="{{ $cell['date'] . ' — ' . $cell['count'] }} {{ __('github.contributions') }}"
                                title="{{ $cell['date'] . ' — ' . $cell['count'] }} {{ __('github.contributions') }}"
                            >
                                <div class="absolute inset-0 pointer-events-none group-hover:scale-125 group-hover:z-10"></div>
                                <div class="hidden group-hover:block absolute z-50 gh-heatmap-tooltip -top-8 left-1/2 -translate-x-1/2">
                                    <div class="text-xs">{{ \Carbon\Carbon::parse($cell['date'])->format('j M Y') }}</div>
                                    <div class="text-sm font-semibold">{{ $cell['count'] }} contribution{{ $cell['count'] === 1 ? '' : 's' }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</div>
