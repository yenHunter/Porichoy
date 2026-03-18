@extends('layouts.vertical', ['title' => 'Select Datatables'])

@section('css')
    @vite(['node_modules/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css', 'node_modules/datatables.net-select-bs5/css/select.bootstrap5.min.css'])
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'DataTables', 'title' => 'Select'])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header justify-content-between">
                    <h4 class="card-title"> Single Item Select </h4>
                    <a class="icon-link icon-link-hover link-primary fw-semibold"
                        href="https://datatables.net/reference/option/select" target="_blank">View Docs <i
                            class="ti ti-arrow-right bi align-middle fs-lg"></i></a>
                </div>
                <div class="card-body">
                    <div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                        <strong>Note:</strong> This is a jQuery-based plugin, so you need to include jQuery for it to work.
                        <button aria-label="Close" class="btn-close" data-bs-dismiss="alert" type="button"></button>
                    </div>
                    <table class="table dt-responsive align-middle mb-0" id="single-select">
                        <thead class="thead-sm text-uppercase fs-xxs">
                            <tr>
                                <th>Company</th>
                                <th>Symbol</th>
                                <th>Price</th>
                                <th>Change</th>
                                <th>Volume</th>
                                <th>Market Cap</th>
                                <th>Rating</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Apple Inc.</td>
                                <td>AAPL</td>
                                <td>$2109.53</td>
                                <td>-0.42%</td>
                                <td>48,374,838</td>
                                <td>$53.59B</td>
                                <td>4.7 ★</td>
                                <td><span class="badge badge-label badge-soft-danger">Bearish</span></td>
                            </tr>
                            <tr>
                                <td>Microsoft Corp.</td>
                                <td>MSFT</td>
                                <td>$450.98</td>
                                <td>-2.04%</td>
                                <td>26,604,335</td>
                                <td>$927.77B</td>
                                <td>3.8 ★</td>
                                <td><span class="badge badge-label badge-soft-danger">Bearish</span></td>
                            </tr>
                            <tr>
                                <td>Alphabet Inc.</td>
                                <td>GOOGL</td>
                                <td>$2803.77</td>
                                <td>+0.68%</td>
                                <td>22,545,332</td>
                                <td>$1.88T</td>
                                <td>4.6 ★</td>
                                <td><span class="badge badge-label badge-soft-success">Bullish</span></td>
                            </tr>
                            <tr>
                                <td>Amazon.com Inc.</td>
                                <td>AMZN</td>
                                <td>$3470.79</td>
                                <td>+1.34%</td>
                                <td>32,548,923</td>
                                <td>$1.75T</td>
                                <td>4.3 ★</td>
                                <td><span class="badge badge-label badge-soft-success">Bullish</span></td>
                            </tr>
                            <tr>
                                <td>Meta Platforms</td>
                                <td>META</td>
                                <td>$395.68</td>
                                <td>-0.76%</td>
                                <td>21,134,438</td>
                                <td>$1.06T</td>
                                <td>4.2 ★</td>
                                <td><span class="badge badge-label badge-soft-danger">Bearish</span></td>
                            </tr>
                            <tr>
                                <td>Tesla Inc.</td>
                                <td>TSLA</td>
                                <td>$1034.48</td>
                                <td>+2.04%</td>
                                <td>18,622,988</td>
                                <td>$1.08T</td>
                                <td>5.0 ★</td>
                                <td><span class="badge badge-label badge-soft-success">Bullish</span></td>
                            </tr>
                            <tr>
                                <td>NVIDIA Corp.</td>
                                <td>NVDA</td>
                                <td>$288.63</td>
                                <td>+3.12%</td>
                                <td>27,014,934</td>
                                <td>$710.89B</td>
                                <td>4.8 ★</td>
                                <td><span class="badge badge-label badge-soft-success">Bullish</span></td>
                            </tr>
                            <tr>
                                <td>JPMorgan Chase</td>
                                <td>JPM</td>
                                <td>$158.47</td>
                                <td>-0.23%</td>
                                <td>13,523,487</td>
                                <td>$464.93B</td>
                                <td>3.9 ★</td>
                                <td><span class="badge badge-label badge-soft-danger">Bearish</span></td>
                            </tr>
                            <tr>
                                <td>Johnson &amp; Johnson</td>
                                <td>JNJ</td>
                                <td>$174.89</td>
                                <td>+0.45%</td>
                                <td>12,789,456</td>
                                <td>$457.43B</td>
                                <td>4.1 ★</td>
                                <td><span class="badge badge-label badge-soft-success">Bullish</span></td>
                            </tr>
                            <tr>
                                <td>Visa Inc.</td>
                                <td>V</td>
                                <td>$226.44</td>
                                <td>+0.19%</td>
                                <td>17,532,998</td>
                                <td>$472.35B</td>
                                <td>4.7 ★</td>
                                <td><span class="badge badge-label badge-soft-success">Bullish</span></td>
                            </tr>
                            <tr>
                                <td>Walmart Inc.</td>
                                <td>WMT</td>
                                <td>$150.76</td>
                                <td>+0.55%</td>
                                <td>14,888,342</td>
                                <td>$421.57B</td>
                                <td>3.9 ★</td>
                                <td><span class="badge badge-label badge-soft-success">Bullish</span></td>
                            </tr>
                            <tr>
                                <td>Procter &amp; Gamble</td>
                                <td>PG</td>
                                <td>$136.44</td>
                                <td>-0.21%</td>
                                <td>9,563,721</td>
                                <td>$338.56B</td>
                                <td>4.5 ★</td>
                                <td><span class="badge badge-label badge-soft-danger">Bearish</span></td>
                            </tr>
                            <tr>
                                <td>UnitedHealth Group</td>
                                <td>UNH</td>
                                <td>$438.57</td>
                                <td>+1.34%</td>
                                <td>7,903,765</td>
                                <td>$385.26B</td>
                                <td>4.4 ★</td>
                                <td><span class="badge badge-label badge-soft-success">Bullish</span></td>
                            </tr>
                            <tr>
                                <td>Home Depot</td>
                                <td>HD</td>
                                <td>$340.78</td>
                                <td>+0.23%</td>
                                <td>10,245,120</td>
                                <td>$283.74B</td>
                                <td>4.2 ★</td>
                                <td><span class="badge badge-label badge-soft-success">Bullish</span></td>
                            </tr>
                            <tr>
                                <td>Mastercard Inc.</td>
                                <td>MA</td>
                                <td>$392.90</td>
                                <td>-1.01%</td>
                                <td>8,431,999</td>
                                <td>$390.87B</td>
                                <td>4.3 ★</td>
                                <td><span class="badge badge-label badge-soft-danger">Bearish</span></td>
                            </tr>
                            <tr>
                                <td>Pfizer Inc.</td>
                                <td>PFE</td>
                                <td>$45.22</td>
                                <td>+2.07%</td>
                                <td>15,345,324</td>
                                <td>$252.53B</td>
                                <td>4.0 ★</td>
                                <td><span class="badge badge-label badge-soft-success">Bullish</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-header justify-content-between">
                    <h4 class="card-title"> Multi Item Selection </h4>
                    <a class="icon-link icon-link-hover link-primary fw-semibold"
                        href="https://datatables.net/reference/option/select" target="_blank">View Docs <i
                            class="ti ti-arrow-right bi align-middle fs-lg"></i></a>
                </div>
                <div class="card-body">
                    <table class="table dt-responsive align-middle mb-0" id="multi-select">
                        <thead class="thead-sm text-uppercase fs-xxs">
                            <tr>
                                <th>Company</th>
                                <th>Symbol</th>
                                <th>Price</th>
                                <th>Change</th>
                                <th>Volume</th>
                                <th>Market Cap</th>
                                <th>Rating</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Apple Inc.</td>
                                <td>AAPL</td>
                                <td>$2109.53</td>
                                <td>-0.42%</td>
                                <td>48,374,838</td>
                                <td>$53.59B</td>
                                <td>4.7 ★</td>
                                <td><span class="badge badge-label badge-soft-danger">Bearish</span></td>
                            </tr>
                            <tr>
                                <td>Microsoft Corp.</td>
                                <td>MSFT</td>
                                <td>$450.98</td>
                                <td>-2.04%</td>
                                <td>26,604,335</td>
                                <td>$927.77B</td>
                                <td>3.8 ★</td>
                                <td><span class="badge badge-label badge-soft-danger">Bearish</span></td>
                            </tr>
                            <tr>
                                <td>Alphabet Inc.</td>
                                <td>GOOGL</td>
                                <td>$2803.77</td>
                                <td>+0.68%</td>
                                <td>22,545,332</td>
                                <td>$1.88T</td>
                                <td>4.6 ★</td>
                                <td><span class="badge badge-label badge-soft-success">Bullish</span></td>
                            </tr>
                            <tr>
                                <td>Amazon.com Inc.</td>
                                <td>AMZN</td>
                                <td>$3470.79</td>
                                <td>+1.34%</td>
                                <td>32,548,923</td>
                                <td>$1.75T</td>
                                <td>4.3 ★</td>
                                <td><span class="badge badge-label badge-soft-success">Bullish</span></td>
                            </tr>
                            <tr>
                                <td>Meta Platforms</td>
                                <td>META</td>
                                <td>$395.68</td>
                                <td>-0.76%</td>
                                <td>21,134,438</td>
                                <td>$1.06T</td>
                                <td>4.2 ★</td>
                                <td><span class="badge badge-label badge-soft-danger">Bearish</span></td>
                            </tr>
                            <tr>
                                <td>Tesla Inc.</td>
                                <td>TSLA</td>
                                <td>$1034.48</td>
                                <td>+2.04%</td>
                                <td>18,622,988</td>
                                <td>$1.08T</td>
                                <td>5.0 ★</td>
                                <td><span class="badge badge-label badge-soft-success">Bullish</span></td>
                            </tr>
                            <tr>
                                <td>NVIDIA Corp.</td>
                                <td>NVDA</td>
                                <td>$288.63</td>
                                <td>+3.12%</td>
                                <td>27,014,934</td>
                                <td>$710.89B</td>
                                <td>4.8 ★</td>
                                <td><span class="badge badge-label badge-soft-success">Bullish</span></td>
                            </tr>
                            <tr>
                                <td>JPMorgan Chase</td>
                                <td>JPM</td>
                                <td>$158.47</td>
                                <td>-0.23%</td>
                                <td>13,523,487</td>
                                <td>$464.93B</td>
                                <td>3.9 ★</td>
                                <td><span class="badge badge-label badge-soft-danger">Bearish</span></td>
                            </tr>
                            <tr>
                                <td>Johnson &amp; Johnson</td>
                                <td>JNJ</td>
                                <td>$174.89</td>
                                <td>+0.45%</td>
                                <td>12,789,456</td>
                                <td>$457.43B</td>
                                <td>4.1 ★</td>
                                <td><span class="badge badge-label badge-soft-success">Bullish</span></td>
                            </tr>
                            <tr>
                                <td>Visa Inc.</td>
                                <td>V</td>
                                <td>$226.44</td>
                                <td>+0.19%</td>
                                <td>17,532,998</td>
                                <td>$472.35B</td>
                                <td>4.7 ★</td>
                                <td><span class="badge badge-label badge-soft-success">Bullish</span></td>
                            </tr>
                            <tr>
                                <td>Walmart Inc.</td>
                                <td>WMT</td>
                                <td>$150.76</td>
                                <td>+0.55%</td>
                                <td>14,888,342</td>
                                <td>$421.57B</td>
                                <td>3.9 ★</td>
                                <td><span class="badge badge-label badge-soft-success">Bullish</span></td>
                            </tr>
                            <tr>
                                <td>Procter &amp; Gamble</td>
                                <td>PG</td>
                                <td>$136.44</td>
                                <td>-0.21%</td>
                                <td>9,563,721</td>
                                <td>$338.56B</td>
                                <td>4.5 ★</td>
                                <td><span class="badge badge-label badge-soft-danger">Bearish</span></td>
                            </tr>
                            <tr>
                                <td>UnitedHealth Group</td>
                                <td>UNH</td>
                                <td>$438.57</td>
                                <td>+1.34%</td>
                                <td>7,903,765</td>
                                <td>$385.26B</td>
                                <td>4.4 ★</td>
                                <td><span class="badge badge-label badge-soft-success">Bullish</span></td>
                            </tr>
                            <tr>
                                <td>Home Depot</td>
                                <td>HD</td>
                                <td>$340.78</td>
                                <td>+0.23%</td>
                                <td>10,245,120</td>
                                <td>$283.74B</td>
                                <td>4.2 ★</td>
                                <td><span class="badge badge-label badge-soft-success">Bullish</span></td>
                            </tr>
                            <tr>
                                <td>Mastercard Inc.</td>
                                <td>MA</td>
                                <td>$392.90</td>
                                <td>-1.01%</td>
                                <td>8,431,999</td>
                                <td>$390.87B</td>
                                <td>4.3 ★</td>
                                <td><span class="badge badge-label badge-soft-danger">Bearish</span></td>
                            </tr>
                            <tr>
                                <td>Pfizer Inc.</td>
                                <td>PFE</td>
                                <td>$45.22</td>
                                <td>+2.07%</td>
                                <td>15,345,324</td>
                                <td>$252.53B</td>
                                <td>4.0 ★</td>
                                <td><span class="badge badge-label badge-soft-success">Bullish</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-header justify-content-between">
                    <h4 class="card-title"> Cell Selection </h4>
                    <a class="icon-link icon-link-hover link-primary fw-semibold"
                        href="https://datatables.net/reference/option/select" target="_blank">View Docs <i
                            class="ti ti-arrow-right bi align-middle fs-lg"></i></a>
                </div>
                <div class="card-body">
                    <table class="table dt-responsive align-middle mb-0" id="cell-select">
                        <thead class="thead-sm text-uppercase fs-xxs">
                            <tr>
                                <th>Company</th>
                                <th>Symbol</th>
                                <th>Price</th>
                                <th>Change</th>
                                <th>Volume</th>
                                <th>Market Cap</th>
                                <th>Rating</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Apple Inc.</td>
                                <td>AAPL</td>
                                <td>$2109.53</td>
                                <td>-0.42%</td>
                                <td>48,374,838</td>
                                <td>$53.59B</td>
                                <td>4.7 ★</td>
                                <td><span class="badge badge-label badge-soft-danger">Bearish</span></td>
                            </tr>
                            <tr>
                                <td>Microsoft Corp.</td>
                                <td>MSFT</td>
                                <td>$450.98</td>
                                <td>-2.04%</td>
                                <td>26,604,335</td>
                                <td>$927.77B</td>
                                <td>3.8 ★</td>
                                <td><span class="badge badge-label badge-soft-danger">Bearish</span></td>
                            </tr>
                            <tr>
                                <td>Alphabet Inc.</td>
                                <td>GOOGL</td>
                                <td>$2803.77</td>
                                <td>+0.68%</td>
                                <td>22,545,332</td>
                                <td>$1.88T</td>
                                <td>4.6 ★</td>
                                <td><span class="badge badge-label badge-soft-success">Bullish</span></td>
                            </tr>
                            <tr>
                                <td>Amazon.com Inc.</td>
                                <td>AMZN</td>
                                <td>$3470.79</td>
                                <td>+1.34%</td>
                                <td>32,548,923</td>
                                <td>$1.75T</td>
                                <td>4.3 ★</td>
                                <td><span class="badge badge-label badge-soft-success">Bullish</span></td>
                            </tr>
                            <tr>
                                <td>Meta Platforms</td>
                                <td>META</td>
                                <td>$395.68</td>
                                <td>-0.76%</td>
                                <td>21,134,438</td>
                                <td>$1.06T</td>
                                <td>4.2 ★</td>
                                <td><span class="badge badge-label badge-soft-danger">Bearish</span></td>
                            </tr>
                            <tr>
                                <td>Tesla Inc.</td>
                                <td>TSLA</td>
                                <td>$1034.48</td>
                                <td>+2.04%</td>
                                <td>18,622,988</td>
                                <td>$1.08T</td>
                                <td>5.0 ★</td>
                                <td><span class="badge badge-label badge-soft-success">Bullish</span></td>
                            </tr>
                            <tr>
                                <td>NVIDIA Corp.</td>
                                <td>NVDA</td>
                                <td>$288.63</td>
                                <td>+3.12%</td>
                                <td>27,014,934</td>
                                <td>$710.89B</td>
                                <td>4.8 ★</td>
                                <td><span class="badge badge-label badge-soft-success">Bullish</span></td>
                            </tr>
                            <tr>
                                <td>JPMorgan Chase</td>
                                <td>JPM</td>
                                <td>$158.47</td>
                                <td>-0.23%</td>
                                <td>13,523,487</td>
                                <td>$464.93B</td>
                                <td>3.9 ★</td>
                                <td><span class="badge badge-label badge-soft-danger">Bearish</span></td>
                            </tr>
                            <tr>
                                <td>Johnson &amp; Johnson</td>
                                <td>JNJ</td>
                                <td>$174.89</td>
                                <td>+0.45%</td>
                                <td>12,789,456</td>
                                <td>$457.43B</td>
                                <td>4.1 ★</td>
                                <td><span class="badge badge-label badge-soft-success">Bullish</span></td>
                            </tr>
                            <tr>
                                <td>Visa Inc.</td>
                                <td>V</td>
                                <td>$226.44</td>
                                <td>+0.19%</td>
                                <td>17,532,998</td>
                                <td>$472.35B</td>
                                <td>4.7 ★</td>
                                <td><span class="badge badge-label badge-soft-success">Bullish</span></td>
                            </tr>
                            <tr>
                                <td>Walmart Inc.</td>
                                <td>WMT</td>
                                <td>$150.76</td>
                                <td>+0.55%</td>
                                <td>14,888,342</td>
                                <td>$421.57B</td>
                                <td>3.9 ★</td>
                                <td><span class="badge badge-label badge-soft-success">Bullish</span></td>
                            </tr>
                            <tr>
                                <td>Procter &amp; Gamble</td>
                                <td>PG</td>
                                <td>$136.44</td>
                                <td>-0.21%</td>
                                <td>9,563,721</td>
                                <td>$338.56B</td>
                                <td>4.5 ★</td>
                                <td><span class="badge badge-label badge-soft-danger">Bearish</span></td>
                            </tr>
                            <tr>
                                <td>UnitedHealth Group</td>
                                <td>UNH</td>
                                <td>$438.57</td>
                                <td>+1.34%</td>
                                <td>7,903,765</td>
                                <td>$385.26B</td>
                                <td>4.4 ★</td>
                                <td><span class="badge badge-label badge-soft-success">Bullish</span></td>
                            </tr>
                            <tr>
                                <td>Home Depot</td>
                                <td>HD</td>
                                <td>$340.78</td>
                                <td>+0.23%</td>
                                <td>10,245,120</td>
                                <td>$283.74B</td>
                                <td>4.2 ★</td>
                                <td><span class="badge badge-label badge-soft-success">Bullish</span></td>
                            </tr>
                            <tr>
                                <td>Mastercard Inc.</td>
                                <td>MA</td>
                                <td>$392.90</td>
                                <td>-1.01%</td>
                                <td>8,431,999</td>
                                <td>$390.87B</td>
                                <td>4.3 ★</td>
                                <td><span class="badge badge-label badge-soft-danger">Bearish</span></td>
                            </tr>
                            <tr>
                                <td>Pfizer Inc.</td>
                                <td>PFE</td>
                                <td>$45.22</td>
                                <td>+2.07%</td>
                                <td>15,345,324</td>
                                <td>$252.53B</td>
                                <td>4.0 ★</td>
                                <td><span class="badge badge-label badge-soft-success">Bullish</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div> <!-- end row-->
@endsection

@section('scripts')    
    @vite(['resources/js/pages/datatables-select.js'])
@endsection
