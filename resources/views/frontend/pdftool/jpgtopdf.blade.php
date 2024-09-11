@extends('frontend.layouts.main')

@section('title', 'JPG to PDF')

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
                        <h1> JPG To PDF</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, recusandae ex laudantium nobis </p>
                    </div>
                    <form action="{{ route('jpg-to-pdf.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="MAX_FILE_SIZE" value="8000000"/>
                        <input type="file" name="file" class="d-none" id="file-uploader"/>
                        <label for="file-uploader" class="file-drag">
                            <div class="uploader-wrapper">
                                <i class="an an-upload-image"></i>
                                <h3>Drop Image File Here</h3>
                                <div class="uploader-extensions mb-3">
                                    <span class="badge text-uppercase" style="color:#333">.jpg</span>
                                    <span class="badge text-uppercase" style="color:#333">.jpeg</span>
                                </div>
                                <p>Make "All" files easy to read by converting them to jpg.1</p>
                                <span class="btn btn-dark file-upload-btn">Select a File</span>
                            </div>
                        </label>
                        <div class="text-end mt-4">
                            <button type="submit" name="submit" class="btn btn-outline-primary rounded-pill">Convert Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
