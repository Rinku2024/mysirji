<x-app-layout>

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Wallet</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->

      <section class="section dashboard">
        <div class="row">

          <!-- Left side columns -->
          <div class="col-lg-8">
            <div class="row">

              <!-- Revenue Card -->
              <div class="col-xxl-4 col-md-6">
                <div class="card info-card revenue-card">
                  <div class="card-body">
                    <h5 class="card-title">Revenue </h5>
  
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-currency-dollar"></i>
                      </div>
                      <div class="ps-3">
                        <h6>
                        @if($wallet)
                            ${{ number_format($wallet->balance, 2) }}</p>
                               @else
                            <p>You do not have a wallet yet.</p>
                            @endif
                        </h6>
                        {{-- <span class="text-success small pt-1 fw-bold">8%</span>  --}}
                        <span class="text-muted small pt-2 ps-1">Current Balance</span>
                                
                        @if(session('success'))
                           <div class="alert alert-success">{{ session('success') }}</div>
                         @endif

                        @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                      </div>
                    </div>
                  </div>
  
                </div>
              </div><!-- End Revenue Card -->
              
                <!-- Revenue Card -->
            
              <div class="col-xxl-8 col-md-6">
                @if($wallet)
                <div class="card info-card revenue-card" style="padding: 15px;">
                  <div class="card-body">
                   
                        <form action="{{ route('wallet.addFunds') }}" method="POST">
                            @csrf
                            <div class="d-flex align-items-center" style="
                            column-gap: 20px;
                        ">
                                <div class="col-md-8">
                                  <input type="number" name="amount" id="amount" class="form-control" min="0.01" step="0.01" required>
                                </div>
                                <div class="col-md-4">
                                  <button type="submit" class="btn btn-primary">Add Funds</button>
                                </div>
                        </div>
                        </form>
                    
                  </div>

                  <div class="card-body">
                   
                    <form action="{{ route('wallet.withdrawFunds') }}" method="POST">
                        @csrf
                        <div class="d-flex align-items-center" style="
                        column-gap: 20px;
                    ">
                            <div class="col-md-8">
                              <input type="number" name="amount" id="withdraw_amount" class="form-control" min="0.01" step="0.01" required>
                            </div>
                            <div class="col-md-4">
                              <button type="submit" class="btn btn-warning">Withdraw Funds</button>
                            </div>
                    </div>
                    </form>
                
                  </div>
                </div>
                @endif
              </div><!-- End Revenue Card -->
  
              <!-- Reports -->
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Reports </h5>
                  </div>
                </div>
              </div><!-- End Reports -->
  
            </div>
          </div><!-- End Left side columns -->

          <!-- Right side columns -->
          <div class="col-lg-4">
  
            <!-- Recent Activity -->
            <div class="card">
  
              <div class="card-body">
                <h5 class="card-title">Recent Activity </h5>
  
                <div class="activity">
  
                  <div class="activity-item d-flex">
                    <div class="activite-label">32 min</div>
                    <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                    <div class="activity-content">
                      Quia quae rerum <a href="#" class="fw-bold text-dark">explicabo officiis</a> beatae
                    </div>
                  </div><!-- End activity item-->
  
                  <div class="activity-item d-flex">
                    <div class="activite-label">56 min</div>
                    <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                    <div class="activity-content">
                      Voluptatem blanditiis blanditiis eveniet
                    </div>
                  </div><!-- End activity item-->
  
                  <div class="activity-item d-flex">
                    <div class="activite-label">2 hrs</div>
                    <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                    <div class="activity-content">
                      Voluptates corrupti molestias voluptatem
                    </div>
                  </div><!-- End activity item-->
  
                  <div class="activity-item d-flex">
                    <div class="activite-label">1 day</div>
                    <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                    <div class="activity-content">
                      Tempore autem saepe <a href="#" class="fw-bold text-dark">occaecati voluptatem</a> tempore
                    </div>
                  </div><!-- End activity item-->
  
                  <div class="activity-item d-flex">
                    <div class="activite-label">2 days</div>
                    <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                    <div class="activity-content">
                      Est sit eum reiciendis exercitationem
                    </div>
                  </div><!-- End activity item-->
  
                  <div class="activity-item d-flex">
                    <div class="activite-label">4 weeks</div>
                    <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                    <div class="activity-content">
                      Dicta dolorem harum nulla eius. Ut quidem quidem sit quas
                    </div>
                  </div><!-- End activity item-->
  
                </div>
  
              </div>
            </div><!-- End Recent Activity -->
  
          </div><!-- End Right side columns -->
        </div>
      </section>

</x-app-layout>
