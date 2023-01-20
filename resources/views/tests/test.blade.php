test<br>

// MVCモデルの記述方法2
@foreach($values as $value)
{{ $value->id }}<br>
{{ $value->text }}<br>
@endforeach