<?php

namespace App\View\Components;

use App\Services\Github;
use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GithubActivity extends Component
{
    /** @var array<array<array<string, int|string>>> */
    public array $columns = [];
    /** @var array<string> */
    public array $monthLabels = [];
    /** @var array<array<string, int>> */
    public array $current = [];
    /** @var array<int, string> */

    public array $weekdayPositions = [];
    public Closure $levelForCount;

    public function __construct(private readonly Github $gh)
    {
        $this->weekdayPositions = [
            0 => __('github.mon'),
            2 => __('github.wed'),
            4 => __('github.fri')
        ];

        $this->levelForCount = function (int $count): int {
            if ($count >= 20) return 4;
            if ($count >= 10) return 3;
            if ($count >= 5) return 2;
            if ($count >= 1) return 1;
            return 0;
        };
    }

    public function convert(): void
    {
        $all = [];

        foreach ($this->gh->getActivity()->weeks as $week) {
            foreach ($week->days as $day) {
                $d = Carbon::parse($day->date)->format('Y-m-d');
                $all[$d] = $day->count;
            }
        }

        ksort($all);

        $firstDate = Carbon::parse(array_key_first($all))->startOfWeek();
        $lastDate = Carbon::parse(array_key_last($all))->endOfWeek();

        $period = new \DatePeriod($firstDate, new \DateInterval('P1D'), $lastDate->copy()->addDay());

        foreach ($period as $date) {
            $iso = $date->format('Y-m-d');
            $count = $all[$iso] ?? 0;

            $current[] = [
                'date' => $iso,
                'count' => $count,
            ];

            if (count($current) === 7) {
                $this->columns[] = $current;
                $current = [];
            }
        }

        foreach ($this->columns as $i => $col) {
            foreach ($col as $cell) {
                $d = Carbon::parse($cell['date']);
                if ($d->day === 1) {
                    $monthLabels[$i] = $d->format('M');
                    break;
                }
            }
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $this->convert();
        return view('components.github-activity');
    }
}
