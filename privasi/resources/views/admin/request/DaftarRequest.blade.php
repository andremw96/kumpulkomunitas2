@extends('admin.layout')

@section('title', 'Admin Dashboard | Lihat Daftar Request Komunitas')


@section('content')
<section class="content-header">
  <h1>
    Dashboard
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{ url('/admin') }}">Dashboard</a></li>
    <li class="active">Daftar Request</a></li>
  </ol> 
</section>

<section class="content">
  <div>
      <table class="table">
        <thead>
          <tr>
            <th>Username</th>
            <th>Nama Komunitas</th>
            <th>Deskripsi</th>
          </tr>
        </thead>
          <tbody>
          @foreach ($request as $dafrequest)
            @if ( $dafrequest->disetujui === 0 )
              <tr>
                <td><a href="{{ url('/admin/account/' . $dafrequest->user_id) }}"> {{ $dafrequest->username }} </a></td>
                <td><a href="{{ url('admin/request/'. $dafrequest->id) }} "> {{ $dafrequest->namaKomunitas }} </a></td>
                <td> {{ $dafrequest->deskipsi }} </td> 
                @if ( $dafrequest->disetujui === 0 )               
                  <td>
                      <a class="btn btn-primary btn-xs" href="{{ url('/admin/request/create/' .$dafrequest->id)}}"><span class="glyphicon glyphicon-edit"></span> Buatkan Thread</a>
                      <form action="{{ url('/admin/request/' . $dafrequest->id) }}" style="display:inline" method="POST">
                          <input type="hidden" name="_method" value="DELETE" />
                          {{ csrf_field() }}

                          <button onclick="return confirm('Anda yakin akan menolak request ini ?');" class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span> Tolak</button>
                      </form>
                  </td>
                @endif
              </tr>
            @elseif ( $dafrequest->disetujui === 1 )
              <tr class="success">
                <td><a href="{{ url('/admin/account/' . $dafrequest->user_id) }}"> {{ $dafrequest->username }} </a></td>
                <td><a href=" {{ url('admin/request/'. $dafrequest->id) }} ">{{ $dafrequest->namaKomunitas }} </a></td>
                <td> {{ $dafrequest->deskipsi }} </td> 
                @if ( $dafrequest->disetujui === 0 )               
                  <td>
                      <a class="btn btn-primary btn-xs" href="{{ url('/admin/request/create/' .$dafrequest->id)}}"><span class="glyphicon glyphicon-edit"></span> Buatkan Thread</a>
                      <form action="{{ url('/admin/request/' . $dafrequest->id) }}" style="display:inline" method="POST">
                          <input type="hidden" name="_method" value="DELETE" />
                          {{ csrf_field() }}

                          <button onclick="return confirm('Anda yakin akan menolak request ini ?');" class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span> Tolak</button>
                      </form>
                  </td>
                @else
                  <td></td>
                @endif
              </tr>
            @else
              <tr class="danger">
                <td><a href="{{ url('/admin/account/' . $dafrequest->user_id) }}"> {{ $dafrequest->username }} </a></td>
                <td><a href=" {{ url('admin/request/'. $dafrequest->id) }} "> {{ $dafrequest->namaKomunitas }} </a></td>
                <td> {{ $dafrequest->deskipsi }} </td> 
                @if ( $dafrequest->disetujui === 0 )               
                  <td>
                      <a class="btn btn-primary btn-xs" href="{{ url('/admin/request/create/' .$dafrequest->id)}}"><span class="glyphicon glyphicon-edit"></span> Buatkan Thread</a>
                      <form action="{{ url('/admin/request/' . $dafrequest->id) }}" style="display:inline" method="POST">
                          <input type="hidden" name="_method" value="DELETE" />
                          {{ csrf_field() }}

                          <button onclick="return confirm('Anda yakin akan menolak request ini ?');" class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span> Tolak</button>
                      </form>
                  </td>
                @endif
              </tr>
            @endif
          </tbody>
          @endforeach()   
      </table>   
            {{ $request->links() }} 
   </div>
</section>

@endsection()