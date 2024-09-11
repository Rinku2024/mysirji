@extends('frontend.layouts.main')

@section('title', 'Home Page')

@section('frontend.content')

<style>
  input[type="file"] {
    opacity: 0;
}
</style>
<section class="section" style="padding: 150px 0;">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="wrap-content">
            <div class="hero-title">
              <div class="tool-favorite-btn">
                <button aria-label="Add to Favorite" class="btn btn-outline-primary rounded-circle add-fav>
                 <i class=" an an-heart"></i>
                </button>
              </div>
              <h1> PDF to JPG</h1>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, recusandae ex laudantium nobis </p>
            </div>
            <div class="col-md-12 mb-3 align-content-center d-flex">
              <!--<div class="me-auto align-self-center mb-3">-->
              <!--  <span class="text-primary"> Max file size : 1024 MB</span>-->
              <!--</div>-->
              <!--<div class="ms-auto text-end mb-3">-->
              <!--  <span class="px-2">Upto 100MB</span>-->
              <!--  <a href="#" class="btn btn-primary btn-sm rounded-pill" type="button" id="button">Go Pro</a>-->
              <!--</div>-->
            </div>
            <form action="{{route('convert-to-pdf')}}" method="POST" enctype="multipart/form-data">
              @csrf
              {{-- <input type="hidden" name="_token" value="e7aJVzHBV0dJzCF5hS5ILcsM9jgbO6O1C91lkvSB" autocomplete="off"> --}}
              {{-- <input type="hidden" name="_token" value="e7aJVzHBV0dJzCF5hS5ILcsM9jgbO6O1C91lkvSB" autocomplete="off"> --}}
              <input type="hidden" name="MAX_FILE_SIZE" value="8000000"/>
              <input type="file" name="file"/>
              <div class="row">
                <div class="col-md-12 mb-3">
                  <div class="artisan-uploader bg-light rounded uploader-file-uploader">
                    <input id="file-uploader" type="file" name="wordFile" accept=".docx,.doc">
                    <div class="bg-priamary p-2 add-more d-none position-absolute">
                      <label class="btn btn-primary btn-pill" for="file-uploader">+</label>
                    </div>
                    <label for="file-uploader" class="file-drag">
                      <div class="uploader-wrapper">
                        <i class="an an-upload-image"></i>
                        <h3>Drop Image File Here</h3>
                        <div class="uploader-extensions mb-3">
                          <span class="badge text-uppercase" style="color:#333">.doc</span>
                          <span class="badge text-uppercase" style="color:#333">.docx</span>
                        </div>
                        <p>Make "All" files easy to read by converting them to DOCX.</p>
                        <span class="btn btn-dark file-upload-btn">Select a File</span>
                      </div>
                      <div class="files-grid"></div>
                    </label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="text-end">
                    <button type="submit" name="submit" class="btn btn-outline-primary rounded-pill">Convert Now</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection