@extends('admin.layout')
@section('content')
    @php
        $admin = auth('admin')->user();
        if (!empty($admin->role)) {
            $permissions = $admin->role->permissions;
            $permissions = json_decode($permissions, true);
        }
    @endphp

    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Hey, {{$admin->first_name}}!</h2>
                    <h5 class="text-white op-7 mb-2">With great power, comes great responsibility! DASHBOARD UNDER CONSTRUCTION!!</h5>
                </div>

                @if (empty($admin->role) || (!empty($permissions) && in_array('Course Management', $permissions)))
                    <div class="ml-md-auto py-2 py-md-0">
                        <a href="{{ route('admin.service.index') }}" class="btn btn-white btn-border btn-round mr-2">Manage
                            Services</a>
                    </div>
                @endif

            </div>
        </div>
    </div>

    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-6">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="card-title">Overall statistics</div>
                        <div class="card-category">Daily information about statistics in system</div>
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                            <div class="px-2 pb-2 pb-md-0 text-center">
                                <div id="circles-1"></div>
                                <h6 class="fw-bold mt-3 mb-0">New Users</h6>
                            </div>
                            <div class="px-2 pb-2 pb-md-0 text-center">
                                <div id="circles-2"></div>
                                <h6 class="fw-bold mt-3 mb-0">Sales</h6>
                            </div>
                            <div class="px-2 pb-2 pb-md-0 text-center">
                                <div id="circles-3"></div>
                                <h6 class="fw-bold mt-3 mb-0">Subscribers</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="card-title">Total income & spend statistics</div>
                        <div class="row py-3">
                            <div class="col-md-4 d-flex flex-column justify-content-around">
                                <div>
                                    <h6 class="fw-bold text-uppercase text-success op-8">Total Income</h6>
                                    <h3 class="fw-bold">Rs. 39,782</h3>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-uppercase text-danger op-8">Total Spend</h6>
                                    <h3 class="fw-bold">Rs. 12,248</h3>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div id="chart-container">
                                    <canvas id="totalIncomeChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">User Statistics</div>
                            <div class="card-tools">
                                <a href="#" class="btn btn-info btn-border btn-round btn-sm mr-2">
												<span class="btn-label">
													<i class="fa fa-pencil"></i>
												</span>
                                    Export
                                </a>
                                <a href="#" class="btn btn-info btn-border btn-round btn-sm">
												<span class="btn-label">
													<i class="fa fa-print"></i>
												</span>
                                    Print
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container" style="min-height: 375px">
                            <canvas id="statisticsChart"></canvas>
                        </div>
                        <div id="myChartLegend"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-primary bg-primary-gradient">
                    <div class="card-body">
                        <h4 class="mt-3 b-b1 pb-2 mb-4 fw-bold">Active user right now</h4>
                        <h1 class="mb-4 fw-bold">17</h1>
                        <h4 class="mt-3 b-b1 pb-2 mb-5 fw-bold">Page view per minutes</h4>
                        <div id="activeUsersChart"></div>
                        <h4 class="mt-5 pb-3 mb-0 fw-bold">Top active pages</h4>
                        <ul class="list-unstyled">
                            <li class="d-flex justify-content-between pb-1 pt-1"><small>/product/wom-academy/courses</small> <span>7</span>
                            </li>
                            <li class="d-flex justify-content-between pb-1 pt-1"><small>/product/wom-academy</small> <span>10</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body pb-0">
                        <div class="h1 fw-bold float-right text-warning">+7%</div>
                        <h2 class="mb-2">213</h2>
                        <p class="text-muted">Transactions</p>
                        <div class="pull-in sparkline-fix">
                            <div id="lineChart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-card-no-pd">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-head-row card-tools-still-right">
                            <h4 class="card-title">Users Geolocation</h4>
                            <div class="card-tools">
                                <button class="btn btn-icon btn-link btn-primary btn-xs"><span class="fa fa-angle-down"></span></button>
                                <button class="btn btn-icon btn-link btn-primary btn-xs btn-refresh-card"><span
                                        class="fa fa-sync-alt"></span></button>
                                <button class="btn btn-icon btn-link btn-primary btn-xs"><span class="fa fa-times"></span></button>
                            </div>
                        </div>
                        <p class="card-category">
                            Map of the distribution of users around the world</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="table-responsive table-hover table-sales">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <div class="flag">
                                                    <img src="{{ asset('assets/admin/img/flags/id.png')}}" alt="indonesia">
                                                </div>
                                            </td>
                                            <td>Indonesia</td>
                                            <td class="text-right">
                                                2.320
                                            </td>
                                            <td class="text-right">
                                                42.18%
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="flag">
                                                    <img src="{{ asset('assets/admin/img/flags/us.png')}}" alt="united states">
                                                </div>
                                            </td>
                                            <td>USA</td>
                                            <td class="text-right">
                                                240
                                            </td>
                                            <td class="text-right">
                                                4.36%
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="flag">
                                                    <img src="{{ asset('assets/admin/img/flags/au.png')}}" alt="australia">
                                                </div>
                                            </td>
                                            <td>Australia</td>
                                            <td class="text-right">
                                                119
                                            </td>
                                            <td class="text-right">
                                                2.16%
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="flag">
                                                    <img src="{{ asset('assets/admin/img/flags/ru.png')}}" alt="russia">
                                                </div>
                                            </td>
                                            <td>Russia</td>
                                            <td class="text-right">
                                                1.081
                                            </td>
                                            <td class="text-right">
                                                19.65%
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="flag">
                                                    <img src="{{ asset('assets/admin/img/flags/cn.png')}}" alt="china">
                                                </div>
                                            </td>
                                            <td>China</td>
                                            <td class="text-right">
                                                1.100
                                            </td>
                                            <td class="text-right">
                                                20%
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="flag">
                                                    <img src="{{ asset('assets/admin/img/flags/br.png')}}" alt="brazil">
                                                </div>
                                            </td>
                                            <td>Brasil</td>
                                            <td class="text-right">
                                                640
                                            </td>
                                            <td class="text-right">
                                                11.63%
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mapcontainer">
                                    <div id="map-example" class="vmap"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('assets/admin/js/plugin/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/plugin/jqvmap/maps/jquery.vmap.world.js') }}"></script>

    <script>
        $('#map-example').vectorMap(
            {
                map: 'world_en',
                backgroundColor: 'transparent',
                borderColor: '#fff',
                borderWidth: 2,
                color: '#e4e4e4',
                enableZoom: true,
                hoverColor: '#35cd3a',
                hoverOpacity: null,
                normalizeFunction: 'linear',
                scaleColors: ['#b6d6ff', '#005ace'],
                selectedColor: '#35cd3a',
                selectedRegions: ['NP', 'JP', 'US', 'SA'],
                showTooltip: true,
                onRegionClick: function (element, code, region) {
                    return false;
                }
            });
    </script>
@endsection
