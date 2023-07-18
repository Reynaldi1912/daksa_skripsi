@extends('layouts.app-admin')

@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
        <div class="col-6">
            <h3>Ulasan</h3>
        </div>
        <div class="col-6">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">                                       
                <svg class="stroke-icon">
                    <use href="../cuba/assets/svg/icon-sprite.svg#stroke-home"></use>
                </svg></a></li>
            <li class="breadcrumb-item active">Ulasan</li>
            </ol>
        </div>
        </div>
    </div>
</div>
    <!-- Container-fluid starts-->
<div class="container-fluid email-wrap bookmark-wrap todo-wrap">
    <div class="row">
        <div class="col-xl-3 xl-30 box-col-12">
        <div class="email-sidebar md-sidebar"><a class="btn btn-primary email-aside-toggle md-sidebar-toggle">To Do filter</a>
            <div class="email-left-aside md-sidebar-aside">
            <div class="card"> 
                <div class="card-body"> 
                <div class="email-app-sidebar left-bookmark custom-scrollbar">
                    <ul class="nav main-menu">
                        <li class="nav-item">
                            <button class="btn-primary badge-light d-block btn-mail w-100"><i class="me-2" data-feather="check-circle"> </i>Progress Ulasan</button>
                        </li>
                        <li class="nav-item"> <a href="/master-ulasan"><span class="iconbg badge-light-primary"><i data-feather="activity"></i></span><span class="title ms-2">Semua Proses</span></a></li>
                        <li class="nav-item"><a href="{{route('masterUlasanDisetujui')}}"><span class="iconbg badge-light-success"><i data-feather="check-circle"></i></span><span class="title ms-2">Disetujui </span><span class="badge badge-success">
                        @foreach ($result as $item)
                            @if ($item->status_text === 'Disetujui')
                                {{ $item->count }}
                            @endif
                        @endforeach
                        </span></a></li>
                        <li class="nav-item"><a href="{{route('masterUlasanDipending')}}"><span class="iconbg badge-light-info"><i data-feather="coffee"></i></span><span class="title ms-2">Belum Disetujui</span><span class="badge badge-danger">
                        @foreach ($result as $item)
                            @if ($item->status_text === 'Pending')
                                {{ $item->count }}
                            @endif
                        @endforeach
                        </span></a></li>
                        <li class="nav-item"><a href="{{route('masterUlasanDitolak')}}"><span class="iconbg badge-light-danger"><i data-feather="x"></i></span><span class="title ms-2">Tidak Setuju</span><span class="badge badge-primary">
                        @foreach ($result as $item)
                            @if ($item->status_text === 'Ditolak')
                                {{ $item->count }}
                            @endif
                        @endforeach
                        </span></a></li>
                    </ul>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="col-xl-9 xl-70 box-col-12">
        <div class="card">
            <div class="card-body">
            <div class="todo">
                <h5>{{$title}}</h5>
                <div class="todo-list-wrapper">
                <div class="todo-list-container">
                    <div class="mark-all-tasks pb-5">
                    </div>
                    <div class="todo-list-body">
                    <div class="todo-list-footer"> 
                        <div class="new-task-wrapper mb-4">
                        <textarea id="new-task" placeholder="Enter new task here. . ."></textarea><span class="btn btn-danger cancel-btn" id="close-task-panel">Close</span><span class="btn btn-success ms-3 add-new-task-btn" id="add-task">Add Task</span>
                        </div>
                    </div>
                        <ul id="todo-list">
                            @foreach($ulasan as $ulasan)
                            <li class="task">
                            <div class="task-container">
                                <h4 class="task-label">{{$ulasan->nama}} - {{$ulasan->ulasan}}</h4>
                                @if($ulasan->status == 0 )
                                    <div class="d-flex align-items-center gap-4"><span class="badge badge-light-primary">Belum DiSetujui</span>
                                @elseif($ulasan->status == 1)
                                    <div class="d-flex align-items-center gap-4"><span class="badge badge-light-success">DiSetujui</span>
                                @elseif($ulasan->status == 2)
                                    <div class="d-flex align-items-center gap-4"><span class="badge badge-light-danger">Tidak DiSetujui</span>
                                @endif
                                <h5 class="assign-name m-0">{{date("d M Y", strtotime($ulasan->created_at))}}</h5>
                                    <span class="task-action-btn">
                                    @if($ulasan->status == 0)
                                        <a href="{{route('ApproveUlasan',$ulasan->id)}}" class="large" title="Mark Complete">
                                            <i class="icon">
                                                <i class="icon-check"></i>
                                            </i>
                                        </a>
                                        <a href="{{route('TolakUlasan',$ulasan->id)}}" class="large" title="Mark Complete">
                                            <i class="icon">
                                                <i class="icon-close text-danger"></i>
                                            </i>
                                        </a>
                                    @else
                                        <a href="{{route('DeleteUlasan',$ulasan->id)}}" class="large" title="Delete Task">
                                            <i class="icon">
                                                <i class="icon-trash text-danger"></i>
                                            </i>
                                        </a>
                                    @endif
                                    </span>
                                </div>
                            </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                </div>
                <div class="notification-popup hide">
                <p><span class="task"></span><span class="notification-text"></span></p>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
@endsection
