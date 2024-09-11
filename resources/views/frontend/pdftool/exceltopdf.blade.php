@extends('frontend.layouts.main')

@section('title', 'Excel to PDF Conversion')

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
              <h1>Excel To PDF</h1>
              <p>Convert your Excel files to PDF easily.</p>
            </div>
            <form action="{{ route('excel-to-pdf.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="MAX_FILE_SIZE" value="8000000"/>
              <input type="file" name="file" accept=".xls,.xlsx,.csv" />
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
