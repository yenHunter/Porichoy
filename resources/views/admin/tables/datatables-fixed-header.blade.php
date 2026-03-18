@extends('layouts.vertical', ['title' => 'Fixed Header Datatables'])

@section('css')
    @vite(['node_modules/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css', 'node_modules/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css'])
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'DataTables', 'title' => 'Fixed Header'])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header justify-content-between">
                    <h4 class="card-title"> Example </h4>
                    <a class="icon-link icon-link-hover link-primary fw-semibold"
                        href="https://datatables.net/extensions/fixedheader/examples/styling/bootstrap5.html"
                        target="_blank">View Docs <i class="ti ti-arrow-right bi align-middle fs-lg"></i></a>
                </div>
                <div class="card-body">
                    <div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                        <strong>Note:</strong> This is a jQuery-based plugin, so you need to include jQuery for it to work.
                        <button aria-label="Close" class="btn-close" data-bs-dismiss="alert" type="button"></button>
                    </div>
                    <table class="table table-striped dt-responsive align-middle mb-0" id="fixed-header-data">
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
                            <tr>
                                <td>Intel Corp.</td>
                                <td>INTC</td>
                                <td>$54.83</td>
                                <td>-0.72%</td>
                                <td>18,442,560</td>
                                <td>$224.67B</td>
                                <td>3.7 ★</td>
                                <td><span class="badge badge-label badge-soft-danger">Bearish</span></td>
                            </tr>
                            <tr>
                                <td>Coca-Cola Co.</td>
                                <td>KO</td>
                                <td>$59.63</td>
                                <td>+0.11%</td>
                                <td>19,870,902</td>
                                <td>$255.45B</td>
                                <td>4.4 ★</td>
                                <td><span class="badge badge-label badge-soft-success">Bullish</span></td>
                            </tr>
                            <tr>
                                <td>Disney</td>
                                <td>DIS</td>
                                <td>$179.56</td>
                                <td>-0.93%</td>
                                <td>8,502,109</td>
                                <td>$328.72B</td>
                                <td>3.9 ★</td>
                                <td><span class="badge badge-label badge-soft-danger">Bearish</span></td>
                            </tr>
                            <tr>
                                <td>Cisco Systems</td>
                                <td>CSCO</td>
                                <td>$54.12</td>
                                <td>+0.88%</td>
                                <td>14,730,222</td>
                                <td>$233.78B</td>
                                <td>4.3 ★</td>
                                <td><span class="badge badge-label badge-soft-success">Bullish</span></td>
                            </tr>
                            <tr>
                                <td>PepsiCo Inc.</td>
                                <td>PEP</td>
                                <td>$155.68</td>
                                <td>+0.75%</td>
                                <td>6,578,987</td>
                                <td>$215.58B</td>
                                <td>4.2 ★</td>
                                <td><span class="badge badge-label badge-soft-success">Bullish</span></td>
                            </tr>
                            <tr>
                                <td>Verizon Communications</td>
                                <td>VZ</td>
                                <td>$50.74</td>
                                <td>-0.67%</td>
                                <td>16,346,523</td>
                                <td>$205.38B</td>
                                <td>3.8 ★</td>
                                <td><span class="badge badge-label badge-soft-danger">Bearish</span></td>
                            </tr>
                            <tr>
                                <td>AT&amp;T Inc.</td>
                                <td>T</td>
                                <td>$22.51</td>
                                <td>+1.22%</td>
                                <td>27,528,906</td>
                                <td>$161.83B</td>
                                <td>4.0 ★</td>
                                <td><span class="badge badge-label badge-soft-success">Bullish</span></td>
                            </tr>
                            <tr>
                                <td>AbbVie Inc.</td>
                                <td>ABBV</td>
                                <td>$148.13</td>
                                <td>+1.15%</td>
                                <td>9,582,210</td>
                                <td>$259.78B</td>
                                <td>4.5 ★</td>
                                <td><span class="badge badge-label badge-soft-success">Bullish</span></td>
                            </tr>
                            <tr>
                                <td>Merck &amp; Co.</td>
                                <td>MRK</td>
                                <td>$85.27</td>
                                <td>-0.31%</td>
                                <td>11,402,899</td>
                                <td>$217.74B</td>
                                <td>4.4 ★</td>
                                <td><span class="badge badge-label badge-soft-danger">Bearish</span></td>
                            </tr>
                            <tr>
                                <td>Lockheed Martin</td>
                                <td>LMT</td>
                                <td>$385.12</td>
                                <td>+0.68%</td>
                                <td>3,251,432</td>
                                <td>$105.02B</td>
                                <td>4.8 ★</td>
                                <td><span class="badge badge-label badge-soft-success">Bullish</span></td>
                            </tr>
                            <tr>
                                <td>3M Company</td>
                                <td>MMM</td>
                                <td>$178.36</td>
                                <td>-0.14%</td>
                                <td>5,643,980</td>
                                <td>$106.95B</td>
                                <td>4.2 ★</td>
                                <td><span class="badge badge-label badge-soft-danger">Bearish</span></td>
                            </tr>
                            <tr>
                                <td>American Express</td>
                                <td>AXP</td>
                                <td>$160.95</td>
                                <td>+0.88%</td>
                                <td>7,125,347</td>
                                <td>$146.57B</td>
                                <td>4.4 ★</td>
                                <td><span class="badge badge-label badge-soft-success">Bullish</span></td>
                            </tr>
                            <tr>
                                <td>McDonald's Corp.</td>
                                <td>MCD</td>
                                <td>$258.68</td>
                                <td>+0.45%</td>
                                <td>10,023,576</td>
                                <td>$194.35B</td>
                                <td>4.6 ★</td>
                                <td><span class="badge badge-label badge-soft-success">Bullish</span></td>
                            </tr>
                            <tr>
                                <td>ExxonMobil</td>
                                <td>XOM</td>
                                <td>$62.32</td>
                                <td>+0.12%</td>
                                <td>15,658,723</td>
                                <td>$264.59B</td>
                                <td>4.0 ★</td>
                                <td><span class="badge badge-label badge-soft-success">Bullish</span></td>
                            </tr>
                            <tr>
                                <td>Chevron Corp.</td>
                                <td>CVX</td>
                                <td>$172.94</td>
                                <td>-0.11%</td>
                                <td>8,203,474</td>
                                <td>$318.75B</td>
                                <td>4.5 ★</td>
                                <td><span class="badge badge-label badge-soft-danger">Bearish</span></td>
                            </tr>
                            <tr>
                                <td>Colgate-Palmolive</td>
                                <td>CL</td>
                                <td>$78.92</td>
                                <td>+0.27%</td>
                                <td>10,298,121</td>
                                <td>$67.95B</td>
                                <td>4.1 ★</td>
                                <td><span class="badge badge-label badge-soft-success">Bullish</span></td>
                            </tr>
                            <tr>
                                <td>Abbott Laboratories</td>
                                <td>ABT</td>
                                <td>$119.93</td>
                                <td>+0.51%</td>
                                <td>7,287,634</td>
                                <td>$209.33B</td>
                                <td>4.6 ★</td>
                                <td><span class="badge badge-label badge-soft-success">Bullish</span></td>
                            </tr>
                            <tr>
                                <td>NextEra Energy</td>
                                <td>NEE</td>
                                <td>$74.31</td>
                                <td>-0.76%</td>
                                <td>8,146,257</td>
                                <td>$151.48B</td>
                                <td>4.3 ★</td>
                                <td><span class="badge badge-label badge-soft-danger">Bearish</span></td>
                            </tr>
                            <tr>
                                <td>Danaher Corporation</td>
                                <td>DHR</td>
                                <td>$256.12</td>
                                <td>+1.20%</td>
                                <td>6,241,544</td>
                                <td>$186.57B</td>
                                <td>4.7 ★</td>
                                <td><span class="badge badge-label badge-soft-success">Bullish</span></td>
                            </tr>
                            <tr>
                                <td>Raytheon Technologies</td>
                                <td>RTX</td>
                                <td>$89.45</td>
                                <td>+0.81%</td>
                                <td>10,123,556</td>
                                <td>$133.83B</td>
                                <td>4.4 ★</td>
                                <td><span class="badge badge-label badge-soft-success">Bullish</span></td>
                            </tr>
                            <tr>
                                <td>Intel Corp.</td>
                                <td>INTC</td>
                                <td>$45.13</td>
                                <td>-0.98%</td>
                                <td>14,015,888</td>
                                <td>$185.77B</td>
                                <td>3.7 ★</td>
                                <td><span class="badge badge-label badge-soft-danger">Bearish</span></td>
                            </tr>
                            <tr>
                                <td>Target Corp.</td>
                                <td>TGT</td>
                                <td>$252.12</td>
                                <td>+0.45%</td>
                                <td>7,412,658</td>
                                <td>$132.18B</td>
                                <td>4.2 ★</td>
                                <td><span class="badge badge-label badge-soft-success">Bullish</span></td>
                            </tr>
                            <tr>
                                <td>AbbVie</td>
                                <td>ABBV</td>
                                <td>$142.83</td>
                                <td>+1.19%</td>
                                <td>9,725,439</td>
                                <td>$246.68B</td>
                                <td>4.4 ★</td>
                                <td><span class="badge badge-label badge-soft-success">Bullish</span></td>
                            </tr>
                            <tr>
                                <td>Philip Morris</td>
                                <td>PM</td>
                                <td>$98.21</td>
                                <td>+0.35%</td>
                                <td>10,653,122</td>
                                <td>$157.56B</td>
                                <td>4.3 ★</td>
                                <td><span class="badge badge-label badge-soft-success">Bullish</span></td>
                            </tr>
                            <tr>
                                <td>General Dynamics</td>
                                <td>GD</td>
                                <td>$220.57</td>
                                <td>+0.78%</td>
                                <td>6,232,367</td>
                                <td>$75.99B</td>
                                <td>4.6 ★</td>
                                <td><span class="badge badge-label badge-soft-success">Bullish</span></td>
                            </tr>
                            <tr>
                                <td>Johnson &amp; Johnson</td>
                                <td>JNJ</td>
                                <td>$175.98</td>
                                <td>+1.02%</td>
                                <td>9,124,487</td>
                                <td>$461.98B</td>
                                <td>4.8 ★</td>
                                <td><span class="badge badge-label badge-soft-success">Bullish</span></td>
                            </tr>
                            <tr>
                                <td>Biogen Inc.</td>
                                <td>BIIB</td>
                                <td>$273.62</td>
                                <td>-0.56%</td>
                                <td>5,890,444</td>
                                <td>$41.88B</td>
                                <td>4.0 ★</td>
                                <td><span class="badge badge-label badge-soft-danger">Bearish</span></td>
                            </tr>
                            <tr>
                                <td>Uber Technologies</td>
                                <td>UBER</td>
                                <td>$51.26</td>
                                <td>+0.18%</td>
                                <td>11,298,673</td>
                                <td>$87.89B</td>
                                <td>4.3 ★</td>
                                <td><span class="badge badge-label badge-soft-success">Bullish</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
    </div>
@endsection

@section('scripts')
    @vite(['resources/js/pages/datatables-fixed-header.js'])
@endsection
