@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1> Dashboard</h1>
    </div>
    <div class="row">
        <div class="card col-md-12">
            <div class="card-body">
                <h5>TRANSAKSI PERBULAN TAHUN INI</h5>
                <canvas id="myChart"></canvas>  
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5>TRANSAKSI BARANG</h5>
                    <canvas id="pieChart"></canvas>  
                </div>
            </div>
        </div>
        
         <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5>TRANSAKSI PERTAHUN</h5>
                    <canvas id="lineChart"></canvas>  
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@push('jsku')
<script>
var randomColorGenerator = function () { 
    return '#' + (Math.random().toString(16) + '0000000').slice(2, 8); 
};


var ctx = document.getElementById('myChart').getContext('2d');
var pie = document.getElementById('pieChart').getContext('2d');
var line = document.getElementById('lineChart').getContext('2d');
 
    $(document).ready(function(){
        loadperbulan();
        loadpertahun();
        loadhighbarang();
    });

    function loadperbulan(){
        var bulan = [];
        var total = [];
        var warna = [];
        $.ajax({
            url : ' {{ route("perbulan") }} ',
            success:function(data){
                $.each(data,function(index,item){
                    bulan.push( convertmonth(item.month) );
                    total.push(item.total);
                    warna.push(randomColorGenerator());
                });
               var chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: bulan,
                        datasets: [{
                            label: 'Jumlah Transaksi',
                            backgroundColor: '#6777ef',
                            data: total,
                        }]
                    },
                    
                });
            }
        });
    }

    function loadpertahun(){
        var tahun = [];
        var total = [];
        var warna = [];
        $.ajax({
            url : ' {{ route("pertahun") }} ',
            success:function(data){
                $.each(data,function(index,item){
                    tahun.push(item.year);
                    total.push(item.total);
                    warna.push(randomColorGenerator());
                });
                var chart = new Chart(line, {
                    type: 'line',
                    data: {
                        labels: tahun,
                        datasets: [{
                            label: 'Jumlah Transaksi',
                            backgroundColor: warna,
                            data: total,
                            fill: false,
                            
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                    
                });
            }
        });
    }

    function loadhighbarang(){
        var total = [];
        var barang = [];
        var warna = [];
        $.ajax({
            url : ' {{ route("highbarang") }} ',
            success:function(data){
                $.each(data,function(index,item){
                    barang.push(item.barang);
                    total.push(item.total);
                    warna.push(randomColorGenerator());
                });
                var chart = new Chart(pie, {
                    type: 'pie',
                    data: {
                        labels: barang,
                        datasets: [{
                            label: 'Jumlah barang',
                            backgroundColor: warna,
                            data: total,
                            
                        }]
                    }
                    
                });
            } 
        });
    }

    function convertmonth(month){
        if(month == 1)
            return 'Jan';
        else if(month == 2)
            return 'Feb';
        else if(month == 3)
            return 'Mar';
        else if(month == 4)
            return 'Apr';
        else if(month == 5)
            return 'Mei';
        else if(month == 6)
            return 'Jun';
        else if(month == 7)
            return 'Jul';
        else if(month == 8)
            return 'Agu';
        else if(month == 9)
            return 'Sep';
        else if(month == 10)
            return 'Okt';
        else if(month == 11)
            return 'Nov';
        else if(month == 12)
            return 'Des';
    }


    
    
</script>
@endpush
