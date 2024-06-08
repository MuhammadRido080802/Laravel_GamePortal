@extends('layouts.app')

@section('title')
Tambah Pemain
@endsection

@section('content')
<style>
  .form-login {
    max-width: 400px;
    margin: auto;
  }

  label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
  }

  .input {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
  }

  .btn-simpan {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    width: 100%;
  }

  .btn-simpan:hover {
    background-color: #0056b3;
  }

  .error-message {
    font-size: 10px;
    color: red;
    margin-top: 5px;
  }

  h3 {
    text-align: center;
  }
</style>

<h3>Input Pemain</h3>
<div class="form-login">
  <form action="{{ url('/pemain/store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div style="text-align: left;">
      <label for="nama">Nama</label>
      <input class="input" type="text" name="nama" id="nama" placeholder="Nama" value="{{ old('nama') }}" />
      @error('nama')
      <p class="error-message">{{ $message }}</p>
      @enderror

      <label for="nip">NIP</label>
      <input class="input" type="text" name="nip" id="nip" placeholder="NIP" value="{{ old('nip') }}" />
      @error('nip')
      <p class="error-message">{{ $message }}</p>
      @enderror

      <label for="tier">Tier</label>
      <textarea class="input" name="tier" id="tier" placeholder="Tier">{{ old('tier') }}</textarea>
      @error('tier')
      <p class="error-message">{{ $message }}</p>
      @enderror
      
      <label for="game_main">Game Yang Di Mainkan</label>
      <input class="input" type="text" name="game_main" id="game_main" placeholder="Game Yang Di Mainkan" value="{{ old('game_main') }}" />
      @error('game_main')
      <p class="error-message">{{ $message }}</p>
      @enderror

      <label for="device">Device</label>
      <input class="input" type="text" name="device" id="device" placeholder="Device" value="{{ old('device') }}" />
      @error('device')
      <p class="error-message">{{ $message }}</p>
      @enderror
    </div>

    <button type="submit" class="btn btn-simpan" name="simpan">Simpan</button>
  </form>
</div>
@endsection
