@extends('admin.layouts.app')

@section('title')
Dashboard
@endsection

@section('content')
<div class="row">
  @include('admin.layouts.sidebar')
  <div class="col-md-9">
      <div class="row mt-2">
          <div class="col-md-12">
              <div class="card-header bg-white">
                  <h3 class="mt-2">Dashboard</h3>
                  <hr>
              </div>
              <div class="card-body">
                  <div class="row mb-2">
                      <div class="col-md-6 mb-2">
                          <div class="card shadow-sm">
                              <div class="card-header bg-white">
                                <div class="d-flex justify-content-between">
                                    <strong class="badge bg-dark">
                                      Today's Orders
                                    </strong>
                                    <span class="badge bg-dark">
                                        {{ $today_orders->count() }}
                                    </span>
                                </div>
                            </div>
                            <div class="card-footer text-center bg-white">
                                  <strong>
                                    {{ $today_orders->sum('total') }}
                                  </strong>
                            </div>
                          </div>
                      </div>
                      <div class="col-md-6 mb-2">
                        <div class="card shadow-sm">
                            <div class="card-header bg-white">
                              <div class="d-flex justify-content-between">
                                  <strong class="badge bg-primary">
                                    Yesterday's Orders
                                  </strong>
                                  <span class="badge bg-primary">
                                      {{ $yesterday_orders->count() }}
                                  </span>
                              </div>
                          </div>
                          <div class="card-footer text-center bg-white">
                                <strong>
                                  {{ $yesterday_orders->sum('total') }}
                                </strong>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 mb-2">
                        <div class="card shadow-sm">
                            <div class="card-header bg-white">
                              <div class="d-flex justify-content-between">
                                  <strong class="badge bg-danger">
                                    This Month Orders
                                  </strong>
                                  <span class="badge bg-danger">
                                      {{ $month_orders->count() }}
                                  </span>
                              </div>
                          </div>
                          <div class="card-footer text-center bg-white">
                                <strong>
                                  {{ $month_orders->sum('total') }}
                                </strong>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 mb-2">
                        <div class="card shadow-sm">
                            <div class="card-header bg-white">
                              <div class="d-flex justify-content-between">
                                  <strong class="badge bg-success">
                                    This Year Orders
                                  </strong>
                                  <span class="badge bg-success">
                                      {{ $year_orders->count() }}
                                  </span>
                              </div>
                          </div>
                          <div class="card-footer text-center bg-white">
                                <strong>
                                  {{ $year_orders->sum('total') }}
                                </strong>
                          </div>
                        </div>
                      </div>
                
                  </div>
              </div> 
          </div>
      </div> 
  </div>
</div>
@endsection