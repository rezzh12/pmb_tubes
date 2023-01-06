@extends('layouts.master')
@section('title', 'Welcome')
@section('judul', 'Dashboard')
@section('content')



      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$pendaftar}}</h3>

                <p>Jumlah Pendaftar</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$jadwal}}</h3>

                <p>Jumlah Jadwal</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$pembayaran}}</h3>

                <p>Jumlah Pembayar</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$prodi}}</h3>

                <p>Jumlah Prodi</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
         
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
      <div class="card-body">
                        <div class="row">
                        <div class="col-md-6">

                        </div>
                       
                        </div>
                        <div class="col-md-3">
                        @foreach ($user->unreadNotifications as $notification)
                      <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        User dengan email <strong> {{ $notification->data['email']}} </strong> sudah berhasil Login 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" onclick="markAsRead('{{ $notification->id }}');" aria-label="Close"></button>
                      </div>
                       {{ $notification->markAsRead() }} 
                    @endforeach
                </div>
                
            </div>
@stop
@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if(session('status'))
            Swal.fire({
                title: 'Congratulations!',
                text: "{{ session('status') }}",
                icon: 'Success',
                timer: 3000
            })
        @endif
        @if($errors->any())
            @php
                $message = '';
                foreach($errors->all() as $error)
                {
                    $message .= $error."<br/>";
                }
            @endphp
            Swal.fire({
                title: 'Error',
                html: "{!! $message !!}",
                icon: 'error',
            })
        @endif
        function markAsRead(id)
        {
            var fetch_status;
            
            fetch("{{url('admin/home/markAsRead')}}", {
                method: "POST",
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')['content']
                },
                body: JSON.stringify({
                    id : id,
                })
            })
            .catch(function (error){
                console.log(error);
            });  
        }
    </script>
    @stop