@extends('layouts.app')

@section('content')
<div class="content-page ScrollStyle">
         <div class="content">
            <!-- Start Content-->
            <div class="container-fluid">
               <div class="row">
                  <div class="col-12">
                     <div class="page-title-box">                           
                           <!-- <h4 class="page-title">Daftar Pengguna Bhaharu</h4> -->
                     </div>
                  </div>

                  <div class="row">
                  <form method="POST" action="{{ route('register') }}">
                        @csrf
                  <div class="col-xl-12 col-lg-12">                    
                                <div class="card card-h-100">
                                    <div class="d-flex card-header justify-content-between align-items-center">
                                        <h6><i class="mdi mdi-account-plus"> </i>  DAFTAR BAHARU</h6>                                                                          
                                    </div>
                                    <div class="card-body pt-0">

                                    <div class="kategori">
                                          <label style="padding-bottom:10px;">Kategori Pengguna </label><br>
                                          <input type="radio" id="pengguna_jps" name="kategori" value="1" checked>
                                          <label class="diff-category" for="pengguna_jps"><b>Pengguna JPS</b></label><br>
                                          <input type="radio" id="agensi_luar" name="kategori" value="2">
                                          <label class="diff-category" for="agensi_luar"><b>Agensi Luar</b></label>
                                    </div>
                                    <div class="row input-data">
                                       <div class="col-md-6">
                                        <label>Nama</label><br>
                                        <input class="form-control" type="text" name="nama">
                                        @error('nama')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                       </div>
                                       <div class="col-md-6">
                                        <label>No Kod penganalan</label><br>
                                        <input class="form-control" type="text" name="no_kod_penganalan"> 
                                        @error('no_kod_penganalan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                       </div>
                                    </div>
                                    <div class="row input-data">
                                       <div class="col-md-6">
                                        <label>Emel Rasmi</label><br>
                                        <input class="form-control" type="email" name="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                       </div>
                                       <div class="col-md-6">
                                        <label>No. Telefon</label><br>
                                        <input class="form-control" type="text" name="no_telefon"> 
                                        @error('no_telefon')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                       </div>
                                    </div>
                                    <div class="row input-data">
                                       <div class="col-md-6">
                                        <label>Jawatan</label><br>                                        
                                        <select class="form-select" name="jawatan">
                                             <option value=""> - Tidak Berkenan - </option>
                                             @foreach ($jawatans as  $jawatan)
                                                <option value="{{$jawatan->id}}">{{$jawatan->nama_jawatan}}</option>
                                            @endforeach                                                
                                          </select>  
                                        @error('jawatan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                       </div>
                                       <div class="col-md-6">
                                        <label>Gred</label><br>                                        
                                        <select class="form-select" name="gred">
                                             <option value=""> - Tidak Berkenan - </option>
                                             @foreach ($gredJawatans as  $gredJawatan)
                                                <option value="{{$gredJawatan->id}}">{{$gredJawatan->nama_gred}}</option>
                                            @endforeach                                                
                                          </select>   
                                        @error('gred')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                       </div>
                                    </div>
                                    <div class="row input-data">
                                       <div class="col-md-12">
                                        <label>Kementerian</label><br>
                                        <select class="form-select form-control-light" name="kementerian">                                            
                                          <option value="1">Kementerian Alam Sekitar don Air(KASA)</option>                                          
                                        </select>
                                        @error('kementerian')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                       </div>
                                    </div>
                                    <div class="row input-data">
                                       <div class="col-md-6">
                                        <label>Jabatan</label><br>
                                          <select class="form-select form-control-light" name="jabatan">
                                          <option value=""> - Tidak Berkenan - </option>
                                          @foreach ($jabatans as  $jabatan)
                                            <option value="{{$jabatan->id}}">{{$jabatan->nama_jabatan}}</option>
                                            @endforeach                                             
                                          </select>
                                          @error('jabatan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                       </div>
                                       <div class="col-md-6">
                                        <label>Bahagian</label><br>
                                        <select class="form-select form-control-light" name="bahagian">
                                            <option value=""> - Tidak Berkenan - </option>
                                            @foreach ($bahagians as  $bahagian)
                                                <option value="{{$bahagian->id}}">{{$bahagian->nama_bahagian}}</option>
                                            @endforeach                                            
                                          </select> 
                                          @error('bahagian')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror                                      </div>
                                    </div>
                                    <div class="row input-data">
                                       <div class="col-md-6">
                                        <label>Negeri</label><br>
                                          <select class="form-select form-control-light" name="negeri">
                                             <option value=""> - Tidak Berkenan - </option>
                                             @foreach ($negeris as  $negeri)
                                                <option value="{{$negeri->id}}">{{$negeri->nama_negeri}}</option>
                                            @endforeach                                                
                                          </select>
                                          @error('negeri')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                       </div>
                                       <div class="col-md-6">
                                        <label>Daerah</label><br>
                                          <select class="form-select" name="daerah">
                                             <option value=""> - Tidak Berkenan - </option>
                                             @foreach ($daerahs as  $daerah)
                                                <option value="{{$daerah->id}}">{{$daerah->nama_daerah}}</option>
                                            @endforeach                                                
                                          </select>   
                                          @error('daerah')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror                                   
                                       </div>
                                    </div>
                                    <div class="row input-data">
                                       <div class="col-md-6">
                                          <label>Gambar Profil</label><br>
                                          <div class="drop-zone">
                                             <span class="drop-zone__prompt"><b><i class="mdi mdi-cloud-upload"></i> <br>Drop files here or click to upload</b></span>
                                             <input type="file" name="myFile" class="drop-zone__input">
                                             @error('myFile')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                          </div>
                                       </div>
                                       <div class="col-md-6" id="show-me">
                                          <label>Dokumen Sokongan</label><br>
                                          <div class="drop-zone">
                                             <span class="drop-zone__prompt"><b><i class="mdi mdi-cloud-upload"></i> <br>Drop files here or click to upload</b></span>
                                             <input type="file" name="myFilesupport" class="drop-zone__input">
                                             @error('myFilesupport')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <label>Catatan</label><br>
                                          <textarea class="form-control"  name="catatan" rows="3"></textarea>
                                          @error('catatan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                       </div>
                                    </div><br>
                                    <div class="row input-data">
                                       <div class="col-md-6">
                                       <button type="button" class="btn btn-danger" style="float:right">Kembali</button>
                                       </div>
                                       <div class="col-md-6">
                                       <button type="submit" class="btn btn-primary">Simpan</button>
                                       </div>
                                    </div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
</form>

                  </div>
               </div>
            </div>
            <!-- End Content-->
         </div>
      </div>

@endsection
