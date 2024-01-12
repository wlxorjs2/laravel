@include('nav_bar')
<br>
<br>
<br>
<br>
<br>
<div class="text-center">
    <br>
    <h1>멤버 리스트</h1>
</div>

<table style="width:100%; text-align: left; border-collapse: collapse;">
  <tr>
    <th style="border: 1px solid #dddddd; padding: 8px;">이름</th>
    <th style="border: 1px solid #dddddd; padding: 8px;">아이디</th>
    <th style="border: 1px solid #dddddd; padding: 8px;">비밀번호</th>
    <th style="border: 1px solid #dddddd; padding: 8px;">이메일</th>
    <th style="border: 1px solid #dddddd; padding: 8px;">전화번호</th>
    <th style="border: 1px solid #dddddd; padding: 8px;">권한</th>
  </tr>
@foreach ($members as $member)
  <tr>
    <td style="border: 1px solid #dddddd; padding: 8px;"><a href="{{ route('admin.show', $member->id) }}">{{ $member->name }}</a></td>
    <td style="border: 1px solid #dddddd; padding: 8px;">{{ $member->uid }}</td>
    <td style="border: 1px solid #dddddd; padding: 8px;">{{ $member->pwd }}</td>
    <td style="border: 1px solid #dddddd; padding: 8px;">{{ $member->email }}</td>
    <td style="border: 1px solid #dddddd; padding: 8px;">{{ $member->tel }}</td>
    <td style="border: 1px solid #dddddd; padding: 8px;">
        @if ($member->rank == 0)
            사용자
        @elseif ($member->rank == 1)
            관리자
        @else
            미정
        @endif
    </td>
  </tr>
@endforeach
</table>
@include('footer')
