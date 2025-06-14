<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Groupe;
use App\Models\LessonTimetable;
use App\Models\Timetable;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // 1. Retrieve all groups
        $groupes = Groupe::all();
        $selectedGroupeId = $request->query('groupe_id', $groupes->first()?->id);

        // 2. Current timetable for selected group
        $today = Carbon::today();
        $currentTimetable = Timetable::where('group_id', $selectedGroupeId)
            ->whereDate('date_start', '<=', $today)
            ->whereDate('date_end', '>=', $today)
            ->first();

        // 3. Total lesson slots in current timetable
        $totalLessonSlots = $currentTimetable
            ? LessonTimetable::where('timetable_id', $currentTimetable->id)->count()
            : 0;

        // 4. Total modules for the group via specialization
        $groupe = Groupe::with('specialization.modules')->find($selectedGroupeId);
        $totalModules = $groupe?->specialization->modules->count() ?? 0;

        // 5. Remaining days until timetable end
        $remainingDays = 0;
        if ($currentTimetable) {
            $end = Carbon::parse($currentTimetable->date_end);
            $remainingDays = max(0, $today->diffInDays($end));
        }

        // 6. Last update timestamp of current timetable
        $lastUpdate = $currentTimetable?->updated_at;

        // 7. Count completed vs incomplete modules
        $statusCounts = ['Completed' => 0, 'Incomplete' => 0];
        if ($groupe) {
            foreach ($groupe->specialization->modules as $module) {
                $minutes = LessonTimetable::join('timetables', 'lesson_timetables.timetable_id', '=', 'timetables.id')
                    ->where('timetables.group_id', $selectedGroupeId)
                    ->where('lesson_timetables.module_id', $module->id)
                    ->sum(DB::raw('TIMESTAMPDIFF(MINUTE, lesson_timetables.time_start, lesson_timetables.time_end)'));

                $hours = round($minutes / 60, 2);
                if ($hours >= $module->hourly_volume) {
                    $statusCounts['Completed']++;
                } else {
                    $statusCounts['Incomplete']++;
                }
            }
        }

        // 8. Progress details per module
        $modulesProgression = $groupe?->specialization->modules->map(function ($module) use ($selectedGroupeId) {
            $minutes = LessonTimetable::join('timetables', 'timetables.id', '=', 'lesson_timetables.timetable_id')
                ->where('lesson_timetables.module_id', $module->id)
                ->where('timetables.group_id', $selectedGroupeId)
                ->sum(DB::raw('TIMESTAMPDIFF(MINUTE, lesson_timetables.time_start, lesson_timetables.time_end)'));

            $hoursDone = round($minutes / 60, 2);
            $progress = $module->hourly_volume
                ? round($hoursDone / $module->hourly_volume * 100)
                : 0;

            return (object) [
                'id' => $module->id,
                'name' => $module->name,
                'hourly_volume' => $module->hourly_volume,
                'hours_done' => $hoursDone,
                'progress' => $progress,
            ];
        }) ?? collect();

        // 9. Return view
        return response()->json([
            'groups'            => $groupes,
            'selectedGroupId'   => $selectedGroupeId,
            'totalLessonSlots'  => $totalLessonSlots,
            'totalModules'      => $totalModules,
            'remainingDays'     => $remainingDays,
            'lastUpdate'        => $lastUpdate,
            'statusCounts'      => $statusCounts,
            'modulesProgression'=> $modulesProgression,
        ]);
    }
}