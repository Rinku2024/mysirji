@extends('frontend.layouts.main')

@section('title', 'HTML To PDF Converter')

@section('frontend.content')

<section class="section" style="padding: 150px 0;">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="wrap-content">
            <div class="hero-title">
              <h1>HTML To PDF</h1>
              <p>Convert your HTML code to PDF easily.</p>
            </div>

            <form action="{{ route('html-to-pdf.store') }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="html_content">Enter HTML Content:</label>
                <textarea name="html_content" id="html_content" class="form-control" rows="10"></textarea>
              </div>
              <div class="text-end mt-3">
                <button type="submit" class="btn btn-outline-primary rounded-pill">Convert Now</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
</section>

@endsection
