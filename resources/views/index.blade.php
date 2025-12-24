    @extends('layouts.main')
    @section('container')
            <div class="flex gap-4">

<div class="bg-[#374151] size-40 w-2xs ml-3 mt-3 rounded-4xl flex justify-end items-center  ">
 <p class="p-3 text-white mr-6 text-4xl">20</p>

<div class="flex-column  mr-7 text-center">
 <i class="fas fa-book-open inline-block fa-3x text-white"></i> 
  <p class=" text-white  text-sm">Matakuliah</p>
</div>  
</div>



<div class="bg-[#374151] size-40 w-2xs ml-3 mt-3 rounded-4xl flex justify-end items-center  ">
 <p class="p-3 text-white mr-6 text-4xl">20</p>

<div class="flex-column  mr-7">
 <i class="fas fa-user-graduate inline-block fa-3x text-white pl-3"></i> 
  <p class=" text-white  text-sm">Mahasiswa</p>
</div>  
</div>



<div class="bg-[#374151] size-40 w-2xs ml-3 mt-3 rounded-4xl flex justify-end items-center  ">
 <p class="p-3 text-white mr-6 text-4xl">20</p>

<div class="flex-column  mr-7">
 <i class="fas fa-users inline-block fa-3x text-white"></i> 
  <p class=" text-white  text-sm pl-3">Kelas</p>
</div>  
</div>



</div>


{{-- <div class="w-[600px] p-4 mt-5">
    <canvas id="myChart" width="400" height="200"></canvas>
</div> --}}
<div class="w-[600px] p-4 mt-5">
    <canvas id="rataRataChart" width="400" height="200"></canvas>

</div>




  {{-- dashboard --}}
    {{-- <script>

        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data : {
                labels: [],
                datasets: [{
                    label: "penjualan",
                    data: [10,20,15,30,25],
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)', 
                    fill: true,
                    tension: 0.4
                }]
            },
            options :{
                responsive: true
            }
        }) ;


    </script> --}}


<script>
    const ctx = document.getElementById('rataRataChart').getContext('2d');
    const rataRataChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Tugas 1', 'Tugas 2', 'UTS', 'Tugas 3', 'UAS'],
            datasets: [{
                label: 'Rata-rata Nilai Kelas',
                data: [75, 80, 78, 85, 83],
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                tension: 0.3,
                fill: true,
                pointRadius: 5,
                pointBackgroundColor: 'rgba(75, 192, 192, 1)'
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    suggestedMin: 0,
                    suggestedMax: 100,
                    title: {
                        display: true,
                        text: 'Nilai'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Pertemuan / Tugas'
                    }
                }
            }
        }
    });
</script>

    @endsection
