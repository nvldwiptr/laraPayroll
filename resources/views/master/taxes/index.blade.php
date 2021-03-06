@extends('layouts.app')

@section('title')
    Masster
@endsection

@section('breadcrumb')
    <li>Master</li>
    <li class="active">Perpajakan</li>
@endsection

@section('content-title')
    <h1>
        {{ $title }}
    </h1>
@endsection

@section('content-body')
    <div class="row">
        <div class="col-md-12 col-xs-12"><!-- PAGE CONTENT BEGINS -->
            <div class="row">
                <div class="col-xs-12">
                    <a href="{{ route('taxes.create') }}"><span class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Baru</span></a>
                    <br><br>
                    <table id="simple-table" class="table  table-bordered table-hover">

                        <thead>
                            <tr>
                                <th class="detail-col">No.</th>
                                <th class="hidden-480">Nama Golongan</th>
                                <th class="hidden-480">Nominal</th>
                                <th class="hidden-480">Keterangan</th>
                                <th class="hidden-480">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php $i = 1; @endphp
                            @if(count($taxes))
                            @foreach ($taxes as $row)
                            <tr>
                                <td class="hidden-480">{{ $i++ }}</td>
                                <td class="hidden-480">{{ $row->name }}</td>
                                <td class="hidden-480">{{ $row->value }}</td>
                                <td class="hidden-480">{{ $row->description }}</td>
                                <td>
                                    <div class="hidden-sm hidden-xs btn-group">
                                        <form action="{{ route('taxes.destroy', $row->id) }}" method="post">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <a href="{{ route('taxes.edit', $row->id) }}" class="btn btn-xs btn-info">
                                                <i class="ace-icon fa fa-pencil bigger-120"></i>
                                            </a>
                                            <button class="btn btn-xs btn-danger" onClick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td class="hidden-480 text-center" colspan="3">Tidak ada data tersedia. <i class="fa fa-bell"></i></td>
                            </tr>
                            @endif
                        </tbody>

                    </table>
                    <div class="pull-right">
                        {{ $taxes->links() }}
                    </div>
                </div><!-- /.span -->
            </div><!-- /.row -->
        </div>
    </div>
@endsection
