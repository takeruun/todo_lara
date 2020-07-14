@extends('layout')

@section('styles')
  @include('share.flatpickr.styles')
@endsection

@section('content')
    <div class="container">
      <div class="calender">
        <div class="calender-title">カレンダー</div>
        <table class="calender-table">
          <thead class="weeks">
            <tr>
              @foreach (['日', '月', '火', '水', '木', '金', '土'] as $dayOfWeek)
                @if ($dayOfWeek == '日')
                  <th class="week" style="color:plum">{{ $dayOfWeek }}</th>
                @elseif ($dayOfWeek == '土')
                  <th class="week" style="color: cornflowerblue">{{ $dayOfWeek }}</th>
                @else
                  <th class="week">{{ $dayOfWeek }}</th>
                @endif
              @endforeach
            </tr>
            @foreach ($weeks as $week)
              <tr>
                @foreach ($week as $day)
                  @if ($year.'-'.$month.'-'.strip_tags($day) == $today_info)
                    <td class="today">
                  @else
                    <td>
                  @endif
                      {!! $day !!}
                    @foreach ($all_tasks as $task)
                      @if ($year.'/'.$month.'/'.strip_tags($day) == $task->formatted_due_date)
                        <div>{{ $task->title }}</div>
                      <a href="{{ route('tasks.edit', ['folder' => $task->folder_id, 'task' => $task->id] ) }}">編集</a>
                      @endif
                    @endforeach
                    </td>
                @endforeach
              </tr>
            @endforeach
          </thead>
        </table>
        <div class="switch-calender">
          <span class="select-prev"><a href="{{ route('calenders.index', ['year' => $year, 'month' => $month-1 ]) }}">前月</a></span>
          <span class="select-prev"><a href="{{ route('calenders.index', ['year' => $year, 'month' => $month+1 ]) }}">後月</a></span>
        </div>
      </div>
    </div>
@endsection