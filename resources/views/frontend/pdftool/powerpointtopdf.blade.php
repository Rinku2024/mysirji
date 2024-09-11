@extends('frontend.layouts.main')

@section('title', 'Powerpoint to PDF')

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
              <h1>PowerPoint to PDF</h1>
              <p>Convert your PowerPoint presentations to PDF format.</p>
            </div>
            <form action="{{ route('powerpoint-to-pdf.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <input type="file" name="file" accept=".ppt, .pptx"/>
              <div class="text-end">
                <button type="submit" class="btn btn-outline-primary rounded-pill">Convert Now</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
