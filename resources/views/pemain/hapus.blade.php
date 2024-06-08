@extends('layouts.app')

@section('title')
Hapus Pemain
@endsection

@section('content')
<h3>Hapus Pemain</h3>
<div class="form-login">
  <h4>Ingin Menghapus Data ?</h4>
  <button type="submit" class="btn btn-simpan" name="hapus" style="width: 40%; margin: 20px auto;">
    <a href={{ url('/pemain/destroy/' . $pemain->id_pemain ) }}>
      Yes
    </a>
  </button>
  <button type="submit" class="btn btn-simpan" name="tidak" style="width: 40%; margin: 20px auto;">
    <a href="/pemain">
      No
    </a>
  </button>
</div>
@endsection
