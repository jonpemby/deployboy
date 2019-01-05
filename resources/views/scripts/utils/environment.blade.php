@if(isset($environment))

@foreach($environment as $env => $value)
echo "{{ $env }}={{ $value }}" >> /etc/environment
@endforeach

@endif

source /etc/environment
