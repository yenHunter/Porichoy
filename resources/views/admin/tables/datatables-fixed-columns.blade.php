@extends('layouts.vertical', ['title' => 'Basic Datatables'])

@section('css')
    @vite(['node_modules/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css'])
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'DataTables', 'title' => 'Fixed Columns'])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header justify-content-between">
                    <h4 class="card-title"> Example </h4>
                    <a class="icon-link icon-link-hover link-primary fw-semibold"
                        href="https://datatables.net/extensions/fixedcolumns/examples/initialisation/left_right_columns.html"
                        target="_blank">View Docs <i class="ti ti-arrow-right bi align-middle fs-lg"></i></a>
                </div>
                <div class="card-body">
                    <div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                        <strong>Note:</strong> This is a jQuery-based plugin, so you need to include jQuery for it to work.
                        <button aria-label="Close" class="btn-close" data-bs-dismiss="alert" type="button"></button>
                    </div>
                    <table class="table table-striped stripe row-border nowrap order-column align-middle mb-0"
                        id="fixed-columns">
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
                                <th>Sector</th>
                                <th>Industry</th>
                                <th>Employees</th>
                                <th>Founded</th>
                                <th>P/E Ratio</th>
                                <th>Dividend</th>
                                <th>52W High</th>
                                <th>52W Low</th>
                                <th>CEO</th>
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
                                <td><span class="badge badge-soft-danger">Bearish</span></td>
                                <td>Technology</td>
                                <td>Consumer Electronics</td>
                                <td>160,000</td>
                                <td>1976</td>
                                <td>28.5</td>
                                <td>0.65%</td>
                                <td>$2150</td>
                                <td>$1200</td>
                                <td>Tim Cook</td>
                            </tr>
                            <tr>
                                <td>Microsoft Corp.</td>
                                <td>MSFT</td>
                                <td>$450.98</td>
                                <td>-2.04%</td>
                                <td>26,604,335</td>
                                <td>$927.77B</td>
                                <td>3.8 ★</td>
                                <td><span class="badge badge-soft-danger">Bearish</span></td>
                                <td>Technology</td>
                                <td>Software</td>
                                <td>221,000</td>
                                <td>1975</td>
                                <td>35.1</td>
                                <td>0.82%</td>
                                <td>$480</td>
                                <td>$320</td>
                                <td>Satya Nadella</td>
                            </tr>
                            <tr>
                                <td>Amazon.com Inc.</td>
                                <td>AMZN</td>
                                <td>$127.54</td>
                                <td>+1.12%</td>
                                <td>36,992,200</td>
                                <td>$1.24T</td>
                                <td>4.5 ★</td>
                                <td><span class="badge badge-soft-success">Bullish</span></td>
                                <td>Consumer Discretionary</td>
                                <td>E-Commerce</td>
                                <td>1,540,000</td>
                                <td>1994</td>
                                <td>61.4</td>
                                <td>0%</td>
                                <td>$145</td>
                                <td>$87</td>
                                <td>Andy Jassy</td>
                            </tr>
                            <tr>
                                <td>Alphabet Inc.</td>
                                <td>GOOGL</td>
                                <td>$138.34</td>
                                <td>+0.77%</td>
                                <td>25,105,431</td>
                                <td>$1.74T</td>
                                <td>4.6 ★</td>
                                <td><span class="badge badge-soft-success">Bullish</span></td>
                                <td>Communication Services</td>
                                <td>Internet Content</td>
                                <td>190,711</td>
                                <td>1998</td>
                                <td>29.8</td>
                                <td>0%</td>
                                <td>$145</td>
                                <td>$95</td>
                                <td>Sundar Pichai</td>
                            </tr>
                            <tr>
                                <td>Meta Platforms Inc.</td>
                                <td>META</td>
                                <td>$332.25</td>
                                <td>-0.12%</td>
                                <td>14,837,201</td>
                                <td>$948.33B</td>
                                <td>4.1 ★</td>
                                <td><span class="badge badge-soft-danger">Bearish</span></td>
                                <td>Communication Services</td>
                                <td>Social Media</td>
                                <td>71,970</td>
                                <td>2004</td>
                                <td>24.2</td>
                                <td>0%</td>
                                <td>$360</td>
                                <td>$255</td>
                                <td>Mark Zuckerberg</td>
                            </tr>
                            <tr>
                                <td>Tesla Inc.</td>
                                <td>TSLA</td>
                                <td>$245.57</td>
                                <td>-3.45%</td>
                                <td>22,634,342</td>
                                <td>$778.21B</td>
                                <td>3.7 ★</td>
                                <td><span class="badge badge-soft-danger">Bearish</span></td>
                                <td>Consumer Discretionary</td>
                                <td>Automobiles</td>
                                <td>140,473</td>
                                <td>2003</td>
                                <td>72.3</td>
                                <td>0%</td>
                                <td>$310</td>
                                <td>$190</td>
                                <td>Elon Musk</td>
                            </tr>
                            <tr>
                                <td>NVIDIA Corp.</td>
                                <td>NVDA</td>
                                <td>$789.25</td>
                                <td>+2.89%</td>
                                <td>38,251,124</td>
                                <td>$1.94T</td>
                                <td>4.9 ★</td>
                                <td><span class="badge badge-soft-success">Bullish</span></td>
                                <td>Technology</td>
                                <td>Semiconductors</td>
                                <td>22,473</td>
                                <td>1993</td>
                                <td>92.4</td>
                                <td>0.06%</td>
                                <td>$825</td>
                                <td>$375</td>
                                <td>Jensen Huang</td>
                            </tr>
                            <tr>
                                <td>Netflix Inc.</td>
                                <td>NFLX</td>
                                <td>$442.35</td>
                                <td>+1.24%</td>
                                <td>4,350,932</td>
                                <td>$197.31B</td>
                                <td>4.2 ★</td>
                                <td><span class="badge badge-soft-success">Bullish</span></td>
                                <td>Communication Services</td>
                                <td>Streaming</td>
                                <td>12,800</td>
                                <td>1997</td>
                                <td>44.8</td>
                                <td>0%</td>
                                <td>$460</td>
                                <td>$300</td>
                                <td>Ted Sarandos</td>
                            </tr>
                            <tr>
                                <td>Adobe Inc.</td>
                                <td>ADBE</td>
                                <td>$589.23</td>
                                <td>-1.17%</td>
                                <td>2,589,123</td>
                                <td>$278.12B</td>
                                <td>4.6 ★</td>
                                <td><span class="badge badge-soft-danger">Bearish</span></td>
                                <td>Technology</td>
                                <td>Software</td>
                                <td>29,239</td>
                                <td>1982</td>
                                <td>48.5</td>
                                <td>0%</td>
                                <td>$610</td>
                                <td>$470</td>
                                <td>Shantanu Narayen</td>
                            </tr>
                            <tr>
                                <td>Intel Corp.</td>
                                <td>INTC</td>
                                <td>$35.23</td>
                                <td>-0.98%</td>
                                <td>18,231,004</td>
                                <td>$147.89B</td>
                                <td>3.2 ★</td>
                                <td><span class="badge badge-soft-danger">Bearish</span></td>
                                <td>Technology</td>
                                <td>Semiconductors</td>
                                <td>121,100</td>
                                <td>1968</td>
                                <td>15.1</td>
                                <td>1.3%</td>
                                <td>$42</td>
                                <td>$28</td>
                                <td>Pat Gelsinger</td>
                            </tr>
                            <tr>
                                <td>PayPal Holdings</td>
                                <td>PYPL</td>
                                <td>$63.12</td>
                                <td>+0.82%</td>
                                <td>9,721,222</td>
                                <td>$74.23B</td>
                                <td>3.4 ★</td>
                                <td><span class="badge badge-soft-success">Bullish</span></td>
                                <td>Financials</td>
                                <td>Digital Payments</td>
                                <td>29,900</td>
                                <td>1998</td>
                                <td>18.6</td>
                                <td>0%</td>
                                <td>$88</td>
                                <td>$56</td>
                                <td>Alex Chriss</td>
                            </tr>
                            <tr>
                                <td>Salesforce Inc.</td>
                                <td>CRM</td>
                                <td>$217.88</td>
                                <td>+0.44%</td>
                                <td>6,231,654</td>
                                <td>$213.43B</td>
                                <td>4.3 ★</td>
                                <td><span class="badge badge-soft-success">Bullish</span></td>
                                <td>Technology</td>
                                <td>CRM Software</td>
                                <td>79,390</td>
                                <td>1999</td>
                                <td>33.2</td>
                                <td>0%</td>
                                <td>$225</td>
                                <td>$170</td>
                                <td>Marc Benioff</td>
                            </tr>
                            <tr>
                                <td>IBM</td>
                                <td>IBM</td>
                                <td>$139.24</td>
                                <td>-0.52%</td>
                                <td>4,893,014</td>
                                <td>$126.48B</td>
                                <td>3.6 ★</td>
                                <td><span class="badge badge-soft-danger">Bearish</span></td>
                                <td>Technology</td>
                                <td>IT Services</td>
                                <td>288,300</td>
                                <td>1911</td>
                                <td>14.8</td>
                                <td>5.2%</td>
                                <td>$150</td>
                                <td>$115</td>
                                <td>Arvind Krishna</td>
                            </tr>
                            <tr>
                                <td>Oracle Corp.</td>
                                <td>ORCL</td>
                                <td>$123.78</td>
                                <td>+0.65%</td>
                                <td>7,653,241</td>
                                <td>$331.12B</td>
                                <td>4.0 ★</td>
                                <td><span class="badge badge-soft-success">Bullish</span></td>
                                <td>Technology</td>
                                <td>Enterprise Software</td>
                                <td>143,000</td>
                                <td>1977</td>
                                <td>18.2</td>
                                <td>1.8%</td>
                                <td>$130</td>
                                <td>$98</td>
                                <td>Larry Ellison</td>
                            </tr>
                            <tr>
                                <td>Qualcomm</td>
                                <td>QCOM</td>
                                <td>$115.56</td>
                                <td>-1.01%</td>
                                <td>6,712,000</td>
                                <td>$129.42B</td>
                                <td>3.9 ★</td>
                                <td><span class="badge badge-soft-danger">Bearish</span></td>
                                <td>Technology</td>
                                <td>Semiconductors</td>
                                <td>51,000</td>
                                <td>1985</td>
                                <td>14.2</td>
                                <td>2.2%</td>
                                <td>$125</td>
                                <td>$100</td>
                                <td>Cristiano Amon</td>
                            </tr>
                            <tr>
                                <td>Zoom Video Comm.</td>
                                <td>ZM</td>
                                <td>$69.87</td>
                                <td>-0.88%</td>
                                <td>2,198,215</td>
                                <td>$20.98B</td>
                                <td>3.5 ★</td>
                                <td><span class="badge badge-soft-danger">Bearish</span></td>
                                <td>Communication Services</td>
                                <td>Video Conferencing</td>
                                <td>8,484</td>
                                <td>2011</td>
                                <td>32.7</td>
                                <td>0%</td>
                                <td>$92</td>
                                <td>$60</td>
                                <td>Eric Yuan</td>
                            </tr>
                            <tr>
                                <td>Spotify</td>
                                <td>SPOT</td>
                                <td>$158.32</td>
                                <td>+1.11%</td>
                                <td>1,498,320</td>
                                <td>$30.13B</td>
                                <td>4.1 ★</td>
                                <td><span class="badge badge-soft-success">Bullish</span></td>
                                <td>Communication Services</td>
                                <td>Music Streaming</td>
                                <td>9,094</td>
                                <td>2006</td>
                                <td>—</td>
                                <td>0%</td>
                                <td>$165</td>
                                <td>$115</td>
                                <td>Daniel Ek</td>
                            </tr>
                            <tr>
                                <td>Uber Technologies</td>
                                <td>UBER</td>
                                <td>$49.24</td>
                                <td>+0.92%</td>
                                <td>8,812,444</td>
                                <td>$102.34B</td>
                                <td>3.7 ★</td>
                                <td><span class="badge badge-soft-success">Bullish</span></td>
                                <td>Technology</td>
                                <td>Ride Hailing</td>
                                <td>32,800</td>
                                <td>2009</td>
                                <td>—</td>
                                <td>0%</td>
                                <td>$53</td>
                                <td>$32</td>
                                <td>Dara Khosrowshahi</td>
                            </tr>
                            <tr>
                                <td>Shopify</td>
                                <td>SHOP</td>
                                <td>$75.44</td>
                                <td>-0.21%</td>
                                <td>3,223,544</td>
                                <td>$96.72B</td>
                                <td>4.3 ★</td>
                                <td><span class="badge badge-soft-success">Bullish</span></td>
                                <td>Technology</td>
                                <td>E-Commerce</td>
                                <td>11,600</td>
                                <td>2006</td>
                                <td>—</td>
                                <td>0%</td>
                                <td>$80</td>
                                <td>$45</td>
                                <td>Tobi Lütke</td>
                            </tr>
                        </tbody>
                    </table>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
    </div>
@endsection

@section('scripts')
    @vite(['resources/js/pages/datatables-fixed-columns.js'])
@endsection
