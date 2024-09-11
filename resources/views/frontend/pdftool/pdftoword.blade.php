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
        <!-- Include the Login Component -->
        @include('components.LoginComponent')

        <div class="row">
            <div class="col-md-12">
                <div class="wrap-content">
                    <div class="hero-title">
                        <div class="tool-favorite-btn">
                            <button aria-label="Add to Favorite" class="btn btn-outline-primary rounded-circle add-fav>
                                <i class=" an an-heart"></i>
                            </button>
                        </div>
                        <h1>PDF To Word</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, recusandae ex laudantium nobis </p>
                    </div>
                    <form id="convertForm" action="{{route('pdf.to.word')}}" method="POST" enctype="multipart/form-data">
                       {{ csrf_field() }}
                        <input type="hidden" name="MAX_FILE_SIZE" value="8000000"/>
                        <input type="file" name="file"/>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="artisan-uploader bg-light rounded uploader-file-uploader">
                                    <input id="file-uploader" type="file" name="file" accept=".pdf">
                                    <input type="hidden" name="conversionType" value="pdf_to_doc">
                                    <label for="file-uploader" class="file-drag">
                                        <div class="uploader-wrapper">
                                            <i class="an an-upload-image"></i>
                                            <h3>Drop Pdf File Here</h3>
                                            <div class="uploader-extensions mb-3">
                                                <span class="badge text-uppercase" style="color:#333">.pdf</span>
                                            </div>
                                            <p>Make "All" files easy to write by converting them to word.</p>
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
                                    <button type="button" id="convertButton" class="btn btn-outline-primary rounded-pill">Convert Now</button>
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
