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
                  @if (date('Y').'-'.date('m').'-'.strip_tags($day) == $today_info)
                    <td class="today">{!! $day !!}
                    </td>
                  @else
                    <td>{!! $day !!}
                    </td>
                  @endif
                @endforeach
              </tr>
            @endforeach
          </thead>
        </table>
      </div>
    </div>
@endsection