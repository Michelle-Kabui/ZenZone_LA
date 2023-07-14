@extends('dashboard')

@section('content')


<div class="container">
    <h2 class="mt-5 mb-5">Assessments</h2>
    <div class="row">
        <div class="col-md-6">
            <canvas id="positiveEmotionsChart"></canvas>
        </div>
        <div class="col-md-6">
            <canvas id="negativeEmotionsChart"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const set1_mean = @json($set1_mean->pluck('set1_mean'));
    const set2_mean = @json($set2_mean->pluck('set2_mean'));

    const labels = Array.from({length: set1_mean.length}, (_, i) => i + 1); 

    const positiveEmotionsChart = new Chart(document.getElementById('positiveEmotionsChart'), {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Positive Emotions',
                data: set1_mean,
                backgroundColor: 'rgba(0, 123, 255, 0.2)', // Light blue
                borderColor: 'rgba(0, 123, 255, 1)', // Dark blue
                borderWidth: 2,
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    max: 5
                }
            },
            plugins: {
                legend: {
                    position: 'right',
                }
            }
        }
    });

    const negativeEmotionsChart = new Chart(document.getElementById('negativeEmotionsChart'), {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Negative Emotions',
                data: set2_mean,
                backgroundColor: 'rgba(220, 53, 69, 0.2)', // Light red
                borderColor: 'rgba(220, 53, 69, 1)', // Dark red
                borderWidth: 2,
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    max: 5
                }
            },
            plugins: {
                legend: {
                    position: 'right',
                }
            }
        }
    });

</script>

@endsection
